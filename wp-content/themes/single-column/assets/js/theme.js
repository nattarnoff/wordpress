document.documentElement.classList.add('has-js');

window.addEventListener('DOMContentLoaded', () => {
	const button = document.querySelector('.menu-toggle');
	const panel = document.getElementById('site-header-panel');

	if (!button || !panel) {
		return;
	}

	const mediaQuery = window.matchMedia('(max-width: 51.99rem)');

	const syncPanel = () => {
		if (mediaQuery.matches) {
			panel.hidden = button.getAttribute('aria-expanded') !== 'true';
			return;
		}

		button.setAttribute('aria-expanded', 'false');
		panel.hidden = false;
	};

	button.addEventListener('click', () => {
		const expanded = button.getAttribute('aria-expanded') === 'true';
		button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
		panel.hidden = expanded;
	});

	document.addEventListener('keyup', (event) => {
		if ('Escape' !== event.key || !mediaQuery.matches) {
			return;
		}

		button.setAttribute('aria-expanded', 'false');
		panel.hidden = true;
		button.focus();
	});

	if (mediaQuery.addEventListener) {
		mediaQuery.addEventListener('change', syncPanel);
	} else if (mediaQuery.addListener) {
		mediaQuery.addListener(syncPanel);
	}

	syncPanel();
});
