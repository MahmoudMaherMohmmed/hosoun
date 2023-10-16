<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoneFlagToReligiousPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('religious_paths', function (Blueprint $table) {
            $table->enum('done_flag', ['1', '0'])->default('0')->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('religious_paths', function (Blueprint $table) {
            $table->dropColumn('done_flag');
        });
    }
}
