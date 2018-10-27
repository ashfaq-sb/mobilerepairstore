<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
  protected $fillable = ['brand','model', 'imei','type','discription','parts','price','customer_id'];

  public function customer(){
    return $this->belongsTo('App\Model\Customer');
  }
}
