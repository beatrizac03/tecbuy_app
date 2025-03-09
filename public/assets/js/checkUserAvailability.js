const signup_form = document.getElementById('signup-form')

signup_form.addEventListener('submit', (event) => {
    event.preventDefault()

    sendFormToServer()
})

async function sendFormToServer() {
    const username = document.querySelector('#username').value
    const email = document.querySelector('#email').value
    const password = document.querySelector('#password').value

    const userData = {username, email, password}

    const requestInit = {
        "method": "POST",
        headers : {
        "Content-Type": "application/json",
        },
        "body": JSON.stringify( userData )
    }

    try {
        const response = await fetch('/../../index.php?action=checkRegisterAvailability', requestInit)
        const data = await response.json()

        console.log(data)
    } catch(e) {
        console.error(e)
    }

}