<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->integer('status');
            $table->string('title',250);
            $table->integer('priority')->default('1');
            $table->dateTime('open_time');
            $table->dateTime('close_time');
            $table->integer('supervisor_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('admin_id')->unsigned();
                                     

        });

      Schema::table('tickets', function($table) {
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
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
