<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Count tasks in progress
        $data['tasksInProgress'] = Task::where('status', 0)->count();
        // Count completed tasks
        $data['tasksCompleted'] = Task::where('status', 1)->count();
        $data['users'] = Task::where('status', 1)->count();
        // Count users who have at least one in progress task
        $data['usersWithInProgressTasks'] = User::whereHas('tasks', function ($query) {
            $query->where('status', 0);
        })->count();

        // $data['tasks'] = Task::where('due_date', '>=', Carbon::today())
        //      ->where('due_date', '<=', Carbon::today()->addMonths(3))
        //      ->get();

        $data['tasks'] = Task::where('due_date', '<', Carbon::now())
        ->where('status', 0)->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.index',$data);
    }


      // Show all tasks that are in progress
      public function showTasksInProgress()
      {
          $tasks = Task::with('user')->where('status',0)->paginate(5);
          $title = "In Progress";
          return view('dashboard.tasks.index', compact('tasks','title'));
        }
      // Show all tasks assigned to a specific user
        public function showTasksCompleted()
        {
         $tasks = Task::with('user')->where('status',1)->paginate(5);
         $title = "Completed";
         return view('dashboard.tasks.index', compact('tasks','title'));
        }

         // Show users with in progress tasks 
         public function showUsersInProgressTasks()
         {
          $users = User::whereHas('tasks', function ($query) {
            $query->where('status', 0);})->paginate(10);
          $title = "with In Progress Tasks";
          return view('dashboard.users.index', compact('users','title'));
         }
}
