<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function adminIndex()
    {
        if (session()->get('type') == 'Admin') {
            return view('Dashboard.adminIndex');
        }
        return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    }

    public function adminProfile()
    {
        if (session()->get('type') == 'Admin') {
            $user = User::find(session()->get('id'));
            return view('Dashboard.adminProfile', compact('user'));
        }
        return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    }

    public function ourCustomers()
    {
        if (session()->get('type') == 'Admin') {
            $customers = User::where('type', 'Customer')->get();
            return view('Dashboard.customers', compact('customers'));
        }
        return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    }

    public function ourTask()
    {
        if (session()->get('type') == 'Admin') {
            $tasks = Task::all();
            return view('Dashboard.tasks', compact('tasks'));
        }
        return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    }

    public function changeUserStatus($status, $id)
    {
        if (session()->get('type') == 'Admin') {
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->with('alert-danger', 'User not found');
            }
            $user->status = $status;
            $user->save();
            return redirect()->back()->with('alert-info', 'Congratulation your status changed  successfully');
        }
        return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    }

    public function changeTaskStatus($status, $id)
    {
        if (session()->get('type') == 'Admin') {
            $user = Task::find($id);
            if (!$user) {
                return redirect()->back()->with('alert-danger', 'Task not found');
            }
            $user->status = $status;
            $user->save();
            return redirect()->back()->with('alert-info', 'Congratulation your status changed  successfully');
        }
        return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    }
    // public function changeOrderStatus($status, $id)
    // {
    //     if (session()->get('type') == 'Admin') {
    //         $orders = Order::find($id);
    //         if (!$orders) {
    //             return redirect()->back()->with('alert-danger', 'Order not found');
    //         }
    //         $orders->status = $status;
    //         $orders->save();
    //         return redirect()->back()->with('alert-success', 'Oreder status updated successfully');
    //     }
    //     return redirect()->back()->with('alert-danger', 'you cannot be access admin page');
    // }

}
