<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;
use Illuminate\Support\Facades\Redis;

class TodoController extends Controller
{
    public function index(){
        $data = Todos::get();
        // return $data;
        return view('todo-list', compact('data'));
    }

    public function addTodo(){
        return view('add-todo');
    }

    public function saveTodo(Request $request){
        // validating the form
        $request->validate([
        'todo' => 'required'
        ]);

        // dd($request->all());
        $todolist = $request->todo;

        $todo = new Todos();
        $todo->todolist = $todolist;

        $todo->save();

        return redirect()->back()->with('success', 'todo added successfully');
    }

    public function editTodo($id){

        $data = Todos::where('id', '=', $id)->first();

        // return $data;

        return view('edit-todo', compact('data'));
        
    }

    public function updateTodo(Request $request){
        // validating the form
        $request->validate([
            'todo' => 'required'
        ]);

        $id = $request->id;
        $todolist = $request->todo;

        Todos::where('id', '=', $id)->update([
            'todolist' => $todolist
        ]);

        return redirect()->back()->with('success', 'Todo has been updated successfully');
    }

    public function deleteTodo($id){
        Todos::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Your todo list has been deleted  successfully');
    }
}
