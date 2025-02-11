let input_emailNomeUsuario = document.getElementById('.email-nomeusuario')
let input_senha = document.getElementById('senha')

let span_feedback = document.getElementById('feedback-login')

input_emailNomeUsuario.addEventListener('blur', function() {
    if(this.value.trim() === '') {
        addHiddenClass(span_feedback)
    } else {
        verificarLogin(input_emailNomeUsuario, this.value)
    }
})

input_senha.addEventListener('blur', function() {
    if(this.value.trim() === '') {
        addHiddenClass(span_feedback)
    } else {
        verificarLogin(input_senha, this.value)
    }
})

function verificarLogin(field, value) {

    /**
     * @function fetch envia os dados dos inputs para o script php 'verificar-login.php' em formato de JSON
     */
    fetch('../../src/Controle/verificar-login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ [field.name]: value })
    })
    .then(response => response.json())
    .then(data => {
      const feedback = document.getElementById(`${field.name}-feedback`);
      if ((field.name === 'email' && data.statusEmail === 'disponivel') ||
      (field.name === 'nome_usuario' && data.statusNomeUsuario === 'disponivel')) {
        feedback.innerHTML = `${field.name.charAt(0).toUpperCase() + field.name.slice(1)} disponível`;
        feedback.style.color = 'green';
      } else {
        feedback.innerHTML = field.name === 'email' ? "E-mail já está em uso" : "Nome de usuário já está em uso";
        feedback.style.color = 'red';
      }
    })
    .catch(error => console.error('Erro:', error));
}

function addHiddenClass(element) {
    element.classList.add('hidden')
}

function removeHiddenClass(element) {
    element.classList.remove('hidden')
}