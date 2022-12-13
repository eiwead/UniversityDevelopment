<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /*
    BANK ATRIBUTES
        $table->id();
        $table->string('name');
        $table->string('address');
        $table->integer('budget');
        $table->string('director');
    */
    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "address" => "required",
            "budget" => "required",
            "director" => "required"
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
    public function getName()
    {
        return $this->attributes['name'];
    }
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    
    public function getAddress()
    {
        return $this->attributes['address'];
    }
    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }
    public function getBudget()
    {
        return $this->attributes['budget'];
    }
    public function setBudget($budget)
    {
        $this->attributes['budget'] = $budget;
    }
    public function getDirector()
    {
        return $this->attributes['director'];
    }
    public function setDirector($director)
    {
        $this->attributes['director'] = $director;
    }
    public function credit()
    {
        return $this->hasMany(Credit::class);
    }
    public function getCredit()
    {
        return $this->credit;
    }
    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

}
