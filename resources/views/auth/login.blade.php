<html>
<head>
    <title>login page</title>
    
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>
<body>
    <div> 
        <h3>Login Form</h3>
        @include('components.flash-message')
        <form action="{{url('/login')}}" method="POST">
            @csrf
        <label>Email</label>
        <input type="text" name ="email" placeholder="Enter your email"/>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <label>Password</label>
        <input type="password" name ="password" id ="password" placeholder="Enter your password"/>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
        <label for="showPassword">Show Password</label>
        <button type="submit">Login</button>
        <p>Don't have an account?<a href="{{ route('register') }}"> Register here</a></p>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            
            const showPasswordCheckbox = document.getElementById('showPassword');
            const passwordInput = document.getElementById('password');

            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>


