<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    protected $table = "class_names";
    protected $primaryKey = "class_id";
    protected $fillable = ["class_name"];
}
