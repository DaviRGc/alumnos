<header class="bg-gray-800 text-white">
    <div class="container mx-auto flex items-center justify-between p-4">
        <a href="{{ route('home') }}" class="text-lg font-bold">
            {{ config('app.name') }}
        </a>

        <nav class="space-x-4">
            <a href="{{ route('alumnos.index') }}" class="hover:underline">Alumnos</a>

            @auth
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </nav>
    </div>
</header>