<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LoaF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-blue-50 flex items-center justify-center p-4">
    
    <div class="w-full max-w-6xl grid lg:grid-cols-2 gap-8 items-center">
        
        <!-- Left Side - Branding -->
        <div class="hidden lg:block space-y-6 animate-fade-in">
            <div class="space-y-6">
                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/logo.png') }}" alt="LoaF Logo" style="width: 120px; height: 120px; object-fit: contain;">
                    <div>
                        <h1 class="text-5xl font-bold text-[#1E40AF]">LoaF</h1>
                        <p class="text-m text-[#0d4296] font-medium uppercase tracking-wide">Lost and Found System</p>
                    </div>
                </div>
                
                <p class="text-xl text-gray-700 leading-relaxed mt-8">
                    Join our community and help reunite lost items with their owners. It's quick, easy, and free.
                </p>
                
                <div class="flex items-center space-x-3 pt-4">
                    <div class="h-1 w-12 bg-blue-400 rounded"></div>
                    <span class="text-blue-600 font-medium">Secure · Simple · Effective</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="w-full">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 md:p-12 space-y-8 animate-slide-up">
                
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="LoaF Logo" style="width: 60px; height: 60px; object-fit: contain;">
                        <span class="text-3xl font-bold text-blue-600">LoaF</span>
                    </div>
                </div>

                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
                    <p class="text-gray-500 mt-2">Get started with LoaF today</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input id="name" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}"
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="John Doe"
                                class="w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400">
                            @if($errors->has('name'))
                                <p class="text-red-500 text-sm mt-2">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required 
                                autocomplete="username"
                                placeholder="you@example.com"
                                class="w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400">
                            @if($errors->has('email'))
                                <p class="text-red-500 text-sm mt-2">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                placeholder="Create a password"
                                class="w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400">
                            @if($errors->has('password'))
                                <p class="text-red-500 text-sm mt-2">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input id="password_confirmation" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                                class="w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all outline-none text-gray-900 placeholder-gray-400">
                            @if($errors->has('password_confirmation'))
                                <p class="text-red-500 text-sm mt-2">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" 
                        class="w-full bg-blue-600 text-white font-semibold py-4 rounded-lg hover:bg-blue-700 transform hover:scale-[1.02] active:scale-[0.98] transition-all shadow-sm hover:shadow-md mt-6">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <div class="text-center pt-4">
                        <span class="text-gray-600">Already have an account? </span>
                        <a href="{{ route('login') }}" 
                           class="font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }

        .animate-slide-up {
            animation: slide-up 0.8s ease-out;
        }
    </style>
</body>
</html>