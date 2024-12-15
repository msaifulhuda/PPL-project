<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Siswa;
use Twilio\Rest\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\transaksi_peminjaman;

class NotifikasiTenggatPeminjaman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notifikasi-tenggat-peminjaman';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim notifikasi tenggat pengembalian buku kepada peminjam.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hariIni = Carbon::now();
        $besok = Carbon::tomorrow(); // Besok

        // Ambil transaksi yang pengembaliannya besok
        $peminjamanBesok = DB::table('transaksi_peminjaman')
            ->join('buku', 'transaksi_peminjaman.id_buku', '=', 'buku.id_buku')
            ->where('transaksi_peminjaman.tgl_pengembalian', '<=', $besok)
            ->where('transaksi_peminjaman.status_pengembalian', 0)
            ->get();

        if ($peminjamanBesok->count() > 0) {
            foreach ($peminjamanBesok as $peminjaman) {
                // Kirim notifikasi WhatsApp
                $this->kirimNotifikasi($peminjaman);  // Pass the correct object to the notification method
            }

            $this->info("Notifikasi tenggat pengembalian buku besok telah dikirimkan melalui WhatsApp!");
        } else {
            $this->info("Tidak ada transaksi peminjaman yang tenggatnya besok.");
        }
    }

    private function kirimNotifikasi($peminjaman)
    {
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioWhatsappNumber = 'whatsapp:' . env('TWILIO_WHATSAPP_NUMBER');

        if ($peminjaman->jenis_peminjam == 0) {  // Jika peminjam adalah siswa
            try {
                // Mengambil data siswa berdasarkan NISN
                $peminjam = Siswa::where('nisn', $peminjaman->kode_peminjam)->first();  // Using first() to fetch the first result
                $nama = $peminjam->nama_siswa;
                $wa = $peminjam->nomor_wa_siswa;
            } catch (\Exception $e) {
                Log::error('Error while fetching Siswa data: ' . $e->getMessage());
            }
        } else {  // Jika peminjam adalah guru
            try {
                // Mengambil data guru berdasarkan NIP
                $peminjam = Guru::where('nip', $peminjaman->kode_peminjam)->first();  // Using first() to fetch the first result
                $nama = $peminjam->nama_guru;
                $wa = $peminjam->nomor_wa_guru;
            } catch (\Exception $e) {
                Log::error('Error while fetching Guru data: ' . $e->getMessage());
            }
        }

        // Pesan yang akan dikirim
        $pesan = "⚠️ *Halo {$nama}* ⚠️\n\n" .
            "*Tenggat Pengembalian Buku:* {$peminjaman->judul_buku}\n" .
            "⏰ *Tenggat Waktu Pengembalian:* " . Carbon::parse($peminjaman->tgl_pengembalian)->format('d M Y') . "\n\n" .
            "Segera kembalikan buku tersebut agar tidak terlambat! 💪\n\n" .
            "Jangan lupa, semangat terus ya! ✨";

        // Membuat instance Twilio client
        $client = new Client($twilioSid, $twilioAuthToken);

        try {
            // Mengirim pesan WhatsApp
            $client->messages->create(
                'whatsapp:' . $wa,
                [
                    'from' => $twilioWhatsappNumber,
                    'body' => $pesan
                ]
            );
        } catch (\Exception $e) {
            Log::error('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        }
    }
}
