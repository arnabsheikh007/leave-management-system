<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $pendingUsers = User::whereDoesntHave('employee')
            ->where('role', '!=', 'admin')
            ->select('id', 'name', 'email')
            ->latest()
            ->paginate(5);

        $activeEmployees = User::whereHas('employee', function($query) {
            $query->where('status', 'active');
        })->paginate(5);

        $blockedEmployees = User::whereHas('employee', function($query) {
            $query->where('status', 'blocked');
        })->paginate(5);

        return view('admin.manageEmployee', compact('pendingUsers', 'pendingUsers', 'activeEmployees','activeEmployees', 'blockedEmployees', 'blockedEmployees'));
    }
}
