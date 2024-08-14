<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $cartItemsCount = 0;

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItemsCount = Cart::where('idUser', $userId)->count();
        }

        $view->with('cartItemsCount', $cartItemsCount);
    }
}
