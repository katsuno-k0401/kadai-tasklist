<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    // 一覧表示
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // 新規作成フォーム表示
    public function create()
    {
        return view('tasks.create');
    }

    // 新規作成処理
    public function store(Request $request)
    {
      // バリデーション
        $request->validate([
            'content' => 'required|max:255',   // 追加
            'status' => 'required|max:10',// 10文字を超える文字数を許さないバリデーションを追加
        ]);

        // メッセージを作成
        $task = new Task;
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();
        $task->user_ID=$id;
        $task->content = $request->content;    // 追加
        $task->status = $request->status;
        $task->save();
                // トップページへリダイレクトさせる
        return redirect('/');
    }

    // 詳細表示
    public function show($id)
    {
        $task = Task::findOrFail($id);
        // タスクのユーザーIDとログインユーザーのIDを比較し、異なる場合はトップページにリダイレクト
    if (!Auth::check() ||$task->user_id !== Auth::id()) {
        return redirect()->route('tasks.index')->with('error', 'You are not authorized to access this task.');
    }
        return view('tasks.show', compact('task'));
    }

    // 編集フォーム表示
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        // タスクのユーザーIDとログインユーザーのIDを比較し、異なる場合はトップページにリダイレクト
    if (!Auth::check() ||$task->user_id !== Auth::id()) {
        return redirect()->route('tasks.index')->with('error', 'You are not authorized to edit this task.');
    }
        return view('tasks.edit', compact('task'));
    }

    // 更新処理

      // putまたはpatchでmessages/idにアクセスされた場合の「更新処理」
 public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',   // 追加
            'status' => 'required|max:10',// 10文字を超える文字数を許さないバリデーションを追加
        ]);

        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
        // メッセージを更新
        $task->status = $request->status;    // 追加
        $task->content = $request->content;
        $task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // 削除処理
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}