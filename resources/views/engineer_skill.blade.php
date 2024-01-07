@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/.css') }}">
@stop

@section('content_header')
    <h1>Skills</h1>
@stop

@section('content')
    @if ($errors->has('pr'))
        <div class="alert alert-danger">
            {{ $errors->first('pr') }}
        </div>
    @endif
    <form action="{{ url('/profile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

    </form>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>
@stop
