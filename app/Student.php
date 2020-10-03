<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $primaryKey = "student_id";
    protected $fillable = ["student_name","student_roll","blood_name","department_name","class_name","gender_name","father_name","mother_name","birthday","student_email","student_phone","student_address","status"];

    public function className()
    {
        return $this->belongsTo("App\ClassName", "class_name");
    }
    public function Department()
    {
        return $this->belongsTo("App\Department", "department_name");
    }
    public function Blood()
    {
        return $this->belongsTo("App\Blood", "blood_name");
    }
    public function Gender()
    {
        return $this->belongsTo("App\Gender", "gender_name");
    }
}
