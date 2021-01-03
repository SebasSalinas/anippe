<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('priority_id');
            $table->unsignedInteger('department_id');
            $table->morphs('creator');
            $table->unsignedInteger('project_id')->nullable();
            $table->timestamp('last_reply_at')->nullable();
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('assigned_user_id')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
