<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function index()
    {
        return view('shop');
    }

    public function product($type, $productId)
    {
        echo '<h2>This is product: '.$type.' of id: '.$productId.'</h2>';
        //return view('product');
    }

    protected function adminCheck()
    {
        echo 'tihis is a protecrte area';
    }
}