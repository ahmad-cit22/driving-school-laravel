<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('course_category');
            $table->unsignedBigInteger('course_type');
            $table->unsignedBigInteger('course_slot');
            $table->integer('price');
            $table->integer('payment_process')->comment('1 = Online, 2 = Offline');
            $table->integer('paid')->nullable();
            $table->integer('payment_status')->
            comment('0 = Pending, 1 = Successful');
            $table->date('start_date');
            $table->integer('status')->default(0)->comment('0 = Pending, 1 = Approved, 2 = Finished');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('course_category')->references('id')->on('course_categories');
            $table->foreign('course_type')->references('id')->on('course_types');
            $table->foreign('course_slot')->references('id')->on('course_slots');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('enrolls');
    }
};
