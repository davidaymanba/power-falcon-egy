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

const initWhatsappWidget = () => {
	const widget = document.querySelector('.pf-whatsapp-widget');
	const toggleBtn = document.getElementById('pf-whatsapp-toggle');
	const closeBtn = document.getElementById('pf-whatsapp-close');

	if (!widget || !toggleBtn || !closeBtn) {
		return;
	}

	const openWidget = () => {
		widget.classList.add('is-open');
		toggleBtn.setAttribute('aria-expanded', 'true');
	};

	const closeWidget = () => {
		widget.classList.remove('is-open');
		toggleBtn.setAttribute('aria-expanded', 'false');
	};

	toggleBtn.addEventListener('click', (event) => {
		event.stopPropagation();
		widget.classList.contains('is-open') ? closeWidget() : openWidget();
	});

	closeBtn.addEventListener('click', closeWidget);

	widget.addEventListener('click', (event) => {
		event.stopPropagation();
	});

	document.addEventListener('click', closeWidget);

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			closeWidget();
		}
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
		initWhatsappWidget();
        runRevealAnimations();
    }, { once: true });
} else {
    initMobileMenu();
	initWhatsappWidget();
    runRevealAnimations();
}
