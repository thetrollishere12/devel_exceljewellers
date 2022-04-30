<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavShoppingCart extends Component
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

        if (session('cart.shopping_cart')) {
            $count = count(session('cart.shopping_cart'));
        }else{
            $count = 0;
        }

        return view('components.nav-shopping-cart',['count'=>$count]);
    }
}
