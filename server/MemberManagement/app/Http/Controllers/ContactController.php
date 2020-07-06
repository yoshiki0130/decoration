<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
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
            $content = new Contact;
            $content->content = $request->content;
            $content->save();

            return view('contact/done');
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            return;
        }
    }
}
