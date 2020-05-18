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
            $table->string('first_name');
            $table->string('middle_names')->nullable();
            $table->string('last_name');
            $table->text('bio');
            $table->string('gender');
            $table->date('dob');
            $table->string('school')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('location')->nullable();
            $table->boolean('active')->default(true);
            $table->dateTime('enrollment_date');
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
