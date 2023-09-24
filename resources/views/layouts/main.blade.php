<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="dark:bg-gray-800">
    @include('partials.navbar')

    <div class="p-4 sm:ml-64">
        @yield('container')
     </div>

</body>
@vite('resources/js/app.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
<script>
    const toggleSwitch = document.querySelector("#toggle");
    const html = document.documentElement;

    toggleSwitch.addEventListener("change", function () {
        if (toggleSwitch.checked) {
            html.classList.add("dark");
        } else {
            html.classList.remove("dark");
        }
    });
</script>
</html>