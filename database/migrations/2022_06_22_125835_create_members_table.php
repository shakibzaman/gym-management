<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('member_type_id');
            $table->string('address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('monthly_fees')->nullable();
            $table->date('joined_date');
            $table->string('remarks')->nullable();
            $table->string('shift')->nullable();
            $table->string('occupation')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('medical_condition_id');
            $table->integer('membership_duration');
            $table->integer('admission_fees');
            $table->integer('gender_id');
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
        Schema::dropIfExists('members');
    }
}
