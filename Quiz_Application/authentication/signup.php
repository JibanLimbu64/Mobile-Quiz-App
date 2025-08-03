<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                    <i class="fas fa-user-plus text-white text-4xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Create Your Account</h1>
                <p class="text-gray-600 mt-2">Join Quiz Master Pro today</p>
            </div>

            <!-- Sign Up Form -->
            <form id="signupForm" class="space-y-4">
                <!-- CSRF Token (for production, generate this server-side) -->
                <input type="hidden" id="csrfToken" name="csrfToken" value="">

                <!-- Name Field -->
                <div>
                    <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            id="fullName" 
                            name="fullName" 
                            required
                            minlength="3"
                            class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="John Doe">
                    </div>
                    <div id="nameValidation" class="mt-1 text-sm hidden"></div>
                </div>

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
                            class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="your@email.com">
                    </div>
                    <div id="emailValidation" class="mt-1 text-sm hidden"></div>
                </div>

                <!-- Faculty Selection -->
                <div>
                    <label for="faculty" class="block text-sm font-medium text-gray-700 mb-1">Faculty</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-graduation-cap text-gray-400"></i>
                        </div>
                        <select 
                            id="faculty" 
                            name="faculty" 
                            required
                            class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white transition duration-200">
                            <option value="" disabled selected>Select your faculty</option>
                            <option value="science">Science</option>
                            <option value="engineering">Engineering</option>
                            <option value="arts">Arts & Humanities</option>
                            <option value="business">Business</option>
                            <option value="medicine">Medicine</option>
                            <option value="law">Law</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                    <div id="facultyValidation" class="mt-1 text-sm hidden"></div>
                </div>

                <!-- Class Section -->
                <div>
                    <label for="classSection" class="block text-sm font-medium text-gray-700 mb-1">Class Section</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-users text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            id="classSection" 
                            name="classSection" 
                            required
                            class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="e.g. CS-101-A">
                    </div>
                    <div id="classValidation" class="mt-1 text-sm hidden"></div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
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
                            class="w-full pl-10 pr-10 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
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
                    <div id="passwordValidation" class="mt-1 text-sm hidden"></div>
                    <ul id="passwordRequirements" class="mt-1 text-xs text-gray-500 space-y-1">
                        <li class="flex items-center"><i class="fas fa-check-circle mr-1 text-xs"></i> Minimum 8 characters</li>
                        <li class="flex items-center"><i class="fas fa-check-circle mr-1 text-xs"></i> At least one uppercase letter</li>
                        <li class="flex items-center"><i class="fas fa-check-circle mr-1 text-xs"></i> At least one number</li>
                    </ul>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            name="confirmPassword" 
                            required
                            class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="••••••••">
                    </div>
                    <div id="confirmPasswordValidation" class="mt-1 text-sm hidden"></div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            name="terms"
                            required
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3">
                        <label for="terms" class="text-sm text-gray-700">
                            I agree to the <a href="#" class="text-blue-600 hover:text-blue-500">Terms of Service</a> and <a href="#" class="text-blue-600 hover:text-blue-500">Privacy Policy</a>
                        </label>
                    </div>
                </div>
                <div id="termsValidation" class="mt-1 text-sm hidden"></div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="signupButton"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i> Create Account
                </button>

                <!-- Success Message -->
                <div id="successMessage" class="hidden p-4 mt-4 bg-success-100 border border-success-400 text-success-700 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-success-500"></i>
                        <span>All fields are valid! Ready to submit.</span>
                    </div>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Already have an account? 
                    <a href="login.php" class="font-medium text-blue-600 hover:text-blue-500">Log in</a>
                </p>
            </div>
        </div>

        <!-- Security Badges -->
        <div class="mt-6 flex items-center justify-center space-x-4">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-shield-alt text-green-500 mr-1"></i> 256-bit Encryption
            </div>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-lock text-green-500 mr-1"></i> Secure Data
            </div>
        </div>
    </div>
    <script>
            tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        success: '#10b981',
                        error: '#ef4444'
                    }
                }
            }
        }
</script>
</body>
<script src="assets/styles/js/sign.js"></script>
</html>