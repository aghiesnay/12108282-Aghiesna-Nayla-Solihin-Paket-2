<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Detail_Sale;
use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Dompdf\Dompdf;
use Dompdf\Options;

class SaleController extends Controller
{
    public function sale()
    {
        $products = Product::all();
        return view('/employee/product/sale', compact('products'));
    }

    public function index()
    {
        $products = Product::all();
        return view('sale', compact('products'));
    }

    public function addToCart(Request $request)
    {
        // Get ID and corresponding product
        $id = $request->input('id'); 
        $product = Product::findOrFail($id);

        // Add to cart and save
        $cart = session()->get('cart', []);
        $cart[$id] = [
            'product_id' => $id, 
            'name' => $product->name,
            'price' => $product->price,
            'amount' => $request->input('quantity')
        ];
        session()->put('cart', $cart);

        // Redirect to order page
        return redirect('/order');
    }
    public function order()
    {
        $users = User::all();
        $customers = Customer::all();
        $cart = session()->get('cart', []);

        return view('/employee/product/order', compact('users', 'customers', 'cart'));
    }

    public function createOrder(Request $request)
    {
         // Transaction begins
        DB::beginTransaction(); 
    
        try {
            // Data from the form
            $user_id = auth()->id(); // Get the ID of the currently logged-in user
            $name = $request->input('name');
            $address = $request->input('address');
            $no_hp = $request->input('no_hp');
            $pay = $request->input('pay');
            $change = $request->input('change');
            $cart = session('cart', []);
    
            // Calculate total price of items in the cart
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
                'customer_id' => $customer->id,
                'user_id' => $user_id,
                'sales_date' => now(),
                'total_price' => $total_price,
                'pay' => $pay,
                'change' => $change,
            ]);
    
            // Save the sale details
            foreach ($cart as $item) {
                $product_id = $item['product_id'];
            
                if ($product_id !== null) {
                    $product = Product::find($product_id);
            
                    // Check if the product is found
                    if ($product) {
                        if ($product->stok >= $item['amount']) {
                            $product->decrement('stok', $item['amount']); 
            
                            Detail_Sale::create([
                                'sale_id' => $sale->id,
                                'product_id' => $product_id,
                                'amount' => $item['amount'],
                                'sub_total' => $item['price'] * $item['amount'],
                            ]);
                        } else {
                            throw new \Exception("Insufficient stock for product {$product->name}");
                        }
                    } else {
                        throw new \Exception("Product with ID {$product_id} not found");
                    }
                } else {
                    throw new \Exception("Invalid Product ID");
                }
            }            
    
            DB::commit(); // Commit transaction
            // Clear the cart upon successful transaction
            session()->forget('cart');
    
            // Generate PDF and return it
            return $this->detailSalePDF($sale->id);
        } catch (\Exception $e) {
            DB::rollback(); 
            return back()->with('error', $e->getMessage());
        }
    }    

    public function detailSalePDF($id) {
        // Get sale details
        $sale = Sale::findOrFail($id);
        $customer = $sale->customer;
        $details = Detail_Sale::where('sale_id', $id)->with('product')->get();
        
        // Render HTML view
        $html = view('admin.product.detailSale', compact('customer', 'sale', 'details'))->render();
    
        // Configure PDF options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
    
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml($html);
    
        $dompdf->setPaper('A4', 'portrait');
    
        $dompdf->render();
    
        return $dompdf->stream("order_receipt.pdf", [
            "Attachment" => false
        ]);
    }

    public function dataSales()
    {
        $sales = Sale::with(['user', 'customer'])->get();
        return view('/admin-employee/dataSales', compact('sales'));
    }

    public function deleteSale($id) {
        Sale::where('id', '=', $id)-> delete();
        return redirect()->back()->with('deleted', 'Successfully deleted data product data!');
    } 

}
