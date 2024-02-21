
<li class="nav-item">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin') }}'" style="width:100%">Strona główna</a>
</li>
<li class="nav-item">
    <p> </p>
</li>
<li class="nav-item">
    <button class="btn btn-primary" onclick="window.location.href='{{route('directions.index')}}'" style="width:100%">Kierunki</button>
</li>

<li class="nav-item">
    <button class="btn btn-primary" onclick="window.location.href='{{route('representatives.index')}}'" style="width:100%">Reprezentant</button>
</li>
<li class="nav-item">
    <p> </p>
</li>
<li class="nav-item">
    <button class="btn btn-primary" onclick="window.location.href='{{route('directions.change-password-form')}}'" style="width:100%">Zmień hasło</button>
</li>
<li class="nav-item">
    <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'" style="width:100%">Wyloguj</button>
</li>