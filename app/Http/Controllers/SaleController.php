<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Detail_Sale;
use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class SaleController extends Controller
{
    public function sale()
    {
        $products = Product::all();
        return view('/petugas/produk/sale', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $id = $request->input('id'); 
        $product = Product::findOrFail($id);

        // Menambahkan product ke cart
        $cart = session()->get('cart', []);
        $cart[$id] = [
            'product_id' => $id, 
            'name' => $product->name,
            'price' => $product->price,
            'amount' => $request->input('quantity')
        ];
        session()->put('cart', $cart);

        return redirect('/order');
    }

    
    public function order()
    {
        $users = User::all();
        $customers = Customer::all();
        $cart = session()->get('cart', []);

        return view('/petugas/produk/order', compact('users', 'customers', 'cart'));
    }

    public function createOrder(Request $request)
    {
        // dd($request->all());
        //Transaksi
        DB::beginTransaction(); 

        try {
            // Data dari form
            $user_id = $request->input('user');
            $name = $request->input('name');
            $address = $request->input('address');
            $no_hp = $request->input('no_hp');
            $cart = session('cart', []);

            // Total price pada cart
            $total_price = 0;
            foreach ($cart as $item) {
                $total_price += $item['price'] * $item['amount'];
            }

            $customer = Customer::create([
                'name' => $name,
                'address' => $address,
                'no_hp' => $no_hp,
            ]);

            $sale = Sale::create([
                'sales_date' => now(),
                'total_price' => $total_price,
                'customer_id' => $customer->id,
                'user_id' => $user_id,
            ]);

            // Simpan pada detail sales
            foreach ($cart as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    if ($product->stok >= $item['amount']) {
                        $product->decrement('stok', $item['amount']); 

                        Detail_Sale::create([
                            'sale_id' => $sale->id,
                            'product_id' => $item['product_id'],
                            'amount' => $item['amount'],
                            'sub_total' => $item['price'] * $item['amount'],
                        ]);
                    } else {
                        throw new \Exception("Stok tidak cukup untuk produk {$product->name}");
                    }
                } else {
                    throw new \Exception("Product dengan ID {$item['product_id']} tidak ditemukan");
                }
            }

            DB::commit(); // Commit transaction

            //Kosongkan keranjang ketika transaksi berhasil
            session()->forget('cart');

            return redirect('/data-sales')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollback(); 
            return back()->with('error', $e->getMessage());
        }
    }

    public function dataSales()
    {
        $sales = Sale::with(['user', 'customer'])->get();
        return view('/admin-petugas/dataSales', compact('sales'));
    }

    public function deleteSale($id) {
        Sale::where('id', '=', $id)-> delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data produk');
    } 

}
