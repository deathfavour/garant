// Create overlay immediately (before DOMContentLoaded) so it covers the initial paint
const overlay = document.createElement('div');
overlay.id = 'page-overlay';
overlay.classList.add('visible');
document.documentElement.appendChild(overlay);

document.addEventListener('DOMContentLoaded', () => {
  // Reveal page — fade overlay out
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      overlay.classList.replace('visible', 'hidden');
    });
  });

  // Mobile nav toggle
  const toggle = document.querySelector('.nav__toggle');
  const links  = document.querySelector('.nav__links');
  if (toggle && links) {
    toggle.addEventListener('click', () => links.classList.toggle('open'));
  }

  // Intercept internal link clicks — fade overlay in, then navigate
  document.addEventListener('click', e => {
    const link = e.target.closest('a[href]');
    if (!link) return;
    const href = link.getAttribute('href');
    if (!href || href.startsWith('#') || href.startsWith('http') || href.startsWith('mailto')) return;

    e.preventDefault();
    overlay.classList.replace('hidden', 'visible');
    setTimeout(() => { window.location.href = href; }, 240);
  });
});
