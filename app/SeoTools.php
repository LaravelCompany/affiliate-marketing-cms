<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SeoTools
 * @package App
 */
class SeoTools extends Model
{
    protected $table = "code_scripts";
    protected $fillable = ['google_analytics','meta_keys'];
}
