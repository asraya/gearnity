@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Edit Ticket</h4>
    </div>
    <div class="card-body">
    <form action="{{ route('backend.master.ticket.update',$data['ticket']) }}" method="POST">
            @csrf
            <x-forms.input name="status" id="status" label="Status" :isRequired="true" :value="$data['ticket']['status']" readonly/>
            <textarea class="ckeditor form-control" type="textarea" name="ticket" id="ticket" isRequired="true" label="__('field.description')" readonly>{{$data['ticket']['ticket']}}</textarea>
            <img class="card-img-top img-fluid" src="{{ $data['ticket']['image_path'] }}"
            alt="Card image cap" style="width: 27rem" />
            <div class="card-body">
    </form>
    </div>
</div>

    <hr>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Answer</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.ticket.update',$data['ticket']) }}" method="POST">
                @csrf
                <x-forms.input name="status" id="status" label="Status" :isRequired="true" :value="$data['ticket']['status']" />
                <textarea class="ckeditor form-control" type="textarea" name="ticket" id="ticket" isRequired="true" label="__('field.description')">{{$data['ticket']['ticket']}}</textarea>
                <div class="text-end mt-3">
                <a href="{{ route('backend.master.ticket.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
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
