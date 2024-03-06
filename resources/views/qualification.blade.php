@extends('adminlte::page')

@section('title', 'SkillSheetCreator')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/qualification.css') }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1>資格/トレーニング</h1>
@stop

@section('content')
    <x-messages.flash_message />
    <input id="user-id" type="hidden" value="{{ $user_id }}">
        @foreach ($qualification as $data)
        <form action="{{ url('/qualification', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- 編集用モーダル --}}
            <div class="modal fade edit-modal" id="edit{{ $data->id }}Modal" tabindex="-1" role="dialog"
                aria-labelledby="edit{{ $data->id }}ModalTitle" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">

                            <i class="far fa-trash-alt delete-btn" data-toggle="modal" data-target="#delete{{ $data->id }}Modal"
                                data-dismiss="modal"></i>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-record py-2 border-bottom">
                                <div class="input-title">取得年月</div>
                                <div>
                                    <input class="form-control" type="date" name="issue_date" id="issue_date" value="{{ $data->issue_date }}" required>
                                </div>
                            </div>
                            <div class="input-record py-2 border-bottom">
                                <div class="input-title">有効期限</div>
                                <div>
                                    <input class="form-control" type="date" name="expiry_date" id="expiry_date" value="{{ $data->expiry_date }}" required>
                                </div>
                            </div>
                            <div class="input-record py-2 border-bottom">
                                <div class="input-title">資格</div>
                                <div>
                                    <input class="form-control" type="text" name="name"
                                        id="name" value="{{ $data->name }}" required>
                                </div>
                            </div>

                            <div class="input-record py-2 border-bottom">
                                <div class="input-title">備考</div>
                                <div>
                                    <textarea class="form-control" name="memo" id="memo">{{ $data->memo }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-around">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- 削除 モーダル --}}
        <div class="modal fade delete-modal" id="delete{{ $data->id }}Modal" tabindex="-1" role="dialog"
            aria-labelledby="delete{{ $data->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ url('/qualification', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body d-flex justify-content-center argin-items-center">
                            外国語: <span class="mx-3 font-weight-bold">【{{ $data->name }}】</span>をリストから削除しますか？
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
    <table id="qualification-list" class="display table table-striped responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>編集 / 削除</th>
                <th>資格</th>
                <th>取得日</th>
                <th>有効期限</th>
                <th>作成日</th>
                <th>備考</th>
            </tr>
        </thead>
    </table>
    <div class="d-flex justify-content-center py-2">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
            追加
        </button>
    </div>
    {{-- 追加 モーダル --}}
    <div class="modal fade add-modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ url('/qualification') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">資格</div>
                        <div>
                            <input class="form-control" type="text" name="name" id="name"
                                placeholder="JavaSilver">
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">取得年月</div>
                        <div>
                            <input class="form-control" type="date" name="issue_date" id="issue_date">
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">有効期限</div>
                        <div>
                            <input class="form-control" type="date" name="expiry_date" id="expiry_date">
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">備考</div>
                        <div>
                            <textarea class="form-control" name="memo" id="memo" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>


@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
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

            const table = $('#qualification-list').DataTable({
                language: {
                    url: "{{ asset('lang/ja/pagination.php') }}" // 言語ファイルの相対パスを指定
                },
                serverSide: true,
                scrollY: "65vh",
                scrollCollapse: true,
                responsive: true,
                lengthChange:false,
                searching: false,
                paging: false,
                info: false,
                "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                    '<"row"<"col-sm-6"i><"col-sm-6"p>>' +
                    '<"row"<"col-sm-12"tr>>',
                ajax: {
                    type: 'POST',
                    url: "{{ url('api/qualification-list') }}",
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
                                <i class="fas fa-edit edit-btn "data-toggle="modal" data-target="#edit${data}Modal"></i>
                                `;
                            }
                            return data;
                        },
                    },
                    {
                        data: "name",
                        width: "15%",
                    },
                    {
                        data: "issue_date",
                        width: "10%"
                    },
                    {
                        data: "expiry_date",
                        width: "10%"
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
                        },

                    },
                    {
                        data: "memo",
                        width: "10%",
                    },
                    // {
                    //     data: "id",
                    //     width: "5%",
                    //     orderable: false,
                    //     render: function(data, type, row) {
                    //         if (type === 'display') {
                    //             return `<i class="far fa-trash-alt delete-btn" data-toggle="modal"
                //         data-target="#delete${data}Modal" data-dismiss="modal"></i>`;
                    //         }
                    //         return data;
                    //     }
                    // },
                ],
                order: [
                    [4, 'desc']
                ]
            });
        });
    </script>

@stop
