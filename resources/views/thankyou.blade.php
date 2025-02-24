@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh; padding: 0;">
    <div class="card shadow p-4 w-100" style="max-width: 600px; border-radius: 15px;">
        <h2 class="text-center">&#128512;ขอบคุณสำหรับการตอบแบบสอบถาม&#128512;</h2>
        <h5 class="text-center">🎉คุณได้ตอบแบบสอบถามทั้งหมดแล้ว 🎉</h5>
        <p class="text-center">คำตอบของคุณถูกบันทึกเรียบร้อยแล้ว.</p>
        <a href="{{ url('/') }}" class="btn btn-primary w-100">กลับสู่หน้าแรก</a>
    </div>
</div>
@endsection
