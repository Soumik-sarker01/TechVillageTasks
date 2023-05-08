<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('q');

        $users = DB::table('users')
                  ->where('email', 'like', "%$query%")
                  ->orWhere('first_name', 'like', "%$query%")
                  ->orWhere('last_name', 'like', "%$query%")
                  ->get();

        return UserResource::collection($users);
    }
}
