@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Tambah User</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.user.store') }}" method="POST">
            @csrf
            <x-forms.input name="name" id="name" label="User" :isRequired="true" />
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.user.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
@endsection
 