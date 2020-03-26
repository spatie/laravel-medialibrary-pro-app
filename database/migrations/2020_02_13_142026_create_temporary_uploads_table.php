<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('temporary_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session_id');
            $table->timestamps();
        });
    }
}
