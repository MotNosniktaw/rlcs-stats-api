let form = document.querySelector('#login-form')
let message = document.querySelector('#login-response')

console.log(form)

form.addEventListener('submit', async event => {
    event.preventDefault()

    let user = form.user.value
    let password = form.password.value

    let data = {
        user: user,
        password: password
    }

    console.log(data)

    fetch('./login', {
        "credentials": "same-origin",
        "headers": {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: "POST",
        body: JSON.stringify(data)
    }).then(response => response.json())
    .then( responseJSON => {
        console.log(responseJSON)
        console.log(responseJSON.value)
        console.log(responseJSON.success)

        if(responseJSON.success === true) {
            window.location.replace('./home')
        } else {
            message.textContent = 'Username/Password combination is not recognised!'
        }
    })
})