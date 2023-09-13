@extends('layouts.user.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ __('button.see_invoice') }}</h4>
        <a href="{{ route('frontend.user.transaction.index') }}" class="btn btn-primary">{{ __('button.back') }}</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control" placeholder="Email"
                            name="email"><span></span>
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">cek voucher</button>
                    </div>
                </form>
                
                
                <table>
                    
                    @if (auth()->user()->role_name == 'mitra')
                    <tr>
                        <th>{{ __('field.transaction_buyer') }}</th>
                        <td>: {{ $data['transaction']['user']['name'] }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>{{ __('field.transaction_invoice') }}</th>
                        <td>: {{ $data['transaction']['invoice_number'] }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('sidebar.course') }}</th>
                        <td>: {{ $data['transaction']['course']['name'] }}</td>
                    </tr>
                     <tr>
                        <th>{{ __('field.transaction_status') }}</th>
                        <td>: {!! $data['transaction']['html_status'] !!}</td>
                    </tr>
                    <tr>
                        <th>{{ __('field.transaction_total_pay') }}</th>
                        <td>: {{ $data['transaction']['total_pay'] * (1 - ($data['transaction']['discount'] / 100))}}</td>
                        
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="{{ $data['transaction']['course']['image_path'] }}" alt="" class="w-100">
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-success btn-icon icon-left" id="pay-button"><i
            class="fa fa-credit-card"></i>
        Process Payment</button>
    </div>
</div>
@endsection
@push('js')
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();
        snap.pay('{{ $data['transaction']->snap_token }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            }
        });
    });
</script>
@endpush