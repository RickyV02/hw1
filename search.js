function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function onJson(json) {
  const results = json.d;
  console.log(results);
  modal_search.innerHTML = "";
  if (results.length === 0) {
    const msg = document.createElement("h2");
    msg.textContent = "NO RESULTS !";
    modal_search.appendChild(msg);
  }
  for (item of results) {
    const nome = item.l;
    let poster;
    if (!item.i) {
      poster = placeholder_img;
    } else {
      poster = item.i.imageUrl;
    }
    const movie_list = document.createElement("a");
    const poster_url = document.createElement("img");
    poster_url.src = poster;
    const title = document.createElement("h2");
    title.textContent = nome;
    movie_list.dataset.id = item.id;
    movie_list.href =
      "result.php?id=" +
      encodeURIComponent(item.id) +
      "&qid=" +
      encodeURIComponent(item.qid);
    movie_list.appendChild(title);
    movie_list.appendChild(poster_url);
    modal_search.appendChild(movie_list);
  }
}

function showSearch() {
  fetch("FetchRequest.php?q=" + encodeURIComponent(searchname))
    .then(onResponse)
    .then(onJson);
}

showSearch();
const modal_search = document.getElementById("modal_search");
const placeholder_img =
  "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png";
