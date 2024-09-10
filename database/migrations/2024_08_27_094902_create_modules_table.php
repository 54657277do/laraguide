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
        Schema::create('modules', function (Blueprint $table) {  
            $table->id('idmodule');  
            $table->unsignedBigInteger('idformateur');
            $table->string('nommodule'); 
            $table->string('prerequis');  
            $table->text('description');  
            $table->timestamps();  

            $table->foreign('idformateur')->references('idformateur')->on('formateurs'); 
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
