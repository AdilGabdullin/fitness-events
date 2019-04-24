<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('main_content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_alt_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('blog_category_id')->unsigned();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');
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
        Schema::dropIfExists('blogs');
    }
}
