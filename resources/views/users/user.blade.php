@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 card-header">
            {{ __('User Management') }}
        </div>
        <div class="col-xl-2">
            @include('navigation.user')
        </div>
        <div class="col-xl-10">
            
        </div>
    </div>
</div>
@endsection