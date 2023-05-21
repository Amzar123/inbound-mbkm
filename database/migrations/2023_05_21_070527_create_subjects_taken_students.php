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
        Schema::create('subjects_taken_students', function (Blueprint $table) {
            $table->uuid("id");
            $table->uuid("user_id");
            $table->string("subject_name");
            $table->string("sks");
            $table->string("dosen");
            $table->string("subject_code");
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
        Schema::dropIfExists('subjects_taken_students');
    }
};
