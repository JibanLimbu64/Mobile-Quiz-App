        document.addEventListener('DOMContentLoaded', function() {
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

            // Password strength indicator
            document.getElementById('password').addEventListener('input', function() {
                const password = this.value;
                const strengthBar = document.getElementById('passwordStrength').firstElementChild;
                const strengthText = document.getElementById('strengthText');
                const requirements = document.querySelectorAll('#passwordRequirements li');
                
                // Calculate strength
                let strength = 0;
                const hasLength = password.length >= 8;
                const hasUpper = /[A-Z]/.test(password);
                const hasNumber = /[0-9]/.test(password);
                const hasSpecial = /[^A-Za-z0-9]/.test(password);
                
                if (hasLength) strength += 1;
                if (hasUpper) strength += 1;
                if (hasNumber) strength += 1;
                if (hasSpecial) strength += 1;
                
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
                
                // Update requirement indicators
                requirements[0].querySelector('i').className = hasLength ? 
                    'fas fa-check-circle mr-1 text-xs text-success' : 
                    'fas fa-times-circle mr-1 text-xs text-error';
                requirements[1].querySelector('i').className = hasUpper ? 
                    'fas fa-check-circle mr-1 text-xs text-success' : 
                    'fas fa-times-circle mr-1 text-xs text-error';
                requirements[2].querySelector('i').className = hasNumber ? 
                    'fas fa-check-circle mr-1 text-xs text-success' : 
                    'fas fa-times-circle mr-1 text-xs text-error';
            });

            // Validation functions
            function validateName() {
                const name = document.getElementById('fullName').value;
                const validation = document.getElementById('nameValidation');
                
                if (name.length < 3) {
                    showError(validation, 'Name must be at least 3 characters');
                    return false;
                } else if (!/^[a-zA-Z ]+$/.test(name)) {
                    showError(validation, 'Name can only contain letters and spaces');
                    return false;
                } else {
                    showSuccess(validation, 'Name looks good!');
                    return true;
                }
            }

            function validateEmail() {
                const email = document.getElementById('email').value;
                const validation = document.getElementById('emailValidation');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(email)) {
                    showError(validation, 'Please enter a valid email address');
                    return false;
                } else {
                    showSuccess(validation, 'Email looks good!');
                    return true;
                }
            }

            function validateFaculty() {
                const faculty = document.getElementById('faculty').value;
                const validation = document.getElementById('facultyValidation');
                
                if (!faculty) {
                    showError(validation, 'Please select your faculty');
                    return false;
                } else {
                    showSuccess(validation, 'Faculty selected');
                    return true;
                }
            }

            function validateClassSection() {
                const classSection = document.getElementById('classSection').value;
                const validation = document.getElementById('classValidation');
                
                if (!classSection) {
                    showError(validation, 'Please enter your class section');
                    return false;
                } else {
                    showSuccess(validation, 'Class section looks good!');
                    return true;
                }
            }

            function validatePassword() {
                const password = document.getElementById('password').value;
                const validation = document.getElementById('passwordValidation');
                
                if (password.length < 8) {
                    showError(validation, 'Password must be at least 8 characters');
                    return false;
                } else if (!/[A-Z]/.test(password)) {
                    showError(validation, 'Password must contain at least one uppercase letter');
                    return false;
                } else if (!/[0-9]/.test(password)) {
                    showError(validation, 'Password must contain at least one number');
                    return false;
                } else {
                    showSuccess(validation, 'Password meets all requirements');
                    return true;
                }
            }

            function validateConfirmPassword() {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;
                const validation = document.getElementById('confirmPasswordValidation');
                
                if (password !== confirmPassword) {
                    showError(validation, 'Passwords do not match');
                    return false;
                } else if (!confirmPassword) {
                    showError(validation, 'Please confirm your password');
                    return false;
                } else {
                    showSuccess(validation, 'Passwords match!');
                    return true;
                }
            }

            function validateTerms() {
                const terms = document.getElementById('terms').checked;
                const validation = document.getElementById('termsValidation');
                
                if (!terms) {
                    showError(validation, 'You must accept the terms and conditions');
                    return false;
                } else {
                    showSuccess(validation, 'Terms accepted');
                    return true;
                }
            }

            function showError(element, message) {
                element.innerHTML = `<i class="fas fa-times-circle mr-1 text-error"></i> ${message}`;
                element.className = 'mt-1 text-sm text-error flex items-center';
                element.classList.remove('hidden');
            }
        })