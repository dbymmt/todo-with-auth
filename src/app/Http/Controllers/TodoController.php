<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    //
    public function index(){
        //$todos = Todo::all();
        $todos = Auth::user()->todos;
        return view('index', ['todos' => $todos]);
    }

    public function store(TodoRequest $request){
        Todo::create([
            'user_id' => Auth::id(),
            'action' => $request->content,
        ]);
        return redirect('/')->with('message', 'Todo作成した');
    }

    public function update(TodoRequest $request){
        Todo::find($request->id)->update([
            'action' => $request->content,
        ]);

        return redirect('/')->with('message', 'Todo更新しますた');
    }

    public function destroy(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todo削除しますた');
    }

}
