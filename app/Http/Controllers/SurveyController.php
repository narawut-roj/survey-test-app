<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestion;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class SurveyController extends Controller
{

    public function index()
    {
        // ดึงคำถามที่ยังไม่ได้ตอบ เช็คจาก Cookie
        $answeredQuestionIds = collect(request()->cookies->keys())
            ->filter(fn($key) => str_starts_with($key, 'answered_'))
            ->map(fn($key) => str_replace('answered_', '', $key))
            ->toArray();

        $question = SurveyQuestion::whereNotIn('id', $answeredQuestionIds)->inRandomOrder()->first();

        if (!$question) {
            return redirect('/thankyou');
        }
        $timerCountdown = env('TIMER_COUNTDOWN', 60);

        return view('index', compact('question','timerCountdown'));
    }

    public function store(Request $request)
    {
        // ตรวจสอบว่า Cookie ยังมีอยู่หรือไม่(กันการตอบซ้ำก่อนครบ 60 วินาที)
        if (Cookie::has("answered_{$request->survey_question_id}")) {
            return redirect('/survey')->with('error');
        }

        // บันทึก
        SurveyResponse::create([
            'survey_question_id' => $request->survey_question_id,
            'response' => $request->response ?: ''
        ]);

        // ตั้งค่า Cookie 60 วินาที
        Cookie::queue("answered_{$request->survey_question_id}", '1', 1);

        if (!session()->has('progress')) {
            session(['progress' => 0]);
        }
        session()->increment('progress', 10);
        if (session('progress') > 100) {
            session(['progress' => 100]);
        }

        return response()->json(['success' => true]);
    }

    public function start()
    {
        session()->forget('progress');
        return view('start');
    }

}
