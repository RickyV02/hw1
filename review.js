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
  const formData = new FormData();
  formData.append("id", id);
  formData.append("name", namer);
  formData.append("image", img);
  fetch("saveReview.php", { method: "post", body: formData }).then(onResponse);
}

function check_credentials(event) {
  if (checkSubmit) {
    saveReview();
  } else {
    event.preventDefault();
  }
}

function onResponse(response) {
  if (!response.ok) {
    return null;
  }
  return response.json();
}

function onJsonLike(json) {
  if (json.ok) {
    heart.src = fullheart;
    checkLike = true;
  } else {
    heart.src = emptyheart;
    checkLike = false;
  }
}

function getLike() {
  const formData = new FormData();
  formData.append("id", id);
  fetch("getLike.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonLike);
}

function ToggleHeart() {
  const formData = new FormData();
  formData.append("id", id);
  if (!checkLike) {
    formData.append("name", namer);
    formData.append("cover", img);
    fetch("saveLikes.php", { method: "post", body: formData })
      .then(onResponse)
      .then(onJsonLike);
  } else {
    fetch("deleteLikes.php", { method: "post", body: formData })
      .then(onResponse)
      .then(onJsonLike);
  }
}

let checkSubmit = false;
let checkLike = false;
const emptyheart = "public/empty.svg";
const fullheart = "public/full.svg";
const form = document.querySelector("form");
form.rating.addEventListener("blur", checkRating);
const reviewContent = document.getElementById("review");
reviewContent.addEventListener("blur", checkReview);
form.addEventListener("submit", check_credentials);
const heart = document.getElementById("heart");
heart.addEventListener("click", ToggleHeart);

getLike();
