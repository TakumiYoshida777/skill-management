@extends('adminlte::page')

@section('title', 'SkillsheetCreator')

@section('css')


@stop

@section('content_header')
    <h1>管理者用_権限付与</h1>

@stop

@section('content')
<x-messages.flash_message />

<div class="container">
    <form action="{{ route("grant_target_user") }}" method="POST">
        @csrf
        <label for="target_email">対象のメールアドレス</label>
        <div class="d-flex align-items-center">
            <input class="form-control w-75 ml-2" type="email" name="target_email" id="target_email">
            <button type="submit" class="btn btn-primary ml-2">検索</button>
        </div>
    </form>
</div>


@stop

@section('js')
@stop
