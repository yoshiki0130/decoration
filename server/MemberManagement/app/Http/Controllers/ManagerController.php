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
            $genders = Gender::all();
            $prefectures = Prefecture::all();

            $query = User::query();

            $inputs = $request->only([
                'name1', 'name2', 'gender_id', 'prefecture_id', 'min', 'max'
            ]);
            foreach (array_intersect_key($inputs, array_flip(['name1', 'name2'])) as $k => $v) {
                if (is_null($v)) continue;
                $query->where($k, 'like', '%' . $v . '%');
            }
            foreach (array_intersect_key($inputs, array_flip(['gender_id', 'prefecture_id'])) as $k => $v) {
                if (is_null($v)) continue;
                $query->where($k, $v);
            }
            if (!is_null($request->get('min'))) {
                $query->where('created_at', '>=', $request->get('min'));
            }
            if (!is_null($request->get('max'))) {
                $query->where('created_at', '<=', $request->get('max'));
            }

            $users = $query->get();

            foreach ($users as $user) {
                $user['gender_name'] = $user->gender->name;
                $user['prefecture_name'] = $user->prefecture->name;
            }

            return view('manager/userlist')->with([
                'inputs' => $inputs,
                'genders' => $genders,
                'prefectures' => $prefectures,
                'userlist' => $users,
            ]);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }
}
