<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AccountEditAddress extends Component
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

        $path = storage_path() . "/json/country.json";

        $json = json_decode(file_get_contents($path), true);

        return view('components.account-edit-address',['json'=>$json]);
    }
}
