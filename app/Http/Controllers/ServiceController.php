<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendBooking;
use ReCaptcha\ReCaptcha;
use Redirect;
use DB;


class ServiceController extends Controller
{

    public function replacement(){
    	return view('service.replacement');
    }

    public function appraisal(){
    	return view('service.appraisal');
    }

    public function warrenty(){
    	return view('service.warrenty');
    }

    public function repair(){
    	return view('service.repair');
    }

    public function consignment(){
    	return view('service.consignment');
    }

    public function trade_sell(){
    	return view('service.trade-sell');
    }

    public function trade_up(){
        return view('service.trade-up');
    }

    public function insurrance(){
    	return view('service.insurrance');
    }

    public function layaway(){
    	return view('service.layaway');
    }

    public function contact_us(){
        return view('service.contact-us');
    }

    public function send_mail(Request $request){

        $recaptcha = new ReCaptcha(env('GOOGLE_RECAPTCHA_SECRET_KEY'));
        $response = $recaptcha->verify($request->get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);

        if ($response->isSuccess()) {

            if (empty($request->first) || empty($request->last) || empty($request->email) || empty($request->phone) || empty($request->message)) {
                return back()->with('error','There was an error. Please Try Again');
            }else{
                
                $data = [
                    'first'=>$request->first,
                    'last'=>$request->last,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'message'=>$request->message
                ];
                
                if($request->store == "langley" || $request->store == "guilford"){

                    DB::table('user_emails')->insert([
                        "first_name"=>$request->first,
                        "last_name"=>$request->last,
                        "email_address"=>$request->email,
                        "phone_number"=>$request->phone,
                        "message"=>$request->message,
                        "store"=>$request->store
                    ]);

                    Mail::to('brandonsanghuynh123@gmail.com')->send(new SendMail($data));
                    Mail::to('janetrac@telus.net')->send(new SendMail($data));
                    
                    if ($request->store == "langley") {
                        Mail::to('order@exceljewellers.com')->send(new SendMail($data));
                        return back()->with('success','Thank you for contacting us');
                    }else if ($request->store == "guilford") {
                        Mail::to('order@exceljewellers.com')->send(new SendMail($data));
                        return back()->with('success','Thank you for contacting us');
                    }else{
                        Mail::to('janetrac@telus.net')->send(new SendMail($data));
                        Mail::to('brandonsanghuynh123@gmail.com')->send(new SendMail($data));
                        return back()->with('success','Thank you for contacting us');
                    }
                    
                    DB::table('user_emails')->insert([
                        "first_name"=>$request->first,
                        "last_name"=>$request->last,
                        "email_address"=>$request->email,
                        "phone_number"=>$request->phone,
                        "message"=>$request->message,
                        "store"=>$request->store
                    ]);

                }else{
                    return back()->with('error','There was an error! Please Try Again');
                }

            }

        }else{

            return back()->with('error','Please Complete The ReCaptcha');
        }
        
    }

    public function booking(Request $req){

        if (empty($req->name)||empty($req->email)||empty($req->phone)||empty($req->time)) {
            return back()->with('error','Error Please Try Again');
        }else{

            $data=[
                'name'=>$req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'time'=>$req->time
            ];

            Mail::to('sales@exceljewellers.com')->send(new SendBooking($data));
            Mail::to($req->email)->send(new SendBooking(
            $data=[
                'time'=>$req->time
            ]
            ));
            return back()->with('success','Thank you for booking with us');


        }
    }

    public function location(){

        $json = store_json();

        return view('service.location',['json'=>$json]);
    }

    public function shipping_returns(){
        return view('service.shipping-returns');
    }

    public function company_info(){
        return view('service.company');
    }

    public function terms_condition(){
        return view('service.terms-condition');
    }

    public function privacy_policy(){
        return view('service.privacy-policy');
    }

}
