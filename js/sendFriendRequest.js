async function addAPI(id) {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/addFriend.php",
    {
      method: "POST",
      body: new URLSearchParams({
        user_to: id,
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

function add(id) {
  addAPI(id).then((results) => {
    console.log(results.success);
  });
}
