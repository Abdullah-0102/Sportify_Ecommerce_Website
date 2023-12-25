<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Mail\OrderConfirmation;




class sportifyController extends Controller
{
    public function index(){
        return view("index");
    }

    public function contactUs(){
        return view("contactUs");
    }

    public function products(Request $request){
        $products = DB::select("select * from product"); 
        return view("products",['products' => $products]);
    }

    public function deleteProds(Request $request){
        $products = DB::select("select * from product"); 
        return view("Admin.adminDelProds", compact('products'));
    }

    public function destroy($id){
        DB::beginTransaction();

        $product = DB::table('product')->where('id', $id)->first();
        $inventoryId = $product->inventory_id;
        DB::table('product_inventory')->where('id', $inventoryId)->delete();
        DB::table('product_attribute')->where('p_id', $id)->delete();
        
        // DB::unprepared("delete from product where id = '$id'");
        DB::table('product')->where('id', $id)->delete();

        return redirect('/delprods')->with('deletionsuccess', 'Record deleted successfully');
    }
    
    // public function productDetail($id){
    //     // Cast $id to an integer
    //     $id = (int)$id;
        
    //     $product = DB::select("select * from product where id = ?", [$id]);

    //     // return $product;
    //     return view("productDetail", ["product" => $product]);
    // }

    public function productDetail($id){
        // Cast $id to an integer
        $id = (int)$id;
        
        $product = DB::select("select * from product where id = ?", [$id]);
    
        $colorIds = DB::select("select distinct color_id from product_attribute where p_id = ?", [$id]);
    
        $colors = [];
        foreach ($colorIds as $colorId) {
            $color = DB::select("select * from color where id = ?", [$colorId->color_id]);
    
            $sizeIds = DB::select("select distinct size_id from product_attribute where p_id = ? and color_id = ?", [$id, $colorId->color_id]);
    
            $sizes = [];
            foreach ($sizeIds as $sizeId) {
                $size = DB::select("select * from size where id = ?", [$sizeId->size_id]);
                $sizes[] = $size[0]; // Assuming only one row will be returned for each size_id
            }
    
            $colors[] = [
                'color' => $color[0], // Assuming only one row will be returned for each color_id
                'sizes' => $sizes
            ];
        }

        // return $colors;
        return view("productDetail", [
            "product" => $product,
            "colors" => $colors
        ]);
    }
    
    
    

    public function checkOutPage(){
        return view("checkoutform");
    }
    public function preorder(){
        return view("preorderpage");
    }


    public function submit(Request $request)
    {
        

        // Fetch the user-entered email
        $userEmail = $request->input('email');
        Log::info('User Email: ' . $userEmail);

        // Send the order confirmation email to the user
        $mailData = [
            'title' => 'ORDER CONFIRMED!',
            // 'body' => 'This mail is for testing purpose'
        ];

        Mail::to($userEmail)->send(new OrderConfirmation($mailData));
        return Redirect::route('index')->with('ordersuccess', 'Email sent successfully!');

        // Redirect back or to a success page
        // echo $userEmail;
        // return Redirect::to('/')->with('success', 'Email sent successfully!');
    }

    public function admindashboard(){
        return view('Admin.admindashboard');
    }

}
