<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condition;


class Requirement extends Model
{

    /*
    REQUIREMENT ATRIBUTES
    $table->integer('wage');
    $table->integer('age');
    $table->boolean('payability');
    */
    public static function validate($request)
    {
        $request->validate([
            "wage" => "required|gt:10000",
            "age" => "required|gt:18",
            "payability" => "required"
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
    public function getWage()
    {
        return $this->attributes['wage'];
    }
    public function setWage($wage)
    {
        $this->attributes['wage'] = $wage;
    }
    public function getAge()
    {
        return $this->attributes['age'];
    }
    public function setAge($age)
    {
        $this->attributes['age'] = $age;
    }
    public function getPayability()
    {
        return $this->attributes['payability'];
    }
    public function setPayability($payability)
    {
        $this->attributes['payability'] = $payability;
    }

    public function conditions()
    {
        return $this->hasMany(Condition::class);
    }
    public function getCondition()
    {
        return $this->condition;
    }
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }
}
