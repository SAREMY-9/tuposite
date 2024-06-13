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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('tdbNo')->nullable();
            $table->string('officerId');
            $table->string('theoryTest');
            $table->string('pracTest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *  'tddNo',
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
