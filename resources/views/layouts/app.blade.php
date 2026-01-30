<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { background-color: #0f172a; }
    </style>
</head>
<body class="bg-[#0f172a] text-white">

    @include('layouts.header')

    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

</body>
</html>