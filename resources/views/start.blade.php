@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh; padding: 0;">
    <div class="card shadow p-4 w-100" style="max-width: 600px; border-radius: 15px;">
        <h2 class="text-center">&#128512;ยินดีต้อนรับสู่แบบสอบถาม&#128512;</h2>
        <p class="text-center">กด "Start" เพื่อเริ่มทำแบบสอบถาม</p>
        <a href="{{ route('survey.index') }}" class="btn btn-primary w-100">Start</a>
    </div>
</div>
@endsection
