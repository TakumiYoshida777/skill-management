@extends('adminlte::page')

@section('title', 'SkillsheetCreator')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/project_create.css') }}">
@stop

@section('content_header')
    <p class="h4">職務経歴-プロジェクト登録</p>
@stop

@section('content')
    <x-messages.flash_message />
    <form action="{{ url('project') }}" method="POST">
        @csrf
        <div class="btns-wrap">
            <div class="pc">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
        <div class="inner-heding mb-4 row">
            {{-- プロジェクト名 --}}
            <div class="project-title col-md-6">
                <input type="text" name="name" id="name" class="form-control" placeholder="新規プロジェクト名" required>
            </div>
            {{-- 期間 --}}
            <div id="duration" class="grid-container col-md-6">
                <div class="date-grid px-2">
                    <div class="date-title">開始日</div>
                    <div class="date-item ml-1"><input type="date" class="form-control" name="start_date" required></div>
                    <div class="date-title">終了日</div>
                    <div class="date-item ml-1"><input type="date" class="form-control" name="end_date"></div>
                </div>
            </div>
        </div>
        <div class="inner-body">
            <div class="inner-container">
                {{-- プロジェクト説明 --}}
                <div id="project-description" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">プロジェクト説明</div>
                    </div>
                    <div class="grid-body p-2">
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                </div>
                {{-- チーム情報 --}}
                <div id="team-info" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">チーム情報</div>
                    </div>
                    <div class="grid-body px-2">
                        <div class="grid-record">
                            <div class="grid-ritem">役割</div>
                            <div class="grid-ritem"><input type="text" class="form-control" name="position"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">チーム人数</div>
                            <div class="grid-ritem"><input type="number" class="form-control" name="team_size"
                                    min="1" required>
                            </div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">全体人数</div>
                            <div class="grid-ritem"><input type="number" class="form-control" name="all_team_size"
                                    min="1" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-container">
                {{-- 担当工程 --}}
                <div id="task-phase" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">担当工程</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record">
                            <div class="grid-ritem">要件定義</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control"
                                    name="requirement_definition_flag"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">基本設計</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control" name="basic_design_flag">
                            </div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">詳細設計</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control" name="detailed_design_flag">
                            </div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">DB設計</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control" name="db_design_flag"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">プログラミング</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control" name="programming_flag">
                            </div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">単体テスト</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control" name="unit_test_flag">
                            </div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">結合テスト</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control"
                                    name="integration_test_flag"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">総合テスト</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control"
                                    name="system_test_flag"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">運用テスト</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control"
                                    name="operation_test_flag"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">システム移行</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control"
                                    name="system_migration_flag"></div>
                        </div>
                        <div class="grid-record">
                            <div class="grid-ritem">運用・保守</div>
                            <div class="grid-ritem"><input type="checkbox" class="form-control"
                                    name="operation_maintenance_flag"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-container">
                {{-- ※JSで操作しているためHTMLの構成を変更する際は注意 --}}
                {{-- 使用言語 --}}
                <div id="language" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用言語</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_language[0]" list="used_language"
                                    class="skill-input form-control" placeholder="言語を入力"> --}}
                                <datalist id="used_language">
                                    @foreach ($langs as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
                {{-- 使用フレームワーク --}}
                <div id="framework" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用フレームワーク</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_framework[0]" list="used_framework"
                                    class="skill-input form-control" placeholder="フレームワークを入力"> --}}
                                <datalist id="used_framework">
                                    @foreach ($frameworks as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
                {{-- 使用データベース --}}
                <div id="database" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用データベース</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_database[0]" list="used_database"
                                    class="skill-input form-control" placeholder="データベースを入力"> --}}
                                <datalist id="used_database">
                                    @foreach ($databases as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>

            </div>

            <div class="inner-container">

                {{-- 使用ミドルウェア --}}
                <div id="middleware" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用ミドルウェア</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_middleware[0]" list="used_middleware"
                                    class="skill-input form-control" placeholder="ミドルウェアを入力"> --}}
                                <datalist id="used_middleware">
                                    @foreach ($middlewares as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
                {{-- 使用OS --}}
                <div id="os" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用OS</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_os[0]" list="used_os" class="skill-input form-control"
                                    placeholder="OSを入力"> --}}
                                <datalist id="used_os">
                                    @foreach ($oses as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
                {{-- 使用サーバー --}}
                <div id="server" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用サーバー</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_server[0]" list="used_server"
                                    class="skill-input form-control" placeholder="サーバーを入力"> --}}
                                <datalist id="used_server">
                                    @foreach ($servers as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
                {{-- 使用仮想環境 --}}
                <div id="virtual_environment" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用仮想環境</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_virtual_environment[0]" list="used_virtual_environment"
                                                    class="skill-input form-control" placeholder="仮想環境を入力"> --}}
                                <datalist id="used_virtual_environment">
                                    @foreach ($virtual_environments as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
                {{-- 使用バージョン管理 --}}
                <div id="version_management" class="grid-container card w-100">
                    <div class="grid-head">
                        <div class="grid-hitem">使用バージョン管理</div>
                    </div>
                    <div class="grid-body px-2 ">
                        <div class="grid-record d-none">
                            <div class="grid-ritem" onclick="removeRecord(event)"><i class="fas fa-minus minus-btn"></i>
                            </div>
                            <div class="grid-ritem">
                                {{-- <input type="text" name="used_version_management[0]" list="used_version_management"
                                    class="skill-input form-control" placeholder="バージョン管理を入力"> --}}
                                <datalist id="used_version_management">
                                    @foreach ($version_management as $data)
                                        <option value="{{ $data }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-plus grid-foot plus-btn" onclick="addRecord(event)"></i>
                </div>
            </div>
        </div>
        <div class="sp text-center py-3">
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </form>

@stop

@section('js')
    <script src="{{ asset('js/custom/project_create.js') }}" defer></script>
@stop
