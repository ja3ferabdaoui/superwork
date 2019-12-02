<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("ad_account");
            $table->string('token');
            $table->integer('reach');
            $table->integer('impression');
            $table->double('cpm');
            $table->double('frequence');
            $table->double("engagement");
            $table->double('CPE');
            $table->integer('comments');
            $table->integer("partages");
            $table->integer("Saved");
            $table->integer('Clics');
            $table->double('CPC');
            $table->double("CTR");
            $table->integer('visites');
            $table->double('rebond');
            $table->double("cost");
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
        Schema::dropIfExists('facebooks');
    }
}
