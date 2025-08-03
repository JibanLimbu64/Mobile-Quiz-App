<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In </title>
      <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow-2xl p-8">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-question-circle text-white text-4xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Quiz App</h1>
                <p class="text-gray-600 mt-2">Secure login to continue</p>
            </div>

            <!-- Login Form -->
            <form id="loginForm" class="space-y-6">
                <!-- CSRF Token (for production, generate this server-side) -->
                <input type="hidden" id="csrfToken" name="csrfToken" value="">

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            autocomplete="username"
                            class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="your@email.com">
                    </div>
                    <p id="emailError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            minlength="8"
                            autocomplete="current-password"
                            class="w-full pl-10 pr-10 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="••••••••">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                    <div class="mt-2 flex items-center">
                        <div id="passwordStrength" class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-gray-400 w-0 transition-all duration-300"></div>
                        </div>
                        <span id="strengthText" class="ml-2 text-xs text-gray-500">Weak</span>
                    </div>
                    <p id="passwordError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <!-- CAPTCHA -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-sm font-medium text-gray-700">Verify you're human</label>
                        <button type="button" id="refreshCaptcha" class="text-blue-600 hover:text-blue-500 text-sm">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                    </div>
                    <div class="flex items-center">
                        <div id="captchaText" class="flex-1 bg-white p-2 rounded border border-gray-300 text-center font-mono text-lg tracking-widest select-none">
                            <!-- Captcha will be generated here -->
                        </div>
                        <input 
                            type="text" 
                            id="captchaInput" 
                            name="captcha"
                            required
                            class="ml-2 flex-1 px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter CAPTCHA">
                    </div>
                    <p id="captchaError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <!-- Remember Me & 2FA -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="enable2FA" 
                            name="enable2FA"
                            checked
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="enable2FA" class="ml-2 block text-sm text-gray-700">Use 2FA</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="loginButton"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Secure Login
                </button>

                <!-- Loading Indicator -->
                <div id="loadingIndicator" class="hidden text-center py-2">
                    <div class="inline-block animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
                    <p class="mt-2 text-sm text-gray-600">Verifying your credentials...</p>
                </div>
            </form>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Don't have an account? 
                    <a href="signup.php" class="font-medium text-blue-600 hover:text-blue-500">Sign up</a>
                </p>
            </div>
        </div>

        <!-- Security Badges -->
        <div class="mt-6 flex items-center justify-center space-x-4">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-shield-alt text-green-500 mr-1"></i> 256-bit SSL
            </div>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-lock text-green-500 mr-1"></i> 2FA Ready
            </div>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-user-secret text-green-500 mr-1"></i> No Tracking
            </div>
        </div>
    </div>
</body>
<script src="assets/styles/js/script.js"></script>
</html>