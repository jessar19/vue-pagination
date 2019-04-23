<?php

namespace App\Http\Controllers\Api;
                        
use App\User;
use App\Http\Resources\UsersCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return new UsersCollection(User::paginate(10));
    
    }
}
