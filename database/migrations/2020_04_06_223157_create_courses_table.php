<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('courses')){
			Schema::create('courses', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('user_id');
				$table->string('category_id');
				$table->string('subcategory_id');
				$table->string('childcategory_id');
				$table->string('language_id');
				$table->string('title')->nullable();
				$table->text('short_detail', 65535)->nullable();
				$table->text('detail', 65535)->nullable();
				$table->text('requirement', 65535)->nullable();
				$table->string('price')->nullable();
				$table->string('discount_price')->nullable();
				$table->string('day')->nullable();
				$table->string('video')->nullable();
				$table->string('url')->nullable();
				$table->enum('featured', array('1','0'))->nullable();
				$table->string('slug')->nullable();
				$table->enum('status', array('1','0'))->nullable();
				$table->string('preview_image')->nullable();
				$table->string('video_url')->nullable();
				$table->string('preview_type')->nullable();
				$table->enum('type', array('1','0'))->nullable();
				$table->integer('duration')->nullable();
				$table->timestamps();
			});
		}
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
