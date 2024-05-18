function RandomNumber() {
  return Math.floor(Math.random() * 100) + 1;
}

function onJsonRandomMovies(json) {
  console.log(json);
}

function onResponse(response) {
  if (!response.ok) {
    console.log("Error: " + response);
    return null;
  } else return response.json();
}

function getMovies() {
  fetch("searchRandomMovies.php").then(onResponse).then(onJsonRandomMovies);
}

getMovies();
