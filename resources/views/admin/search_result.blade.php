@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/project_create.css') }}">
    {{-- 最新バージョンのDataTables CSSを読み込む --}}
    <link href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">管理者_検索</h1>
@stop

@section('content')
    <x-messages.flash_message />

    <table id="user-result-list" class="display table table-striped responsive nowrap" style="width:100%">
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
            @foreach ($users as $data)
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


@stop

@section('js')
    <script src="{{ asset('js/custom/project_create.js') }}" defer></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.js"></script>

    <script>
        "use strict";

        $(document).ready(function() {

            const table = $('#user-result-list').DataTable({
                scrollY: "47vh",
                scrollCollapse: true,
                responsive: true,
                info: false,
                lengthChange: false,
                searching: false,


                "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                    '<"row"<"col-sm-6"i><"col-sm-6"p>>' +
                    '<"row"<"col-sm-12"tr>>',
                columns: [{
                        className: 'dtr-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        width: "5%"
                    },
                    {
                        orderable: false,
                        width: "10%",
                    },
                    {
                        width: "10%",
                    },
                    {
                        width: "10%"
                    },
                    {
                        width: "10%"
                    },
                    {
                        width: "10%",
                    },
                    {
                        width: "10%",
                    },
                ],
                order: [
                    [2, 'desc']
                ]
            });

        });
    </script>


@stop
