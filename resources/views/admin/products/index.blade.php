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
                    <div>Products

                    </div>
                </div>
                <div class="page-title-actions">
                    <a class="btn btn-primary" href="{!! route('admin.products.new') !!}">New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="products-table" class="table table-style table-bordered" cellspacing="0" style="min-width: 100%; width: 100%">
                    <thead>
                    <tr>
                        <th>{!! __('id') !!}</th>
                        <th>{!! __('name') !!}</th>
                        <th>{!! __('image') !!}</th>
                        <th>{!! __('category') !!}</th>
                        <th>{!! __('status') !!}</th>
                        <th>{!! __('date') !!}</th>
                        <th>{!! __('action') !!}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('js/DataTables/datatables.min.css')}}">
@stop

@section('js')
    <script src="{{asset('js/DataTables/datatables.min.js')}}"></script>
    <script>
        $( document ).ready(function() {
            let table = $('#products-table').DataTable({
                ajax: "{!! route('datatable.products') !!}",
                "processing": true,
                "bPaginate": true,
                "autoWidth": false,
                dom: '<"d-flex justify-content-between align-items-baseline"lfB><rtip>',
                displayLength: 10,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                buttons: [
                    // 'csv', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'category', name: 'category'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        })
    </script>
@stop
