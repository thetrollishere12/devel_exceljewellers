<?php


function customer_create($token,$data){


	$customer = \Stripe\Customer::create([
		 'source' => $token,
		 "description" => "Jewellery Order",
		 'address'=>$data,
		 "email" => session('cart.address.email_address'),
		 'name'=>session('cart.address.contact_name'),
		 'phone'=>session('cart.address.phone_number'),
		 'shipping'=>[

		 	'address'=>[
		 		'city'=>session('cart.address.city'),
		  		'country'=>session('cart.address.country_code'),
		  		'line1'=>session('cart.address.address'),
		  		'postal_code'=>session('cart.address.zipcode'),
		  		'state'=>session('cart.address.spr'),
		 	],
		 	'name'=>session('cart.address.contact_name'),

		 ],
	]);

	return $customer;

}

function create_charge($data){
	
	$charge = \Stripe\Charge::create([
	  'amount' => intval(str_replace(['.', ','],'',number_format(session('cart.shopping_cart_detail.total_cost'), 2, '.', ''))),
	  'currency' => session('cart.shopping_cart_detail.currency'),
	  'description' => $data["description"],
	  'customer' => $data["id"],
	  'shipping'=>[
	  	'address'=>[
	  		'city'=>session('cart.address.city'),
	  		'country'=>session('cart.address.country_code'),
	  		'line1'=>session('cart.address.address'),
	  		'postal_code'=>session('cart.address.zipcode'),
	  		'state'=>session('cart.address.spr'),
	  	],
	  	'name'=>session('cart.address.contact_name'),
	  ],
	]);

	return $charge;

}