<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminManuscriptsBlogModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuscripts_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manuscripts_blog_name',100);
            $table->text('manuscripts_blog_detail');
            $table->string('manuscripts_blog_image',100);
            $table->unsignedBigInteger('manuscripts_category_id');
            $table->string('manuscripts_blog_tag',100);
            $table->string('manuscripts_blog_link',100);
            $table->timestamps();

            $table->foreign('manuscripts_category_id')
                    ->references('id')->on('manuscripts_category')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manuscripts_blog');
    }
}
