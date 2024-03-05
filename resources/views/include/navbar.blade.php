<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./build.css" rel="stylesheet">
  <link href="./css/style123.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-blue-900 border-gray-200 text-white shadow-md dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-md p-4 mx-auto">
            <h3 class="text-3xl font-fontutama">Gallery Foto</h3>
            <div class="flex gap-1">
                <a href="/login"><button class="px-5 py-1 text-white rounded-full bg-slate-400">Login</button></a>
                <a href="/register"><button class="px-5 py-1 rounded-full bg-red-600">Register</button></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    </body>
</html> 