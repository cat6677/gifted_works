$(function () {
    $('.ac-parent').on('click', function () {
    $(this).next().slideToggle();
  });
});