<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Exception;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
    /**
     * クーポン一覧
     */
    public function list($mode)
    {
        // いずれクーポンとユーザ紐付けテーブル使って管理する
        $coupon = Coupon::all();

        return view('coupon/list')->with([
            'mode' => $mode,
            'data' => $coupon,
        ]);
    }

    public function confirm(Request $request)
    {
        $input = $request->all();

        return view('coupon/confirm')->with('input', $input);
    }

    public function store(Request $request)
    {
        try {
            $coupon = new Coupon();
            $coupon->title = $request->title;
            $coupon->content = $request->content;
            $coupon->expiration_date = $request->expiration_date;
            $coupon->save();

            return redirect('/manager/coupon/')->with('message', 'クーポンを新規作成しました');
            
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }
}
