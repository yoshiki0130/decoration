<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diary;
use App\Models\Evaluation;
use Exception;

class DiaryController extends Controller
{
    //
    public function top(){
        try {
            $diary = Diary::all();
            return view('diary/list')->with('data', $diary);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    public function create(Request $request){
        try {
            $create = new Diary;
            $create->users_id = $request->create_userid;
            $create->title = $request->create_title;
            $create->diary = $request->create_diary;
            $create->release = $request->create_release;
            $create->save();
            return redirect('user/top')->with('message', '登録情報を登録しました');
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    public function edit(Request $request){
        try {
            $edit = $request->all();
            $release = Diary::where('id', $request->edit_id)->first();
            return view('diary/edit')->with([
                'data' => $edit,
                'release' => $release
                ]);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    public function edit_diary(Request $request){
        $release = (int)$request->edit_release;
        try {
            $edit = Diary::where('id', $request->edit_id)->first();
            $edit->title = $request->edit_title;
            $edit->diary = $request->edit_diary;
            $edit->release = $release;
            $edit->save();
            return redirect()->action('DiaryController@top')
            ->with('message', '登録情報を変更しました');
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }
    public function details(Request $request){
        try {
            $diary = Diary::where('id', $request->user_id)->first();
            $user = User::where('id', $diary->users_id)->first();
            $evaluationid = Evaluation::where('users_id', $request->loginuser_id)
                                    ->where('diary_id', $diary->id)
                                    ->first();
            $evaluation = Evaluation::where('diary_id', $diary->id)->get();
            $evaluationcount = count($evaluation);
            return view('diary/details')->with([
                'data' => $diary,
                'name' => $user->name1 . $user->name2,
                'evaluation' => $evaluationid,
                'count' => $evaluationcount
                ]);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    public function profile(Request $request){
        try {
            $profile = User::where('id', $request->user_id)->first();
            return view('diary/profile')->with('data', $profile);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    public function good(Request $request){
        try {
            $diarygood = new Evaluation;
            $diarygood->users_id = $request->good_user;
            $diarygood->diary_id = $request->good_diary;
            $diarygood->evaluation = 1;
            $diarygood->save();
            return redirect()->action('DiaryController@top')
            ->with('message', 'いいねを押しました');
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }
}
