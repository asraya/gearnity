@extends('layouts.user.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Edit Ticket</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.ticket.update',$data['ticket']) }}" method="POST">
            @csrf
            <x-forms.input name="name" id="name" label="Ticket" :isRequired="true" :value="$data['ticket']['name']" />
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.ticket.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
    </div>
</div>
@endsection
 