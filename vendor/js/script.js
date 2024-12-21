(function () {
  "use strict";
  /*jslint browser: true*/
  /*global $, jQuery, alert*/
  // Defaultly Hiding sidebar Overlay
  $("#sidebar_overlay").hide();

  // Tooltip

  if ($('[data-toggle="tooltip"]').length > 0) {
    $('[data-toggle="tooltip"]').tooltip();
  }
  // Select 2

  if ($(".select").length > 0) {
    $(".select").select2({
      minimumResultsForSearch: -1,
      width: "100%",
    });
  }
  // Date Time Picker

  if ($(".datetimepicker").length > 0) {
    $(".datetimepicker").datetimepicker({
      format: "YYYY-MM-DD",
      icons: {
        up: "fa fa-angle-up",
        down: "fa fa-angle-down",
        next: "fa fa-angle-right",
        previous: "fa fa-angle-left",
      },
    });
  }

  $(window).on("load", function () {
    $("#loader").delay(100).fadeOut("slow");
    $("#loader-wrapper").delay(500).fadeOut("slow");
    $("body").delay(500).css({ overflow: "visible" });
  });

  //sidebar open and close
  $(document).on("click", "#open_navSidebar", function () {
    $("#offcanvas_menu").css("width", "250px");
    $("#sidebar_overlay").show();
    $(".inner-wrapper").css("overflow", "hidden");
  });

  $(document).on("click", "#close_navSidebar", function () {
    $("#offcanvas_menu").css("width", "0px");
    $("#sidebar_overlay").hide();
    $(".inner-wrapper").css("overflow", "scroll");
  });

  $(document).on("click", "#sidebar_overlay", function () {
    $("#offcanvas_menu").css("width", "0px");
    $("#sidebar_overlay").hide();
  });

  /*================================
    stickey sidebar
    ==================================*/

  if ($(window).width() > 767) {
    if ($(".theiaStickySidebar").length > 0) {
      $(".theiaStickySidebar").theiaStickySidebar({
        // Settings
        additionalMarginTop: 20,
      });
    }
  }
})();

// Inspect keyCode

$(window).on("load", function () {
  document.onkeydown = function (e) {
    if (e.keyCode == 123) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
      return false;
    }

    if (e.ctrlKey && e.shiftKey && e.keyCode == "C".charCodeAt(0)) {
      return false;
    }
  };
});

document.oncontextmenu = function () {
  return false;
};
$(document).mousedown(function (e) {
  if (e.button == 2) {
    return false;
  }
  return true;
});
// delete functions
$(document).ready(function () {
  $(".removebtn").on("click", function () {
    $("#deletemodal").modal("show");
    console.log(data);
  });
});
$(document).ready(function () {
  $("#show_hide_password a").on("click", function (event) {
    event.preventDefault();
    if ($("#show_hide_password input").attr("type") == "text") {
      $("#show_hide_password input").attr("type", "password");
      $("#show_hide_password i").addClass("fa-eye-slash");
      $("#show_hide_password i").removeClass("fa-eye");
    } else if ($("#show_hide_password input").attr("type") == "password") {
      $("#show_hide_password input").attr("type", "text");
      $("#show_hide_password i").removeClass("fa-eye-slash");
      $("#show_hide_password i").addClass("fa-eye");
    }
  });
});
$(document).ready(function () {
  $(".addleave").on("click", function () {
    $("#add_leave").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    $("#request_id").val(data[0]);
  });
});

$(document).ready(function () {
  $("#download").click(function () {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("table"));
  });
});
// ===recent notifications
$(document).ready(function () {
  function load_unseen_notification(view = "") {
    $.ajax({
      url: "controllers/notification.controller/user.notification.contoller.php",
      method: "POST",
      data: { view: view },
      dataType: "json",
      success: function (data) {
        $(".notification").html(data.notification);
        if (data.unseen_notification > 0) {
          $(".count").html(data.unseen_notification);
          if ($(".count").text() != "") {
            $.notify("You have " + html(data.unseen_notification), "success");
          }
        }
      },
    });
  }
  load_unseen_notification();
  $("#approve").on("submit", function (event) {
    event.preventDefault();
    load_unseen_notification();
  });

  $(document).on("click", ".dropdown-toggle", function () {
    $(".count").html("");
    load_unseen_notification("yes");
  });
  setInterval(function () {
    load_unseen_notification();
  }, 5000);
});
// ===recent activities
$(document).ready(function () {
  function load_recents(view = "") {
    $.ajax({
      url: "controllers/notification.controller/notification.php",
      method: "POST",
      data: { view: view },
      dataType: "json",
      success: function (data) {
        $(".recent-comment").html(data.notification);
      },
    });
  }
  load_recents();
  setInterval(function () {
    load_recents();
  }, 5000);
});
$(document).ready(function () {
  $(".cancelbtn").on("click", function () {
    $("#cancelmodal").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    $("#leave_id").val(data[0]);
  });
});

// count day requset
function calculateDays() {
  var startDate = new Date(document.getElementById("start").value);
  var endDate = new Date(document.getElementById("end").value);

  // Calculate the difference in milliseconds

  var difference = endDate.getTime() - startDate.getTime();

  // Convert milliseconds to days
  var daysDifference = Math.ceil(difference / (1000 * 60 * 60 * 24));

  // Display the result
  document.getElementById("result").innerText = daysDifference;
}

// Attach event listeners to the input fields to trigger the calculation
document.getElementById("start").addEventListener("input", calculateDays);
document.getElementById("end").addEventListener("input", calculateDays);

// Call the function initially to display the initial count
calculateDays();
$(document).ready(function () {
  $("select").selectpicker();
});
