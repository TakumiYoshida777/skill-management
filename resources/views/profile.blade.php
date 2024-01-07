@extends('adminlte::page')

@section('title', 'SkillManagement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom/profile.css') }}">
@stop

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
@if($errors->has('pr'))
    <div class="alert alert-danger">
        {{ $errors->first('pr') }}
    </div>
@endif
    <form action="{{ url('/profile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- 自己PR --}}
        <div class="my-pr">
            <div class="my-pr-wrap rounded shadow">
                <div class="flex-yx-center">自己PR</div>
                <div class="pr-text">
                    <textarea name="pr" id="prTextArea" cols="255"
                    class="w-100 h-100 p-3 rounded">編集内容を記載してください</textarea>
                </div>
            </div>
            <div class="flex-yx-center">
                <button type="button" id="quoteButton" class="btn btn-primary"
                onclick="quote(event)">←既存の内容を引用</button>
            </div>
            <div class="my-pr-wrap rounded shadow">
                <div class="flex-yx-center">自己PR<br>(既存)</div>
                <div id="prOriginalState" class="p-3 pr-text">
                    {{ $user->pr }}
                </div>
            </div>
        </div>

        {{-- 経験 --}}
        <div>
            <ul>
                <li>
                    <label for=""></label>
                    <input type="checkbox">
                </li>
            </ul>
        </div>


        <button class="btn btn-primary" type="submit">登録</button>
    </form>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src="{{ asset('js/custom/profile.js') }}" defer></script>
@stop
