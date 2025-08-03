 // You can add interactive functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // Example: Toggle notification dropdown
            const notificationBtn = document.querySelector('header button.relative');
            notificationBtn.addEventListener('click', function() {
                alert('Notification center would open here');
            });
            
            // Add hover effects for category cards
            const categoryCards = document.querySelectorAll('.category-card');
            categoryCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('shadow-lg');
                });
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('shadow-lg');
                });
            });
        });