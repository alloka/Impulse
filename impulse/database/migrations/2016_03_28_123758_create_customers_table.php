<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->string('position');
            $table->integer('mobile_number')->unique();
            $table->integer('admin_id')->unsigned();
            
        });

        Schema::table('customers', function($table) {
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
        Schema::drop('customers');
    }
}
