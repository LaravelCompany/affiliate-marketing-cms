<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'product_gallery';

    protected $fillable = ['image', 'product_id', 'type'];

}
