@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/profile.css') }}">
@stop

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<x-messages.flash_message />

    <form action="{{ url('/profile', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- 自己PR --}}
        <div class="my-pr mx-3 mb-5">
            <input type="hidden" value="{{ $profile->pr }}" id="prOriginalState">
            <div class="my-pr-wrap card">
                <div class="flex-yx-center">
                    <div class="pr-head">
                        <div class="pr-title">
                            自己PR
                        </div>
                        <div class="flex-yx-center">
                            <button type="button" id="quoteButton" class="btn btn-primary"
                                onclick="quote(event)">元に戻す</button>
                        </div>
                    </div>
                </div>
                <div>
                    <textarea name="pr" id="prTextArea" cols="255" class="w-100 h-100 p-3 rounded" required>{{ $profile->pr }}</textarea>
                </div>
            </div>
            <div class="h-100">
                <div class="table-row">
                    <div class="table-cell table-title">生年月日</div>
                    <div class="table-cell">
                        <input type="date" name="birthdate" class="form-control"
                            value="{{ old('birthdate',$profile->birthdate) }}" required>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">役職</div>
                    <div class="table-cell">
                        <input type="text" name="position" class="form-control"
                            value="{{ $profile->position }}" required>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">部署</div>
                    <div class="table-cell">
                        <input type="text" name="division" class="form-control"
                            value="{{ $profile->division }}" required>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">課</div>
                    <div class="table-cell">
                        <input type="text" name="section" class="form-control"
                            value="{{ $profile->section }}">
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-cell table-title">業界経験月数</div>
                    <div class="table-cell">
                        <input type="number" step="0.1" name="industry_experience"
                            class="form-control" value="{{ $profile->industry_experience }}" required>
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
                                        <input name="requirement_definition_flag" type="checkbox" class="primary"
                                            @if ($profile->requirement_definition_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    基本設計
                                    <label class="switch ">
                                        <input name="basic_design_flag" type="checkbox" class="primary"
                                            @if ($profile->basic_design_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    詳細設計
                                    <label class="switch ">
                                        <input name="detailed_design_flag" type="checkbox" class="primary"
                                            @if ($profile->detailed_design_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    DB設計
                                    <label class="switch ">
                                        <input name="db_design_flag" type="checkbox" class="primary"
                                            @if ($profile->db_design_flag) checked @endif>
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
                                            @if ($profile->project_manager_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    Pリーダー
                                    <label class="switch ">
                                        <input name="project_leader_flag" type="checkbox" class="primary"
                                            @if ($profile->project_leader_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    開発
                                    <label class="switch ">
                                        <input name="programming_flag" type="checkbox" class="primary"
                                            @if ($profile->programming_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    システム移行
                                    <label class="switch ">
                                        <input name="system_migration_flag" type="checkbox" class="primary"
                                            @if ($profile->system_migration_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    運用・保守
                                    <label class="switch ">
                                        <input name="operation_maintenance_flag" type="checkbox" class="primary"
                                            @if ($profile->operation_maintenance_flag) checked @endif>
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
                                            @if ($profile->unit_test_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    結合テスト
                                    <label class="switch ">
                                        <input name="integration_test_flag" type="checkbox" class="primary"
                                            @if ($profile->integration_test_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    総合テスト
                                    <label class="switch ">
                                        <input name="system_test_flag" type="checkbox" class="primary"
                                            @if ($profile->system_test_flag) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    運用テスト
                                    <label class="switch ">
                                        <input name="operation_test_flag" type="checkbox" class="primary"
                                            @if ($profile->operation_test_flag) checked @endif>
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
