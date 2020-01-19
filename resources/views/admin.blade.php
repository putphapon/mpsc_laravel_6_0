@extends('layouts.layout-admin')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">อยู่ในระบบแล้ว</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h6>คุณกำลังอยู่ในระบบด้วย email</h6>
                    <h1>{{ Auth::user()->email }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
