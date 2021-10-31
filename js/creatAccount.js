async function creatAccount() {
  var username = $("#username").val();
  var email = $("#email").val();
  var password = $("#password").val();

  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/creatAccount.php",
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

function creat() {
  creatAccount().then((results) => {
    if (results.length > 1) {
      $("#message").empty();
      for (var i = 0; i < results.length; i++) {
        $("#message").append(results[i]).css("color", "red");
      }
    } else {
      console.log(results);
      $("#message").empty();

      $("#message").append("Account Created!").css("color", "Green");

      $("#username").val("");
      $("#email").val("");
      $("#password").val("");
      $("#confirm_password").val("");
      $("#register_button").attr("disabled", true);
    }
  });
}

$("#register_button").click(creat);
