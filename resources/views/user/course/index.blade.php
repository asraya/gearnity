@extends('layouts.user.app')
@section('content')
 <div class="row">

    @foreach ($data['userCourse'] as $userCourse)
           <div class="col-md-3">
            <div class="card">
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="{{ $userCourse['course']['image_path'] }}" alt="Card image cap" style="height: 200px">
                  <div class="card-body">
                    <h4 class="card-title">{{ $userCourse['course']['name'] }}</h4>
                    <hr>
                    <div class="mb-2">
                      <b>Progress: {{ $userCourse['progress_percent'] == 100 ? 'Selesai' : $userCourse['progress_percent'] . '%' }} </b> 
                    </div>
                    
                    <a href="{{ route('frontend.user.course.learn',[
                      'id' => $userCourse['id'],
                      'progress' => $userCourse['progress']
                    ]) }}" class="btn btn-primary btn-block">Lanjutkan Belajar</a>
                    <br></br>
                    @if ($userCourse['progress_percent']== 0)
                    @else
                    <a href="{{ route('frontend.user.course.show',[
                      'id' => $userCourse['id'],
                      'progress' => $userCourse['progress']
                    ]) }}" class="btn btn-info btn-block">Ambil Sertifikat</a>
                    @endif
                    
                </div>
              </div>
        </div>
      @endforeach
      <div class="content">
        <div class="title m-b-md">
            Certificate Generator
        </div>
        <form class="w-full max-w-lg" action="{{route('frontend.user.course.generate')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-name-x">
                        Name X Coordinate
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                           id="grid-name-x" type="text" placeholder="100" name="name-x" value="{{old('name-x',155)}}">
                           @error('name-x')
                           <p class="text-danger">{{ $message }}</p>
                       @enderror                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-name-y">
                        Name Y Coordinate
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-name-y" type="text" placeholder="100" name="name-y" value="{{old('name-y',102)}}">
                           @error('name-y')
                           <p class="text-danger">{{ $message }}</p>
                       @enderror
                        </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-date-x">
                        Date X Coordinate
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                           id="grid-date-x" type="text" placeholder="100" name="date-x" value="{{old('date-x',80)}}">
                           @error('date-x')
                           <p class="text-danger">{{ $message }}</p>
                       @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-date-y">
                        Date Y Coordinate
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-date-y" type="text" placeholder="100" name="date-y" value="{{old('date-y',80)}}">
                           @error('name-y')
                           <p class="text-danger">{{ $message }}</p>
                       @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-pdf-file">
                        PDF Certificate Template
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-pdf-file" type="file" name="pdf-file">
                           @error('pdf-file')
                           <p class="text-danger">{{ $message }}</p>
                       @enderror
                        </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-csv-file">
                        CSV File
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="grid-csv-file" type="file" name="csv-file">
                           @error('csv-file')
                           <p class="text-danger">{{ $message }}</p>
                       @enderror

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-email-body">
                        Email Body HTML
                    </label>
                    <textarea
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-"
                            id="grid-email-body" type="file" name="email-body" style="height: 200px"></textarea>
                    @error('email-body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="mx-auto">
                    <button type="submit"
                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Generate
                    </button>
                </div>
            </div>

        </form>
    </div>
       </div>
     
@endsection
