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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
     
            $table->longText('description');
            $table->string('code')->nullable();  
            $table->integer('sourt')->nullable();
            $table->longText('destination_url');
            $table->string('ending_date'); 
            $table->string('status');
            $table->string('authentication');
            $table->string('store');  
            $table->integer('order')->default(1);  
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
