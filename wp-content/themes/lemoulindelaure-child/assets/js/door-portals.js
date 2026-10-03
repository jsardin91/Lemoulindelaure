/* A brief opening on ordinary click; native links remain the fallback. */
document.addEventListener('click', (event) => {
  const link = event.target instanceof Element ? event.target.closest('a.lmdl-portal') : null;
  if (!link || event.defaultPrevented || event.button !== 0 ||
      event.metaKey || event.ctrlKey || event.shiftKey || event.altKey ||
      link.hasAttribute('download') || (link.target && link.target !== '_self') ||
      document.hidden || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  event.preventDefault();
  if (link.classList.contains('is-opening')) return;
  link.classList.add('is-opening');
  window.setTimeout(() => { window.location.assign(link.href); }, 550);
});
