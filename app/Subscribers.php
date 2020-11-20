<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscribers
 * @package App
 */
class Subscribers extends Model
{
    protected $table = "subscription";
    protected $fillable = ['email'];
}
