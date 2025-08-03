  document.addEventListener('DOMContentLoaded', function() {
            // Generate CAPTCHA
            function generateCaptcha() {
                const chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                let captcha = '';
                for (let i = 0; i < 6; i++) {
                    captcha += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                document.getElementById('captchaText').textContent = captcha;
                return captcha;
            }

            let currentCaptcha = generateCaptcha();

            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordField = document.getElementById('password');
                const icon = this.querySelector('i');
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });

            // Refresh CAPTCHA
            document.getElementById('refreshCaptcha').addEventListener('click', function() {
                currentCaptcha = generateCaptcha();
                document.getElementById('captchaInput').value = '';
            });

            // Password strength indicator
            document.getElementById('password').addEventListener('input', function() {
                const password = this.value;
                const strengthBar = document.getElementById('passwordStrength').firstElementChild;
                const strengthText = document.getElementById('strengthText');
                
                // Calculate strength (simple version)
                let strength = 0;
                if (password.length >= 8) strength += 1;
                if (password.match(/[A-Z]/)) strength += 1;
                if (password.match(/[0-9]/)) strength += 1;
                if (password.match(/[^A-Za-z0-9]/)) strength += 1;
                
                // Update UI
                const width = strength * 25;
                strengthBar.style.width = `${width}%`;
                
                if (strength <= 1) {
                    strengthBar.className = 'h-full bg-red-500 w-0 transition-all duration-300';
                    strengthText.textContent = 'Weak';
                    strengthText.className = 'ml-2 text-xs text-red-500';
                } else if (strength <= 2) {
                    strengthBar.className = 'h-full bg-yellow-500 w-0 transition-all duration-300';
                    strengthText.textContent = 'Medium';
                    strengthText.className = 'ml-2 text-xs text-yellow-500';
                } else {
                    strengthBar.className = 'h-full bg-green-500 w-0 transition-all duration-300';
                    strengthText.textContent = 'Strong';
                    strengthText.className = 'ml-2 text-xs text-green-500';
                }
            });

            // Form submission
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Hide previous errors
                document.querySelectorAll('[id$="Error"]').forEach(el => {
                    el.classList.add('hidden');
                });
                
                // Validate CAPTCHA
                const captchaInput = document.getElementById('captchaInput').value;
                if (captchaInput !== currentCaptcha) {
                    document.getElementById('captchaError').textContent = 'CAPTCHA verification failed';
                    document.getElementById('captchaError').classList.remove('hidden');
                    currentCaptcha = generateCaptcha();
                    return;
                }
                
                // Validate email format
                const email = document.getElementById('email').value;
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    document.getElementById('emailError').textContent = 'Please enter a valid email address';
                    document.getElementById('emailError').classList.remove('hidden');
                    return;
                }
                
                // Validate password length
                const password = document.getElementById('password').value;
                if (password.length < 8) {
                    document.getElementById('passwordError').textContent = 'Password must be at least 8 characters';
                    document.getElementById('passwordError').classList.remove('hidden');
                    return;
                }
                
                // Show loading indicator
                document.getElementById('loginButton').classList.add('hidden');
                document.getElementById('loadingIndicator').classList.remove('hidden');
                
                // Simulate API call (in a real app, you would send this to your backend)
                setTimeout(() => {
                    // Hide loading indicator
                    document.getElementById('loginButton').classList.remove('hidden');
                    document.getElementById('loadingIndicator').classList.add('hidden');
                    
                    // Here you would typically redirect on successful login
                    alert('Login successful! (This is a demo - in a real app you would redirect)');
                }, 2000);
            });

            // Generate a CSRF token (in a real app, this should come from your backend)
            document.getElementById('csrfToken').value = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        });