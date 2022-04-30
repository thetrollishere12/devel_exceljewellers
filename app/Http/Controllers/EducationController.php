<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    // Education

    public function diamond(){
    	return view('education.diamond');
    }

    public function diamond_shape(){
    	return view('education.diamond-shape');
    }

    public function diamond_color(){
    	return view('education.diamond-color');
    }

    public function diamond_clarity(){
    	return view('education.diamond-clarity');
    }

    public function diamond_carat(){
    	return view('education.diamond-carat');
    }

    public function diamond_cut(){
    	return view('education.diamond-cut');
    }

    public function engagement(){
        return view('education.engagement-ring.engagement-ring');
    }

    public function eng_style(){
    	return view('education.engagement-ring.engagement-style');
    }

    public function eng_setting(){
    	return view('education.engagement-ring.engagement-setting');
    }

    public function eng_size(){
    	return view('education.engagement-ring.engagement-size');
    }

    public function weddingband(){
        return view('education.wedding-band.wedding-band');
    }

    public function weddingband_style(){
        return view('education.wedding-band.wedding-band-style');
    }

    public function weddingband_metal(){
        return view('education.wedding-band.wedding-band-metals');
    }

    public function weddingband_size(){
        return view('education.wedding-band.wedding-band-size');
    }

}
