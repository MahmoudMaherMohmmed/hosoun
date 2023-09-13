<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuranPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quran_paths', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->tinyInteger('instructor_gender')->nullable();
            $table->integer('sub_path')->nullable();
            $table->integer('old_memorized')->nullable();
            $table->integer('telawa_amount')->nullable();
            $table->string('old_ejazat')->nullable();
            $table->string('required_ejazat')->nullable();
            $table->string('required_qeraa')->nullable();
            $table->date('start_date')->nullable();

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
        Schema::dropIfExists('quran_paths');
    }
}
