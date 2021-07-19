//Acciones User

$(document).ready(function () {
  $(".action-delete-user").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "users.php",
      data = {
        action: clickBtnValue,
      };
    $.post(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});

$(document).ready(function () {
  $(".action-edit-user").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "users.php",
      data = {
        action: clickBtnValue,
      };
    $.post(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});

//Acciones Client

$(document).ready(function () {
  $(".action-delete-client").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "clients.php",
      data = {
        action: clickBtnValue,
      };
    $.post(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});

$(document).ready(function () {
  $(".action-edit-client").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "clients.php",
      data = {
        action: clickBtnValue,
      };
    $.post(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});

//Acciones Cities

$(document).ready(function () {
  $(".action-delete-cities").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "cities.php",
      data = {
        action: clickBtnValue,
      };
    $.post(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});

$(document).ready(function () {
  $(".action-edit-cities").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "cities.php",
      data = {
        action: clickBtnValue,
      };
    $.post(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});
