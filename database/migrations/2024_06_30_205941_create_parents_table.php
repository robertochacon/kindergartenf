<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string("identification")->nullable();
            $table->string("name")->nullable();
            $table->string("last_name")->nullable();
            $table->enum("gender",["Masculino","Femenino"])->default("Masculino");
            $table->date("born_date")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("residence_phone")->nullable();
            $table->string("work_phone")->nullable();
            $table->string("work_phone_ext")->nullable();
            $table->enum("relationship",["father","mother","tutor"])->default("father");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
