<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use App\Models\Master\Blog;
use Illuminate\Http\Request;
use App\Models\Master\Category;

class BlogController extends Controller
{
        protected $blog, $category;
        public function __construct(Blog $blog, Category $category)
        {
            $this->blog = new BaseRepository($blog); 
            $this->category = new BaseRepository($category); 

        }
 
    public function show()
    {
        $data['blog'] = $this->blog->get();      

        return view('frontend.blog.show',compact('data'));
}

    public function detail($slug)
    {
            try {
                $data['category'] = $this->category->get();
              
                $data['blog'] = $this->blog->Query()->where('slug',$slug)->first();
                return view('frontend.blog.details',compact('data'));
            }catch (\Throwable $th) {
                return view('error.index',['message' => $th->getMessage()]);
            }
    }
}