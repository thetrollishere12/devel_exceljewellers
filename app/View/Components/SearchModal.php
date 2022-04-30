<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DB;

class SearchModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   

         $eng = DB::table('engagement_rings')->orderBy('count','desc')->take(5)->get();
         $wed = DB::table('wedding_bands')->orderBy('count','desc')->take(5)->get();
         $fine = DB::table('fine_jewelleries')->orderBy('count','desc')->take(5)->get();

         $products = $eng->merge($wed->merge($fine));

        return view('components.search-modal',['products'=>json_decode($products,true)]);
    }
}
