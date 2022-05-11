<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedinteger('catid');
            $table->unsignedinteger('suppid');
            $table->string('name');
            $table->string('slug');
            $table->float('price');
            $table->float('pricesale');
            $table->string('img');
            $table->unsignedinteger('quantity');
            $table->longText('detail');
            $table->string('metakey');
            $table->string('metadesc');
            $table->unsignedinteger('created_by');
            $table->unsignedinteger('updated_by')->nullable();
            $table->unsignedinteger('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
