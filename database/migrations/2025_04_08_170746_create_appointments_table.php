<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void {
        Schema::create('appointments', function ( Blueprint $table )
        {
            $table->id();
            $table->unsignedBigInteger("patient_id");
            $table->unsignedBigInteger("doctor_id");
            $table->string("status");
            $table->string("type");
            $table->dateTime("start");
            $table->dateTime("end");
            $table->string("reason");
            $table->string("notes")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void {
        Schema::dropIfExists('appointments');
    }
};
