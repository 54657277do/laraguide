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
        Schema::create('cours', function (Blueprint $table) { 
            $table->id('idcours'); 
            $table->unsignedBigInteger('idformateur');  
            $table->unsignedBigInteger('idchapitre');  
            $table->string('titrecours'); 
            $table->string('illustrationcours')->nullable();  
            $table->longText('contenucours');   
            $table->timestamps();  

            $table->foreign('idformateur')->references('idformateur')->on('formateurs');  
            $table->foreign('idchapitre')->references('idchapitre')->on('chapitres');  
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
