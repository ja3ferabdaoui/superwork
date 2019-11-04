<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('addresse')->nullable()->change();
            $table->string('ville')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('facebook')->nullable()->change();
            $table->string('youtube')->nullable()->change();
            $table->string('instegram')->nullable()->change();
            $table->string('linkedin')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
