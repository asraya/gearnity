<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Feature\Course;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        try {
            $data['total_course'] = Course::count();
            return view('user.dashboard.index',compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
