<html>
<head>
    <title>signup page</title>
</head>
<body>
    <div> 
        <h3>Registration Form</h3>
        @include('components.flash-message')
        <form action="{{url('/register')}}" method="POST">
            @csrf
        <label>Name</label>
        <input type="text" name ="name" placeholder="Enter your name"/>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <label>Email</label>
        <input type="text" name ="email" placeholder="Enter your email"/>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <label>Password</label>
        <input type="password" name ="password" id="password" placeholder="Enter your password"/>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <label>Confirm Password</label>
        <input type="password" name ="password_confirmation" id="password_confirmation" placeholder="Confirm your password"/>
        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
        <label for="showPassword">Show Password</label>
        <button type="submit" disabled>Sign Up</button>
        <p>Already have an account?<a href="{{ route('login') }}"> Login here</a></p>
        </form>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');

        function togglePasswordVisibility() {
            
            const showPasswordCheckbox = document.getElementById('showPassword');

            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        }

        const submitButton = document.querySelector('button[type="submit"]');

        function validatePasswords() {
            if (passwordInput.value && confirmPasswordInput.value && passwordInput.value === confirmPasswordInput.value) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        passwordInput.addEventListener('input', validatePasswords);
        confirmPasswordInput.addEventListener('input', validatePasswords);
        </script>
</body>
</html>