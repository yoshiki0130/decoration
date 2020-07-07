<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;


class ContactController extends Controller
{
    public function confirm(Request $request)
    {
        $input = $request->all();

        return view('contact/confirm')->with('input', $input['content']);
    }
    
    public function send(Request $request)
    {

        try {
            // 店舗メールにお問い合わせ内容をメール
            // $request->content;
            return view('contact/done');
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            return;
        }
    }
}
