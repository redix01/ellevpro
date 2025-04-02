<?php

namespace App\Http\Controllers;

use App\Models\WalletConnect;

abstract class Controller
{
   public function wallets()
   {
       $wallets = WalletConnect::all();
       return $wallets;
   }
}
