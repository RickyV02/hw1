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
  const reviewTextarea = document.getElementById("review");
  if (reviewContent.length < 1 || reviewContent.length > 255) {
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    checkSubmit = false;
  } else {
    error_msg.classList.remove("errormsg");
    error_msg.classList.add("nascosto");
    checkSubmit = true;
  }
}

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
  if (!checkSubmit) {
    event.preventDefault();
  } else {
    saveReview();
  }
}

let checkSubmit = false;
const form = document.forms["login"];
form.rating.addEventListener("blur", checkRating);
form.review("blur", checkReview);
form.addEventListener("submit", check_credentials);
const emptyheart = "public/favourite-heart-svgrepo-com.svg";
const fullheart = "public/favorite-svgrepo-com.svg";
