$(document).ready(function () {
  $(".action-delete").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "index.php",
      data = {
        action: clickBtnValue,
      };
    $.get(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});

$(document).ready(function () {
  $(".action-edit").click(function () {
    let clickBtnValue = $(this).val();
    let ajaxurl = "index.php",
      data = {
        action: clickBtnValue,
      };
    $.get(ajaxurl, data, function (response) {
      console.log(clickBtnValue);
    });
  });
});
