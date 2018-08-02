<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('user');
            $table->mediumText('info');
            $table->integer('amount');
            $table->mediumText('interval');
            // $table->mediumText('duration');
            $table->integer('accnumber');
            $table->mediumText('bank');
            $table->integer('saved');
            $table->mediumText('status');
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
        Schema::dropIfExists('spendings');
    }
}
