@extends('layouts.app')
@section('timerCountdown', $timerCountdown)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh; padding: 0;">
        <div class="card shadow p-4 w-100" style="max-width: 600px; border-radius: 15px;">
            <h2 class="text-center">แบบสอบถาม</h2>

            @if ($question)
                <form id="survey-form" action="{{ route('survey.store') }}" method="POST">
                    @csrf
                    <p class="fw-bold text-center" id="question-text">{{ $question->question }}</p>
                    <input type="hidden" name="survey_question_id" value="{{ $question->id }}">
                    <input type="text" name="response" class="form-control mb-3" id="response" required>

                    @php
                        $progress = session('progress', 0);
                    @endphp
                    <div class="progress mt-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                            aria-valuemax="100">
                            {{ number_format($progress, 0) }}%
                        </div>
                    </div>

                    <p class="text-center mt-3">คำถามใหม่จะแสดงใน <span id="timer">{{$timerCountdown}}</span> วินาที</p>
                </form>
            @else
                <div class="alert alert-success text-center">คุณได้ตอบแบบสอบถามทั้งหมดแล้ว 🎉</div>
            @endif
        </div>
    </div>
@endsection
