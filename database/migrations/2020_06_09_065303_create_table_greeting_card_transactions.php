<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGreetingCardTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greeting_card_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            $table->foreignId('from')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('to')
                ->constrained('users');

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
        Schema::dropIfExists('greeting_card_transactions');
    }
}
