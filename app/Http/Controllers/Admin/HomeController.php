<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pendingReq = User::whereDoesntHave('employee')
            ->where('role', '!=', 'admin')
            ->count();
        return view('admin.dashboard',compact('pendingReq','pendingReq' ));
    }
}
