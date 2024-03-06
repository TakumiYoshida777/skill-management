@extends('adminlte::page')

@section('title', 'SkillSheetCreator')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/engineer_skill.css') }}">
@stop

@section('content_header')
    <h1>エンジニアスキル</h1>
    <span class="text-red">※実務経験のあるスキルのみ登録してください。</span>
    {{-- <span>実務未経験の場合は<a href="">実務未経験スキル</a>より登録してください</span> --}}
@stop

@section('content')
<x-messages.flash_message />
    <div class="skill-card-container">
        @php
            $keyword = 'Language';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillLanguages" :listData="$langs" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'Framework';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillFrameworks" :listData="$frameworks" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'Database';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillDatabases" :listData="$databases" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'Middleware';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillMiddlewares" :listData="$middlewares" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'OS';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillOses" :listData="$oses" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'Server';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillServers" :listData="$servers" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'VirtualEnvironment';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillVirtualEnvironments" :listData="$virtualEnvironments" :keyword="$keyword" :title="$keyword" />
        @php
            $keyword = 'VersionManagement';
        @endphp
        <x-engineer_skill.skill_container :engineerSkills="$engineerSkillVersionManagement" :listData="$versionManagement" :keyword="$keyword" :title="$keyword" />
    </div>
@stop

@section('js')
    {{-- <script type="module" src="{{ asset('js/custom/engineer_skill.js') }}" defer></script> --}}
@stop
