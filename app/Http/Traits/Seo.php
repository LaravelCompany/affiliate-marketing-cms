<?php
/**
 * @author Stefan Izdrail
 **/


namespace App\Http\Traits;


use App\Category;
use App\Product;

/**
 * Trait Seo
 * @package App\Http\Traits
 */
trait Seo
{

    /**
     * Generates  the product seo
     * @method setProductSeo
     * @param Product $product
     */
    function setProductSeo(Product $product){

    }


    /**
     * Generates  the category seo
     * @method setProductSeo
     * @param Category $category
     */
    function setCategorySeo(Category $category){

    }

}
