<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//     public static $products = [                                                                                  Больше нам не требуется, т.к. далее будем получать данные из БД
//         ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "image" => "game.png", "price"=>"1000"],
//         ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "image" => "safe.png", "price"=>"999"],
//         ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "image" => "submarine.png", "price"=>"30"],
//         ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "image" => "game.png", "price"=>"100"]
// ];
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        // $viewData["products"] = ProductController::$products;

        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        // $product = ProductController::$products[$id-1];
        $product = Product::findOrFail($id);
        // echo $product->name; # prints the product’s name
        // echo $product["name"]; # prints the product’s name

        // $viewData["title"] = $product["name"]." - Online Store";
        $viewData["title"] = $product->getName()." - Online Store";
        // $viewData["title"] = strtoupper($product["name"])." - Online Store"; Выводит те же данные, но в заглавном регистре

        $viewData["subtitle"] = $product->getName()." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}