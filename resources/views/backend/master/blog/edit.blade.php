@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Edit Blog</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.blog.update',$data['blog']) }}" method="POST">
            @csrf
            <x-forms.input name="name" id="name" label="Blog" :isRequired="true" :value="$data['blog']['name']" />
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.blog.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
    </div>
</div>
@endsection
 