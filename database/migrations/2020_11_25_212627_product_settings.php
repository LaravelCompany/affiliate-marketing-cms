<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class ProductSettings
 */
class ProductSettings extends Migration
{

    //    protected $fillable = ['contact', 'contact_email', 'about', 'faq', 'c_status', 'a_status', 'f_status'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('productid');
            $table->string('contact');
            $table->string('contact_email');
            $table->string('about');
            $table->string('faq');
            $table->string('c_status');
            $table->string('a_status');
            $table->string('f_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_settings');
    }
}
