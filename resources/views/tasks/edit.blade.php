@extends('layouts.app')

@section('content')
   <div class="prose ml-4">
        <h2 class="text-lg">id: {{ $task->id }} の編集ページ</h2>
    </div>
        <!-- フォームを追加 -->
　　　　<div class="flex justify-center">
        <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="w-1/2">
            @csrf
            @method('PUT')

                   <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">タスク:</span>
                    </label>
                    <input type="text" name="content" value="{{ $task->content }}" class="input input-bordered w-full">
                    @if ($errors->has('content'))
            <div class="alert alert-danger mt-2">{{ $errors->first('content') }}</div>
            @endif
                </div>

                <div class="form-control my-4">
                    <label for="status" class="label">
                        <span class="label-text">ステータス:</span>
                    </label>
                    <input type="text" name="status" value="{{ $task->status }}" class="input input-bordered w-full">
                    @if ($errors->has('status'))
            <div class="alert alert-danger mt-2">{{ $errors->first('status') }}</div>
            @endif
                </div>
            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
@endsection