<?php

namespace App\Http\Controllers;
use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {

    	$todos = Todo::all();	
    	return view('todos')->with('todos', $todos);

    } // end of index function


    public function store(Request $request) {

    	$todo = new Todo; # Creating new instance of DB

    	$todo->todo = $request->todo; # think of it as new row in database table.
    	$todo->save();

    	return redirect()->back();



    } // end of store function


    public function delete($id) {

    	$todo = Todo::find($id);
    	$todo->delete();

    	return redirect()->back();

    } // end of delete funtion


    public function update($id) {

    	$todo = Todo::find($id);

    	return view('update')->with('todo', $todo);
    } // end of update function


    public function save(Request $request, $id) {

    	$todo = Todo::find($id);
    	
        $todo->todo = $request->todo;

        $todo->save();

        return redirect()->back();

    } // end of save function


    public function completed($id) {

        $todo = Todo::find($id);


        $todo->completed = 1;
        $todo->save();

        return redirect()->back();

    } // end of completed function

}
