function validatePassword(password) {
  const maiuscRegex = /[A-Z]/;
  if (!maiuscRegex.test(password)) {
    return false;
  }

  const spCharsRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
  if (!spCharsRegex.test(password)) {
    return false;
  }

  return true;
}

function validateEmail(email) {
  const emailRegex = /^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/;
  if (emailRegex.test(email)) return true;
  else return false;
}

function nascondiTutti() {
  const msgs = document.querySelectorAll(".errormsg");
  for (item of msgs) {
    item.classList.add("nascosto");
  }
}

function check_credentials(event) {
  nascondiTutti();
  if (form.password.value.length == 0 || form.rpassword.value.length == 0) {
    const error_msg = document.getElementById("nopwd");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  } else if (!validateEmail(form.email.value)) {
    const error_msg = document.getElementById("em");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  } else if (!validatePassword(form.password.value)) {
    const error_msg = document.getElementById("pwd");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  } else if (form.password.value !== form.rpassword.value) {
    const error_msg = document.getElementById("pwdmatch");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  } else if (!form.terms.checked) {
    const error_msg = document.getElementById("noterms");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  } else if (form.password.value.length < 8) {
    const error_msg = document.getElementById("minlength");
    error_msg.classList.remove("nascosto");
    error_msg.classList.add("errormsg");
    event.preventDefault();
  }
}

function toggleVisibility() {
  const pwdInputs = document.querySelectorAll(".pwd");
  for (item of pwdInputs) {
    if (item.type === "password") {
      item.type = "text";
      for (item of show_pwd) {
        item.src = hide;
      }
    } else {
      item.type = "password";
      for (item of show_pwd) {
        item.src = show;
      }
    }
  }
}

const hide = "public/eye_slash_visible_hide_hidden_show_icon_145987.svg";
const show = "public/eye_visible_hide_hidden_show_icon_145988.svg";
const form = document.forms["login"];
form.addEventListener("submit", check_credentials);
const show_pwd = document.querySelectorAll(".show-password");
for (item of show_pwd) {
  item.addEventListener("click", toggleVisibility);
}
