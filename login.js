function nascondiTutti() {
  const msgs = document.querySelectorAll(".errormsg");
  for (item of msgs) {
    item.classList.add("nascosto");
  }
}

function check_credentials(event) {
  nascondiTutti();
  if (form.password.value.length == 0) {
    const error_msg = document.getElementById("nopwd");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  }
}

function toggleVisibility() {
  const it = document.querySelector(".pwd");
  if (it.type === "password") {
    it.type = "text";
    show_pwd.src = hide;
  } else {
    it.type = "password";
    show_pwd.src = show;
  }
}

const hide = "public/eye_slash_visible_hide_hidden_show_icon_145987.svg";
const show = "public/eye_visible_hide_hidden_show_icon_145988.svg";
const form = document.forms["login"];
form.addEventListener("submit", check_credentials);
const show_pwd = document.querySelector(".show-password");
show_pwd.addEventListener("click", toggleVisibility);
