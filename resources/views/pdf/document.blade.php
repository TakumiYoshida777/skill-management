<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <style>
        .ml-1rem {
            margin-left: 16px;
        }

        .sheet-title {
            text-align: center;
        }

        .date {
            text-align: right;
        }

        .skill-left-head {
            width: 80px;
            max-width: 80px;
            min-width: 80px;
        }

        .title {
            margin-bottom: 4px;
            font-size: 12px;
        }

        #header {
            width: 720px;
            height: 100px;
            background-color: #aaa;
        }

        table {
            width: 100%;
            /* テーブルの幅をページ全体に広げる */
            border-collapse: collapse;
            /* セルの境界線を合わせる */
        }

        th,
        td {
            border: 1px solid #000;
            /* 黒の細い境界線 */
            padding: 5px;
            /* セル内の余白 */
            text-align: center;
            /* テキストを中央揃え */
        }

        th {
            background-color: #8ab3e1;
            /* ヘッダーの背景色 */
        }

        /* PRのブロック */
        .pr-table {
            width: 70%;
        }

        .white-space-pre-wrap {
            white-space: pre-wrap;
        }

        .category-accent {
            background-color: #ffff00;
            /* カテゴリヘッダーの背景色（黄色） */
        }


        .age-head {
            width: 60px;
        }

        .md-height {
            height: 45px;
        }

        .lg-height {
            min-height: 60px;
            height: auto;
        }


        /* 自己PR */
        .pr-body {
            width: 1200px;
        }

        /* 技術体験 */
        .skills-name {
            width: 15%;
        }

        /* .skills-month {
            width: 7%;
        } */

        /* 職務経歴 */
        /* .project-description {
            min-height: 80px
        } */
    </style>
</head>

