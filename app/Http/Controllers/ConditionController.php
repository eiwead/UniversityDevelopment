<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Requirement;

class ConditionController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Условия";
        $viewData["subtitle"] = "Список условий";
        // $viewData["products"] = ProductController::$products;

        $viewData["conditions"] = Condition::all();
        // $viewData["requirements"] = Requirement::all();
        
        return view('condition.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        // $product = ProductController::$products[$id-1];
        $conditions = Condition::findOrFail($id);
        $requirements = Requirement::findOrFail($id);
        // $viewData["requirements"] = Requirement::all();
        // echo $product->name; # prints the product’s name
        // echo $product["name"]; # prints the product’s name
        $viewData["wage"] = $requirements->getWage() ." -минимальная зарплата";
        $viewData["age"] = $requirements->getAge() ." -минимальный возраст";
        $viewData["payability"] = $requirements->getPayability() ." -должна быть платёжеспособность";
        // $viewData["title"] = $product["name"]." - Online Store";
        $viewData["title"] = $conditions->getName() . " - Услуга";
        // $viewData["title"] = strtoupper($product["name"])." - Online Store"; Выводит те же данные, но в заглавном регистре

        $viewData["subtitle"] = $conditions->getName() . " - иформация о займе";
        $viewData["condition"] = $conditions;
        return view('condition.show')->with("viewData", $viewData);
    
    }
}
