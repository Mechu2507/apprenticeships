<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Dodaj linki do CSS, jeśli są potrzebne -->
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <select name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    
        <input type="password" name="password" required>
    
        <button type="submit">Login</button>
    </form>
    
</div>

</body>
</html>
