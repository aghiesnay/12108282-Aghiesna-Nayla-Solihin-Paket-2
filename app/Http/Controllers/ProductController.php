<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        return view('admin-employee/product', compact('products'));
    }

    public function createProduct(Request $request)
    {
         //validasi product
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        
        // upload img
        $imagePath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $imagePath = 'assets/img/' . $imageName;
        }

        //add product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'img' => $imagePath,
        ]);

        return redirect()->back()->with('successAdd', 'Successfully!');
    }

    public function editProduct($id) {
        $product = Product::findOrFail($id);
        return view('/admin/product/editData', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif', // Validation for type
        ]);

        // Retrieve product data to be updated
        $product = Product::findOrFail($id);

        // If any images are uploaded
        if ($request->hasFile('img')) {
            // Delete old images if any
            if ($product->img) {
                unlink(public_path($product->img)); 
            }
            // Upload a new image
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $imagePath = 'assets/img/' . $imageName;

            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stok' => $request->stok,
                'img' => $imagePath,
            ]);
        } else {
            // If no image is uploaded, only update data without image
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stok' => $request->stok,
            ]);
        }

        return redirect('/product')->with('successUpdate', 'Successfully updated');
    }

    public function deleteProduct($id) {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Successfully deleted!');
    }
}
