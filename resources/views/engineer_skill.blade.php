@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/custom/engineer_skill.css') }}">
@stop

@section('content_header')
    <h1>Skills</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger ">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- @include('partials.common.toastr') --}}

    <x-engineer_skill.lang_container :engineerSkills="$engineerSkillLanguages" :langs="$langs"/>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script type="module" src="{{ asset('js/functionality/counter.js') }}" defer></script>
    <script type="module" src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>
@stop
