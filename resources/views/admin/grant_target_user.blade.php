@extends('adminlte::page')

@section('title', 'SkillSheetCreator')

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom/grant_permissions.css') }}">


@stop

@section('content_header')
    <h1>管理者用_権限付与</h1>

@stop

@section('content')
    <x-messages.flash_message />
    <div class="grid-container">
        <div class="grid-body w-25">
            <div class="grid-record">
                <div class="grid-ritem">氏名</div>
                <div class="grid-ritem">{{ $target_user->last_name }}&nbsp;{{ $target_user->first_name }}</div>
            </div>
            <div class="grid-record">
                <div class="grid-ritem">email</div>
                <div class="grid-ritem">{{ $target_user->email}}</div>
            </div>
            <div class="grid-record">
                <div class="grid-ritem">生年月日</div>
                <div class="grid-ritem">{{ $target_user->profile->birthdate }}</div>
            </div>
            <div class="grid-record">
                <div class="grid-ritem">役職</div>
                <div class="grid-ritem">{{ $target_user->profile->position }}</div>
            </div>
        </div>
    </div>
        <form action="{{ route('update_grant', $target_user->id) }}" method="POST">
            @csrf
            <div class="card w-50">
                <!-- Default panel contents -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        ユーザー
                        <label class="switch ">
                            <input name="role_id" type="radio" class="primary" value="1"
                                @if ($target_user->role_id == 1) checked @endif
                                >
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        管理者
                        <label class="switch">
                            <input name="role_id" type="radio" class="primary" value="2"
                                @if ($target_user->role_id == 2) checked @endif
                                >
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="list-group-item">
                        システムオーナー
                        <label class="switch">
                            <input name="role_id" type="radio" class="primary" value="3"
                            @if ($target_user->role_id == 3) checked @endif
                            @disabled(true)
                                >
                            <span class="slider round"></span>
                        </label>
                    </li>

                </ul>
            </div>
            <button class="btn btn-primary">登録</button>
        </form>


@stop

@section('js')
@stop
