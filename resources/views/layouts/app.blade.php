<!doctype html>
<html>
<head>
    <title>Solar Reviews :: Invoices</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/x-icon" href="https://www.solarreviews.com/images/favicon.ico">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-5">
        <ul class="flex item-center">
            <li>
                <a href="" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('invoices') }}"  class="p-3">Invoices</a>
            </li>
        </ul>

        <ul class="flex item-center">
            @auth
            <li>
                <a href="" class="p-3">{{ auth()->user()->name}}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li> 
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}"  class="p-3">Register</a>
                </li>
            @endguest
            
           
        </ul>
    </nav>
    @yield('content')
</body>

</html>
