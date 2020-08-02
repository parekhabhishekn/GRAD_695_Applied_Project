@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" hidden>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alert') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 card-header">
            {{ __('Alert') }}
        </div>
        <div class="col-xl-2">
            @include('navigation.alert')
        </div>
        <div class="col-xl-10">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Description</th> 
                    <th>Status</th> 
                </thead>
                <tbody>
                    <?php foreach($alarm_data as $_alarm_item): ?>
                    <tr>
                        <td>{{ $_alarm_item["AlarmName"] }}</td>
                        <td>{{ $_alarm_item["AlarmDescription"] }}</td>
                        <td>{{ $_alarm_item["StateValue"] }}</td>
                    </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
