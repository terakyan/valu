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
                <label class="col-md-3" for="passwordinput">Company Address 2</label>
                <div class="col-md-9">
                    {!! Form::text('company_address2',null,['class'=>'form-control input-md']) !!}
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
            <div class="form-group row mt-5 border-primary">
                <label class="col-md-3" for="passwordinput">Phone Numbers <button type="button" class="btn btn-primary add-new-contact">
                        <i class="fa fa-plus"></i></button></label>
                <div class="col-md-12 phone-box">
                    @if(isset($model['phones']))
                        @php
                        $phones = json_decode($model['phones'],true);
                        @endphp
                        @if($phones && is_array($phones))
                            @foreach($phones as $key => $phone)
                                <div class="col-md-12 d-flex mb-3 single-contact">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            {!! Form::radio('main',$key,null,['class'=>'form-check-input','id' => "flexRadioDefault$key"]) !!}
                                            <label class="form-check-label" for="flexRadioDefault{{$key}}">
                                                Main
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Number</label>
                                        {!! Form::text("phones[$key][number]",$phone['number'],['class'=>'form-control input-md']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        <label for="flexCheckDefault{{$key}}">
                                            Whatsapp
                                        </label>
                                        {!! Form::select("phones[$key][whatsapp]",[0 => 'No',1 => 'Yes'],$phone['whatsapp'],['class'=>'form-control input-md','id' => "flexCheckDefault$key"]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        <label for="viberflexCheckDefault0">
                                            Viber
                                        </label>
                                        {!! Form::select("phones[$key][viber]",[0 => 'No',1 => 'Yes'],$phone['viber'],['class'=>'form-control input-md','id' => "viberflexCheckDefault$key"]) !!}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="plus-icon remove-new-contact btn btn-danger">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <div class="col-md-12 d-flex mb-3 single-contact">
                            <div class="col-md-2">
                                <div class="form-check">
                                    {!! Form::radio('main',"0",null,['class'=>'form-check-input','id' => "flexRadioDefault0"]) !!}
                                    <label class="form-check-label" for="flexRadioDefault0">
                                        Main
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Number</label>
                                {!! Form::text('phones[0][number]',null,['class'=>'form-control input-md']) !!}
                            </div>
                            <div class="col-md-2">
                                <label for="flexCheckDefault0">
                                    Whatsapp
                                </label>
                                {!! Form::select('phones[0][whatsapp]',[0 => 'No',1 => 'Yes'],null,['class'=>'form-control input-md','id' => 'flexCheckDefault0']) !!}
                            </div>
                            <div class="col-md-2">
                                <label for="viberflexCheckDefault0">
                                    Viber
                                </label>
                                {!! Form::select('phones[0][viber]',[0 => 'No',1 => 'Yes'],null,['class'=>'form-control input-md','id' => 'viberflexCheckDefault0']) !!}
                            </div>
                            <div class="col-md-2">
                                <button class="plus-icon remove-new-contact btn btn-danger">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
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

    <script type="template" id="more-contact">
        <div class="col-md-12 d-flex mb-3 single-contact">
            <div class="col-md-2">
                <div class="form-check">
                    {!! Form::radio('main',"{slug}",null,['class'=>'form-check-input','id' => "flexRadioDefault{slug}"]) !!}
                    <label class="form-check-label" for="flexRadioDefault{slug}">
                        Main
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <label>Number</label>
                {!! Form::text('phones[{slug}][number]',null,['class'=>'form-control input-md']) !!}
            </div>
            <div class="col-md-2">
                <label for="flexCheckDefault{slug}">
                    Whatsapp
                </label>
                {!! Form::select('phones[{slug}][whatsapp]',[0 => 'No',1 => 'Yes'],null,['class'=>'form-control input-md','id' => 'flexCheckDefault{slug}']) !!}
            </div>
            <div class="col-md-2">
                <label for="viberflexCheckDefault{slug}">
                    Viber
                </label>
                {!! Form::select('phones[{slug}][viber]',[0 => 'No',1 => 'Yes'],null,['class'=>'form-control input-md','id' => 'viberflexCheckDefault{slug}']) !!}
            </div>
            <div class="col-md-2">
                <button class="plus-icon remove-new-contact btn btn-danger">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
    </script>
@endsection
@section('css')
    <link href="{{ asset('css/admin/image-uploader.min.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@stop

@section('js')
    <script src="{{ asset('js/admin/image-uploader.min.js') }}" ></script>

    <script>
        $("body").on("click", ".add-new-contact", function () {
            var uid = Math.random().toString(36).substr(2, 9);
            var html = $("#more-contact").html();
            html = html.replace(/{slug}/g, uid);
            $(".phone-box").append(html);
        });

        $("body").on("click", ".remove-new-contact", function () {
           $(this).closest('.single-contact').remove();
        });


        $('.input-images').imageUploader({
            imagesInputName: "image",
            label: "Drag & Drop files here or click to browse",

        });

        $(".input-images").find('input').attr('multiple',null)
        $(".input-images").find('input').attr('name',"image")
    </script>
@stop
