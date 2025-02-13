<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Equivalent to @Id @GeneratedValue
            $table->string('name', 30); // Matches @Length(min = 2, max = 30)
            $table->string('last_name', 30); // Matches @Length(min = 2, max = 30)
            $table->string('email', 50)->unique(); // Matches @Column(name = "email", nullable = false, unique = true)
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
