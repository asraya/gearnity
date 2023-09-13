@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Tambah Blog</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-forms.input name="title" id="title" label="Title" :isRequired="true" />
            <x-forms.select name="categorie_id" id="categorie_id" :isRequired="true" :label="__('field.course_category')">
                @foreach ($data['category'] as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.input type="file" name="image" id="image" :isRequired="true" :label="__('field.image')" />
            <label>Content</label>
            <textarea class="ckeditor form-control" type="textarea" name="content" id="content" isRequired="true" label="Content"></textarea>

        <div class="text-end mt-3">
            <a href="{{ route('backend.master.blog.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
@endsection
@push('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#content').ckeditor();
    });
</script>
@endpush

 