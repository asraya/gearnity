<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Feature\CourseDetail;
use App\Models\Feature\UserCourse;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\PDF;
use App\Http\Requests\PDFGenerateRequest;
use App\Mail\SendCertificate;
use Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelReader;
use ZipArchive;
use Illuminate\Support\Carbon;

class UsercourseController extends Controller
{
    protected $course, $userCourse,$courseDetail;
    public function __construct(Course $course, UserCourse $userCourse,CourseDetail $courseDetail)
    {
        $this->Course = new BaseRepository($course);
        $course->id = Uuid::uuid4()->toString();
        $this->userCourse = new BaseRepository($userCourse);
        $userCourse->id = Uuid::uuid4()->toString();

        $this->courseDetail = new BaseRepository($courseDetail);
    }

    public function index()
    {
        try {
            $data['userCourse'] = $this->userCourse->Query()->where('user_id',auth()->user()->id)->get();
            return view('user.course.index',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function learn($id,$progress)
    {
        try {
            $data['userCourse'] = $this->userCourse->find($id);
            $data['current_course'] = $this->courseDetail->Query()->where(['number' => $progress,'course_id' => $data['userCourse']['course_id']])->first();
            if($progress > $data['userCourse']['progress'] && $progress <= $data['userCourse']['course']['total_item']){
                $data['userCourse']['progress'] = $progress;
                $data['userCourse']->save();
            }
            return view('user.course.learn',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id,$progress) {
        // retreive all records from db

       
        $pdf = \PDF::loadView('user.course.show',compact('data'));
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

      public function generate(PDFGenerateRequest $request)
      {
        
          $PDFpath = $request->file('pdf-file')->storeAs(
              'pdfs', strtotime(now()) . '.pdf'
          );
          $CSVpath = $request->file('csv-file')->storeAs(
              'csvs', strtotime(now()) . '.csv'
          );
          $uuid = Str::random(15);
          $public_dir = public_path("certificates/" . $uuid);
          Storage::makeDirectory($public_dir);
          if (!is_dir($public_dir)) {
            mkdir($public_dir, 0777, true); // Recursive directory creation
            }
        
  
  //        dd(Storage::path($CSVpath));
          $rows = SimpleExcelReader::create(Storage::path($CSVpath))->getRows();
         
            $rows->each(function (array $row) use ($PDFpath, $request, $uuid ) {
                $courses = Course::get();
                $dateString = '17-08-2023';
                $dateString = '2023-02-01'; // Replace this with your actual date string
                $formattedDate = Carbon::createFromFormat('Y-m-d', $dateString)->format('F, Y');
      
      
                foreach ($courses as $course) {
      
                $row = [
                    // 'class' => 'abc',
                    'course' => $course->name, 
      
                ];
              }
                $pdf = new PDF();
                $pdf->setSourceFile(Storage::path($PDFpath));
                $pdf->AddPage();
                $pdf->SetFont("helvetica", "B", 17);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text($request->get('name-x'), $request->get('name-y'), auth()->user()->name);
                $pdf->Text(135, 124.5, $row['course']);
                //   $pdf->Text(150, 134, $row['class']);
                $pdf->SetFont("helvetica", "B", 12);
                $pdf->Text($request->get('date-x'), $request->get('date-y'), $formattedDate);
                $certificatePath = public_path("certificates/" . $uuid . "/" . auth()->user()->name . ".pdf");
                
                $pdf->Output($certificatePath, 'F');
    
                if ($request->has('email-body')) {
    
                    $emailBody = $request->get('email-body');
                    foreach ($row as $key => $value) {
                        $emailBody = str_replace('{' . strtoupper($key) . '}', $value, $emailBody);
                    }
                    Mail::to(auth()->user()->email)
                        ->queue(new SendCertificate($row, $emailBody, $certificatePath));
                }
    
            });
    
          $zip = new ZipArchive;
          if ($zip->open($public_dir . '/' . 'Certificates.zip', ZipArchive::CREATE) === TRUE) {
              // Add File in ZipArchive
              foreach (glob($public_dir . "/*") as $file) {
                  $zip->addFile($file, basename($file));
              }
              $zip->close();
          }
  
          return response()->download($public_dir . '/Certificates.zip', 'Certificates.zip');
  
  
      }
}
