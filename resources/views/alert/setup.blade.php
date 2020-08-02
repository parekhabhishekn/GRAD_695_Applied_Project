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
            {{ __('Alert - Setup') }}
        </div>
        <div class="col-xl-2">
            @include('navigation.alert')
        </div>
        <div class="col-xl-10">

            <div class="card">
                <div class="card-header">{{ __('Setup Alarm') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alert.add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Actions Enabled') }}</label>

                            <div class="col-md-6">
                                
                                <select id="ActionsEnabled" type="ActionsEnabled" class="form-control @error('ActionsEnabled') is-invalid @enderror" name="ActionsEnabled" value="{{ old('ActionsEnabled') }}" required autocomplete="ActionsEnabled">
                                  <option value="true">True</option>
                                  <option value="false">False</option>
                                </select>

                                @error('ActionsEnabled')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="AlarmActions" class="col-md-4 col-form-label text-md-right">{{ __('Alarm Actions') }}</label>

                            <div class="col-md-6">
                                <input id="AlarmActions" type="text" class="form-control @error('AlarmActions') is-invalid @enderror" name="AlarmActions" value="{{ old('AlarmActions') }}" required autocomplete="AlarmActions">

                                @error('AlarmActions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="AlarmDescriptions" class="col-md-4 col-form-label text-md-right">{{ __('Alarm Description') }}</label>

                            <div class="col-md-6">
                                <input id="AlarmDescription" type="text" class="form-control @error('AlarmDescription') is-invalid @enderror" name="AlarmDescription" value="{{ old('AlarmDescription') }}" required autocomplete="AlarmDescription">

                                @error('AlarmDescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="AlarmName" class="col-md-4 col-form-label text-md-right">{{ __('Alarm Name') }}</label>

                            <div class="col-md-6">
                                <input id="AlarmName" type="text" class="form-control @error('AlarmName') is-invalid @enderror" name="AlarmName" value="{{ old('AlarmName') }}" required autocomplete="AlarmName">

                                @error('AlarmName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="ComparisonOperator" class="col-md-4 col-form-label text-md-right">{{ __('Comparison Operator') }}</label>

                            <div class="col-md-6">
                                
                                <select id="ComparisonOperator" type="ComparisonOperator" class="form-control @error('ComparisonOperator') is-invalid @enderror" name="ComparisonOperator" value="{{ old('ComparisonOperator') }}" required autocomplete="ComparisonOperator">
                                    <option value="GreaterThanOrEqualToThreshold">Greater Than Or Equal To</option>
                                    <option value="GreaterThanThreshold">Greater Than</option>
                                    <option value="LessThanThreshold">Less Than</option>
                                    <option value="LessThanOrEqualToThreshold">Less Than Or Equal To</option>
                                    <option value="LessThanLowerOrGreaterThanUpperThreshold">Less Than Lower Or Greater Than Upper</option>
                                    <option value="LessThanLowerThreshold">Less Than Lower</option>
                                    <option value="GreaterThanUpperThreshold">Greater Than Upper</option>
                                </select>
                                @error('ComparisonOperator')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 


                        <div class="form-group row">
                            <label for="EvaluationPeriods" class="col-md-4 col-form-label text-md-right">{{ __('Evaluation Periods') }}</label>

                            <div class="col-md-6">
                                <input id="EvaluationPeriods" type="number" class="form-control @error('EvaluationPeriods') is-invalid @enderror" name="EvaluationPeriods" value="{{ old('EvaluationPeriods') }}" required autocomplete="EvaluationPeriods">

                                @error('EvaluationPeriods')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="MetricName" class="col-md-4 col-form-label text-md-right">{{ __('Metric Name') }}</label>

                            <div class="col-md-6">
                                <input id="MetricName" type="text" class="form-control @error('MetricName') is-invalid @enderror" name="MetricName" value="{{ old('MetricName') }}" required autocomplete="MetricName">

                                @error('MetricName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="Namespace" class="col-md-4 col-form-label text-md-right">{{ __('Namespace') }}</label>

                            <div class="col-md-6">
                                
                                <select id="Namespace" type="Namespace" class="form-control @error('Namespace') is-invalid @enderror" name="Namespace" value="{{ old('Namespace') }}" required autocomplete="Namespace">
                                    <option value="AWS/EBS">EBS</option>
                                    <option value="AWS/EC2">EC2</option>
                                    <option value="AWS/Usage">Usage</option>
                                    <option value="AWS/SNS">SNS</option>
                                </select>
                                @error('Namespace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Setup Alarm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
