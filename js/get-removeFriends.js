async function getFriendsAPI() {
  $("#user").empty();
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/getFriends.php",
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

function getFriends() {
  getFriendsAPI().then((results) => {
    for (var i = 0; i < results.length; i++) {
      $("#user").append(
        '  <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "> <img src="assets/images/avatars/avatar-2.jpg" class=" bg-gray-200 border border-white rounded-full w-8 h-8 " /> </div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> ' +
          results[i]["username"] +
          '(friend)</span>  <button id="' +
          results[i]["id"] +
          '" class="btn btn-danger remove_button" style="float: right;"> remove </button> </div> </div> </div>'
      );
    }

    $(".remove_button").click(function () {
      var id = this.id;
      remove(id);
      $("#" + id).remove();
    });
  });
}

$("#friends").click(getFriends);

async function removeAPI(id) {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/removeFriend.php",
    {
      method: "POST",
      body: new URLSearchParams({
        user_to_remove: id,
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

function remove(id) {
  removeAPI(id).then((results) => {
    console.log(results);
  });
}
