<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Library Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --secondary-color: #f3f4f6;
            --text-color: #1f2937;
            --light-text: #6b7280;
            --border-color: #e5e7eb;
            --danger-color: #ef4444;
            --success-color: #10b981;
            --warning-color: #f59e0b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f9fafb;
            color: var(--text-color);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            height: 600px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        .auth-image {
            flex: 1;
            background-image: url('/placeholder.svg?height=600&width=450');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem;
            color: white;
        }

        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2));
            z-index: 1;
        }

        .auth-image-content {
            position: relative;
            z-index: 2;
        }

        .auth-image-content img {
            display: flex;
            width: 100%;
        }

        .auth-image-content h2 {
            position: absolute;
            font-size: 1.8rem;
            bottom: 4.5rem;
        }

        .auth-image-content p {
            position: absolute;
            font-size: 1rem;
            opacity: 0.9;
            bottom: 0.5rem;
        }

        .auth-form {
            flex: 1;
            background-color: white;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
        }

        .auth-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .auth-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            color: var(--light-text);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.95rem;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check input {
            margin-right: 0.5rem;
        }

        .form-check label {
            font-size: 0.9rem;
            color: var(--light-text);
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            font-size: 0.95rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .auth-footer {
            margin-top: auto;
            text-align: center;
            font-size: 0.9rem;
            color: var(--light-text);
        }

        .auth-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .social-login {
            margin: 1.5rem 0;
            display: flex;
            gap: 1rem;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .social-btn:hover {
            background-color: var(--secondary-color);
        }

        .social-btn i {
            margin-right: 0.5rem;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--border-color);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 1.5rem;
        }

        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .register-prompt {
            margin-top: 1.5rem;
            text-align: center;
            padding: 1rem;
            background-color: #f8fafc;
            border-radius: 6px;
            border: 1px dashed var(--border-color);
        }

        .register-prompt p {
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: var(--light-text);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Added styling for error messages */
        .error-message {
            color: var(--danger-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            padding: 0.75rem;
            background-color: rgba(239, 68, 68, 0.1);
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                height: auto;
                max-width: 100%;
                border-radius: 0;
            }

            .auth-image {
                display: none;
            }

            .auth-form {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-image">
            <div class="auth-image-content">
                <img src="https://media.tenor.com/M74l1VjXXv8AAAAM/derzko-%D1%81%D0%B8%D0%B3%D0%BC%D0%B0.gif" alt="books">
                <h2>Welcome to Library Management System</h2>
                <p>Access your account to manage books, members, and more. Streamline your library operations with our comprehensive management tools.</p>
            </div>
        </div>
        <div class="auth-form">
            <div class="auth-header">
                <h1>Sign In</h1>
                <p>Enter your credentials to access your account</p>
            </div>
            
            @if($errors->any())
                <div class="error-message">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                <div class="register-prompt">
                    <p>New to our library system?</p>
                    <a href="{{ route('register') }}" class="btn btn-outline btn-block">Please Register</a>
                </div>
                
                <div class="divider">Or continue with</div>
                
                <div class="social-login">
                    <button type="button" class="social-btn">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-microsoft"></i> Microsoft
                    </button>
                </div>
            </form>
            
            <div class="auth-footer">
                <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
            </div>
        </div>
    </div>
</body>
</html>