<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController
{
    public function index()
    {
        echo 'this is admin shop area';

    }

    public function product($type, $productId)
    {
        echo '<h2>This is admin product: '.$type.' of id: '.$productId.'</h2>';
        //return view('product');
    }

    protected function adminCheck()
    {
        echo 'tihis is a protecrte area';
    }
}