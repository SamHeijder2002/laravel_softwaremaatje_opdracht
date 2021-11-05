<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;


class todoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
        $todos = Todo::all();

        // $todos = Todo::join('todos', 'todos.user_id', '=', 'users.id')->get(['users.name', 'todos.*']);
        
        // $todos = Todo::crossJoin('users')->get();

        // error_log($todos);

        // $users = User::join('todos', 'users.id', '=', 'todos.user_id')->get(['users.*', 'posts.descrption']);

        // $todos = Todo::find($id);
        // $posted_by = User::find($todos->user_id);

        return view('todo.index', ['Todo' => $todos]);
    }

    public function create(){
        return view('todo.tdListCreate');
    }

    public function createDB(){

        $todo = new Todo();

        $todo->name = request('title');
        $todo->description = request('desc');
        $user = auth()->user();
        $todo->user_id = $user->id;

        if (strlen($todo->name) > 30){
            return redirect('/')->with('msg', 'More than 30 chars used for title!');
        }else{
            if(empty($todo->name) || empty($todo->description)) {
                return redirect('/')->with('msg', '1 or 2 input fields were empty!');
            } else {
                $todo->save();
    
                return redirect('/')->with('msg', 'To-do added');
            }
        }
    }

    public function details($id){

        $todo = Todo::findOrFail($id);

        return view('todo.details', ['todo' => $todo]);
    }

    public function destroy($id){
        $todo = Todo::findOrFail($id)->delete();

        return redirect('/');
    }

    public function updateDB($id){

        $todo = Todo::findOrFail($id);

        $todo->name = request('title');
        $todo->description = request('desc');

        if (strlen($todo->name) > 30){
            return redirect('/')->with('msg', 'More than 30 chars used for title!');
        }else{
            if(empty($todo->name) || empty($todo->description)) {
                return redirect('/')->with('msg', '1 or 2 input fields were empty!');
            } else {
                Todo::where('id',$id)->update(['name' => $todo->name, 'description' => $todo->description]);

                return redirect('/')->with('msg', 'To-do updated');
            }
        }
    }
}
