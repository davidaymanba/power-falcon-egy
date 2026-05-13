const easingOutCubic = (value) => 1 - Math.pow(1 - value, 3);

const formatCount = (value, suffix) => `${Math.round(value)}${suffix}`;

// Mobile Menu Toggle
const initMobileMenu = () => {
    const toggleBtn = document.getElementById('pf-menu-toggle');
    const mobileMenu = document.getElementById('pf-mobile-menu');
    
    if (!toggleBtn || !mobileMenu) {
        return;
    }
    
    toggleBtn.addEventListener('click', () => {
        const isOpen = toggleBtn.classList.toggle('is-open');
        mobileMenu.classList.toggle('hidden', !isOpen);
    });
    
    // Close menu when a link is clicked
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            toggleBtn.classList.remove('is-open');
            mobileMenu.classList.add('hidden');
        });
    });
};

const animateCountUp = (element) => {
	if (element.dataset.countAnimated === 'true') {
		return;
	}

	element.dataset.countAnimated = 'true';

	const target = Number.parseInt(element.dataset.countup ?? '0', 10);
	const suffix = element.dataset.suffix ?? '';
	const duration = Math.min(2800, 1200 + target * 0.75);
	const start = performance.now();

	element.classList.add('is-counting');

	const tick = (now) => {
		const progress = Math.min((now - start) / duration, 1);
		const eased = easingOutCubic(progress);
		const current = target * eased;

		element.textContent = formatCount(current, suffix);

		if (progress < 1) {
			window.requestAnimationFrame(tick);
		} else {
			element.textContent = formatCount(target, suffix);
			element.classList.remove('is-counting');
		}
	};

	window.requestAnimationFrame(tick);
};

const runRevealAnimations = () => {
	const elements = document.querySelectorAll('.pf-reveal, .pf-count');

	if (!elements.length) {
		return;
	}

	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (!entry.isIntersecting) {
				return;
			}

			const element = entry.target;

			if (element.classList.contains('pf-count')) {
				animateCountUp(element);
			}

			observer.unobserve(element);
		});
	}, {
		threshold: 0.4,
		rootMargin: '0px 0px -10% 0px',
	});

	elements.forEach((element) => observer.observe(element));
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initMobileMenu();
        runRevealAnimations();
    }, { once: true });
} else {
    initMobileMenu();
    runRevealAnimations();
}
