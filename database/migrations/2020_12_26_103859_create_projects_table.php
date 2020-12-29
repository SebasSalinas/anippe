<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamp('starting_at')->nullable();
            $table->timestamp('deadline_at')->nullable();
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('leader_id');
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('organisation_id');
            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
}
