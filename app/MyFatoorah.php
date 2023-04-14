<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyFatoorah extends Model
{
	//
	protected $fillable = [
		'invoiceStatus',
		'invoiceId',
		'invoiceReference',
		'customerReference',
		'invoiceDisplayValue',
		'invoiceValue',
		'paidCurrencyValue',
		'paidCurrency',
		'transactionId',
		'paymentGateway',
		'user_id',
		'ordersIds'
	];
	public $timestamps = true;

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
