<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AutomatedStatus extends Model
{
    use SoftDeletes;

    protected $table = "automated_status";
    //
    protected $fillable = ['id', 'name', 'status'];
}
