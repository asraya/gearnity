<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\BaseRepository;

class ProfileUserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = new BaseRepository($user);
        $this->middleware(['auth','verified']);

    }

    public function index()
    {
        try {
            return view('user.profile.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
