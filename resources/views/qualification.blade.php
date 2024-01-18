@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/language_proficiency.css') }}">
@stop

@section('content_header')
    <h1>資格/トレーニング</h1>
@stop

@section('content')
    <x-messages.flash_message />


@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script type="module" src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>
@stop
