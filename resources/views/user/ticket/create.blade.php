@extends('layouts.user.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Tambah Ticket</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('frontend.user.ticket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea class="ckeditor form-control" type="textarea" name="ticket" id="ticket" isRequired="true" label="__('field.description')"></textarea>
            <x-forms.select name="status" id="status" :isRequired="true" :label="__('field.course_type')">
                <option value="">-- Select --</option>
                <option value="0">low</option>
                <option value="1">middle</option>
                <option value="1">high</option>
            </x-forms.select>
            <x-forms.input type="file" name="image" id="image" :isRequired="true" :label="__('field.image')" />


        <div class="text-end mt-3">
            <a href="{{ route('frontend.user.ticket.index') }}" class="btn btn-secondary">Kembali</a>
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
        $('#description').ckeditor();
    });
</script>
@endpush
 