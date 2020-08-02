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
            <h3>No users in organization.</h3>
        </div>
    </div>
</div>
@endsection