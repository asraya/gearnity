@extends('layouts.user.app')
@section('content')
<div class="row">
    <div class="col-xl-4 col-md-6 col-sm-12">
    @foreach ($data['model'] as $item)
    <div class="card">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="{{ $item['image_path'] }}"
            alt="Card image cap" style="width: 27rem" />
            <div class="card-body">
                <h4 class="card-title">{{ $item['name'] }}</h4>
                <p class="card-text">
                    {{ $item['slug'] }}
                </p>
                <p class="card-text">
                    {{ $item['name'] }}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection