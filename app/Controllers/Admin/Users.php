<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo 'this is admin shop area';

    }

    public function getAllUsers()
    {
        echo '<h2>show All users</h2>';
        //return view('product');
    }
}