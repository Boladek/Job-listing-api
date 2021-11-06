<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('type', ['Full-time', 'Temporary', 'Contract', 'Permanent', 'Internship', 'Volunteer']);
            $table->enum('conditions', ['Remote', 'Part Remote', 'On-premise']);
            $table->enum('categories', ['Tech', 'Health Care', 'Hospitality', 'Customer Service', 'Marketing']);
            $table->integer('applied')->default(0);
            $table->unSignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
