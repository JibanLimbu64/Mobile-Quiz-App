<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <body class="bg-gray-100 font-sans text-dark">
    <!-- Mobile Container -->
    <div class="max-w-md mx-auto bg-white min-h-screen shadow-xl overflow-hidden">
        <!-- Header -->
        <header class="blur-bg sticky top-0 z-10 p-4 flex justify-between items-center border-b border-gray-200">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-primary to-accent flex items-center justify-center">
                    <i class="fas fa-user-cog text-white"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Welcome back</p>
                    <h1 class="font-bold">Admin User</h1>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button class="relative">
                    <i class="fas fa-bell text-xl text-gray-600"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full flex items-center justify-center text-white text-xs">3</span>
                </button>
                <button>
                    <i class="fas fa-ellipsis-v text-xl text-gray-600"></i>
                </button>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-4 pb-20">
            <!-- Quick Actions -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <button class="bg-gradient-to-r from-primary to-secondary rounded-xl p-4 text-white flex flex-col items-center justify-center h-32 shadow-lg transform transition hover:scale-105">
                    <i class="fas fa-plus-circle text-3xl mb-2"></i>
                    <span class="font-bold">Create Quiz</span>
                    <p class="text-xs opacity-80 mt-1">Design new quiz</p>
                </button>
                <button class="bg-gradient-to-r from-accent to-pink-500 rounded-xl p-4 text-white flex flex-col items-center justify-center h-32 shadow-lg transform transition hover:scale-105">
                    <i class="fas fa-users text-3xl mb-2"></i>
                    <span class="font-bold">Join Quiz</span>
                    <p class="text-xs opacity-80 mt-1">Monitor live quiz</p>
                </button>
            </div>

            <!-- Categories Section -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-lg">Quiz Categories</h2>
                    <button class="text-primary text-sm font-medium flex items-center">
                        See All <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </button>
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <!-- Category 1 -->
                    <div class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm transition duration-300">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center mb-3">
                            <i class="fas fa-atom text-blue-500 text-xl"></i>
                        </div>
                        <h3 class="font-bold mb-1">Science</h3>
                        <p class="text-xs text-gray-500">15 quizzes</p>
                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-xs text-gray-400">120 participants</span>
                            <button class="text-primary text-xs">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category 2 -->
                    <div class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm transition duration-300">
                        <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center mb-3">
                            <i class="fas fa-landmark text-purple-500 text-xl"></i>
                        </div>
                        <h3 class="font-bold mb-1">History</h3>
                        <p class="text-xs text-gray-500">9 quizzes</p>
                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-xs text-gray-400">85 participants</span>
                            <button class="text-primary text-xs">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category 3 -->
                    <div class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm transition duration-300">
                        <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center mb-3">
                            <i class="fas fa-globe-americas text-green-500 text-xl"></i>
                        </div>
                        <h3 class="font-bold mb-1">Geography</h3>
                        <p class="text-xs text-gray-500">12 quizzes</p>
                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-xs text-gray-400">150 participants</span>
                            <button class="text-primary text-xs">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category 4 -->
                    <div class="category-card bg-white rounded-xl p-4 border border-gray-100 shadow-sm transition duration-300">
                        <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center mb-3">
                            <i class="fas fa-paint-brush text-yellow-500 text-xl"></i>
                        </div>
                        <h3 class="font-bold mb-1">Arts</h3>
                        <p class="text-xs text-gray-500">7 quizzes</p>
                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-xs text-gray-400">65 participants</span>
                            <button class="text-primary text-xs">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-lg">Recent Activity</h2>
                    <button class="text-primary text-sm font-medium">View All</button>
                </div>
                
                <div class="space-y-3">
                    <!-- Activity 1 -->
                    <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                            <i class="fas fa-question-circle text-purple-500"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-sm">New quiz created</h4>
                            <p class="text-xs text-gray-500">Science Trivia - 30 questions</p>
                            <p class="text-xs text-gray-400 mt-1">10 minutes ago</p>
                        </div>
                        <button class="text-gray-400">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                    
                    <!-- Activity 2 -->
                    <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-users text-blue-500"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-sm">Quiz session completed</h4>
                            <p class="text-xs text-gray-500">World Capitals - 25 participants</p>
                            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                        </div>
                        <button class="text-gray-400">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Bottom Navigation -->
        <nav class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-white border-t border-gray-200 flex justify-around items-center p-3 shadow-lg">
            <a href="#" class="text-primary p-2 rounded-full">
                <i class="fas fa-home text-xl"></i>
            </a>
            <a href="#" class="text-gray-500 p-2 rounded-full">
                <i class="fas fa-clock text-xl"></i>
            </a>
            <a href="#" class="bg-gradient-to-r from-primary to-secondary text-white p-3 rounded-full shadow-lg -mt-8">
                <i class="fas fa-plus text-xl"></i>
            </a>
            <a href="#" class="text-gray-500 p-2 rounded-full">
                <i class="fas fa-trophy text-xl"></i>
            </a>
            <a href="#" class="text-gray-500 p-2 rounded-full">
                <i class="fas fa-user text-xl"></i>
            </a>
        </nav>
    </div>
</body>
<script src="assets/styles/js/admin.js"></script>
</html>