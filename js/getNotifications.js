async function getNotificationsAPI() {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/getNotifications.php",
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

function notifications() {
  getNotificationsAPI().then((results) => {
    $("#user").empty();
    if (results.length == 0) {
      $("#user").append(
        ' <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "></div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> No notifications so far </span> </div> </div> </div>'
      );
    } else {
      for (var i = 0; i < results.length; i++) {
        $("#user").append(
          '  <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "> <img src="assets/images/avatars/avatar-2.jpg" class=" bg-gray-200 border border-white rounded-full w-8 h-8 " /> </div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> ' +
            results[i]["description"] +
            ' </span> <button id="check_button" class="btn btn-success" style="float: right;">Check it out</button>  </div> </div> </div>'
        );
      }

      $("#check_button").click(function () {
        $("#friend_requests").click();
      });
    }
  });
}

$("#notifications").click(notifications);
