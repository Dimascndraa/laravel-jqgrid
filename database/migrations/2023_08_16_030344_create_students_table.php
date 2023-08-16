<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nis')->unique();
            $table->date('birthdate');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('address');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('class');
            $table->string('school_year');
            $table->date('registration_date');
            $table->string('profile_photo')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('students');
    }
}
