<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Address;


class AccountController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function address(){
    	return view('account.address');
    }

    public function add_address(Request $request){
        if ($request) {
    	$address = new Address;
    	$address->user_id=Auth::id();
    	$address->contact_name=$request->contact_name;
    	$address->phone_number=$request->phone_number;
    	$address->address=$request->address;
    	$address->unit=$request->unit;
    	$address->country=$request->country;
    	$address->spr=$request->spr;
    	$address->city=$request->city;
    	$address->zipcode=$request->zipcode;
    	$address->save();
        }
    }

    public function delete_address(Request $request){

    	$address = Address::find($request->id);
    	$address->delete();

    }

    public function edit_address(Request $request){
        if ($request) {
        	DB::table('addresses')->where('user_id','=',Auth::id())->where('id','=',$request->id)
        	->update([
        		'contact_name'=>$request->contact_name,
        		'phone_number'=>$request->phone_number,
        		'address'=>$request->address,
        		'unit'=>$request->unit,
        		'country'=>$request->country,
        		'spr'=>$request->spr,
        		'city'=>$request->city,
        		'zipcode'=>$request->zipcode
        	]);
        }
    }
    
}
