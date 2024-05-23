function dispatchError(error) {
  console.log("Errore: " + error);
}

function databaseResponse(json) {
  if (!json.ok) {
    dispatchError();
    return null;
  }
}

function checkResponse(response) {
  return response.json().then(databaseResponse);
}

function checkRating() {
  const error_msg = document.getElementById("maxrat");
  if (
    !form.rating.value ||
    isNaN(form.rating.value) ||
    form.rating.value < 0 ||
    form.rating.value > 10
  ) {
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    checkSubmit = false;
  } else {
    error_msg.classList.remove("errormsg");
    error_msg.classList.add("nascosto");
    checkSubmit = true;
  }
}

function checkReview() {
  const error_msg = document.getElementById("norev");
  if (reviewContent.value.length < 1 || reviewContent.value.length > 255) {
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    checkSubmit = false;
  } else {
    error_msg.classList.remove("errormsg");
    error_msg.classList.add("nascosto");
    checkSubmit = true;
  }
}

function saveReview() {
  if (isNaN(id)) {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("name", namer);
    formData.append("image", img);
    fetch("saveMovieReview.php", { method: "post", body: formData }).then(
      checkResponse
    );
  } else {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("name", namer);
    formData.append("image", img);
    fetch("saveGameReview.php", { method: "post", body: formData }).then(
      checkResponse
    );
  }
}

function check_credentials(event) {
  if (checkSubmit) {
    saveReview();
  } else {
    event.preventDefault();
  }
}

function onResponseLike(response) {
  if (!response.ok) {
    return null;
  }
  return response.json();
}

function onJsonLike(json) {
  console.log(json);
}

function getLikes() {
  const formData = new FormData();
  formData.append("id", id);
  fetch("getLikes.php", { method: "post", body: formData })
    .then(onResponseLike)
    .then(onJsonLike);
}

getLikes();
let checkSubmit = false;
let checkLike = false;
const form = document.querySelector("form");
form.rating.addEventListener("blur", checkRating);
const reviewContent = document.getElementById("review");
reviewContent.addEventListener("blur", checkReview);
form.addEventListener("submit", check_credentials);
const emptyheart = "public/favourite-heart-svgrepo-com.svg";
const fullheart = "public/favorite-svgrepo-com.svg";
