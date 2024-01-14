@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/custom/engineer_skill.css') }}">
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
    {{-- @include('partials.common.toastr') --}}
    <form action="{{ url('/skills', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="skills-container">
            <div id="langContainer" class="inner-container card w-25 p-3">
                <div class="head-title w-100 pb-3 border-bottom d-flex justify-content-center align-items-center">
                    言語
                </div>
                @php
                    $languagePlaceholder = '言語入力してください';
                @endphp
                <div id="recordContainer" class="test">
                    <div class="record border-bottom py-2">
                        <div class="item">
                            <i class="fas fa-minus delete-btn" onclick="deleteRecord(event)"></i>
                        </div>
                        <div class="item">
                            <input type="text" name="language" class="skill-input" placeholder="{{ $languagePlaceholder }}">
                        </div>
                        <div class="item">
                            <input type="number" name="month" class="month-input" value="1">ヵ月
                        </div>
                    </div>
                </div>
                <div class="plus  w-100 d-flex justify-content-around align-items-center mt-3">
                    <button class="btn btn-success" type="button"
                        onclick="addRecord(event, '{{ $languagePlaceholder }}')">追加</button>
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src="{{ asset('js/custom/engineer_skill.js') }}" defer></script>
@stop
