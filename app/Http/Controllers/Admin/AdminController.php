<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $user = Auth::user();

        if(auth()->check()){
            if($user->role == 'admin'){
                return view('admin.dashboard')->with(['products' => $products]);
            }
        }
            return redirect(view('welcome'))->with(['products' => $products]);
    }
}
