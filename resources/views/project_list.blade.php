@extends('adminlte::page')

@section('title', 'SkillSheetCreator')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/project.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">


@stop

@section('plugins.Datatables', true)

@section('content_header')
    <h1>職務経歴</h1>
@stop

@section('content')
    <x-messages.flash_message />
    <input id="user-id" type="hidden" value="{{ $user_id }}">
    <div class="grid-container">

        @foreach ($projects as $data)
            {{-- Project削除モーダル --}}
            <div class="modal fade delete-modal" id="delete{{ $data->id }}Modal" tabindex="-1" role="dialog"
                aria-labelledby="delete{{ $data->id }}ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{ url('/project', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="modal-header">
                                {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body d-flex justify-content-center argin-items-center">
                                プロジェクト: <span class="mx-3 font-weight-bold">【{{ $data->name }}】</span>をリストから削除しますか？
                            </div>
                            <div class="modal-footer d-flex justify-content-around">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                <button type="submit" class="btn btn-danger">削除</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="table-container">
        <table id="project-list" class="display table table-striped responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>詳細/編集</th>
                    <th>プロジェクト名</th>
                    <th>役割</th>
                    <th>開始</th>
                    <th>終了</th>
                    <th>作成日</th>
                    <th>削除</th>
                </tr>
            </thead>
        </table>
        <div class="d-flex justify-content-center py-2">
            <a href="{{ url('project/create') }}" type="button" class="btn btn-success">
                追加
            </a>
        </div>
    </div>

@stop

@section('js')

    <script type="module" src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>

    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.js"></script>

    <script>
        "use strict";

        $(document).ready(function() {
            const userId = $("#user-id").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const table = $('#project-list').DataTable({
                language: {
                    url: "{{ asset('lang/ja/pagination.php') }}" // 言語ファイルの相対パスを指定
                },
                serverSide: true,
                scrollY: "47vh",
                scrollCollapse: true,
                responsive: true,
                info: false,
                lengthChange: false,

                "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-6"i><"col-sm-6"p>>',
                ajax: {
                    type: 'POST',
                    url: "{{ url('api/project-list') }}",
                    data: {
                        id: userId
                    },
                    dataType: 'json',
                    dataSrc: "data",
                },
                columns: [{
                        className: 'dtr-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        width: "5%"
                    },
                    {
                        orderable: false,
                        data: "id",
                        width: "10%",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return `
                                <a href="{{ url('project/') }}/${data}/edit" type="button" class="btn btn-warning pc">詳細 / 編集</a>
                                <a href="{{ url('project/') }}/${data}/edit" type="button" class="sp"><i class="fas fa-edit"></i></a>
                                `;
                            }
                            return data;
                        },
                    },
                    {
                        data: "name",
                        width: "25%",
                    },
                    {
                        data: "position",
                        width: "10%"
                    },
                    {
                        data: "start_date",
                        width: "10%"
                    },
                    {
                        data: "end_date",
                        width: "10%",
                        render: function(data) {
                            return data ? data : "現在担当中";
                        }
                    },
                    {
                        data: "created_at",
                        width: "10%",
                        render: function(data) {
                            // dataをDateオブジェクトに変換
                            var date = new Date(data);

                            // 年、月、日を取得
                            var year = date.getFullYear();
                            var month = ('0' + (date.getMonth() + 1)).slice(-2);
                            var day = ('0' + date.getDate()).slice(-2);

                            // 時間を取得
                            var hours = ('0' + date.getHours()).slice(-2);
                            var minutes = ('0' + date.getMinutes()).slice(-2);

                            // フォーマットに変換
                            var formattedDate = year + '-' + month + '-' + day + ' ' + hours + ':' +
                                minutes;

                            // 変換されたデータを返す
                            return formattedDate;
                        }
                    },
                    {
                        data: "id",
                        width: "5%",
                        orderable: false,
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return `<i class="far fa-trash-alt delete-btn" data-toggle="modal"
                            data-target="#delete${data}Modal" data-dismiss="modal"></i>`;
                            }
                            return data;
                        }
                    },
                ],
                order: [
                    [5, 'desc']
                ]
            });
        });
    </script>

@stop
