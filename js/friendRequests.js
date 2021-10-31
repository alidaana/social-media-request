async function getrequestsAPI() {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/getFriendRequest.php",
    {
      method: "POST",
    }
  );

  if (!response.ok) {
    const message = "ERROR OCCURED";
    throw new Error(message);
  }

  const results = await response.json();
  return results;
}

function getRequests() {
  getrequestsAPI().then((results) => {
    $("#user").empty();
    if (results.length == 0) {
      $("#user").append(
        ' <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "></div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> No Friend requests so far </span> </div> </div> </div>'
      );
    } else {
      for (var i = 0; i < results.length; i++) {
        $("#user").append(
          '  <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "> <img src="assets/images/avatars/avatar-2.jpg" class=" bg-gray-200 border border-white rounded-full w-8 h-8 " /> </div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> ' +
            results[i]["username"] +
            ' wants to be your friend</span> <button id="' +
            results[i]["id"] +
            '" class="btn btn-success accept_button" style="float: right;"> Accept </button>  <button id="' +
            results[i]["id"] +
            '" class="btn btn-danger reject_button" style="float: right;"> Reject </button> </div> </div> </div>'
        );
      }

      $(".accept_button").click(function () {
        var id = this.id;
        accept(id);
        $("#" + id).remove();
        $(".reject_button").remove();
      });

      $(".reject_button").click(function () {
        var id = this.id;
        reject(id);
        $("#" + id).remove();
        $(".accept_button").remove();
      });
    }
  });
}

$("#friend_requests").click(getRequests);

async function acceptAPI(id) {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/acceptFriend.php",
    {
      method: "POST",
      body: new URLSearchParams({
        user_from: id,
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

function accept(id) {
  acceptAPI(id).then((results) => {
    console.log(results);
  });
}

async function rejectAPI(id) {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/declineFriend.php",
    {
      method: "POST",
      body: new URLSearchParams({
        user_from: id,
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

function reject(id) {
  rejectAPI(id).then((results) => {
    console.log(results);
  });
}
