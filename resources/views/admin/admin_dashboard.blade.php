@extends('adminlte::page')

@section('title', 'SkillSheetCreator')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/custom/engineer_skill.css') }}">
@stop

@section('content_header')
    <h1>管理者用_管理画面</h1>

@stop

@section('content')
<x-messages.flash_message />

@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script type="module" src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>
@stop
