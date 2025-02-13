<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Equivalent to @Id @GeneratedValue
            $table->string('name', 50); // Matches @Length(min = 2, max = 50)
            $table->string('description', 500)->nullable(); // Matches @Length(min = 2, max = 500)
            $table->double('weight')->nullable();
            $table->double('width')->nullable();
            $table->double('length')->nullable();
            $table->double('height')->nullable();
            $table->unsignedBigInteger('department_id'); // Foreign key reference
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
