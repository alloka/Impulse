<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('comment');
            $table->integer('supervisor_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            
                   
        });

        Schema::table('comments', function($table) {
          $table->foreign('supervisor_id')
                  ->references('id')
                  ->on('supervisors'); 
            $table->foreign('agent_id')
                  ->references('id')
                  ->on('support_agents');
            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers');
            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins');
            $table->foreign('ticket_id')
                  ->references('id')
                  ->on('tickets');   
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
