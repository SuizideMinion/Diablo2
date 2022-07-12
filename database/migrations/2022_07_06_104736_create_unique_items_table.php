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
        Schema::create('unique_items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Index Name
            $table->string('code'); // Grunditem Code
            $table->string('type'); // Grunditem Code
            $table->string('btype'); // Grunditem Code
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unique_items');
    }
};
