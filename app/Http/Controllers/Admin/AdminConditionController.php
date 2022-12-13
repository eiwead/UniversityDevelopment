<?php

namespace App\Http\Controllers\Admin;

use App\Models\Condition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminConditionController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Условия";
        $viewData["subtitle"] = "Список условий";

        $viewData["conditions"] = Condition::all();
        return view('admin.condition.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        // $requirement = Requirement::all();
        $newCondition = new Condition();
        $newCondition->setName($request->input('name'));
        $newCondition->setPeriod($request->input('period'));
        $newCondition->setPercent($request->input('percent'));
        // $newCondition->$requirement->getId('id');
        $newCondition->save();

        return back();
    }

    public function delete($id)
    {
        Condition::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Изменить";
        $viewData["condition"] = Condition::findOrFail($id);
        return view('admin.condition.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Condition::validate($request);
        $condition = Condition::findOrFail($id);
        $condition->setName($request->input('name'));
        $condition->setPeriod($request->input('period'));
        $condition->setPercent($request->input('percent'));

        $condition->save();
        return redirect()->route('admin.condition.index');
    }
}
