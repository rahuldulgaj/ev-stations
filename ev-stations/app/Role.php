<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //
    protected $fillable = ['name','slug'];
 
    public function permissions() {

        return $this->belongsToMany(Permission::class,'roles_permissions');
            
     }
     
     public function users() {
     
        //return $this->belongsToMany(User::class,'users_roles');
        return $this->belongsTo(User::class);

            
     }
     
     protected $dates = ['deleted_at'];

}
