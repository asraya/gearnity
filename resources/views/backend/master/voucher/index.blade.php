@extends('layouts.backend.app')
@section('content')
<div class="row">
    @if (auth()->user()->role_name == 'admin')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Master Voucher</h4>
            <div class="card-header-action">
                <a href="{{ route('backend.master.voucher.create') }}" class="btn btn-primary">{{ __('button.add') }}</a>
            </div>
        </div>
        <div class="card-body">
           <div class="table-responsive">
            {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
           </div>
        </div>
    </div>
    @else
    <br>
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
    @endif
</div>
</div>
@push('js')
{!! $dataTable->scripts() !!}
@endpush
@endsection
{{-- <div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Master Voucher</h4>
        <div class="card-header-action">
            <a href="{{ route('backend.master.voucher.create') }}" class="btn btn-primary">{{ __('button.add') }}</a>
        </div>
    </div>
    <div class="card-body">
       <div class="table-responsive">
        {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
       </div>
    </div>
</div> --}}
