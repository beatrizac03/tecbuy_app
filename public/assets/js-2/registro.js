/**
 * @description This script receives form data from 'src/views/signup.php', makes a POST request to SignUpController, which will verify if the posted data is available to use, and return a response in JSON to that.
 */

const signup_form = document.getElementById('signup_form')

let input_username = document.getElementById("username");
let input_email = document.getElementById("email");

const feedback_span = document.getElementById('feedback');

signup_form.addEventListener('submit') = (event) => {
  event.preventDefault()
}

input_email.addEventListener("blur", function () {
  if (this.value.trim() === "") {
    addHiddenClass(feedback_span);
  } else {
    verifyAvailability(input_email, this.value);
  }
});

input_username.addEventListener("blur", function () {
  if (this.value.trim() === "") {
    addHiddenClass(feedback_span);
  } else {
    verifyAvailability(input_username, this.value);
  }
});

  /**
   * @function verifyAvailability Send input data in JSON to SignUpController,
   * and displays in an HTML span if the data cannot be used
   */

async function verifyAvailability(field, value) {

  const requestInit = {
    "method": "POST",
    headers : {
      "Content-Type": "application/json",
    },
    "body": JSON.stringify({ [field.name]: value })
  }

  try {
    const response = await fetch('/api/auth/sign-up', requestInit)
    const data = await response.json()

    const feedback = document.getElementById('feedback');
      if (data.status === "falha") {
        feedback.innerHTML = "E-mail ou nome de usuário já estão em uso.";
        feedback.style.color = "red";
      }
  } catch(e) {
    console.error(e)
  }
}

function addHiddenClass(element) {
  element.classList.add("hidden");
}

function removeHiddenClass(element) {
  element.classList.remove("hidden");
}

  /*
    old code

  fetch("/../../../src/controllers/SignUpController.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ [field.name]: value }),
  })
    .then((response) => response.json())
    .then((data) => {
      const feedback = document.getElementById(`${field.name}-feedback`);
      if (
        (field.name === "email" && data.statusEmail === "disponivel") ||
        (field.name === "username" &&
          data.statusNomeUsuario === "disponivel")
      ) {
        feedback.innerHTML = `${
          field.name.charAt(0).toUpperCase() + field.name.slice(1)
        } disponível`;
        feedback.style.color = "green";
      } else {
        feedback.innerHTML =
          field.name === "email"
            ? "E-mail já está em uso"
            : "Nome de usuário já está em uso";
        feedback.style.color = "red";
      }
    })
    .catch((error) => console.error("Erro:", error));
    */



