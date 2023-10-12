<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->header('api_token') && $user =  User::firstWhere('api_token', $request->header('api_token'))) {
            return Post::where('user_id', $user->id)->get();
        } else {
            return response()->json([
                'status' => 'faild',
                'message' => 'User Token Not Valid'
            ]);
        }
    }

    public function indexSanctum()
    {
        return Post::where('user_id', auth()->id())->get();
    }
}
