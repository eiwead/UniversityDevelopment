<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Bank;
use App\Models\Credit;
use App\Models\User;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Банк";
        $viewData["subtitle"] = "Список контрактов";

        $viewData["contracts"] = Contract::all();
        return view('contract.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $contract = Contract::findOrFail($id);
        $credit = Credit::findOrFail($id);
        $bank = Bank::findOrFail($id);
        $user = User::findOrFail($id);
        $viewData["title"] = "Кредит";

        $viewData["user"] = $user->getName() . " ваше имя";
        $viewData["bank"] = $bank->getName(). " название банка";
        $viewData["sum"] = $credit->getSum()." - сумма кредита";
        $viewData["takeover"] = $contract->getTakeover() . " дата взятия";
        $viewData["period"] = $contract->getPeriod() . " срок окончания";

        return view('contract.show')->with("viewData", $viewData);
    }
}
