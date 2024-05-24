function Rng() {
  return Math.floor(Math.random() * 5);
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

function onJsonReview(json) {
  const formTitle = document.querySelector(".review-form h1");
  if (!json.ok) {
    formTitle.textContent = "Write Your Review !";
  } else {
    formTitle.textContent = "Already Reviewed !";
    form.classList.add("nascosto");
    const profileLink = document.createElement("a");
    profileLink.href = "profile.php";
    profileLink.textContent = "See Your Review At Your Profile";
    const formDiv = document.querySelector(".review-form");
    formDiv.appendChild(profileLink);
  }
}

function saveReview() {
  const formData = new FormData();
  formData.append("id", id);
  formData.append("name", namer);
  formData.append("cover", img);
  formData.append("review", reviewContent.value);
  formData.append("rating", form.rating.value);
  fetch("saveReview.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonReview);
}

function check_credentials(event) {
  event.preventDefault();
  if (checkSubmit) {
    saveReview();
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

function getReview() {
  const formData = new FormData();
  formData.append("id", id);
  fetch("getReview.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonReview);
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

function onJsonRandomReviews(json) {
  console.log(json);
  const ReviewSection = document.getElementById("other-reviews");
  const sectionTitle = document.querySelector("#other-reviews h1");
  if (json.norev) {
    sectionTitle.textContent = "Our Users Reviews";
    for (let i = 0; i < 5; i++) {
      const index = Rng();
      const item = json[index];
      //da finire
    }
  } else {
    sectionTitle.textContent = "This title has not been reviewed yet!";
  }
}

function getRandomReviews() {
  fetch("getRandomReviews.php?q=" + encodeURIComponent(id))
    .then(onResponse)
    .then(onJsonRandomReviews);
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
getReview();
getRandomReviews();
