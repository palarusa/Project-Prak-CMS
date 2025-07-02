<footer>
    <hr>
    <p>&copy; {{ date('Y') }} - Dibuat oleh Ariq</p>

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">
                Logout
            </button>
        </form>
    @endauth
</footer>
