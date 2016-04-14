<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('ticket_agent', function (Blueprint $table) {
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')
                  ->references('id')
                  ->on('tickets');
            $table->integer('user_id')->unsigned();;
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->integer('notify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_agent');
    }
}
