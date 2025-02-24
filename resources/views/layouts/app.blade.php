<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    html,
    body {
        overflow: hidden;
    }
</style>

<body class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/start">
                    Survey Test
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <a class="navbar-brand" href="#">
                            ไม่มีระบบ Login นะจ๊ะ ยังงงอยู่
                        </a>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
    let timeLeft = @yield('timerCountdown', 60);
    let timerElem = document.getElementById("timer");

    function sendResponse() {
        let form = document.getElementById("survey-form");
        let formData = new FormData(form);

        // หากไม่กรอกคำตอบ ให้ส่งค่าที่เป็นค่าว่าง
        if (!formData.get('response')) {
            formData.set('response', ''); // ส่งค่าว่างถ้าไม่ได้กรอกคำตอบ
        }

        fetch(form.action, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    setTimeout(() => {
                        location.reload(); // โหลดคำถามใหม่เมื่อครบเวลา
                    }, 1000);
                }
            });
    }

    function startCountdown() {
        let countdown = setInterval(() => {
            timeLeft--;
            timerElem.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                sendResponse(); // ส่งคำตอบ (หรือค่าว่าง) เมื่อหมดเวลา
            }
        }, 1000);
    }

    startCountdown();
</script>

</html>
