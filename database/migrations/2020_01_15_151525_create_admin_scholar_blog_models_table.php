<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminScholarBlogModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholar_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scholar_blog_name',100);
            $table->string('scholar_blog_author',100);
            $table->unsignedBigInteger('scholar_category_id');
            $table->string('scholar_blog_link', 100);
            $table->timestamps();

            $table->foreign('scholar_category_id')
                    ->references('id')->on('scholar_category')
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
        Schema::dropIfExists('scholar_blog');
    }
}
