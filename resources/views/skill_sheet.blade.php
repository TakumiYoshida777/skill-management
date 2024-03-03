@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/engineer_skill.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/skill_sheet.css') }}">


    <link href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.min.css" rel="stylesheet">
@stop

@section('content_header')
    <h1>スキルシート</h1>
@stop

@section('content')
    <x-messages.flash_message />

    <a class="btn btn-primary mb-3" href="{{ route('dlPdf', $skill_data->id) }}">PDF</a>
    {{-- プロフィール --}}
    <div class="sheet-section">
        {{-- 自己PR --}}
        <div class="my-pr mx-3 mb-5">
            <div>
                <div class="my-pr-wrap card">
                    <div class="flex-yx-center">
                        <div class="pr-head">
                            <div class="pr-title">
                                氏名
                            </div>
                            {{-- <div class="pr-title">
                                イニシャル
                            </div> --}}
                        </div>
                    </div>
                    <div>
                        <div class="w-100 h-100 p-3 text-center rounded">
                            {{ $skill_data->last_name }}&nbsp;{{ $skill_data->first_name }}</div>
                        {{-- <div class="w-100 h-100 p-3 text-center rounded" required>{{ $initial_user_name }}</div> --}}
                    </div>
                </div>
                <div class="my-pr-wrap card ">
                    <div class="flex-yx-center">
                        <div class="pr-head">
                            <div class="pr-title">
                                年齢
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="w-100 h-100 p-3 text-center rounded" required>{{ $user_age }}</div>
                    </div>
                </div>
            </div>
            <div class="my-pr-wrap card">
                <div class="flex-yx-center">
                    <div class="pr-head">
                        <div class="pr-title">
                            自己PR
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-100 h-100 p-3 rounded white-space-pre-wrap" required>{{ $skill_data->profile->pr }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- 技術体験 --}}
    <div class="sheet-section">
        <p class="h4">技術体験</p>
        <div class="skill-card-container">
            @if (!$skill_data->language->isEmpty())
                @php
                    $keyword = 'Language';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->language" :keyword="$keyword" :title="$keyword" />
            @endif

            @if (!$skill_data->framework->isEmpty())
                @php
                    $keyword = 'Framework';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->framework" :keyword="$keyword" :title="$keyword" />
            @endif

            @if (!$skill_data->database->isEmpty())
                @php
                    $keyword = 'Database';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->database" :keyword="$keyword" :title="$keyword" />
            @endif

            @if (!$skill_data->middleware->isEmpty())
                @php
                    $keyword = 'Middleware';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->middleware" :keyword="$keyword" :title="$keyword" />
            @endif
            @if (!$skill_data->os->isEmpty())
                @php
                    $keyword = 'OS';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->os" :keyword="$keyword" :title="$keyword" />
            @endif
            @if (!$skill_data->server->isEmpty())
                @php
                    $keyword = 'Server';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->server" :keyword="$keyword" :title="$keyword" />
            @endif
            @if (!$skill_data->virtual_environment->isEmpty())
                @php
                    $keyword = 'VirtualEnvironment';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->virtual_environment" :keyword="$keyword" :title="$keyword" />
            @endif
            @if (!$skill_data->version_management->isEmpty())
                @php
                    $keyword = 'engineerSkillVersionManagement';
                @endphp
                <x-engineer_skill.skill_show_container :engineerSkills="$skill_data->version_management" :keyword="$keyword" :title="$keyword" />
            @endif

        </div>
    </div>
    {{-- 資格 --}}
    <div class="sheet-section">
        <p class="h4">資格</p>
        @if (!$skill_data->qualification->isEmpty())
            <table id="qualification-show-list" class="display table table-striped responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>資格</th>
                        <th>取得日</th>
                        <th>有効期限</th>
                        <th>作成日</th>
                        <th>備考</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skill_data->qualification as $data)
                        <tr>
                            <td></td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->issue_date }}</td>
                            <td>{{ $data->expiry_date }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->memo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    {{-- 語学力 --}}
    <div class="sheet-section">
        <p class="h4">語学力</p>
        @if (!$skill_data->language_proficiency->isEmpty())
            <table id="language-proficiency-show-list" class="display table table-striped responsive nowrap"
                style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>外国語種別</th>
                        <th>学習方法</th>
                        <th>通算年数</th>
                        <th>読む<br>レベル：1～3</th>
                        <th>書く<br>レベル：1～3</th>
                        <th>会話<br>レベル：1～3</th>
                        <th>作成日</th>
                        <th>備考</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skill_data->language_proficiency as $data)
                        <tr>
                            <td></td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->learning_method }}</td>
                            <td>{{ $data->total_date }}</td>
                            <td>{{ $data->read_status }}</td>
                            <td>{{ $data->write_status }}</td>
                            <td>{{ $data->conversation_status }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->memo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    {{-- 職務経歴 --}}
    <div class="sheet-section">
        <p class="h4">職務経歴</p>
        @if (!$skill_project_data->isEmpty())

            <div class="table-container">
                <table id="project-show-list" class="display table table-striped responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>期間</th>
                            <th>
                                <div>プロジェクト名</div>
                                <div>詳細</div>
                            </th>
                            <th>
                                <div>役割</div>
                                <div>規模</div>
                            </th>
                            <th>
                                <div>サーバ</div>
                                <div>OS</div>
                            </th>
                            <th>
                                <div>DB</div>
                            </th>
                            <th>
                                <div>FW・MW</div>
                                <div>ツール等</div>
                            </th>
                            <th>
                                <div>使用言語</div>
                            </th>

                            <th>担当工程</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skill_project_data as $data)
                            <tr>
                                <td></td>
                                <td>No</td>
                                <td>
                                    <div>{{ $data->start_date }}</div>
                                    <div>~</div>
                                    <div>{{ $data->end_date ?? '現在' }}</div>
                                </td>
                                <td>
                                    <div class="border-bottom">{{ $data->name }}</div>
                                    <div class="white-space-pre-wrap">{{ $data->description }}</div>
                                </td>
                                <td>
                                    <div class="border-bottom">
                                        {{ $data->position }}
                                    </div>
                                    <div>
                                        チーム：{{ $data->team_size }}人
                                    </div>
                                    <div>
                                        合計：{{ $data->all_team_size }}人
                                    </div>
                                </td>
                                <td>
                                    <div class="border-bottom">
                                        @foreach ($data->server as $skill_data)
                                            <div>{{ $skill_data->name }}</div>
                                        @endforeach
                                        @foreach ($data->virtual_environment as $skill_data)
                                            <div>{{ $skill_data->name }}</div>
                                        @endforeach
                                    </div>
                                    <div>
                                        @foreach ($data->os as $skill_data)
                                            <div>{{ $skill_data->name }}</div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    @foreach ($data->database as $skill_data)
                                        <div>{{ $skill_data->name }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="border-bottom">
                                        @foreach ($data->framework as $skill_data)
                                            <div>{{ $skill_data->name }}</div>
                                        @endforeach
                                    </div>
                                    <div class="border-bottom">
                                        @foreach ($data->middleware as $skill_data)
                                            <div>{{ $skill_data->name }}</div>
                                        @endforeach
                                    </div>
                                    <div>
                                        @foreach ($data->version_management as $skill_data)
                                            <div>{{ $skill_data->name }}</div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    @foreach ($data->language as $skill_data)
                                        <div>{{ $skill_data->name }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($data['requirement_definition_flag'])
                                        <div>要件定義</div>
                                    @endif
                                    @if ($data['basic_design_flag'])
                                        <div>基本設計</div>
                                    @endif
                                    @if ($data['detailed_design_flag'])
                                        <div>詳細設計</div>
                                    @endif
                                    @if ($data['db_design_flag'])
                                        <div>DB設計</div>
                                    @endif
                                    @if ($data['programming_flag'])
                                        <div>プログラミング</div>
                                    @endif
                                    @if ($data['unit_test_flag'])
                                        <div>単体テスト</div>
                                    @endif
                                    @if ($data['integration_test_flag'])
                                        <div>結合テスト</div>
                                    @endif
                                    @if ($data['system_test_flag'])
                                        <div>総合テスト</div>
                                    @endif
                                    @if ($data['operation_test_flag'])
                                        <div>運用テスト</div>
                                    @endif
                                    @if ($data['system_migration_flag'])
                                        <div>システム移行</div>
                                    @endif
                                    @if ($data['operation_maintenance_flag'])
                                        <div>運用・保守</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@stop

@section('js')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/r-2.5.0/datatables.min.js"></script>
    {{-- 資格 --}}
    <script>
        "use strict";

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const table = $('#qualification-show-list').DataTable({
                language: {
                    url: "{{ asset('lang/ja/pagination.php') }}" // 言語ファイルの相対パスを指定
                },
                serverSide: false,
                scrollY: "65vh",
                scrollCollapse: true,
                responsive: true,
                lengthChange: false,
                searching: false,
                paging: false,
                info: false,



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
                        width: "15%",
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
    {{-- 語学力 --}}
    <script>
        "use strict";

        $(document).ready(function() {

            const table = $('#language-proficiency-show-list').DataTable({
                language: {
                    url: "{{ asset('lang/ja/pagination.php') }}" // 言語ファイルの相対パスを指定
                },
                serverSide: false,
                scrollY: "65vh",
                scrollCollapse: true,
                responsive: true,
                lengthChange: false,
                searching: false,
                paging: false,
                info: false,
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
                        width: "15%",
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
                    {
                        width: "10%",
                    },
                    {
                        width: "10%",

                    },
                    {
                        width: "10%",
                    },
                ],
                order: [
                    [7, 'desc']
                ]
            });
        });
    </script>
    {{-- 職務経歴 --}}
    <script>
        "use strict";
        $(document).ready(function() {
            const table = $('#project-show-list').DataTable({
                language: {
                    url: "{{ asset('lang/ja/pagination.php') }}" // 言語ファイルの相対パスを指定
                },
                serverSide: false,

                responsive: true,
                info: false,
                lengthChange: false,
                paging: false,

                "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-6"i><"col-sm-6"p>>',

                columns: [{
                        className: 'dtr-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        width: "5%"
                    },
                    {
                        orderable: false,
                        width: "3%",
                    },
                    {
                        orderable: false,
                        width: "5%",
                    },

                    {
                        width: "20%"
                    },

                    {
                        width: "5%",
                    },
                    {
                        width: "5%",
                    },
                    {
                        width: "5%",
                    },
                    {
                        width: "5%",
                    },
                    {
                        width: "5%",
                    },
                    {
                        width: "10%",
                    },

                ],

            });
        });
    </script>
@stop
