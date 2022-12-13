<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Credit;
use App\Models\User;
use App\Models\Payment;


class Contract extends Model
{
    /*
    CONTRACT VARIABLES
    $table->id();
    $table->dateTime('takeover_date');
    $table->dateTime('period');
    $table->unsignedBigInteger('credit_id');
    $table->unsignedBigInteger('user_id');
    $table->foreign('credit_id')->references('id')->on('credits');
    $table->foreign('user_id')->references('id')->on('users');
    */


    public static function validate($request)
    {
        $request->validate([
            "takeover_date" => "required",
            "period" => "required",
            "user_id" => "required|exists:users,id",
            "credit_id" => "required|exists:credits.id"
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
    public function getTakeover()
    {
        return $this->attributes['takeover_date'];
    }
    public function setTakeover($takeover_date)
    {
        $this->attributes['takeover_date'] = $takeover_date;
    }
    
    public function getPeriod()
    {
        return $this->attributes['period'];
    }
    public function setPeriod($period)
    {
        $this->attributes['period'] = $period;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }
    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }
    public function getCreditId()
    {
        return $this->attributes['credit_id'];
    }
    public function setCreditId($creditId)
    {
        $this->attributes['credit_id'] = $creditId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
    public function getCredit()
    {
        return $this->credit;
    }
    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function getPayment()
    {
        return $this->payment;
    }
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }
    
}
