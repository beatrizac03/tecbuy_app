window.addEventListener('load', () => {
    const botoesAutenticao = document.querySelector('.btn-area')
    const botaoLogOff = document.querySelector('.log-off')
    const iconUsuario = document.querySelector('.user-icon')
    const p_username = document.querySelector('.user-name')

    /**
     * @description se o usuário estiver logado, os botoesAutenticacao não devem estar visíveis, já logOff e iconUsuario precisam estar.
     */
    if(window.usuarioLogado && window.dadosUsuario) {
        gerenciarVisibilidadeElemento(botoesAutenticao, 'ficarInvisivel')
        gerenciarVisibilidadeElemento(botaoLogOff, 'aparecer')
        gerenciarVisibilidadeElemento(iconUsuario, 'aparecer')

        const nome_usuario = window.dadosUsuario.nome_usuario
        const email = window.dadosUsuario.email

        p_username.textContent = nome_usuario;
    } else {
        gerenciarVisibilidadeElemento(botoesAutenticao, 'aparecer')
        gerenciarVisibilidadeElemento(botaoLogOff, 'ficarInvisivel')
        gerenciarVisibilidadeElemento(iconUsuario, 'ficarInvisivel')
    }

    botaoLogOff.addEventListener('click', () => {
        realizarLogOff()
    })
})

function gerenciarVisibilidadeElemento(elemento, opcao) {
    if(opcao === 'ficarInvisivel') {
        elemento.classList.add('hidden')
    } else {
        elemento.classList.remove('hidden')
    }
}

async function realizarLogOff() {
    const requestInit = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({'action': 'logoff'})
    }

    try {
        const response = await fetch('../../src/Controle/processar-logoff.php', requestInit)
        const dados = await response.json()

        if (dados.success) {
            window.location.href = '../../index.php'
        } else {
            console.error('Erro no log-off:', data.message);
        }
    } catch(e) {
        console.error(e)
    }

}
