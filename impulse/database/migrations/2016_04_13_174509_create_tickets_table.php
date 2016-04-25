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
            $table->string('text');
            $table->integer('priority')->default('1');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers');                                  
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:: drop('tickets');
    }}
