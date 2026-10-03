/* Visual enhancement only. All content and links are server rendered. */
(() => {
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
  if (reduce.matches || !('IntersectionObserver' in window)) return;
  document.documentElement.classList.add('v3-has-js');
  const observer = new IntersectionObserver((entries, current) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;
      entry.target.classList.add('is-seen');
      current.unobserve(entry.target);
    }
  }, { threshold: 0.12, rootMargin: '0px 0px 40px 0px' });
  document.querySelectorAll('.v3-passage__art, .v3-gateway .v3-portal').forEach(element => observer.observe(element));
})();
