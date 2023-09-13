@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Tambah Reward</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.reward.store') }}"  method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.input name="name" id="name" label="Reward" :isRequired="true" />
            <div class="custom-file">
                <x-forms.input type="file" name="image" id="image" :isRequired="true" :label="__('field.image')" />
            </div>
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.reward.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
@endsection
 