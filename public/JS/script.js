$(document).on('show.bs.dropdown', '.scrolled-heighted-box', function(e) {
  var dropdown = $(e.target).find('.dropdown-menu');

      dropdown.appendTo('body');
  $(this).on('hidden.bs.dropdown', function () {
      dropdown.appendTo(e.target);
  })
});

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))