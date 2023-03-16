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
        Schema::create('correspondent', function (Blueprint $table) {
            $table->id();
            $table->string('deal');
            $table->string('name');
            $table->string('license');
            $table->string('telephone');
            $table->string('email');
            $table->string('state');
            $table->string('city');
            $table->string('district');
            $table->string('court');
            $table->string('status');
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
        Schema::dropIfExists('corresponsal');
    }
};
