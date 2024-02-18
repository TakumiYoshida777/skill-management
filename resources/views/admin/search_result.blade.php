@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/project_create.css') }}">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">管理者_検索</h1>
@stop

@section('content')
    <x-messages.flash_message />
    <table id="user-list" class="display table table-striped responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>詳細</th>
                <th>氏</th>
                <th>名</th>
                <th>部署</th>
                <th>役職</th>
                <th>業界経験月数</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data )
            <tr>
                <td></td>
                <td>
                    <a href="" type="button" class="btn btn-warning">詳細</a>
                </td>
                <td>{{ $data->last_name }}</td>
                <td>{{ $data->first_name }}</td>
                <td>{{ $data->division }}</td>
                <td>{{ $data->position }}</td>
                <td>{{ $data->industry_experience }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script>
        "use strict";

        $(document).ready(function() {

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            const table = $('#user-list').DataTable({
                serverSide: true,
                scrollY: "47vh",
                scrollCollapse: true,
                responsive: true,
                info: false,
                lengthChange: false,
                searching: false,

                "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                    '<"row"<"col-sm-6"i><"col-sm-6"p>>' +
                    '<"row"<"col-sm-12"tr>>',
                // ajax: {
                //     type: 'POST',
                //     url: "{{ url('api/search_member') }}",
                //     dataType: 'json',
                //     dataSrc: "data",
                // },
                columns: [{
                        className: 'dtr-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        width: "5%"
                    },
                    {
                        orderable: false,
                        // data: "id",
                        width: "10%",
                        // render: function(data, type, row) {
                        //     if (type === 'display') {
                        //         return `
                        //         <a href="{{ url('project/') }}/${data}/edit" type="button" class="btn btn-warning">詳細</a>
                        //         `;
                        //     }
                        //     return data;
                        // },
                    },
                    {
                        // data: "last_name",
                        width: "10%",
                    },
                    {
                        // data: "first_name",
                        width: "10%"
                    },
                    {
                        // data: "division",
                        width: "10%"
                    },
                    {
                        // data: "position",
                        width: "10%",
                    },
                    {
                        // data: "industry_experience",
                        width: "10%",
                    },
                    // {
                    //     data: "end_date",
                    //     width: "10%",
                    //     render: function(data, type, row) {
                    //             if (type === 'display') {

                    //                 return data??'プロジェクト対応中';
                    //             }
                    //             return '空き';
                    //         },
                    // },
                ],
                // order: [
                //     [5, 'desc']
                // ]
            });
        });
    </script>


@stop

@section('js')
    <script src="{{ asset('js/custom/project_create.js') }}" defer></script>
@stop
