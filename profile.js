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
    h1.textContent = "NO FAVOURITE GAMES YET";
  } else {
    h1.textContent = "FAVOURITE GAMES";
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
    h1.textContent = "NO FAVOURITE MOVIES OR SHOWS YET";
  } else {
    h1.textContent = "FAVOURITE MOVIES & SHOWS";
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

function onJsonDeleteReview(json) {
  if (json.ok == "delete") {
    const reviews = document.querySelectorAll(
      "#your-reviews .review-container .review"
    );
    for (item of reviews) {
      if (
        item.dataset.id == json.referenceid &&
        item.dataset.reviewid == json.id
      ) {
        item.parentNode.classList.add("nascosto");
        fetchUserInfo();
        break;
      }
    }
    const OtherReviews = document.querySelectorAll(
      "#favourite-reviews .review-container .review"
    );
    for (item of OtherReviews) {
      if (
        item.dataset.id == json.referenceid &&
        item.dataset.reviewid == json.id
      ) {
        item.parentNode.classList.add("nascosto");
        return;
      }
    }
  }
}

function deleteReview(event) {
  const button = event.currentTarget;
  const buttonDiv = button.parentNode.parentNode;
  const id = buttonDiv.querySelector(".review").dataset.reviewid;
  const referenceid = buttonDiv.querySelector(".review").dataset.id;
  const formData = new FormData();
  formData.append("id", id);
  formData.append("reference_id", referenceid);
  fetch("deleteReview.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonDeleteReview);
}

function onJsonMyReviews(json) {
  const sectionTitle = document.getElementById("my-header");
  if (!json.norev) {
    sectionTitle.textContent = "REVIEWS";
    const revDiv = document.getElementById("your-reviews");
    for (item of json) {
      const reviewBox = document.createElement("div");
      reviewBox.classList.add("review-container");
      const redirectLink = document.createElement("a");
      const moviediv = document.createElement("div");
      moviediv.classList.add("review");
      if (item.hasOwnProperty("GAME_ID")) {
        moviediv.dataset.id = item.GAME_ID;
        redirectLink.href =
          "result.php?name=" +
          encodeURIComponent(item.GAME_NAME) +
          "&qid=videoGame";
      } else {
        moviediv.dataset.id = item.FILM_ID;
        redirectLink.href = "result.php?id=" + encodeURIComponent(item.FILM_ID);
      }
      const cover = document.createElement("img");
      cover.src = item.COVER;
      cover.classList.add("poster");
      redirectLink.appendChild(cover);
      reviewBox.appendChild(redirectLink);
      moviediv.dataset.reviewid = item.ID;
      const review = document.createElement("div");
      const profileLink = document.createElement("a");
      profileLink.href = "profile.php?q=" + encodeURIComponent(item.USERNAME);
      const avatar = document.createElement("img");
      avatar.src = item.AVATAR;
      avatar.classList.add("avatar");
      profileLink.appendChild(avatar);
      review.appendChild(profileLink);
      const user = document.createElement("h2");
      user.textContent = item.USERNAME;
      review.appendChild(user);
      const revrat = document.createElement("p");
      revrat.textContent = "Rating: " + item.VOTO;
      revrat.classList.add("rating");
      review.appendChild(revrat);
      moviediv.appendChild(review);
      const revtxt = document.createElement("p");
      revtxt.textContent = item.RECENSIONE;
      revtxt.classList.add("text");
      moviediv.appendChild(revtxt);
      reviewBox.appendChild(moviediv);
      if (verifyUserSession) {
        const optionsBlock = document.createElement("div");
        optionsBlock.classList.add("options-block");
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "DELETE";
        deleteButton.classList.add("delete-button");
        deleteButton.addEventListener("click", deleteReview);
        optionsBlock.appendChild(deleteButton);
        const editButton = document.createElement("button");
        editButton.textContent = "EDIT";
        editButton.classList.add("edit-button");
        optionsBlock.appendChild(editButton);
        reviewBox.appendChild(optionsBlock);
      }
      revDiv.appendChild(reviewBox);
    }
    getReviewLikes();
  } else {
    sectionTitle.textContent = "YOU HAVEN'T WRITTEN ANY REVIEW YET";
  }
}

function onJsonMyLikedReviews(json) {
  const sectionTitle = document.getElementById("favourite-header");
  if (!json.norev) {
    sectionTitle.textContent = "LIKED REVIEWS";
    const revDiv = document.getElementById("favourite-reviews");
    for (item of json) {
      const reviewBox = document.createElement("div");
      reviewBox.classList.add("review-container");
      const moviediv = document.createElement("div");
      moviediv.classList.add("review");
      const redirectLink = document.createElement("a");
      if (item.hasOwnProperty("GAME_ID")) {
        moviediv.dataset.id = item.GAME_ID;
        redirectLink.href =
          "result.php?name=" +
          encodeURIComponent(item.GAME_NAME) +
          "&qid=videoGame";
      } else {
        moviediv.dataset.id = item.FILM_ID;
        redirectLink.href = "result.php?id=" + encodeURIComponent(item.FILM_ID);
      }
      const cover = document.createElement("img");
      cover.src = item.COVER;
      cover.classList.add("poster");
      redirectLink.appendChild(cover);
      reviewBox.appendChild(redirectLink);
      moviediv.dataset.reviewid = item.ID;
      const review = document.createElement("div");
      const profileLink = document.createElement("a");
      profileLink.href = "profile.php?q=" + encodeURIComponent(item.USERNAME);
      const avatar = document.createElement("img");
      avatar.src = item.AVATAR;
      avatar.classList.add("avatar");
      profileLink.appendChild(avatar);
      review.appendChild(profileLink);
      const user = document.createElement("h2");
      user.textContent = item.USERNAME;
      review.appendChild(user);
      const revrat = document.createElement("p");
      revrat.textContent = "Rating: " + item.VOTO;
      revrat.classList.add("rating");
      review.appendChild(revrat);
      moviediv.appendChild(review);
      const revtxt = document.createElement("p");
      revtxt.textContent = item.RECENSIONE;
      revtxt.classList.add("text");
      moviediv.appendChild(revtxt);
      reviewBox.appendChild(moviediv);
      if (verifyUserSession) {
        const likeHeart = document.createElement("img");
        likeHeart.src = "public/full.svg";
        likeHeart.classList.add("heart");
        likeHeart.addEventListener("click", RemoveReview);
        reviewBox.appendChild(likeHeart);
      }
      revDiv.appendChild(reviewBox);
    }
    getReviewLikes();
  } else {
    sectionTitle.textContent = "YOU HAVEN'T LIKED ANY REVIEW YET";
  }
}

function onJsonReviewLikes(json) {
  const reviews = document.querySelectorAll(".review");
  for (item of reviews) {
    if (
      item.querySelector("div h2").textContent == json.USERNAME &&
      item.dataset.reviewid == json.ID
    ) {
      if (!item.querySelector(".likes")) {
        const likes = document.createElement("p");
        likes.textContent = json.NUMLIKE + " likes";
        likes.classList.add("likes");
        item.appendChild(likes);
      } else {
        item.querySelector(".likes").textContent = json.NUMLIKE + " likes";
      }
    }
  }
}

function getReviewLikes() {
  const reviews = document.querySelectorAll(".review");
  const formData = new FormData();
  for (item of reviews) {
    const checkId = item.dataset.id;
    formData.append("id", checkId);
    formData.append("username", item.querySelector("div h2").textContent);
    fetch("getReviewLikes.php", { method: "post", body: formData })
      .then(onResponse)
      .then(onJsonReviewLikes);
  }
}

function onJsonShowMyLike(json) {
  const p = document.getElementById("favourites");
  if (json.nolikes) {
    p.textContent = "0 likes";
  } else {
    p.textContent = json.likes + " likes";
  }
}

function onJsonShowMyReviews(json) {
  const p = document.getElementById("written");
  if (json.norev) {
    p.textContent = "0 reviews";
  } else {
    p.textContent = json.rev + " reviews";
  }
}

function onJsonRemoveReview(json) {
  if (json.ok == "delete") {
    const reviews = document.querySelectorAll(
      "#favourite-reviews .review-container .review"
    );
    for (item of reviews) {
      if (
        item.dataset.id == json.referenceid &&
        item.dataset.reviewid == json.id
      ) {
        item.parentNode.classList.add("nascosto");
        return;
      }
    }
  }
}

function RemoveReview(event) {
  const img = event.currentTarget;
  const imgDiv = img.parentNode;
  const id = imgDiv.querySelector(".review").dataset.reviewid;
  const referenceid = imgDiv.querySelector(".review").dataset.id;
  const formData = new FormData();
  formData.append("id", id);
  formData.append("reference_id", referenceid);
  fetch("deleteReviewLike.php", { method: "post", body: formData })
    .then(onResponse)
    .then(onJsonRemoveReview);
}

function fetchUserFavourites() {
  fetch("fetchUserMovies.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonUserMovies);
  fetch("fetchUserGames.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonUserGames);
  fetch("fetchMyReviews.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonMyReviews);
  fetch("fetchMyLikedReviews.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonMyLikedReviews);
}

function fetchUserInfo() {
  fetch("fetchMyLikes.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonShowMyLike);
  fetch("fetchReviewCount.php?q=" + encodeURIComponent(username))
    .then(onResponse)
    .then(onJsonShowMyReviews);
}

function toggleSettings() {}

if (verifyUserSession) {
  const settings = document.getElementById("settings");
  settings.addEventListener("click", toggleSettings);
}

let settingsStatus = false;
fetchAvatar();
fetchUserInfo();
fetchUserFavourites();
