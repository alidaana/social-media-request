async function blockAPI(id) {
  const response = await fetch(
    "http://localhost/FSW_Bootcamp/Implement%20Facebook-Ali%20Daana/php/blockUser.php",
    {
      method: "POST",
      body: new URLSearchParams({
        user_to_block: id,
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

function block(id) {
  blockAPI(id).then((results) => {
    console.log(results.success);
  });
}
