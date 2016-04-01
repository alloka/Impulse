<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->string('position');
            $table->integer('admin_id')->unsigned();
            

        });

        Schema::table('support_agents', function($table) {
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
        Schema::drop('support_agents');
    }
}
