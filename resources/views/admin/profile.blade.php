@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Profile
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {!! Form::model($model,['class' => 'form-horizontal form-50']) !!}
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Name</label>
                <div class="col-md-9">
                    {!! Form::text('name',null,['class'=>'form-control input-md']) !!}
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Email</label>
                <div class="col-md-9">
                    {!! Form::text('email',null,['class'=>'form-control input-md']) !!}
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    {!! Form::submit('Save',['class' => 'btn btn-primary save-product float-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="row">
            {!! Form::open(['url' => route('admin.profile.change-password'),'class' => 'form-horizontal form-50']) !!}
            <div class="form-group row">
                <label for="password" class="col-md-3">Current Password</label>

                <div class="col-md-9">
                    <input id="password" type="password" class="form-control"
                           name="current_password" autocomplete="current-password">
                </div>
                @if ($errors->has('current_password'))
                    <span class="text-danger">{{ $errors->first('current_password') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-3">New Password</label>

                <div class="col-md-9">
                    <input id="new_password" type="password" class="form-control"
                           name="new_password" autocomplete="current-password">
                </div>
                @if ($errors->has('new_password'))
                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-3">New Confirm Password</label>

                <div class="col-md-9">
                    <input id="new_confirm_password" type="password"
                           class="form-control" name="new_confirm_password"
                           autocomplete="current-password">
                </div>
                @if ($errors->has('new_confirm_password'))
                    <span class="text-danger">{{ $errors->first('new_confirm_password') }}</span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary float-right">
                        Update password
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@stop

@section('js')

    <script>

    </script>
@stop
