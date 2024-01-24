<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\TodoRequest;
use App\Models\Category;

class TodoController extends Controller
{
    //
    // protected $user;

    // public function __construct(){
    //     $this->user = Auth::user();
        
    // }

    public function index(){
        //$todos = Todo::where('user_id', Auth::user()->id)->get();
        $todos = Todo::User(Auth::user()->id)->get();
        $categories = Category::all();
        return view('index', ['todos' => $todos, 'categories' => $categories]);
    }

    public function store(TodoRequest $request){
        Todo::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
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

    public function search(Request $request)
    {
        //$todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        // $todos = Auth::user()->todos->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $todos = Todo::where('user_id', Auth::user()->id)->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }

}
