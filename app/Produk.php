<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table ='produk';
    protected $fillable =['name','harga','deskripsi','category_id','image'];

}
