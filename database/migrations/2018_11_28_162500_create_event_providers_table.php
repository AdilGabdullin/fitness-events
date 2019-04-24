<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('url')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('logo_name')->nullable();
            $table->string('logo_alt_tag_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('company_type');//Provider/charity/club
            $table->text('company_information')->nullable();
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
        Schema::dropIfExists('event_providers');
    }
}
