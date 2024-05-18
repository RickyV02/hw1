function RandomNumber() {
  return Math.floor(Math.random() * 100);
}

function onJsonWeekly(json) {
  const topMovies = json.data;
  const livefeed = document.querySelector("#livefeed div");
  for (item of topMovies) {
    const movielink = document.createElement("a");
    movielink.href = "login.php";
    const movieThumb = item.primaryImage.imageUrl;
    const thumbImg = document.createElement("img");
    thumbImg.src = movieThumb;
    thumbImg.dataset.id = item.id;
    movielink.appendChild(thumbImg);
    livefeed.appendChild(movielink);
  }
}

function onJsonRandomMovies(json) {
  const livefeed = document.querySelector("#randommovies div");
  for (let i = 0; i < 10; i++) {
    const index = RandomNumber();
    const item = json[index];
    const movielink = document.createElement("a");
    movielink.href = "login.php";
    let movieThumb;
    if (item.hasOwnProperty("image")) {
      movieThumb = item.image;
    } else if (item.hasOwnProperty("thumbnail")) {
      movieThumb = item.thumbnail;
    } else {
      movieThumb = placeholder_img;
    }
    const thumbImg = document.createElement("img");
    thumbImg.src = movieThumb;
    thumbImg.dataset.id = item.imdbid;
    movielink.appendChild(thumbImg);
    livefeed.appendChild(movielink);
  }
}

function onJsonRandomSeries(json) {
  const livefeed = document.querySelector("#randomseries div");
  for (let i = 0; i < 10; i++) {
    const index = RandomNumber();
    const item = json[index];
    const movielink = document.createElement("a");
    movielink.href = "login.php";
    let movieThumb;
    if (item.hasOwnProperty("image")) {
      movieThumb = item.image;
    } else if (item.hasOwnProperty("thumbnail")) {
      movieThumb = item.thumbnail;
    } else {
      movieThumb = placeholder_img;
    }
    const thumbImg = document.createElement("img");
    thumbImg.src = movieThumb;
    thumbImg.dataset.id = item.imdbid;
    movielink.appendChild(thumbImg);
    livefeed.appendChild(movielink);
  }
}

function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function getContent() {
  fetch("FetchWeekly.php").then(onResponse).then(onJsonWeekly);
  fetch("FetchRandomMovies.php").then(onResponse).then(onJsonRandomMovies);
  fetch("FetchRandomSeries.php").then(onResponse).then(onJsonRandomSeries);
}

getContent();
const placeholder_img =
  "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png";
