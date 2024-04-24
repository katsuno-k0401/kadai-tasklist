<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    // 一覧表示
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasksa'));
    }

    // 新規作成フォーム表示
    public function create()
    {
        return view('tasks.create');
    }

    // 新規作成処理
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Task::create($request->all());

        return redirect()->route('tasklist.index')->with('success', 'Task created successfully.');
    }

    // 詳細表示
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    // 編集フォーム表示
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('tasklist.index')->with('success', 'Task updated successfully.');
    }

    // 削除処理
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasklist.index')->with('success', 'Task deleted successfully.');
    }
}