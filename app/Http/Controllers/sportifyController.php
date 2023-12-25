<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function insert(Request $request){
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

    public function addProductPage(Request $request){
        return view('Admin.addProduct');
    }

    public function loginPage(Request $request){
        return view('Admin.login');
    }
}
