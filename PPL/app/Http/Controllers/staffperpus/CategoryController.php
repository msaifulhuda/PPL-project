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
    protected $staff_account;

    public function __construct()
    {
        $this->staff_account = DB::table('staffperpus')
            ->where('username', '=', session('username'))
            ->first();

        view()->composer('*', function ($view) {
            $view->with('staff_account',  $this->staff_account);
        });
    }
    public function manageCategory()
    {
        $Category = DB::table('kategori_buku')
            // ->orderBy('nama_kategori')
            ->get();
        // ->paginate(7);
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
    public function updateCategory(Request $request)
    {
        // Validate input
        $valid = $request->validate([
            'name' => 'required|string|max:255|unique:kategori_buku,nama_kategori',
        ]);

        // Find the category to update
        $category = kategori_buku::find($request->input('target'));
        if ($category) {
            // Update the category name
            $category->nama_kategori = $request->input('name');
            $category->save();

            // Redirect with success message
            return redirect()->route('staff_perpus.managecategories')->with('success', 'Category updated successfully!');
        }

        // If category not found, return an error message
        return redirect()->route('staff_perpus.managecategories')->with('failed', 'Category update failed!');
    }
}
