<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('tracking_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50);
            $table->json('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracking_settings');
    }
}
