@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Tambah Voucher</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.voucher.store') }}"  method="POST">
            @csrf
            <x-forms.input name="name_voucher" id="name_voucher" label="Voucher" :isRequired="true" />
            <x-forms.select name="status" id="status" :isRequired="true" label="Status">
                        <option value="">-- Select --</option>
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                </x-forms.select> 
            <x-forms.input type="number" name="total_redeem" id="total_redeem" label="Total Redeem" :isRequired="true" />
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.voucher.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
@endsection
 