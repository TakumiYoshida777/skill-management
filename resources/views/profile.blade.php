@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/profile.css') }}">
@stop

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
    {{-- @if ($errors->has('pr'))
        <div class="alert alert-danger">
            {{ $errors->first('pr') }}
        </div>
    @elseif ($errors->has('industry_experience_months'))
        <div class="alert alert-danger">
            {{ $errors->first('industry_experience_months') }}
        </div>
    @endif --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/profile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- 自己PR --}}
        <div class="my-pr mx-3 mb-5">
            <input type="hidden" value="{{ $user->pr }}" id="prOriginalState">
            <div class="my-pr-wrap shadow">
                <div class="flex-yx-center">
                    <div class="pr-head">
                        <div>
                            自己PR
                        </div>
                        <div class="flex-yx-center">
                            <button type="button" id="quoteButton" class="btn btn-primary"
                                onclick="quote(event)">元に戻す</button>
                        </div>
                    </div>
                </div>
                <div class="pr-text">
                    <textarea name="pr" id="prTextArea" cols="255" class="w-100 h-100 p-3 rounded" required>{{ $user->pr }}</textarea>
                </div>
            </div>
            <div class="profile-table shadow h-100">
                <div class="table-row">
                    <div class="table-cell table-title">生年月日</div>
                    <div class="table-cell">
                        <input type="date" name="birthdate" id="" class="w-100 h-100 border-0 px-1"
                            value="{{ $user->birthdate }}" required>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">役職</div>
                    <div class="table-cell">
                        <input type="text" name="position" id="" class="w-100 h-100 border-0 px-1"
                            value="{{ $user->position }}" required>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">部署</div>
                    <div class="table-cell">
                        <input type="text" name="division" id="" class="w-100 h-100 border-0 px-1"
                            value="{{ $user->division }}" required>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">課</div>
                    <div class="table-cell">
                        <input type="text" name="section" id="" class="w-100 h-100 border-0 px-1"
                            value="{{ $user->section }}">
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">経験年数</div>
                    <div class="table-cell">
                        <input type="text" name="industry_experience_months" id=""
                            class="w-100 h-100 border-0 px-1" value="{{ $user->industry_experience_months }}">
                    </div>
                </div>
            </div>

        </div>

        {{-- 経験 --}}
        <div>
            <p class="h5">担当可能工程<span class="ml-2 small">※自身が担当したことのある工程を選択してください</span></p>
            <div class="grid-wrapper">
                <div class=" row mx-3">
                    <div class="w-100">
                        <div class="card">
                            <!-- Default panel contents -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    要件定義
                                    <label class="switch ">
                                        <input name="requirements_definition_flag" type="checkbox" class="primary"
                                            @if ($user->requirements_definition_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    基本設計
                                    <label class="switch ">
                                        <input name="basic_design_flag" type="checkbox" class="primary"
                                            @if ($user->basic_design_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    詳細設計
                                    <label class="switch ">
                                        <input name="detailed_design_flag" type="checkbox" class="primary"
                                            @if ($user->detailed_design_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    DB設計
                                    <label class="switch ">
                                        <input name="db_design_flag" type="checkbox" class="primary"
                                            @if ($user->db_design_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" row mx-3">
                    <div class="w-100">
                        <div class="card">
                            <!-- Default panel contents -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Pマネージャー
                                    <label class="switch ">
                                        <input name="project_manager_flag" type="checkbox" class="primary"
                                            @if ($user->project_manager_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    Pリーダー
                                    <label class="switch ">
                                        <input name="project_leader_flag" type="checkbox" class="primary"
                                            @if ($user->project_leader_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    開発
                                    <label class="switch ">
                                        <input name="development_flag" type="checkbox" class="primary"
                                            @if ($user->development_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    システム移行
                                    <label class="switch ">
                                        <input name="system_migration_flag" type="checkbox" class="primary"
                                            @if ($user->system_migration_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    運用・保守
                                    <label class="switch ">
                                        <input name="operation_maintenance_flag" type="checkbox" class="primary"
                                            @if ($user->operation_maintenance_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" row mx-3">
                    <div class="w-100">
                        <div class="card">
                            <!-- Default panel contents -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    単体テスト
                                    <label class="switch ">
                                        <input name="unit_test_flag" type="checkbox" class="primary"
                                            @if ($user->unit_test_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    結合テスト
                                    <label class="switch ">
                                        <input name="integration_test_flag" type="checkbox" class="primary"
                                            @if ($user->integration_test_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    総合テスト
                                    <label class="switch ">
                                        <input name="system_test_flag" type="checkbox" class="primary"
                                            @if ($user->system_test_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end px-3 mt-3">
            <button class="btn btn-primary" type="submit">登録</button>
        </div>
    </form>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src="{{ asset('js/custom/profile.js') }}" defer></script>
@stop
