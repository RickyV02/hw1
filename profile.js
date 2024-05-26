function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function onJsonAvatar(json) {
  if (!json.nouser) {
    const avatar = document.getElementById("main-avatar");
    avatar.src = json.AVATAR;
    const mainusername = document.getElementById("main-username");
    mainusername.textContent = json.USERNAME;
  }
}

function fetchAvatar() {
  fetch("fetchUserAvatar.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonAvatar);
}

function onJsonUserGames(json) {
  const h1 = document.getElementById("game-header");
  if (json.nouser) {
    h1.textContent = "YOU HAVE NO FAVOURITE GAMES YET";
  } else {
    h1.textContent = "SOME OF YOUR FAVOURITE GAMES";
    const section = document.getElementById("favourite-games");
    for (item of json) {
      const gameLink = document.createElement("a");
      gameLink.href =
        "result.php?name=" +
        encodeURIComponent(item.GAME_NAME) +
        "&qid=videoGame";
      const cover = document.createElement("img");
      cover.src = item.COVER;
      gameLink.appendChild(cover);
      section.appendChild(gameLink);
    }
  }
}

function onJsonUserMovies(json) {
  const h1 = document.getElementById("movie-header");
  if (json.nouser) {
    h1.textContent = "YOU HAVE NO FAVOURITE MOVIES YET";
  } else {
    h1.textContent = "SOME OF YOUR FAVOURITE MOVIES";
    const section = document.getElementById("favourite-movies");
    for (item of json) {
      const gameLink = document.createElement("a");
      gameLink.href = "result.php?id=" + encodeURIComponent(item.FILM_ID);
      const cover = document.createElement("img");
      cover.src = item.COVER;
      gameLink.appendChild(cover);
      section.appendChild(gameLink);
    }
  }
}

function fetchUserInfo() {
  fetch("fetchUserMovies.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonUserMovies);
  fetch("fetchUserGames.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonUserGames);
}

fetchAvatar();
fetchUserInfo();
