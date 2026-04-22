/**
 * Simple dropdown/megamenu handler
 * - Hover on desktop shows megamenu (CSS handles hover)
 * - On touch/devices we toggle `.open` class on click
 */

document.addEventListener('DOMContentLoaded', function () {
  const nav = document.querySelector('.header-navbar');
  if (!nav) return;

  // Forzar cierre de todos los menús al cargar la página
  document.querySelectorAll('.header-navbar li.dropdown.open').forEach(el => el.classList.remove('open'));

  // Toggle on click para dispositivos táctiles
  nav.addEventListener('click', function (e) {
    const li = e.target.closest('li.dropdown');
    if (!li) return;

    // Solo el enlace disparador del dropdown debe alternar el menú en móvil.
    // Los enlaces internos deben navegar normalmente.
    const toggleLink = e.target.closest('a.header-link[href="#"]');
    if (window.innerWidth <= 992 && toggleLink && li.contains(toggleLink)) {
      e.preventDefault();
      li.classList.toggle('open');

      // cerrar los hermanos
      [...li.parentElement.children].forEach(sib => {
        if (sib !== li) sib.classList.remove('open');
      });
    }
  });

  // Cerrar megamenu al hacer clic fuera
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.header-navbar')) {
      document.querySelectorAll('.header-navbar li.dropdown.open').forEach(el => el.classList.remove('open'));
    }
  });

  // Cerrar menús al navegar (cambio de página)
  window.addEventListener('pageshow', function () {
    document.querySelectorAll('.header-navbar li.dropdown.open').forEach(el => el.classList.remove('open'));
  });
});
