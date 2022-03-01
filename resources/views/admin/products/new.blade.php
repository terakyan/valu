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
                        Product {!! ($model)?"Edit":"New" !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {!! Form::model($model,['class' => 'form-horizontal form-50','url' => route('admin.products.new.post'),'files'=>true]) !!}
            {!! Form::hidden("id",null,['id' => 'model-id']) !!}
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
                <label class="col-md-3" for="passwordinput">Image</label>
                <div class="col-md-9">
                    <div class="input-images"></div>
                </div>
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Category</label>
                <div class="col-md-9">
                    {!! Form::select('category',['1'=>'Dogs','2'=>'Cats'],null,['class'=>'form-control input-md']) !!}
                </div>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label class="col-md-3" for="passwordinput">Status</label>
                <div class="col-md-9">
                    {!! Form::select('status',['0'=>'Draft','1'=>'Published'],null,['class'=>'form-control input-md']) !!}
                </div>
                @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
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
        let model = $('#model-id').val();
        var data =  (model != '') ? [{id: 1, src: "{{ ($model)? \App\Services\ImgService::renderImg('products',$model->image) :'' }}"}]:[];
        $('.input-images').imageUploader({
            imagesInputName: "image",
            label: "Drag & Drop files here or click to browse",
            preloaded: data,
            preloadedInputName: 'image'

        });

        $(".input-images").find('input').attr('multiple',null)
        $(".input-images").find('input').attr('name',"image")
    </script>
@stop
