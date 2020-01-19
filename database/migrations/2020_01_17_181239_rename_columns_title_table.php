<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('title', function (Blueprint $table) {
            $table->renameColumn('admin_titles_name','title_name');
            $table->renameColumn('admin_titles_image','title_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('title', function (Blueprint $table) {
            //
        });
    }
}
