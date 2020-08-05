@extends('layouts/layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <button class="btn btn-primary">Manage Contacts</button>
                    <button class="btn btn-primary">Complete Pizza Orders</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
