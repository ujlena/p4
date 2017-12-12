@php
if(Auth::check()) {
    $nav = [
        'skincare' => 'Find Skincare',
        'show-all' => 'See All Skincares',
        'show-all/create' => 'Add New Skincare',
    ];
} else {
    $nav = [
        'register' => 'Register',
        'login' => 'Login',
    ];
}
@endphp

<nav>
    <ul>
        @foreach($nav as $link => $label)
            <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
        @endforeach

        @if(Auth::check())
            <li>
                <form method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <a href='#' onClick='document.getElementById("logout").submit();'>Logout {{ $user->name }}</a>
                </form>
            </li>
        @endif
    </ul>
</nav>