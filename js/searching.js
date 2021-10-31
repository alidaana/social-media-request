async function searchAPI() {
  var search_input = $("#search_bar").val();

  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/get_searched_users.php",
    {
      method: "POST",
      body: new URLSearchParams({
        search_input: search_input,
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

function search() {
  searchAPI().then((results) => {
    $("#user").empty();
    if (results.length == 0) {
      $("#user").append(
        ' <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "></div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> No results found </span> </div> </div> </div>'
      );
    } else {
      for (var i = 0; i < results.length; i++) {
        $("#user").append(
          '  <div class=" bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0 "> <div class="flex justify-between items-center px-4 py-3"> <div class="flex flex-1 items-center space-x-4"> <a href="#"> <div class=" bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full "> <img src="assets/images/avatars/avatar-2.jpg" class=" bg-gray-200 border border-white rounded-full w-8 h-8 " /> </div> </a> <span class="block capitalize font-semibold dark:text-gray-100"> ' +
            results[i]["username"] +
            ' </span> <button id="' +
            results[i]["id"] +
            '" class="btn btn-success add_button" style="float: right;">Add friend</button> <button style="float: right;" id="' +
            results[i]["id"] +
            '" href="#" class="btn btn-danger block_button">Block</button> </div> </div> </div>'
        );
      }

      $(".add_button").click(function () {
        var id = this.id;
        $("#" + id).remove();

        add(id);
      });
      $(".block_button").click(function () {
        var id = this.id;
        $("#" + id + ".block_button").remove();
        $("#" + id + ".add_button").remove();
        block(id);
      });
    }
  });
}

$("#search_button").click(function () {
  if (!$("#search_bar").val() == "") {
    search();
  }
});
