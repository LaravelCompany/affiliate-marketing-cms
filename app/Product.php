<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{

    protected $fillable = ['title', 'category', 'description', 'price', 'previous_price', 'link', 'feature_image', 'policy', 'featured', 'views', 'created_at', 'updated_at', 'status'];

    public static $withoutAppends = false;

    /**
     * @method getCategoryAttribute
     * @param $category
     * @return false|string[]
     */
    public function getCategoryAttribute($category)
    {
        if(self::$withoutAppends){
            return $category;
        }
        return explode(',',$category);
    }


}
