const apiUrl = 'https://fakestoreapi.com/products'
let dadosProdutos = []

const formarCards = () => {
    const containerCards = document.querySelector('.contain-cards')
    dadosProdutos.forEach(function(produto, index) {
        const card = document.createElement('div')
        card.classList.add('product-card')
        card.classList.add(`cp-${index}`)
    
        card.innerHTML = `<p>${produto.id}</p>`
    
        containerCards.appendChild(card)
    })
}

const apiData = async function () {
    const response = await fetch(`${apiUrl}`)
    const data = await response.json()

    dadosProdutos = data
    return dadosProdutos
}

apiData().then(() =>
    formarCards()
)














