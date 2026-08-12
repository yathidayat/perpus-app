
        // Toggle menu mobile
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('iconOpen');
        const iconClose = document.getElementById('iconClose');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        // Accordion FAQ sederhana
        document.querySelectorAll('.faq-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const panel = btn.nextElementSibling;
                const icon = btn.querySelector('.faq-icon');
                const isOpen = !panel.classList.contains('hidden');
                document.querySelectorAll('.faq-panel').forEach(p => p.classList.add('hidden'));
                document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotate-180'));
                if (!isOpen) {
                    panel.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                }
            });
        });