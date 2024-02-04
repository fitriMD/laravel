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
        Schema::table('employees', function (Blueprint $table){
            $table->dropColumn('DEPT');
            $table->unsignedBigInteger('DEPT_ID')->nullable();
            $table->foreign('DEPT_ID')->references('ID')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table){
            $table->integer('DEPT');
            $table->dropForeign(['DEPT_ID']);
        });
    }
};
