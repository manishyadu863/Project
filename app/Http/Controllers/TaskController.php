<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%')
                ->orWhere('description', 'like', '%' . $request->input('search') . '%')
                ->orWhere('priority', 'like', '%' . $request->input('search') . '%')
                ->orWhere('status', 'like', '%' . $request->input('search') . '%');
        }

        $tasks = $query->paginate(3);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        if (session()->has('id')) {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable|max:255',
                'priority' => 'required|max:255',
                'due_date' => 'required|nullable|max:255',

            ]);
            $task = Task::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'priority' => $request->input('priority'),
                'due_date' => $request->input('due_date')

            ]);
            if ($task) {
                return redirect()->route('tasks.index')->with('alert-success', 'Task created successfully');
            } else {
                return redirect()->route('tasks.create')->with('alert-danger', 'Task is not created');
            }
        } else {
            return redirect('login')->with('alert-danger', 'Please log into a System');
        }
    }

    public function edit($id)
    {
        if (session()->has('id')) {
            $task = Task::find($id);
            if (!$task) {
                abort(404);
            }
            return view('tasks.edit', compact('task'));
        } else {
            return redirect('login')->with('alert-danger', 'Please log into the system');
        }
    }

    public function update(Request $request, $id)
    {
        if (session()->has('id')) {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable|max:255',
                'priority' => 'required|in:low,medium,high',
                'status' => 'required|in:Pending,Completed',
                'due_date' => 'required|date',
            ]);

            $task = Task::find($id);
            if (!$task) {
                abort(404);
            }

            $task->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'priority' => $request->input('priority'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('tasks.index')->with('alert-success', 'Task updated successfully');
        } else {
            return redirect('login')->with('alert-danger', 'Please log into the system');
        }
    }

    public function destroy(Request $request, string $id)
    {
        if (session()->has('id')) {
            $task = Task::find($id);
            if (!$task) {
                abort(404);
            }
            $task->delete();
            return redirect()->route('tasks.index')->with('alert-success', 'Task deleted successfully');
        } else {
            return redirect('login')->with('alert-danger', 'Please log into a System');
        }
    }
    public function show()
    {
        if (session()->has('id')) {
        $completedTasks = Task::where('status', 'completed')->get();
        if(!$completedTasks){
            abort('404');
        }
        return view('tasks.show', compact('completedTasks'));
        }
        else{
            return redirect('login')->with('alert-danger', 'Please log into a System');
        }
    }


    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function loginUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5|',
        ]);

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            if ($user->status == "Blocked") {
                return redirect('login')->with('alert-danger', 'Your Status is Blocked');
            }
            session()->put('id', $user->id);
            session()->put('type', $user->type);
            if ($user->type == 'Customer') {
                return redirect()->route('tasks.index')->with('alert-success', 'Congratulation you have successfully Loggedin');
            }
            if ($user->type == 'Admin') {
                return redirect('adminIndex')->with('alert-success', 'Congratulation you have successfully Loggedin');
            }
        } else {

            return redirect('login')->with('alert-danger', 'Invalid Email or Password');
        }
    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('type');
        return redirect()->route('tasks.index')->with('alert-success', 'Logout successfully');
    }
    public function registerUser(Request $request)
    {

        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|'
        ]);

        $newUser = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->input('password')), // Hash the password
            'type' => "Customer"


        ]);

        if ($newUser->save()) {


            return redirect('login')->with('alert-success', 'Congratulation your account is created');
        }
    }

    public function updateUser(Request $request)
    {
        $user = User::find(session()->get('id'));
        if (!$user) {
            return redirect()->back()->with('alert-danger', 'user not found');
        }

        $user->update([
            'fullname' => $request->fullname,
            'password' => $request->password,

        ]);

        if ($user->save()) {


            return redirect()->back()->with('alert-success', 'Congratulation your account is updated');
        }
    }



}
