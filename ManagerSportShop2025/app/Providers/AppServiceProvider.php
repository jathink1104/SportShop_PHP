<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Models\typeproduct;
use App\Models\cart;
use App\Models\Message;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
        view()->composer('header',function($view){
            $loai_sp = typeproduct::all();
           
            $view->with(
                'danh_sach_loai_sp' , $loai_sp);
            });

            view()->composer('header',function($view){
                if(Session('cart')){

                    $oldCart = Session::get('cart');
                    $cart = new cart($oldCart);
                    $view->with([

                        'cart' => Session::get('cart'),
                        'product_cart' => $cart->items,
                        'totalPrice' => $cart->totalPrice,
                        'totalQty' => $cart->totalQty]);
                };
            });
           
            view()->composer('chat', function ($view) {
                $messages = Message::all();
                $view->with('messages', $messages);
            });
       

       
    }
}
