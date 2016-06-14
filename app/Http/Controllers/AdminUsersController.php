<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AdminUsersController extends AdminsController
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();

        return view('admin.users.index', compact('users'));
    }
}
