<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Requirement;
// use App\Models\Requirement;
use App\Models\Credit;



class Condition extends Model
{

    /*
    PAYMENY ATRIBUTES
        $table->id();
        $table->dateTime('period');
        $table->string('percent');
        $table->string('name');
        $table->unsignedBigInteger('requirement_id');
    */
    public static function validate($request)
    {
        $request->validate([
            "period" => "required",
            "percent" => "required|gt:0",
            "name" => "required",
            "requirement_id" => "required:exists:requirements,id"
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
    public function getPeriod()
    {
        return $this->attributes['period'];
    }
    public function setPeriod($period)
    {
        $this->attributes['period'] = $period;
    }
    public function getPercent()
    {
        return $this->attributes['percent'];
    }
    public function setPercent($percent)
    {
        $this->attributes['percent'] = $percent;
    }
    public function getName()
    {
        return $this->attributes['name'];
    }
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
    public function getRequirement()
    {
        return $this->requirement();
    }
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
    }
    public function contract()
    {
        return $this->hasMany(Credit::class);
    }
    public function getContract()
    {
        return $this->contract;
    }
    public function setContract($contract)
    {
        $this->contract = $contract;
    }
}
