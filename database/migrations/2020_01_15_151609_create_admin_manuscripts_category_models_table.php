<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminManuscriptsCategoryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuscripts_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manuscripts_category_name', 100);
            $table->text('manuscripts_category_detail');
            $table->string('manuscripts_category_image', 100);
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
        Schema::dropIfExists('manuscripts_category');
    }
}
