/************************* Update product ***************************** */

// File type validation
$(".image-product").change(function(e) {
  var file = this.files[0];
  var fileType = file.type;
  var match = ["image/jpeg", "image/png", "image/jpg"];
  if (!(fileType == match[0] || fileType == match[1] || fileType == match[2])) {
    alert("Sorry, only JPG, JPEG, & PNG files are allowed to upload.");
    $(".image-product").val("");
    return false;
  }

  $(".view-clothes-container").change(function(e) {
    e.preventDefault();
    var property_update_id = $(this).attr("data-id");
    console.log(property_update_id);
    var fd = new FormData();
    fd.append("id", property_update_id);
    fd.append(
      "image-product",
      $("input[name=image-product" + property_update_id + "]")[0].files[0]
    );
    $.ajax({
      url: "../includes/update.image.product.php",
      method: "POST",
      data: fd,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false
    })
      .done(function(response) {
        if (response.status === 1) {
          window.location = "../profile/profile.php";
        } else {
          $("#error_message").text(response.message);
        }
        console.log(response);
      })
      .fail(function(fail) {
        $("#error_message").text(fail.message);
      });
  });
});

$(document).on("blur", ".view-clothes-container select", function(e) {
  e.preventDefault();
  console.log("calling update property");
  var property_update_id = $(this).attr("data-id");
  var sUpdateKey = $(this).attr("data-update");
  var sNewValue = $(this).val();
  console.log("property_update_id", property_update_id);
  console.log("sUpdateKey", sUpdateKey);
  console.log("sNewValue", sNewValue);
  $.ajax({
    url: "../includes/update.products.php", //the end point, "file"
    method: "POST",
    data: {
      id: property_update_id,
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function() {
    console.log("all good in the hood");
    // location.reload();
  });
});

$(document).on("blur", ".view-clothes-container input", function(e) {
  e.preventDefault();
  console.log("calling update property");
  var property_update_id = $(this).attr("data-id");
  var sUpdateKey = $(this).attr("data-update");
  var sNewValue = $(this).val();
  console.log("property_update_id", property_update_id);
  console.log("sUpdateKey", sUpdateKey);
  console.log("sNewValue", sNewValue);
  $.ajax({
    url: "../includes/update.products.php", //the end point, "file"
    method: "POST",
    data: {
      id: property_update_id,
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function() {
    console.log("all good in the hood");
    // location.reload();
  });
});

$(".view-clothes-container input").attr({ disabled: "disabled" });
$(".update-select").css("display", "none");

$().ready(function() {
  $(".view-clothes-edit").click(function() {
    var property_id = $(this).attr("data-id");
    console.log(property_id);
    $(`#${property_id}.view-clothes-container input`).each(function() {
      if ($(this).attr("disabled")) {
        $(this).removeAttr("disabled");
        $(this).css({ background: "#f2cec5", color: "#FFF", padding: "5px" });
        $(".update-select").css("display", "block");
        $(".update-nodisplay").css("display", "none");
      } else {
        $(this).attr({ disabled: "disabled" });
        $(this).css({ background: "white", color: "#e8a798" });
        $(".update-nodisplay").css("display", "block");
        $(".update-select").css("display", "none");
      }
    });
  });
});

/********** UPDATE IMAGE PRODUCT ************* */

// $('form#upload-clothes-form').submit(function(event){

// })
