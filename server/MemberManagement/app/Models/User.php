<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class User extends Model
{
    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    public function coupons()
    {
        return $this->belongsToMany('App\Models\Coupon');
    }

    public static function search(Request $request)
    {
        $query = User::query();
        $searchCriteria = $request->only([
            'name1', 'name2', 'gender_id', 'prefecture_id', 'min', 'max'
        ]);

        foreach (array_intersect_key($searchCriteria, array_flip(['name1', 'name2'])) as $k => $v) {
            if (is_null($v)) continue;
            $query->where($k, 'like', '%' . $v . '%');
        }
        foreach (array_intersect_key($searchCriteria, array_flip(['gender_id', 'prefecture_id'])) as $k => $v) {
            if (is_null($v)) continue;
            $query->where($k, $v);
        }
        if (isset($searchCriteria['min']) && !is_null($searchCriteria['min'])) {
            $query->where('created_at', '>=', $searchCriteria['min']);
        }
        if (isset($searchCriteria['max']) && !is_null($searchCriteria['max'])) {
            $query->where('created_at', '<=', $searchCriteria['max']);
        }

        $userlist = $query->get();

        foreach ($userlist as $user) {
            $user['gender_name'] = $user->gender->name;
            $user['prefecture_name'] = $user->prefecture->name;
        }

        return compact('userlist', 'searchCriteria');
    }
}
