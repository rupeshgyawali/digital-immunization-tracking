<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->date('dob');
            $table->string('birth_place');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_phn');
            $table->string('mother_phn');
            $table->string('temporary_addr');
            $table->string('permanent_addr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
