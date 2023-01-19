<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      $users = User::orderBy('created_at', 'desc')->simplePaginate(5);
      $usersTotal = User::get();
      return view('pages.user.index', [
         'totalUser' => count($usersTotal),
         'users' => $users
      ])->with('i');
   }
}
