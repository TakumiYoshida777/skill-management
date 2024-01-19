@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/language_proficiency.css') }}">
@stop

@section('content_header')
    <h1>語学力</h1>
@stop

@section('content')
    <x-messages.flash_message />
    <div class="grid-container">
        <div class="grid-head">
            <div class="grid-hitem">編集・削除</div>
            <div class="grid-hitem">外国語種別</div>
            <div class="grid-hitem">学習方法</div>
            <div class="grid-hitem">通算年数</div>
            <div class="grid-hitem">読む<br>レベル：1～3</div>
            <div class="grid-hitem">書く<br>レベル：1～3</div>
            <div class="grid-hitem">会話<br>レベル：1～3</div>
            <div class="grid-hitem">備考</div>
        </div>
        <div class="grid-body ">
            @foreach ($language_proficiencies as $data)
                <form action="{{ url('/language_proficiency', $data->id) }}" method="POST" class="grid-record">
                    @csrf
                    @method('PUT')
                    <div class="grid-ritem">
                        <i class="fas fa-edit edit-btn "data-toggle="modal" data-target="#editModal"></i>
                    </div>
                    <div class="grid-ritem">{{ $data->name }}</div>
                    <div class="grid-ritem">{{ $data->learning_method }}</div>
                    <div class="grid-ritem">{{ $data->total_date }}</div>
                    <div class="grid-ritem">{{ $data->read_status }}</div>
                    <div class="grid-ritem">{{ $data->write_status }}</div>
                    <div class="grid-ritem">{{ $data->conversation_status }}</div>
                    <div class="grid-ritem">{{ $data->memo }}</div>


                    {{-- 編集用モーダル --}}
                    <div class="modal fade edit-modal" id="editModal" tabindex="-1" role="dialog"
                        aria-labelledby="editModalTitle" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex align-items-center">

                                    <i class="far fa-trash-alt delete-btn" data-toggle="modal" data-target="#deleteModal"
                                        data-dismiss="modal"></i>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">外国語種別</div>
                                        <div>
                                            <input class="form-control" type="text" name="name"
                                                id="name" placeholder="英語"
                                                value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">学習方法</div>
                                        <div>
                                            <input class="form-control" type="text" name="learning_method"
                                                id="learning_method" placeholder="独学" value="{{ $data->learning_method }}">
                                        </div>
                                    </div>
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">通算年数</div>
                                        <div class="d-flex align-items-center">
                                            <input class="form-control w-75" type="number" name="total_date"
                                                id="total_date" value="0.1" step="any" min="0.1"
                                                value="{{ $data->total_date }}">
                                            <div class="ml-2 mb-0">年</div>
                                        </div>
                                    </div>
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">読む<br>レベル：1～3</div>
                                        <div>
                                            <div class="form-group">
                                                <select class="form-control" name="read_status" id="read">
                                                    <option value="1"
                                                        {{ $data->read_status == '1' ? 'selected' : '' }}>1</option>
                                                    <option value="2"
                                                        {{ $data->read_status == '2' ? 'selected' : '' }}>2</option>
                                                    <option value="3"
                                                        {{ $data->read_status == '3' ? 'selected' : '' }}>3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">書く<br>レベル：1～3</div>
                                        <div>
                                            <div class="form-group">
                                                <select class="form-control" name="write_status" id="write">
                                                    <option value="1"
                                                        {{ $data->write_status == '1' ? 'selected' : '' }}>1</option>
                                                    <option value="2"
                                                        {{ $data->write_status == '2' ? 'selected' : '' }}>2</option>
                                                    <option value="3"
                                                        {{ $data->write_status == '3' ? 'selected' : '' }}>3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">会話<br>レベル：1～3</div>
                                        <div>
                                            <div class="form-group">
                                                <select class="form-control" name="conversation_status" id="conversation">
                                                    <option value="1"
                                                        {{ $data->conversation_status == '1' ? 'selected' : '' }}>1
                                                    </option>
                                                    <option value="2"
                                                        {{ $data->conversation_status == '1' ? 'selected' : '' }}>2
                                                    </option>
                                                    <option value="3"
                                                        {{ $data->conversation_status == '1' ? 'selected' : '' }}>3
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-record py-2 border-bottom">
                                        <div class="input-title">備考</div>
                                        <div>
                                            <textarea class="form-control" name="memo" id="memo" placeholder="資格や経験、留学など">{{ $data->memo }}</textarea>
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
                {{-- 外国語の削除 モーダル --}}
                <div class="modal fade delete-modal" id="deleteModal" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ url('/language_proficiency', $data->id) }}" method="POST">
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
        <div class="d-flex justify-content-center py-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                追加
            </button>
        </div>
    </div>

    {{-- 外国語の追加 モーダル --}}
    <div class="modal fade add-modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ url('/language_proficiency') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">外国語種別</div>
                        <div>
                            <input class="form-control" type="text" name="name" id="name"
                                placeholder="英語">
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">学習方法</div>
                        <div>
                            <input class="form-control" type="text" name="learning_method" id="learning_method"
                                placeholder="独学">
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">通算年数</div>
                        <div class="d-flex align-items-center">
                            <input class="form-control w-75" type="number" name="total_date" id="total_date"
                                value="0.1" step="any" min="0.1">
                            <div class="ml-2 mb-0">年</div>
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">読む<br>レベル：1～3</div>
                        <div>
                            <div class="form-group">
                                <select class="form-control" name="read_status" id="read">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">書く<br>レベル：1～3</div>
                        <div>
                            <div class="form-group">
                                <select class="form-control" name="write_status" id="write">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">会話<br>レベル：1～3</div>
                        <div>
                            <div class="form-group">
                                <select class="form-control" name="conversation_status" id="conversation">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-record py-2 border-bottom">
                        <div class="input-title">備考</div>
                        <div>
                            <textarea class="form-control" name="memo" id="memo" placeholder="資格や経験、留学など"></textarea>
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
