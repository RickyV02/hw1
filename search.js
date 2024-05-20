function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function onJson(json) {
}

function checkSearch() {
  console.log(searchname);
}

checkSearch();
