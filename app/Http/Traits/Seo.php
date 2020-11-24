<?php
/**
 * @author Stefan Izdrail
 **/


namespace App\Http\Traits;


use App\Category;
use App\Product;
use Artesaos\SEOTools\Facades\SEOMeta;

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
        SEOMeta::setTitle($product->title);
    }


    /**
     * Generates  the category seo
     * @method setProductSeo
     * @param Category $category
     */
    function setCategorySeo(Category $category){

    }

}
