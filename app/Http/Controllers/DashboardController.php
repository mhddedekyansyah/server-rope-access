<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $countUsers = User::where('roles', 'user')->count();
        $countProducts = Product::count();
        $countTransactions = Transaction::count();
        $countJasas = Jasa::count();
        return \view('pages.app.dashboard', \compact('countProducts', 'countJasas', 'countUsers', 'countTransactions'));
    }
}
