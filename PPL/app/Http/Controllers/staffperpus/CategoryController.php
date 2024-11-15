<?php

namespace App\Http\Controllers\staffperpus;

use App\Models\buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\kategori_buku;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class CategoryController extends Controller
{
    public function manageCategory()
    {
        $Category = DB::table('kategori_buku')
            ->paginate(10);
        return view('staff_perpus.kategori_buku', ['arrayCategory' => $Category]);
    }
    public function addCategory(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|max:255|unique:kategori_buku,nama_kategori',
        ]);
        if ($valid) {
            kategori_buku::create([
                'id_kategori_buku' => Str::uuid(),
                'nama_kategori' => $request->input('name')
            ]);
            return redirect()->route('staff_perpus.managecategories')->with('success', 'Category added successfully!');
        }
        return redirect()->route('staff_perpus.managecategories')->with('failed', 'Category added failed!');
    }
    public function deleteCategory(Request $request)
    {
        $categories = $request->input();
        $categories = explode(',', $categories['selected_categories']);
        foreach ($categories as $category) {
            $categoriesDeleted = DB::table('kategori_buku')->where('id_kategori_buku', '=', $category)->delete();
        }
        if ($categoriesDeleted) {
            return redirect()->route('staff_perpus.managecategories')->with('success', 'Categories Deleted Successfully!');
        } else {
            return redirect()->route('staff_perpus.managecategories')->with('failed', 'Cannot Delete Categories!');
        }
    }
}
