<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diligence', function (Blueprint $table) {
            $table->id();
            $table->string('deal');
            $table->string('name');
            $table->string('state');
            $table->string('city');
            $table->string('license');
            $table->string('telephone');
            $table->string('email');
            $table->string('district');
            $table->string('address');
            $table->integer('status');
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
        //
    }
};
