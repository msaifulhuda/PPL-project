<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class NotifikasiMateri implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $materi;
    protected $kelas_mata_pelajaran;
    public function __construct($materi, $kelas_mata_pelajaran)
    {
        $this->materi = $materi;
        $this->kelas_mata_pelajaran = $kelas_mata_pelajaran;
    }


    public function sendWhatsApp($client, $to, $from, $message)
    {
        try {
            $client->messages->create(
                $to,
                ['from' => $from, 'body' => $message]
            );
        } catch (\Exception $e) {
            // Log error atau handle kegagalan
            \Log::error('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
            // dd('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        }
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $nomorWhatsApps = ["+6289531419612", "+6287864365113", "+6285784377750", "+6285936191911"];
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioWhatsappNumber = 'whatsapp:' . env('TWILIO_WHATSAPP_NUMBER');
        $to = 'whatsapp:' . '+6289531419612';

        $message = "Materi Baru Diupload: " . $this->materi->judul_materi . "\n" .
            "Kelas: " . $this->kelas_mata_pelajaran->kelas->nama_kelas . "\n" .
            "Mata Pelajaran: " . $this->kelas_mata_pelajaran->mataPelajaran->nama_matpel;

        $client = new Client($twilioSid, $twilioAuthToken);

        foreach ($nomorWhatsApps as $nomor) {
            $to = 'whatsapp:' . $nomor;
            $this->sendWhatsApp($client, $to, $twilioWhatsappNumber, $message);
        }

        // try {
        //     $client->messages->create(
        //         $to,
        //         ['from' => $twilioWhatsappNumber, 'body' => $message]
        //     );

        //     // dd('Notifikasi WhatsApp berhasil dikirim');
        // } catch (\Exception $e) {
        //     // Log error atau handle kegagalan
        //     \Log::error('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        //     // dd('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        // }
    }
}
