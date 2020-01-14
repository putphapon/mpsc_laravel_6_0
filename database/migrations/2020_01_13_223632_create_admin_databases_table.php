<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminDatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_databases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('admin_databases_name', 100);
            $table->string('admin_databases_image', 100)->unique();
            $table->string('admin_databases_link', 100);
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
        Schema::dropIfExists('admin_databases');
    }
}
