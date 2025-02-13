<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 30)->unique(); 
            $table->string('address', 30)->unique(); 
            $table->integer('max_pallet')->default(1000); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
