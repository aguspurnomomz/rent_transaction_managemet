<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('code');
            $table->decimal('rate_euro', 10, 3)->nullable();
            $table->date('date_paid');
            $table->enum('category', ['income', 'expense']);
            $table->string('transaction_name');
            $table->decimal('nominal_idr', 15, 2);
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
        Schema::dropIfExists('transactions');
    }
};
