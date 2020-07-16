<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefecture;
use Exception;

class ManagerController extends Controller
{
    public function userlist(Request $request)
    {
        try {
            $searchResult = User::search($request);

            return view('manager/userlist')->with([
                'genders' => Gender::all(),
                'prefectures' => Prefecture::all(),
                'inputs' => $searchResult['searchCriteria'],
                'userlist' => $searchResult['userlist'],
            ]);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    public function userdetail($id)
    {
        $user = User::find($id);

        $user['gender_name'] = $user->gender->name;
        $user['prefecture_name'] = $user->prefecture->name;

        return view('manager/userdetail')->with('user', $user);
    }
}
