<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTables extends Migration
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
            $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('subject');
            $table->text('content');
            $table->string('status', 15);
            $table->integer('user_new_messages')->default(0);
            $table->integer('admin_new_messages')->default(0);
            $table->timestamps();
        });

        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->id('id');
            $table->integer('ticket_id')->references('id')->on('ticket_tickets')->onDelete('CASCADE');
            $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('status', 15);
            $table->timestamps();
        });

        Schema::create('ticket_messages', function (Blueprint $table) {
            $table->id('id');
            $table->integer('ticket_id')->references('id')->on('ticket_tickets')->onDelete('CASCADE');
            $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->text('message');
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
        Schema::dropIfExists('ticket_messages');
        Schema::dropIfExists('ticket_statuses');
        Schema::dropIfExists('tickets');
    }
}
