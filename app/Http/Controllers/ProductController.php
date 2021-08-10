<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function post(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                "message" => "success",
                "data" => $product
            ]
        );
    }

    function get()
    {
        $data = Product::all();

        return response()->json(
            [
                "message" => "success",
                "data" => $data
            ]
        );
    }

    function getById($id){
        $data = Product::where('id', $id)->get();

        return response()->json(
            [
                "message" => "success",
                "data" => $data
            ]
        );
    }

    function put($id, Request $request)
    {
        $product = Product::where('id',$id)->first();
        if($product){
            return response()->json(
                [
                    "message" => "PUT Method success ".$product
                ]
            );   
        }
        return response()->json(
            [
                "message" => "PUT Method Failed ".$id
            ],400
        );

        
    }

    function delete($id)
    {
        return response()->json(
            [
                "message" => "DELETE Method success " .$id
            ]
        );
    }
}
