<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyFatoorahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_fatoorahs', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('invoiceStatus');
			$table->string('invoiceId');
			$table->string('invoiceReference')->nullable();
			$table->string('customerReference')->nullable();
			$table->string('invoiceDisplayValue')->nullable();
			$table->string('invoiceValue')->nullable();
			$table->string('paidCurrencyValue')->nullable();
			$table->string('paidCurrency')->nullable();
			$table->string('transactionId')->nullable();
			$table->string('paymentGateway')->nullable();
			$table->unsignedInteger('user_id')->index();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
			$table->longText('ordersIds');
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
        Schema::dropIfExists('my_fatoorahs');
    }
}
