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
  const item = document.querySelector(".pwd");
  if (item.type === "password") {
    item.type = "text";
    show_pwd.textContent = "Nascondi password";
  } else {
    item.type = "password";
    show_pwd.textContent = "Mostra password";
  }
}

const form = document.forms["login"];
form.addEventListener("submit", check_credentials);
const show_pwd = document.getElementById("show-password");
show_pwd.addEventListener("click", toggleVisibility);
