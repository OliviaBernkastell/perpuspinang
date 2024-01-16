$(document).on("show.bs.dropdown", ".scrolled-heighted-box", function (e) {
  var dropdown = $(e.target).find(".dropdown-menu");

  dropdown.appendTo("body");
  $(this).on("hidden.bs.dropdown", function () {
    dropdown.appendTo(e.target);
  });
});

function showPass() {
  var mata = document.getElementById("mata");
  var x = document.getElementById("password");

  if (mata.classList.contains("bi-eye-slash")) {
    mata.classList.remove("bi-eye-slash");
    mata.classList.add("bi-eye");
    x.type = "text";
  } else {
    mata.classList.remove("bi-eye");
    mata.classList.add("bi-eye-slash");
    x.type = "password";
  }
}

const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);
