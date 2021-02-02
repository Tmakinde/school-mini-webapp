<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->text('parent_name');
            $table->text('occupation');
            $table->text('street_address');
            $table->integer('phone_number');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent');
    }
}
