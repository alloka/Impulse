<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->string('position');
            $table->integer('admin_id')->unsigned();
            
        });

        Schema::table('supervisors', function($table) {
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
        Schema::drop('supervisors');
    }
}
