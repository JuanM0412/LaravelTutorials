<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=> 500],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=> 1000],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=> 75],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=> 50]
    ];

    public function index(): View{
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View | RedirectResponse {
        $viewData = [];
        
        if (!isset(ProductController::$products[$id-1])){
            return redirect()->route('home.index');
        }
        
        $product = ProductController::$products[$id-1];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View{
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request){
        $viewData = [];
        
        $request->validate([
            "name" => "required",
            "price" => ["required", "gt:0"]
        ]);
        
        $productName = $request->get("name");
        $viewData["title"] = $productName." - Online Store";
        $viewData["subtitle"] =  $productName." - Product information";
        $viewData["product"] = $productName;
        
        return view('product.confirmation')->with("viewData", $viewData);

        //dd($productName);
    }
}