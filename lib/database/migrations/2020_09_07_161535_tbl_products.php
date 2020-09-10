<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->integer('product_price');
            $table->string('product_img');
            $table->string('product_warranty');
            $table->string('product_accessories');
            $table->string('product_condition');
            $table->string('product_promotion');
            $table->tinyInteger('product_status');
            $table->text('product_description');
            $table->tinyInteger('product_featured');
            $table->integer('product_cate')->unsigned(); //so nguyen
            $table->foreign('product_cate')
                  ->references('cate_id')
                  ->on('tbl_categories')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('tbl_products');
    }
}
