<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "НедоБанк";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Типа Банк для выдачи кредита";
        $viewData["subtitle"] = "О нас (:";
        $viewData["description"] = "О чём-то";
        $viewData["author"] = "Пробное";
        return view('home.about')->with("viewData", $viewData);
    }
}
