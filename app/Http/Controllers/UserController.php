<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function user()
    {
        $Users = User::paginate(3);
        return view('user', ['Users' => $Users]);
    }

    public function userOrders()
    {
        $userId = Auth::id();
        $userOrders = Order::where('user_id', $userId)->paginate(3);
        return view('user_orders', ['userOrders' => $userOrders]);
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user');
    }
}
