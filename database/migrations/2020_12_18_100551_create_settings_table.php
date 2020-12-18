<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_title_np');
            $table->string('site_subtitle');
            $table->string('site_subtitle_np');
            $table->string('phone_number');
            $table->string('mobile_number');
            $table->string('ads_number');
            $table->string('nirdesak');
            $table->string('sampadak');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email');
            $table->string('alternate_email')->nullable();
            $table->string('address');
            $table->string('seo_title')->nullable();
            $table->string('seo_subtitle')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
