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
    getInfo();
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

function onJsonRandomReviews(json) {
  const sectionTitle = document.querySelector("#other_reviews h1");
  if (!json.norev) {
    sectionTitle.textContent = "Some of Our Users Reviews";
    const revDiv = document.getElementById("reviews-box");
    const displayedReviews = [];
    for (let i = 0; i < 5; i++) {
      let index;
      do {
        index = Rng();
      } while (displayedReviews.includes(index));
      displayedReviews.push(index);
      const item = json[index];
      const moviediv = document.createElement("div");
      moviediv.classList.add("review");
      const review = document.createElement("div");
      const profileLink = document.createElement("a");
      profileLink.href = "profile.php?q=" + encodeURIComponent(item.USERNAME);
      const avatar = document.createElement("img");
      avatar.src = item.AVATAR;
      profileLink.appendChild(avatar);
      review.appendChild(profileLink);
      const user = document.createElement("h2");
      user.textContent = item.USERNAME;
      review.appendChild(user);
      const revrat = document.createElement("p");
      revrat.textContent = "Rating: " + item.VOTO;
      review.appendChild(revrat);
      moviediv.appendChild(review);
      const revtxt = document.createElement("p");
      revtxt.textContent = item.RECENSIONE;
      moviediv.appendChild(revtxt);
      revDiv.appendChild(moviediv);
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

function onJsonShowLike(json) {
  const par = document.getElementById("likes");
  par.textContent = json.info + " likes";
}

function onJsonShowReviews(json) {
  const par = document.getElementById("reviews");
  par.textContent = json.info + " reviews";
}

function getInfo() {
  const formData = new FormData();
  formData.append("id", id);
  fetch("getNumLikes.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonShowLike);
  fetch("getNumReviews.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonShowReviews);
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
  getInfo();
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
form.addEventListener("submit", getInfo);
const heart = document.getElementById("heart");
heart.addEventListener("click", ToggleHeart);

getLike();
getReview();
getRandomReviews();
getInfo();
