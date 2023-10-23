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
Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('nameA');
            $table->string('description');
            $table->string('credits');
            $table->string('knowledge_area');
            $table->string('type_of_course');
            $table->unsignedBigInteger("teacher_id")->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
