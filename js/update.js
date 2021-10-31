$("#update").click(() => {
  $("#user").empty();
  $("#user").append(
    '<div class="bg-white rounded-md lg:shadow-lg shadow col-span-2"> <div class="grid grid-cols-2 gap-3 lg:p-6 p-4"> <div> <label for="">Username</label> <input required type="text" placeholder="username..." id="update_username" class="shadow-none bg-gray-100"> </div> <div class="col-span-2"> <label for=""> Email</label> <input required type="text" placeholder="email..." id="update_email" class="shadow-none bg-gray-100"> </div> <div class="col-span-2"> <label for="">password</label> <input required type="password" placeholder="*******" id="password" class="shadow-none bg-gray-100"> </div><div class="col-span-2"> <label for="">Confirm password</label> <input type="password" placeholder="*******" id="password2" class="shadow-none bg-gray-100"> <span id = "message"></span> </div> </div> <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3"> <button type="button" id="update_button" disabled class="button bg-blue-700">Update</button> </div> </div>'
  );

  $("#update_button").click(update);

  $("#update_button").attr("disabled", true);
  $("#password, #password2").on("keyup", function () {
    if ($("#password").val() == $("#password2").val()) {
      $("#message").html("  Passwords match").css("color", "green");
      $("#update_button").attr("disabled", false);
    } else {
      $("#message").html("  Passwords donot match").css("color", "red");
      $("#update_button").attr("disabled", true);
    }
  });
});

async function updateAccount() {
  var username = $("#update_username").val();
  var email = $("#update_email").val();
  var password = $("#password").val();

  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/update.php",
    {
      method: "POST",
      body: new URLSearchParams({
        username: username,
        email: email,
        password: password,
      }),
    }
  );

  if (!response.ok) {
    const message = "ERROR OCCURED";
    throw new Error(message);
  }

  const results = await response.json();
  return results;
}

function update() {
  updateAccount().then((results) => {
    if (results.length > 1) {
      $("#message").empty();
      for (var i = 0; i < results.length; i++) {
        $("#message").append(results[i]).css("color", "red");
      }
    } else {
      console.log(results);
      $("#message").empty();

      $("#message").append("Account updated!").css("color", "Green");

      $("#update_username").val("");
      $("#update_email").val("");
      $("#password").val("");
      $("#password2").val("");
      $("#update_button").attr("disabled", true);
    }
  });
}
