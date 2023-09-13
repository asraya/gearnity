<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\CourseDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Master\Category;
use Str;

class CourseController extends Controller
{
    protected $course, $category;
    public function __construct(Category $category,Course $course)
    {
        $this->course = new BaseRepository($course);
        $this->category = new BaseRepository($category);

    }

    public function index(CourseDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.course.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
        $data['course'] = $this->course->find($id);
        return view('backend.feature.course.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $data['category'] = $this->category->get();
            return view('backend.feature.course.create',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(request $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $request->merge(['mitra_id' => auth()->user()->id]);
            $course = $this->course->store($request->except(['detail_link','detail_name','duration']),true,['image'],'mitra/course');
            $index = 0;
            foreach($request->detail_name as $detail){
                preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $request->detail_link[$index], $link);
                $detailData = [
                    'course_id' => $course->id,
                    'name' => $detail,
                    'number' => $index + 1,
                    'duration' => $request->duration[$index],
                    'link' => $link[0][0],
                ];
                $this->courseDetail->store($detailData);
                $index++;
            }

            return redirect()->route('backend.feature.course.index')->with('success',__('message.store'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
