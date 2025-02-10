let input_nomeUsuario = document.getElementById('nome_usuario')
let input_email = document.getElementById('email')

let span_nomeusuario = document.getElementById('nome_usuario-feedback')
let span_email = document.getElementById('email-feedback')

input_email.addEventListener('blur', function() {
    if(this.value.trim() === '') {
        addHiddenClass(span_email)
    } else {
        verificarDisponibilidade(input_email, this.value)
    }
})

input_nomeUsuario.addEventListener('blur', function() {
    if(this.value.trim() === '') {
        addHiddenClass(span_nomeusuario)
    } else {
        verificarDisponibilidade(input_nomeUsuario, this.value)
    }
})

function verificarDisponibilidade(field, value) {

    /**
     * @function fetch envia os dados dos inputs para o script php 'verificar-usuarioemail.php' em formato de JSON
     */
    fetch('../../src/Controle/verificar-usuarioemail.php', {
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