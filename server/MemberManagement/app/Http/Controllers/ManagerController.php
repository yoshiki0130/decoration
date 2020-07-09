<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefecture;
use Exception;

class ManagerController extends Controller
{
    public function userlist()
    {
        try {
            $users = User::all();

            foreach ($users as $user) {
                $user['gender_name'] = $user->gender->name;
                $user['prefecture_name'] = $user->prefecture->name;
            }

            return view('manager/userlist')->with('userlist', $users);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }
}
