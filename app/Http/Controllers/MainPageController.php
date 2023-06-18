<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();

        return view('welcome')->with(['products' => $products, 'user' => $user]);
    }

}
