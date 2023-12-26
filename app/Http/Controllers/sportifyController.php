<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Mail\OrderConfirmation;
use App\Models\cart_table;
use App\Models\Orders;




class sportifyController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function contactUs()
    {
        return view("contactUs");
    }

    public function products(Request $request)
    {
        $products = DB::select("select * from product");
        return view("products", ['products' => $products]);
    }

    public function deleteProds(Request $request)
    {
        $products = DB::select("select * from product");
        return view("Admin.adminDelProds", compact('products'));
    }

    

    // public function productDetail($id){
    //     // Cast $id to an integer
    //     $id = (int)$id;

    //     $product = DB::select("select * from product where id = ?", [$id]);

    //     // return $product;
    //     return view("productDetail", ["product" => $product]);
    // }

    public function productDetail($id)
    {
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

    public function addItem($id, $quantity, $color, $size)
    {
        $id = (int)$id;

        $product = DB::select("select * from product where id = ?", [$id]);

        $cartItem = array(
            'id' => $product[0]->id,
            'name' => $product[0]->name,
            'price' => $product[0]->price,
            'img' => $product[0]->img1,
            'quantity' => $quantity,
            'color' => $color,
            'size' => $size
        );

        $cart = new Cart();
        $cart->addItem($cartItem);
        return redirect("/productDetail/$id");
    }

    public function removeItem($index, $previousURL)
    {
        $index = (int)$index;

        $cart = new Cart();
        $cart->removeItem($index);

        $previousURL = $this->decodeURL($previousURL);
        return redirect()->to("$previousURL");
    }

    private function decodeURL($encodedString)
    {
        $parts = explode('_', $encodedString); // Split encoded string by '_'
        $encoded = $parts[0];
        $positions = array_map('intval', explode(',', $parts[1])); // Get positions as array

        // Insert '/' back at the correct positions
        foreach ($positions as $position) {
            $encoded = substr($encoded, 0, $position) . '/' . substr($encoded, $position);
        }

        return $encoded;
    }
    public function checkOutPage()
    {
        return view("checkoutform");
    }
    public function preorder()
    {
        return view("preorderpage");
    }

    public function insert(Request $request)
    {
        $title = $request->input('p_title');
        $brand = $request->input('p_brand');
        $price = $request->input('p_price');
        $qty = $request->input('p_quantity');
        $category = $request->input('p_category');
        $desc = $request->input('p_desc');
        $img = "";


        if ($request->hasFile('p_img')) {
            $file = $request->file('p_img');
            $file->move(public_path('assets'), $file->getClientOriginalName());
            $img = $file->getClientOriginalName();
        }

        $colorData = $request->input('color');
        // return $colorData;

        //Inserting Quantity in product inventory table
        DB::table('product_inventory')->insert([
            'quantity' => $qty,
        ]);
        // Retrieve the ID of the last inserted row
        $invId = DB::getPdo()->lastInsertId();

        $ctg = DB::table('product_category')
            ->whereRaw('LOWER(name) = ?', [strtolower($category)])
            ->first();

        $ctgId = -1;
        if ($ctg) {
            $ctgId = $ctg->id; // Return the ID if category found
        }

        //Inserting the Product Information in Product Table
        DB::table('product')->insert([
            'name' => $title,
            'description' => $desc,
            'category_id' => $ctgId,
            'inventory_id' => $invId,
            'price' => $price,
            'brand' => $brand,
            'img1' => $img,
            'img2' => $img,
            'img3' => $img,
            'img4' => $img,
        ]);

        $pId = DB::getPdo()->lastInsertId();


        $sizeArray = ['XS', 'S', 'M', 'L', 'XL', 'XXL']; // Size array
        $insertedColors = []; // To store inserted color IDs

        foreach ($colorData as $color) {
            // Check if the color exists in the database
            $existingColor = DB::table('color')
                ->where('color', $color['name'])
                ->first();

            if (!$existingColor) {
                // If color doesn't exist, insert it into the color table
                $colorId = DB::table('color')->insertGetId([
                    'color' => $color['name'],
                    'hex_code' => $color['code']
                ]);

                // Store the inserted color ID
                $insertedColors[$color['name']] = $colorId;
            } else {
                // If color exists, retrieve its ID
                $insertedColors[$color['name']] = $existingColor->id;
            }

            // Loop through sizes for each color
            foreach ($color['sizes'] as $size) {
                // Find the size_id from the size array
                $sizeId = array_search($size, $sizeArray) + 1;


                try {
                    // Insert the record into product_inventory table
                    DB::table('product_attribute')->insert([
                        'p_id' => $pId,
                        'size_id' => $sizeId,
                        'color_id' => $insertedColors[$color['name']],
                    ]);
                } catch (\Exception $e) {
                    // Handle exceptions or return an error message
                    return $e->getMessage(); // Return the error message for debugging purposes
                }
            }
        }

        return redirect('/dashboard');
    }

    public function addProductPage(Request $request)
    {
        return view('Admin.addProduct');
    }

    public function loginPage(Request $request)
    {
        return view('Admin.login');
    }


    public function submit(Request $request)
    {


        //Storing the record in DB
        $fName = $request->input('fname');
        $lName = $request->input('lname');
        $contact = $request->input('mobileNumber');
        $email = $request->input('email');
        $address = $request->input('address');
        $city = $request->input('city');
        $country = $request->input('country');
        $zip = $request->input('zip');


        // Storing the record in the 'orders' table using raw SQL query
        DB::insert('INSERT INTO `order` (first_name, last_name, contact_no, email, address, city, country, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [
            $fName, $lName, $contact, $email, $address, $city, $country, $zip
        ]);

        $orderId = DB::getPdo()->lastInsertId();


        $cart = new Cart();
        $items = $cart->getAllItems();


        foreach ($items as $item) {
            //Decrease the quantity from the product inventory accordingly
            $p = DB::table('product')->where('id', $item['id'])->first();
            $invId = $p->inventory_id;

            $invRow = DB::table('product_inventory')->where('id', $invId)->first();
            $updatedQty = $invRow->quantity - $item['quantity'];

            if ($updatedQty < 1) {
                $updatedQty = -1;
            }

            DB::table('product_inventory')
                ->where('id', $invId)
                ->update(['quantity' => $updatedQty]);

            $cartTable = new cart_table();
            $cartTable->order_id = $orderId;
            $cartTable->quantity = $item['quantity'];
            $cartTable->size = $item['size'];
            $cartTable->p_id = $item['id'];
            $cartTable->color = $item['color'];
            $cartTable->save();
        }

        // Fetch the user-entered email
        $userEmail = $request->input('email');
        Log::info('User Email: ' . $userEmail);

        // Send the order confirmation email to the user
        $mailData = [
            'title' => 'ORDER CONFIRMED! ORDER ID : ' . $orderId,
            // 'body' => 'This mail is for testing purpose'
        ];

        Mail::to($userEmail)->send(new OrderConfirmation($mailData));

        return Redirect::route('index')->with('ordersuccess', 'Email sent successfully!');
    }


    public function destroy($id)
    {
        DB::beginTransaction();

        $product = DB::table('product')->where('id', $id)->first();
        $inventoryId = $product->inventory_id;
        DB::table('product_inventory')->where('id', $inventoryId)->delete();
        DB::table('product_attribute')->where('p_id', $id)->delete();

        // DB::unprepared("delete from product where id = '$id'");
        DB::table('product')->where('id', $id)->delete();

        return redirect('/delprods')->with('deletionsuccess', 'Record deleted successfully');
    }

    public function admindashboard()
    {
        return view('Admin.admindashboard');
    }


    public function storeClientQuery(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');

        DB::unprepared("Insert into client_queries (Name, Email, Contact, Message) values ('$name','$email','$phone','$message')");
        return Redirect::route('index')->with('clientquerysuccess', 'Data Fed in DB successfully!');
    }


    public function showClientQueries() {
        $clientQueries = DB::table('client_queries')->get();
    
        return view('Admin.viewComplaints', ['clientQueries' => $clientQueries]);
    }
    
    
    public function destroyClientQuery($id){
        DB::beginTransaction();

        DB::table('client_queries')->where('id', $id)->delete();
        return redirect('/client_queries')->with('deletionsuccess', 'Complaint removed successfully!');
    }
    
    public function showClientOrders() {
        $clientOrders = DB::table('order')->get();
        $cart = DB::table('cart')->get();

        return view('Admin.viewOrders', compact('clientOrders','cart'));
    }


}
