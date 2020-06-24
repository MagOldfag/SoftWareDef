$(document).ready(function() {
  $("#bta").click(function() {
    $.ajax({
      method: "POST", 
      url: "first_screen.php",
      data: $("#form :input").serialize(),
      success: function(msg) {
        $("#vivod").html(msg);
      }
    });
  });
});

$(document).ready(function() {
  $("#btn").click(function() {
    $.ajax({
      method: "POST", 
      url: "table_list.php", 
      data: $("#plan :input").serialize(),
      success: function(msg) {
        $("#block").html(msg);
      }
    });
  });
});