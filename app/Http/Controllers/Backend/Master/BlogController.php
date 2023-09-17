<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\Master\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Master\BlogRequest;
use App\Models\Master\Blog;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Models\Master\Category;

class BlogController extends Controller
{
    protected $blog, $category;
    public function __construct(Blog $blog,Category $category)
    {
        $this->category = new BaseRepository($category);
        $this->blog = new BaseRepository($blog);
        $blog->id = Uuid::uuid4()->toString();
    }

    public function index(BlogDataTable $datatable)
    {
        try {
            return $datatable->render('backend.master.blog.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
        $data['category'] = $this->category->get();
        return view('backend.master.blog.create',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data['blog'] = $this->blog->find($id);
            return view('backend.master.blog.edit',compact('data'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
      
    }

    public function update(BlogRequest $request,$id)
    {
        try {
            $request->merge(['slug' => Str::slug($request->title)]);
            $this->blog->update($id,$request->all());
            return redirect()->route('backend.master.blog.index')->with('success',__('message.update'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(BlogRequest $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request->title)]);
            $this->blog->store($request->all(),true,['image'],'mitra/logo');

            return redirect()->route('backend.master.blog.index')->with('success',__('message.store'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->blog->delete($id);
            return redirect()->route('backend.master.blog.index')->with('success',__('message.delete'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
