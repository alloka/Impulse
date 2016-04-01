<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsSuppotAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_support_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('agent_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            
             
        });

        Schema::table('tickets_support_agents', function($table) {
          $table->foreign('ticket_id')
                  ->references('id')
                  ->on('tickets'); 
            $table->foreign('agent_id')
                  ->references('id')
                  ->on('support_agents');
            
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets_support_agents');
    }
}
