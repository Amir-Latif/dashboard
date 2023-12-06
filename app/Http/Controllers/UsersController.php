<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use ValidatesRequests;
    #region Views
    public function view_user_list()
    {
        $users = User::get();
        foreach ($users as $user) {
            $user->plan = Plan::where("id", $user->plan_id)->first()->plan;
            $user->role = Role::where("id", $user->role_id)->first()->role;
            unset($user->plan_id);
            unset($user->role_id);
        }

        return view(
            'pages.user-list',
            [
                'users' =>  $users,
                'users_count' => $users->count(),
                'paid_users' => User::where("paid", true)->count(),
                'active_users' => User::where("status", "active")->count(),
                'pending_users' => User::where("status", "pending")->count(),
                'roles' => Role::pluck("role")->toArray(),
                'plans' => Plan::pluck("plan")->toArray(),
            ]
        );
    }
    #endregion Views

    #region APIs
    public function add_user(Request $request)
    {
        $request->validate(User::$rules);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'country' => $request->country,
            'role_id' => Role::where("role", $request->role)->first()->id,
            'plan_id' => Plan::where("plan", $request->plan)->first()->id,
        ]);

        return $user->save();
    }

    public function delete_user(string $id)
    {
        return User::where("id", $id)->delete();
    }
    #endregion APIs
}
