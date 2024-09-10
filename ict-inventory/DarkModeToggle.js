const darkModeToggle = document.getElementById('darkModeToggle');
    
    darkModeToggle.addEventListener('change', function() {
        // Toggle dark mode
        document.documentElement.dataset.bsTheme = this.checked ? 'dark' : 'light';
        
        // Toggle text color based on dark mode state
        if (this.checked) {
            document.body.classList.add('text-light');
            // Set all text color to white
            document.querySelectorAll('.text-dark').forEach(function(element) {
                element.classList.remove('text-dark');
                element.classList.add('text-light');
            });
        } else {
            document.body.classList.remove('text-light');
            // Set all text color back to default
            document.querySelectorAll('.text-light').forEach(function(element) {
                element.classList.remove('text-light');
                element.classList.add('text-dark');
            });
        }
    });