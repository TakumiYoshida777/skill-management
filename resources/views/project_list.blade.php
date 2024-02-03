@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/project.css') }}">
@stop

@section('plugins.Datatables', true)

@section('content_header')
    <h1>職務経歴</h1>
@stop

@section('content')
    <x-messages.flash_message />

    <div class="grid-container">
        <div class="grid-head">
            <div class="grid-hitem"></div>
            <div class="grid-hitem">開始</div>
            <div class="grid-hitem">終了</div>
            <div class="grid-hitem">プロジェクト名</div>
            <div class="grid-hitem">削除</div>
        </div>
        <div class="grid-body ">
            @foreach ($projects as $data)
                <div class="grid-record">
                    <div class="grid-ritem">
                        <a href="{{ url('project/' . $data->id . '/edit') }}" type="button" class="btn btn-warning">詳細 /
                            編集</a>
                    </div>
                    <div class="grid-ritem">{{ $data->start_date }} </div>
                    <div class="grid-ritem">{{ $data->end_date ?? '現在担当中' }}</div>
                    <div class="grid-ritem">{{ $data->name }}</div>
                    <div class="grid-ritem">
                        <i class="far fa-trash-alt delete-btn" data-toggle="modal"
                            data-target="#delete{{ $data->name }}Modal" data-dismiss="modal"></i>
                    </div>
                </div>
                {{-- Project削除モーダル --}}
                <div class="modal fade delete-modal" id="delete{{ $data->name }}Modal" tabindex="-1" role="dialog"
                    aria-labelledby="delete{{ $data->name }}ModalLabel" aria-hidden="true">
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
        <div class="d-flex justify-content-center py-2">
            <a href="{{ url('project/create') }}" type="button" class="btn btn-primary">
                新規プロジェクトの追加
            </a>
        </div>
    </div>

    <table id="project-list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th></th>
                <th>プロジェクト名</th>
                <th>開始</th>
                <th>終了</th>
                <th>削除</th>
            </tr>
        </thead>
        {{-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> --}}
    </table>


@stop

@section('js')
    <script type="module" src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>
    <script>
        "use strict";
        $('#project-list').dataTable({
            "ajax": {
                "url": "data.json",
                "data": {
                    "user_id": 451
                }
            },
            "columnDefs": [{
                    "width": "10%",
                    "targets": 0,
                },
                {
                    "width": "10%",
                    "targets": 1,
                },
                {
                    "width": "30%",
                    "targets": 2,
                },
                {
                    "width": "20%",
                    "targets": 3,
                },
                {
                    "width": "20%",
                    "targets": 4,
                },
                {
                    "width": "10%",
                    "targets": 5,
                },
            ]
        });
    </script>
@stop
