<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pallets', function (Blueprint $table) {
            $table->id(); // Equivalent to @Id @GeneratedValue
            $table->integer('amount')->default(0); // Matches @Column(amount)
            $table->unsignedBigInteger('location_id'); // Foreign key reference
            $table->unsignedBigInteger('product_id')->nullable(); // Foreign key reference
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pallets');
    }
};
