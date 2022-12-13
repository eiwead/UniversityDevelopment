<?php

namespace App\Http\Controllers\Admin;


use App\Models\Requirement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRequirementController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["requirements"] = Requirement::all();
        return view('admin.requirement.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $newRequirement = new Requirement();
        $newRequirement->setWage($request->input('wage'));
        $newRequirement->setAge($request->input('age'));
        $newRequirement->setPayability($request->input('payability'));
        $newRequirement->save();

        return back();
    }

    public function delete($id)
    {
        Requirement::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Изменить";
        $viewData["requirement"] = Requirement::findOrFail($id);
        return view('admin.requirement.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Requirement::validate($request);
        
        $requirement = Requirement::findOrFail($id);
        $requirement->setWage($request->input('wage'));
        $requirement->setAge($request->input('age'));
        $requirement->setPayability($request->input('payability'));

        $requirement->save();
        return redirect()->route('admin.requirement.index');
    }
}
