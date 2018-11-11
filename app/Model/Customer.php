<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = ['fname','lname', 'address','phone'];

  public function repair(){
    return $this->hasMany('App\Model\Repair');
  }
}
