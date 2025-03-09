let span_feedback = document.getElementById('feedback-login')
const form_login = document.getElementById('form-login')

form_login.addEventListener('submit', async (event) => {
  event.preventDefault()

  let input_emailNomeUsuario = document.getElementById('email-nomeusuario').value
  let input_senha = document.getElementById('senha').value

  verificarLogin(input_emailNomeUsuario, input_senha)
})

async function verificarLogin(nomeusuario_email, senha) {
  const requestInit = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 
      "email-nomeusuario": nomeusuario_email,
      "senha": senha
    })
  }

  try {
    const response = await fetch('../../src/Controle/processar-login.php', requestInit)
    const data = await response.json()

    if(data.dadosCorrespondem === 'nao') {
      span_feedback.innerHTML = "Não foi possível buscar a conta associada aos dados preenchidos. Tente novamente."
      span_feedback.style.color = 'red'
    } else {
      window.location.href = '../../index.php'
    }
  } catch (e) {
    console.error(e)
  }
}

function addHiddenClass(element) {
    element.classList.add('hidden')
}

function removeHiddenClass(element) {
    element.classList.remove('hidden')
}