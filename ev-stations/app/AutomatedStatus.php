<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutomatedStatus extends Model
{
    protected $table = "automated_status";
    //
    protected $fillable = ['id', 'name', 'status'];
}
