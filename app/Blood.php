<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $table = "bloods";
    protected $primaryKey = "blood_id";
    protected $fillable = ["blood_name"];
}
