<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
   	public $timestamps = false;
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password'];
    protected $guarded = [];

    public function items(){
    	return $this->hasMany('App\ItemModel', 'user_id', 'id');
    }
}