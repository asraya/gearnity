@extends('layouts.frontend.app')
@section('content')
<div class="row">
<!-- Courses Start -->
<div class="container-xxl py-5">
  <div class="container">
      <div class="text-center wow fadeInUp">
          <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
          <h1 class="mb-5">Popular Courses</h1>
      </div>
      <div class="row g-4 justify-content-center">
          @foreach ($data['course'] as $course)

          <div class="col-lg-4 col-md-6 wow fadeInUp">
              <div class="course-item bg-light">
                  <div class="position-relative overflow-hidden">
                      <img class="img-fluid" src="{{ $course->image_path }}" alt="">
                      <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                          <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                          <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                      </div>
                  </div>
                  <div class="text-center p-4 pb-0">
                      <h3 class="mb-0"> {{ $course['price_rupiah'] }}</h3>
                      <div class="mb-3">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small>(123)</small>
                      </div>
                      <a href="{{ route('frontend.course.show',[
                          'mitraSlug' => $course['mitra']['slug'],
                          'courseSlug' => $course['slug'],
                      ]) }}" ><h5 class="btn btn-primary block">{{ $course['name'] }}</h5></a>
                  </div>
                  <div class="d-flex border-top">
                      <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                      <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                      <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                  </div>
              </div>
          </div>
          @endforeach

        
      </div>
  </div>
</div>
<!-- Courses End -->

    {{-- @foreach ($data['course'] as $course)
    <div class="col-md-3">
     <div class="card">
         <div class="card-content">
           <img class="card-img-top img-fluid" src="{{ $course->image_path }}" alt="Card image cap" style="height: 200px">
           <div class="card-body">
             <h4 class="card-title">{{ $course['name'] }}</h4>
             <p class="card-text">
               {{ $course['price_rupiah'] }}
             </p>
             <a href="{{ route('frontend.course.show',[
                 'mitraSlug' => $course['mitra']['slug'],
                 'courseSlug' => $course['slug'],
             ]) }}" class="btn btn-primary block">Lihat Kursus</a>
           </div>
         </div>
       </div>
 </div>
    @endforeach 
 </div>--}}
@endsection