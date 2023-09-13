<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Feature\CourseDetail;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Master\Category;

class WelcomeController extends Controller
{
    protected $course,$category;
    public function __construct(Course $course,Category $category)
    {
        $this->course = new BaseRepository($course);
        $this->category = new BaseRepository($category);


    }
    public function index()
    {
       try {
        $data['category'] = $this->category->get();
            $data['category'] = $this->category->get();
            $data['course'] = $this->course->Query()->limit(8)->get();
            return view('frontend.welcome',compact('data'));
       }catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
       }
    }
    
}
