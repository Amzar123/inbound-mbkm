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
        //
        Schema::table('programs', function (Blueprint $table) {
            // Add the 'new_field'
            $table->date('start')->default(now())->nullable();
            $table->date('end')->default(now())->nullable();
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
        Schema::table('programs', function (Blueprint $table) {
            // Rollback the changes if needed
            $table->dropColumn('start');
            $table->dropColumn('end');
        });
    }
};
