<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('carritodecompra', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('products_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

			$table->foreign('user_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

			$table->foreign('products_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carritodecompra');
    }
};
