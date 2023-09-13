@extends('layouts.user.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Edit User</h4>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <x-forms.input name="name" id="name" label="Name" :isRequired="true" :value="auth()->user()->name" />
            <x-forms.input name="name" id="name" label="Email" :isRequired="true" :value="auth()->user()->email" />
            <x-forms.input name="name" id="name" label="Phone" :isRequired="true" :value="auth()->user()->phone" />
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.user.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
    </div>
</div>
@endsection