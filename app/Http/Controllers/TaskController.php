<?php 
namespace todo\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller {

    public function index()
	{
        $tasks = \todo\tarea::All();
		return view("tasks",compact('tasks'));
	}

    public function create(Request $request)
	{   
        \todo\tarea::Create([
            'nombre'=> $request->input('task'),   
        ]);       
        return redirect("/")->with('message','store');
	}

    public function destroy($id)
	{
		\todo\tarea::destroy($id);
        return redirect("/")->with('message','delete');
	}

}
