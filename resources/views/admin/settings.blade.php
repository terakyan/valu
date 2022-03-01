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
                        Settings
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {!! Form::model($model,['class' => 'form-horizontal form-50','files'=>true]) !!}
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Category Subtitle</label>
                <div class="col-md-9">
                    {!! Form::text('category_subtitle',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Company Name</label>
                <div class="col-md-9">
                    {!! Form::text('company_name',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Company Address</label>
                <div class="col-md-9">
                    {!! Form::text('company_address',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Company Code</label>
                <div class="col-md-9">
                    {!! Form::text('company_code',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Email address</label>
                <div class="col-md-9">
                    {!! Form::text('company_email',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Catalog</label>
                <div class="col-md-6">
                    {!! Form::file('pdf',null) !!}
                </div>
                <div class="col-md-3">
                    @if(isset($model['pdf']))
                        <a href="{{ route('admin.settings.pdf.download') }}" class="btn btn-danger">Скачать каталог</a>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    {!! Form::submit('Save',['class' => 'btn btn-primary save-product float-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('css/admin/image-uploader.min.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@stop

@section('js')
    <script src="{{ asset('js/admin/image-uploader.min.js') }}" ></script>

    <script>
        $('.input-images').imageUploader({
            imagesInputName: "image",
            label: "Drag & Drop files here or click to browse",

        });

        $(".input-images").find('input').attr('multiple',null)
        $(".input-images").find('input').attr('name',"image")
    </script>
@stop
