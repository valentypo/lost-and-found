<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .animate-slide-down {
            animation: slideDown 0.5s ease-out;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
        }
        
        .btn-hover {
            transition: all 0.3s ease;
        }
        
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(37, 99, 235, 0.3);
        }
        
        .btn-hover:active {
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-blue-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl animate-fade-in">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 animate-slide-down">
                <!-- Header Section -->
                <div class="bg-white p-8 text-center border-b border-gray-200">
                    <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Forgot Password?</h2>
                    <p class="text-base text-gray-500 mt-3">No problem! We'll send you a reset link</p>
                </div>

                <!-- Content Section -->
                <div class="p-8">
                    <div class="mb-8 text-sm text-gray-500 text-center leading-relaxed">
                        Enter your email address and we will email you a password reset link that will allow you to choose a new one.
                    </div>

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-gray-700 font-semibold mb-3 text-sm tracking-wide">EMAIL ADDRESS</label>
                            <input 
                                id="email" 
                                class="input-focus block w-full px-4 py-3.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                placeholder="Enter your email address"
                            />
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="btn-hover w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-4 rounded-lg flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>Send Reset Link</span>
                            </button>
                        </div>

                        <!-- Back to Login Link -->
                        <div class="text-center pt-6 border-t border-gray-200">
                            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-700 font-semibold hover:underline transition-all duration-200">
                                Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>