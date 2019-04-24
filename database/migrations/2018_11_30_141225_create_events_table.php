<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('cost')->nullable();
            $table->string('phone')->nullable();
            $table->string('distance',50)->nullable();
            $table->string('distance_type')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->integer('event_provider_id')->unsigned();
            $table->foreign('event_provider_id')->references('id')->on('event_providers')->onDelete('cascade');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('image')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_alt_tag')->nullable();
            $table->string('tags_sport')->nullable();
            $table->string('tags_region')->nullable();
            $table->string('tags_distance')->nullable();
            $table->string('tags_charity_sponsors')->nullable();
            $table->string('signup_btn_txt')->nullable();
            $table->string('signup_btn_link')->nullable();
            $table->decimal('discount')->nullable();
            $table->string('discount_code')->nullable();
            $table->string('discount_link_text')->nullable();
            $table->string('discount_link')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('page_url')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('related_events')->nullable();
            $table->string('related_articles')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->string('charity_sponsors')->nullable();
            $table->integer('tag_category_id')->unsigned()->nullable();
            $table->foreign('tag_category_id')->references('id')->on('tag_categories')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
