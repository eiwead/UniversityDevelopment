<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;


class Payment extends Model
{

    /*
    PAYMENY ATRIBUTES
        $table->id();
        $table->dateTime('date_of_payment');
        $table->integer('amount');
        $table->unsignedBigInteger('contract_id');
    */
    public static function validate($request)
    {
        $request->validate([
            "date_of_payment" => "required",
            "amount" => "required",
            "contract_id" => "required:exists:contracts,id"
        ]);
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getDatePay()
    {
        return $this->attributes['date_of_payment'];
    }
    public function setDatePay($date_of_payment)
    {
        $this->attributes['date_of_payment'] = $date_of_payment;
    }
    public function getAmount()
    {
        return $this->attributes['amount'];
    }
    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function getContract()
    {
        return $this->contract();
    }
    public function setContract($contract)
    {
        $this->contract = $contract;
    }
    
}
