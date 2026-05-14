(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    // Auto-dismiss alerts to keep screens cleaner during heavy CRUD usage.
    var alerts = document.querySelectorAll(".alert");
    alerts.forEach(function (alertEl) {
      window.setTimeout(function () {
        if (window.jQuery && jQuery(alertEl).alert) {
          jQuery(alertEl).alert("close");
        } else {
          alertEl.style.display = "none";
        }
      }, 7000);
    });

    var currentPath = window.location.pathname.split("/").pop();
    document.querySelectorAll(".navbar .nav-link").forEach(function (link) {
      var href = link.getAttribute("href");
      if (!href) {
        return;
      }

      if (href === currentPath) {
        link.classList.add("active");
      }
    });
  });
})();
