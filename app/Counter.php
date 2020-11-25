<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{

    protected $fillable = ['type','referral', 'total_count'];

}
