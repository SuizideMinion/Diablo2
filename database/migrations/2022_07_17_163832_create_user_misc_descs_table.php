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
        Schema::create('user_misc_descs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_misc_id');
            $table->string('key');
            $table->string('value');
            $table->string('server');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('user_misc_descs');
    }
};
