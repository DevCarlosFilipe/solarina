document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.password-toggle').forEach(function(button) {
        button.addEventListener('click', function() {
            var wrapper = button.closest('.password-wrapper');
            if (! wrapper) {
                return;
            }
            var input = wrapper.querySelector('input[type="password"], input[type="text"]');
            if (! input) {
                return;
            }
            var icon = button.querySelector('i');
            var showText = button.dataset.show || 'Mostrar senha';
            var hideText = button.dataset.hide || 'Ocultar senha';

            if (input.type === 'password') {
                input.type = 'text';
                if (icon) {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
                button.setAttribute('aria-label', hideText);
            } else {
                input.type = 'password';
                if (icon) {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
                button.setAttribute('aria-label', showText);
            }
        });
    });
});
