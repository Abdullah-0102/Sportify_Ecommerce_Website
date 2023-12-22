<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    
    
    
}
