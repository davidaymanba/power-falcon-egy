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

const initThemeToggle = () => {
	const toggles = document.querySelectorAll('.pf-theme-toggle');

	if (!toggles.length) {
		return;
	}

	const setTheme = (theme) => {
		const isDark = theme === 'dark';

		document.documentElement.classList.toggle('dark', isDark);
		localStorage.setItem('pf-theme', theme);

		toggles.forEach((toggle) => {
			toggle.setAttribute('aria-pressed', String(isDark));
		});
	};

	const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
	setTheme(currentTheme);

	toggles.forEach((toggle) => {
		toggle.addEventListener('click', () => {
			setTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
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

const initEnergyScene = async () => {
	const containers = document.querySelectorAll('[data-energy-scene]');

	if (!containers.length) {
		return;
	}

	let THREE;

	try {
		THREE = await import('three');
	} catch (error) {
		containers.forEach((container) => {
			container.classList.add('is-unavailable');
		});
		console.warn('Power energy scene could not be loaded.', error);
		return;
	}

	const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	containers.forEach((container) => {
		const scene = new THREE.Scene();
		const camera = new THREE.PerspectiveCamera(38, 1, 0.1, 100);
		const renderer = new THREE.WebGLRenderer({
			alpha: true,
			antialias: true,
			powerPreference: 'high-performance',
		});

		renderer.setClearColor(0x000000, 0);
		renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
		renderer.outputColorSpace = THREE.SRGBColorSpace;
		renderer.toneMapping = THREE.ACESFilmicToneMapping;
		renderer.toneMappingExposure = 1.18;
		container.appendChild(renderer.domElement);

		const stage = new THREE.Group();
		scene.add(stage);

		const ambientLight = new THREE.AmbientLight(0x7dd3fc, 1.1);
		const keyLight = new THREE.PointLight(0x38bdf8, 85, 10);
		const rimLight = new THREE.PointLight(0xf59e0b, 28, 8);
		const fillLight = new THREE.PointLight(0x818cf8, 38, 9);

		keyLight.position.set(-2.6, 2.2, 3.6);
		rimLight.position.set(2.8, -1.4, 2.2);
		fillLight.position.set(0.8, 1.8, -2.8);
		scene.add(ambientLight, keyLight, rimLight, fillLight);

		const coreMaterial = new THREE.MeshPhysicalMaterial({
			color: 0x22d3ee,
			emissive: 0x075985,
			emissiveIntensity: 1.35,
			metalness: 0.34,
			roughness: 0.12,
			clearcoat: 1,
			clearcoatRoughness: 0.06,
			transparent: true,
			opacity: 0.94,
		});
		const core = new THREE.Mesh(new THREE.IcosahedronGeometry(0.96, 2), coreMaterial);
		stage.add(core);

		const coreShell = new THREE.LineSegments(
			new THREE.EdgesGeometry(new THREE.IcosahedronGeometry(1.18, 2)),
			new THREE.LineBasicMaterial({
				color: 0xe0f2fe,
				transparent: true,
				opacity: 0.38,
				blending: THREE.AdditiveBlending,
			}),
		);
		stage.add(coreShell);

		const innerCore = new THREE.Mesh(
			new THREE.TetrahedronGeometry(0.64, 0),
			new THREE.MeshStandardMaterial({
				color: 0xf59e0b,
				emissive: 0xf97316,
				emissiveIntensity: 1.25,
				metalness: 0.18,
				roughness: 0.22,
				transparent: true,
				opacity: 0.86,
			}),
		);
		innerCore.rotation.set(0.5, 0.35, -0.15);
		stage.add(innerCore);

		const glow = new THREE.Mesh(
			new THREE.SphereGeometry(1.36, 48, 48),
			new THREE.MeshBasicMaterial({
				color: 0x22d3ee,
				blending: THREE.AdditiveBlending,
				depthWrite: false,
				transparent: true,
				opacity: 0.12,
			}),
		);
		stage.add(glow);

		const ringGeometry = new THREE.TorusGeometry(1.78, 0.036, 18, 180);
		const rings = [
			{ color: 0x22d3ee, rotation: [Math.PI * 0.52, 0.12, 0.18], speed: 0.42 },
			{ color: 0x818cf8, rotation: [Math.PI * 0.22, Math.PI * 0.58, -0.26], speed: -0.32 },
			{ color: 0xfbbf24, rotation: [Math.PI * 0.72, Math.PI * 0.1, Math.PI * 0.18], speed: 0.24 },
		].map(({ color, rotation, speed }) => {
			const ring = new THREE.Mesh(
				ringGeometry,
				new THREE.MeshStandardMaterial({
					color,
					emissive: color,
					emissiveIntensity: 0.9,
					metalness: 0.52,
					roughness: 0.18,
					transparent: true,
					opacity: 0.92,
				}),
			);

			ring.rotation.set(...rotation);
			ring.userData.speed = speed;
			stage.add(ring);

			return ring;
		});

		const boltPoints = [
			new THREE.Vector3(-0.12, 1.12, 0.14),
			new THREE.Vector3(0.34, 0.32, -0.08),
			new THREE.Vector3(-0.06, 0.3, 0.12),
			new THREE.Vector3(0.38, -1.08, -0.1),
		];
		const boltCurve = new THREE.CatmullRomCurve3(boltPoints);
		const bolt = new THREE.Mesh(
			new THREE.TubeGeometry(boltCurve, 80, 0.045, 10, false),
			new THREE.MeshBasicMaterial({
				color: 0xf8fafc,
				blending: THREE.AdditiveBlending,
				transparent: true,
				opacity: 0.92,
			}),
		);
		bolt.scale.setScalar(1.08);
		stage.add(bolt);

		const sparkCount = 92;
		const sparkPositions = new Float32Array(sparkCount * 3);

		for (let index = 0; index < sparkCount; index += 1) {
			const angle = (index / sparkCount) * Math.PI * 2;
			const radius = 1.65 + Math.random() * 1.35;
			const wave = Math.sin(index * 1.7) * 0.34;

			sparkPositions[index * 3] = Math.cos(angle) * radius;
			sparkPositions[index * 3 + 1] = wave + (Math.random() - 0.5) * 0.76;
			sparkPositions[index * 3 + 2] = Math.sin(angle) * radius * 0.45;
		}

		const sparkGeometry = new THREE.BufferGeometry();
		sparkGeometry.setAttribute('position', new THREE.BufferAttribute(sparkPositions, 3));

		const sparks = new THREE.Points(
			sparkGeometry,
			new THREE.PointsMaterial({
				color: 0xbae6fd,
				size: 0.045,
				sizeAttenuation: true,
				blending: THREE.AdditiveBlending,
				depthWrite: false,
				transparent: true,
				opacity: 0.88,
			}),
		);
		stage.add(sparks);

		const pointer = { x: 0, y: 0 };
		const clock = new THREE.Clock();

		const resize = () => {
			const bounds = container.getBoundingClientRect();
			const width = Math.max(1, bounds.width);
			const height = Math.max(1, bounds.height);

			camera.aspect = width / height;
			camera.position.set(0, 0.08, width < 420 ? 5.95 : 4.85);
			camera.lookAt(0, 0, 0);
			camera.updateProjectionMatrix();
			stage.scale.setScalar(width < 420 ? 0.92 : 1.08);
			renderer.setSize(width, height, false);
		};

		const render = () => {
			const elapsed = clock.getElapsedTime();
			const breath = 1 + Math.sin(elapsed * 1.9) * 0.035;

			stage.rotation.y += (pointer.x * 0.32 - stage.rotation.y) * 0.045;
			stage.rotation.x += (pointer.y * 0.2 - stage.rotation.x) * 0.045;
			core.rotation.y = elapsed * 0.55;
			core.rotation.x = elapsed * 0.24;
			coreShell.rotation.y = -elapsed * 0.32;
			coreShell.rotation.x = elapsed * 0.18;
			innerCore.rotation.y = -elapsed * 0.8;
			innerCore.scale.setScalar(breath);
			glow.scale.setScalar(1.05 + Math.sin(elapsed * 2.3) * 0.08);
			bolt.material.opacity = 0.58 + Math.abs(Math.sin(elapsed * 3.2)) * 0.38;
			sparks.rotation.y = elapsed * 0.18;

			rings.forEach((ring) => {
				ring.rotation.z += ring.userData.speed * 0.01;
				ring.rotation.y += ring.userData.speed * 0.006;
			});

			renderer.render(scene, camera);

			if (!reduceMotion) {
				window.requestAnimationFrame(render);
			}
		};

		container.addEventListener('pointermove', (event) => {
			const bounds = container.getBoundingClientRect();
			pointer.x = ((event.clientX - bounds.left) / bounds.width - 0.5) * 2;
			pointer.y = -(((event.clientY - bounds.top) / bounds.height - 0.5) * 2);
		});

		container.addEventListener('pointerleave', () => {
			pointer.x = 0;
			pointer.y = 0;
		});

		const resizeObserver = new ResizeObserver(resize);
		resizeObserver.observe(container);
		resize();
		render();
	});
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initMobileMenu();
		initThemeToggle();
		initWhatsappWidget();
        runRevealAnimations();
		void initEnergyScene();
    }, { once: true });
} else {
    initMobileMenu();
	initThemeToggle();
	initWhatsappWidget();
    runRevealAnimations();
	void initEnergyScene();
}
