<!-- Vendor JS Files -->
<script src="{{ url('tamplate/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('tamplate/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ url('tamplate/assets/js/main.js') }}"></script>

<!-- GSAP + ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // === PRELOADER ===
        const preloader = document.getElementById('preloader');
        const timeout = window.innerWidth < 768 ? 3000 : 5000;
        if (preloader) {
            setTimeout(() => {
                preloader.classList.add('hide');
                setTimeout(() => preloader.remove(), 700);
            }, timeout);
        }

        // === SMOOTH SCROLL ===
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // === CLIENT SLIDER ACTIVE AREA ===
        const wrapper = document.querySelector('.client-slider-wrapper');
        const logos = document.querySelectorAll('.client-logo img');

        function checkLogosInCenter() {
            if (!wrapper) return;
            const rect = wrapper.getBoundingClientRect();
            const centerStart = rect.left + rect.width * 0.375;
            const centerEnd = rect.left + rect.width * 0.625;

            logos.forEach(img => {
                const imgRect = img.getBoundingClientRect();
                const imgCenter = imgRect.left + imgRect.width / 2;
                img.classList.toggle('active', imgCenter >= centerStart && imgCenter <= centerEnd);
            });
        }

        // Jalankan di semua ukuran layar
        setInterval(checkLogosInCenter, 100);

        // === HERO SECTION ANIMASI ===
        gsap.registerPlugin(ScrollTrigger);
        ScrollTrigger.create({
            trigger: ".hero-wrapper",
            start: "top top",
            end: "+=300",
            scrub: 0.1,
            onUpdate: self => {
                const progress = self.progress;

                gsap.to(".logo-coin-wrapper", {
                    x: progress * 200,
                    opacity: 1 - progress,
                    ease: "power3.out"
                });

                gsap.to(".content-box", {
                    x: -progress * 200,
                    opacity: 1 - progress,
                    ease: "power3.out"
                });
            }
        });

        // === ISOTOPE FILTER ===
        const grid = document.querySelector('.isotope-container');
        if (grid) {
            imagesLoaded(grid, function() {
                const iso = new Isotope(grid, {
                    itemSelector: '.portfolio-item',
                    layoutMode: 'masonry',
                });

                const filterButtons = document.querySelectorAll('#portfolio-flters li');
                filterButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        filterButtons.forEach(b => b.classList.remove('filter-active'));
                        this.classList.add('filter-active');

                        const filterValue = this.getAttribute('data-filter');
                        if (filterValue === 'none') {
                            iso.arrange({
                                filter: () => false
                            });
                        } else {
                            iso.arrange({
                                filter: filterValue
                            });
                        }
                    });
                });

                // ⏬ APPLY DEFAULT FILTER (ON PAGE LOAD)
                const activeFilter = document.querySelector('#portfolio-flters li.filter-active');
                if (activeFilter) {
                    const filterValue = activeFilter.getAttribute('data-filter');
                    if (filterValue === 'none') {
                        iso.arrange({
                            filter: () => false
                        });
                    } else {
                        iso.arrange({
                            filter: filterValue
                        });
                    }
                }
            });
        }

        // === BLOKIR INSPECT ELEMENT ===
        if (window.innerWidth > 768) {
            document.addEventListener('keydown', function(event) {
                const key = event.key.toLowerCase();
                if (
                    (event.ctrlKey && ['u'].includes(key)) ||
                    (event.key === 'F12') ||
                    (event.ctrlKey && event.shiftKey && ['i', 'j', 'c'].includes(key))
                ) {
                    event.preventDefault();
                    window.location.href = '/';
                }
            });

            document.addEventListener('contextmenu', function(event) {
                event.preventDefault();
                window.location.href = '/';
            });
        }
    });
</script>
