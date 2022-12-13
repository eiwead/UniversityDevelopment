<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Requirement;

class RequirementController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Требования";
        $viewData["subtitle"] = "Список требований";

        $viewData["requirements"] = Requirement::all();
        return view('requirement.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $requirement = Requirement::findOrFail($id);

        $viewData["wage"] = $requirement->getWage() . " - Зарплата";
        $viewData["age"] = $requirement->getAge() . " - Возраст";
        $viewData["payability"] = $requirement->getPayability() . " - Платёжеспособность";

        $viewData["requirement"] = $requirement;
        return view('requirement.show')->with("viewData", $viewData);
    }
}
