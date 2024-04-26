@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザー情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('tasks.index')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="navbar-brand d-flex flex-row-reverse bd-highlight">
                Welcome to the Microposts
            </div>
        </div>
    @endif
@endsection

