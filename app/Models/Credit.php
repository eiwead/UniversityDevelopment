<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;
use App\Models\Bank;
use App\Models\Condition;


class Credit extends Model
{

    /*
    CREDIT ATTRIBUTES
    $table->id();
    $table->integer('sum');
    $table->unsignedBigInteger('condition_id');
    $table->unsignedBigInteger('bank_id')
    */

    public static function validate($request)
    {
        $request->validate([
            "sum" => "required",
            "condition_id" => "required:exists:conditions,id",
            "bank_id" => "required:exists:banks,id",
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
    public function getSum()
    {
        return $this->attributes['sum'];
    }
    public function setSum($sum)
    {
        $this->attributes['sum'] = $sum;
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function getContracts()
    {
        return $this->contracts;
    }
    public function setContracts($contracts)
    {
        $this->contracts = $contracts;
    }
    public function condition()
    {
        return $this->belongsTo(condition::class);
    }
    public function getCondition()
    {
        return $this->condition;
    }
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function getBank()
    {
        return $this->bank;
    }
    public function setBank($bank)
    {
        $this->bank = $bank;
    }
}
