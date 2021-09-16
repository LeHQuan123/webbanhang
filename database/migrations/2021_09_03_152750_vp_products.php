<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
       Schema::dropIfExists('vp_products');
        Schema::create('vp_products', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_price');
            $table->string('prod_img');
            $table->string('prod_warranty');
            $table->string('prod_accessories');
            $table->string('prod_condition');
            $table->string('prod_promotion');
            $table->tinyInteger('prod_status');
            $table->text('prod_descri');
            $table->tinyInteger('prod_featured');
            $table->unsignedInteger('prod_cate');
            
            $table->timestamps();
        });
        Schema::table('vp_products', function (BLueprint $table)
        {
            $table->foreign('prod_cate')
            ->references('cate_id')
            ->on('vp_categories')  
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_products');
    }
}