<body>
    <h2 class="sheet-title">スキルシート</h2>
    <div class="date">{{ \Carbon\Carbon::now()->format('Y年m月d日') }}</div>
    <table border="1" class="pr-table">
        <tr>
            <th class="skill-left-head">ふりがな</th>
            <td class="">sdfsdfsdf</td>
            <th rowspan="2" class="age-head">年齢</th>
            <td rowspan="2">{{ $user_age }}</td>
        </tr>
        <tr>
            <th class="skill-left-head md-height">イニシャル</th>
            <td>{{ $initial_user_name }}</td>
        </tr>
        <tr>
            <th class="skill-left-head lg-height white-space-pre-wrap">自己PR</th>
            <td colspan="4" class="category-accent">
                {{ $skill_data->profile->pr }}ストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </td>
        </tr>
    </table>

    <p class="title ">技術体験</p>
    <table>
        <tbody>
            @php
                $item_data = array_merge($skill_data->os->toArray(), $skill_data->server->toArray());
                $item_length = count($item_data);
                $count_record = ceil($item_length / 4);
                $datas = $item_data;
            @endphp
            @if (count($item_data))
                @for ($i = 0; $i < $count_record; $i++)
                    <tr>
                        @if ($i == 0)
                            <th rowspan="{{ $count_record }}" class="skill-left-head">サーバ OS</th>
                        @endif
                        @for ($j = 0; $j < 4; $j++)
                            @php
                                $index = $i * 4 + $j;
                            @endphp
                            @if ($index < $item_length)
                                <td class="skills-name">{{ $datas[$index]['name'] }}</td>
                                <td class="skills-month">{{ $datas[$index]['experience_months'] }}ヵ月</td>
                            @else
                                <td class="skills-name"></td>
                                <td class="skills-month"></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            @endif

            @php
                $item_length = count($skill_data->database);
                $count_record = ceil($item_length / 4);
                $datas = $skill_data->database;
            @endphp
            @if ($item_length)
                @for ($i = 0; $i < $count_record; $i++)
                    <tr>
                        @if ($i == 0)
                            <th rowspan="{{ $count_record }}" class="skill-left-head">DB</th>
                        @endif
                        @for ($j = 0; $j < 4; $j++)
                            @php
                                $index = $i * 4 + $j;
                            @endphp
                            @if ($index < $item_length)
                                <td class="skills-name">{{ $datas[$index]['name'] }}</td>
                                <td class="skills-month">{{ $datas[$index]['experience_months'] }}ヵ月</td>
                            @else
                                <td class="skills-name"></td>
                                <td class="skills-month"></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            @endif
            @php
                $item_length = count($skill_data->language);
                $count_record = ceil($item_length / 4);
                $datas = $skill_data->language;
            @endphp
            @if ($item_length)
                @for ($i = 0; $i < $count_record; $i++)
                    <tr>
                        @if ($i == 0)
                            <th rowspan="{{ $count_record }}" class="skill-left-head">言語</th>
                        @endif
                        @for ($j = 0; $j < 4; $j++)
                            @php
                                $index = $i * 4 + $j;
                            @endphp
                            @if ($index < $item_length)
                                <td class="skills-name">{{ $datas[$index]['name'] }}</td>
                                <td class="skills-month">{{ $datas[$index]['experience_months'] }}ヵ月</td>
                            @else
                                <td class="skills-name"></td>
                                <td class="skills-month"></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            @endif
            @php
                $item_data = array_merge($skill_data->framework->toArray(), $skill_data->middleware->toArray());
                $item_length = count($item_data);
                $count_record = ceil($item_length / 4);
                $datas = $item_data;
            @endphp
            @if (count($item_data))
                @for ($i = 0; $i < $count_record; $i++)
                    <tr>
                        @if ($i == 0)
                            <th rowspan="{{ $count_record }}" class="skill-left-head">MW/FW</th>
                        @endif
                        @for ($j = 0; $j < 4; $j++)
                            @php
                                $index = $i * 4 + $j;
                            @endphp
                            @if ($index < $item_length)
                                <td class="skills-name">{{ $datas[$index]['name'] }}</td>
                                <td class="skills-month">{{ $datas[$index]['experience_months'] }}ヵ月</td>
                            @else
                                <td class="skills-name"></td>
                                <td class="skills-month"></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>


    @if (!$skill_data->qualification->isEmpty())
        <p class="title">資格/トレーニング</p>
        <table>
            <thead>
                <tr>
                    <th>取得日</th>
                    <th>内容</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skill_data->qualification as $data)
                    <tr>
                        <td>{{ $data->issue_date }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->memo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if (!$skill_data->language_proficiency->isEmpty())
        <p class="title">語学力</p>
        <table>
            <thead>
                <tr>
                    <th>外国語種別</th>
                    <th>学習方法</th>
                    <th>通算年数</th>
                    <th>読む<br>レベル1~3</th>
                    <th>書く<br>レベル1~3</th>
                    <th>会話<br>レベル1~3</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skill_data->language_proficiency as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->learning_method }}</td>
                        <td>{{ $data->total_date }}</td>
                        <td>{{ $data->read_status }}</td>
                        <td>{{ $data->write_status }}</td>
                        <td>{{ $data->conversation_status }}</td>
                        <td>{{ $data->memo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p class="title">職務経歴</p>
    <table id="project">
        <thead>
            <tr>
                <th style="width: 4%;">No.</th>
                <th style="width: 10%;">期間<br>(移動)</th>
                <th style="width: 25%;">プロジェクト名<br>(業務概要)</th>
                <th style="width: 8%;">役割<br>規模</th>
                <th style="width: 10%;">サーバ<br>OS</th>
                <th style="width: 10%;">DB</th>
                <th style="width: 10%;">FW/MW<br>ツール等</th>
                <th style="width: 10%;">使用言語</th>
                <th style="width: 11%;">担当工程</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skill_project_data as $index => $data)
                <tr class="lg-height">
                    <th rowspan="2">{{ $index + 1 }}</th>
                    @php
                        $start = \Carbon\Carbon::parse($data->start_date);
                        $end = $data->end_date ? \Carbon\Carbon::parse($data->end_date) : \Carbon\Carbon::now();
                        $months = $start->diffInMonths($end, true);
                    @endphp
                    <td rowspan="2">
                        {{ $data->start_date }}<br>~<br>{{ $data->end_date ? $data->end_date : '現在' }}<br>{{ $data->end_date ? '(' . $months . 'ヶ月)' : '' }}
                    </td>
                    <td>
                        {{ $data->name }}
                    </td>
                    <td>チーム{{ $data->team_size }}名</td>
                    {{-- @php
                          $item_datas = array_merge($skill_project_data->server->toArray(), $skill_project_data->os->toArray());
                    @endphp --}}
                    <td rowspan="2">
                        @foreach ($data->os as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                        @foreach ($data->server as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                        @foreach ($data->virtual_environment as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                    </td>

                    <td rowspan="2">
                        @foreach ($data->database as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                    </td>
                    <td rowspan="2">
                        @foreach ($data->framework as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                        @foreach ($data->middleware as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                        @foreach ($data->version_management as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                    </td>
                    <td rowspan="2">
                        @foreach ($data->language as $d)
                            <div>{{ $d->name }}</div>
                        @endforeach
                    </td>
                    <td rowspan="2">

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
                <tr>
                    <td height="100" class="project-description white-space-pre-wrap">
                        {{ $data->description }}
                    </td>
                    <td>
                        全体{{ $data->all_team_size }}名
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
