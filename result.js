function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function onJson(json) {
  console.log(json);
}

function showResults() {
  if (search_id.includes("tt")) {
    if (search_qid === "videoGame") {
      fetch("FetchGame.php?q=" + encodeURIComponent(search_id))
        .then(onResponse)
        .then(onJson);
    } else {
      fetch("FetchMovie.php?q=" + encodeURIComponent(search_id))
        .then(onResponse)
        .then(onJsonMovie);
    }
  } else if (search_id.includes("nm")) {
    fetch("FetchOthers.php?q=" + encodeURIComponent(search_id))
      .then(onResponse)
      .then(onJsonOthers);
  }
}

showResults();
const modal_search = document.getElementById("modal_search");
const placeholder_img =
  "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png";
