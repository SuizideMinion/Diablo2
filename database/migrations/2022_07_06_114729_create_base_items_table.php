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
        Schema::create('base_items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name
            $table->string('code'); // Code
            $table->string('type'); // Code
            $table->string('btype'); // Code
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_items');
    }
};
