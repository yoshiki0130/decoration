<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coupon;
use Exception;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
    /**
     * クーポン一覧
     */
    public function list()
    {
        // いずれクーポンとユーザ紐付けテーブル使って管理する
        $coupon = Coupon::all();

        return view('coupon/list')->with('data', $coupon);
    }
}
