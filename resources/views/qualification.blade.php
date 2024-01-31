@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/qualification.css') }}">
@stop

@section('content_header')
    <h1>資格/トレーニング</h1>
@stop

@section('content')
    <x-messages.flash_message />
    <div class="grid-container">
        <div class="grid-head">
            <div class="grid-hitem">編集 / 削除</div>
            <div class="grid-hitem">資格</div>
            <div class="grid-hitem">取得日</div>
            <div class="grid-hitem">有効期限</div>
            <div class="grid-hitem">備考</div>
        </div>
        <div class="grid-body ">
            @foreach ($qualification as $data)
                <form action="{{ url('/qualification', $data->id) }}" method="POST" class="grid-record">
                    @csrf
                    @method('PUT')
                    <div class="grid-ritem">
                        <i class="fas fa-edit edit-btn "data-toggle="modal" data-target="#edit{{ $data->name }}Modal"></i>
                    </div>

                    <div class="grid-ritem">{{ $data->name }}</div>
                    <div class="grid-ritem">{{ $data->issue_date }}</div>
                    <div class="grid-ritem">{{ $data->expiry_date }}</div>
                    <div class="grid-ritem">{{ $data->memo }}</div>

                    {{-- 編集用モーダル --}}
                    <div class="modal fade edit-modal" id="edit{{ $data->name }}Modal" tabindex="-1" role="dialog"
                        aria-labelledby="edit{{ $data->name }}ModalTitle" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex align-items-center">

                                    <i class="far fa-trash-alt delete-btn" data-toggle="modal" data-target="#delete{{ $data->name }}Modal"
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
                <div class="modal fade delete-modal" id="delete{{ $data->name }}Modal" tabindex="-1" role="dialog"
                    aria-labelledby="delete{{ $data->name }}ModalLabel" aria-hidden="true">
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

        </div>

    </div>
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
@stop
