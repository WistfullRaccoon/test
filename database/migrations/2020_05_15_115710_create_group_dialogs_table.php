<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupDialogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_dialogs', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id');
            $table->integer('teacher_id');
            $table->integer('student_id');
            $table->integer('student_new_messages')->nullable()->default(0);
            $table->integer('teacher_new_messages')->nullable()->default(0);
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
        Schema::dropIfExists('group_dialogs');
    }
}
