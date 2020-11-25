<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    private $name;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug'];

    public function getName(){
        return $this->name;
    }

}
