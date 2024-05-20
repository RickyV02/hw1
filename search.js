function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function onJson(json) {
  console.log(json);
}

function checkSearch() {
  fetch("checkSearch.php").then(onResponse).then(onJson);
}

checkSearch();
