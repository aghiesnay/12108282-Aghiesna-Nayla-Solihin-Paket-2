<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        return view('admin-petugas/product', compact('products'));
    }

    public function createProduct(Request $request)
    {
         //validasi product
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required',
            // 'img' => 'required',
        ]);

        //add product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'img' => $request->img,
        ]);

        return redirect()->back()->with('successAdd', 'Berhasil menambahkan product!');
    }

    public function editProduct($id) {
        $product = Product::findOrFail($id);
        return view('/admin/produk/editData', compact('product'));
    }

    public function updateProduct (Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required',
            // 'img' => 'required',
        ]);

        Product::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'img' => $request->img,
        ]);

        return redirect('/product')->with('successUpdate', 'Data product berhasil diperbarui!');
    }

    public function deleteProduct($id) {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus akun!');
    }
}
