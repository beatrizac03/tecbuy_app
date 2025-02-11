const containerCards = document.querySelector('.contain-cards')

const botaoAnterior = document.querySelector('.btn-anterior')
const botaoProximo = document.querySelector('.btn-proximo')

let indexAtual = 0
let limiteCarrossel = 5
let ultimoIndex
let primeiroIndex

function comporCarrossel() {
    let cards = document.querySelectorAll('.product-card')
    cards.forEach((card, index) => {
        if(card.getBoundingClientRect().right < containerCards.getBoundingClientRect().right) {
            ultimoIndex = card
        } else {
            return;
        }
    })

    console.log(containerCards.getBoundingClientRect())

    botaoAnterior.addEventListener('click', moverPraEsquerda)
    botaoProximo.addEventListener('click', moverPraDireita)
}

function moverPraEsquerda() {

}

function moverPraDireita() {

}

document.addEventListener('cardsCarregados', () => {
    comporCarrossel()
})
 

