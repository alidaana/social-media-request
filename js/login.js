async function loginAPI() {
  var email = $("#login_email").val();
  var password = $("#login_password").val();

  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/login.php", {
      method: "POST",
      body: new URLSearchParams({
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

function login() {
  loginAPI().then((results) => {
    if (results.success == 1) {
      $("#message2").empty();
      location.replace("feed.php");
    } else {
      $("#message2").empty();
      $("#message2").append("wrong email or password!").css("color", "red");
    }
  });
}

$("#login_button").click(login);