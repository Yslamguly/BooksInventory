window.onload = function () {
    let form = document.getElementById('upload-image')

    form.addEventListener('submit', function (e) {
        e.preventDefault()

        // e.target is the form that was submitted by the user

        let responseContainer = document.getElementById('upload-response')
        let uploadedImage = document.getElementById('uploaded-image')
        let formData = new FormData(e.target)

        let inputs = document.querySelectorAll(
            'form input, form textarea, form button'
        )
        toggleInputs(inputs)
        let htmlAlert = ''
        let htmlSuccess = ''
        axios
            .post(e.target.action, formData)
            .then(function (response) {
                const imageUrl = response.data.image_url
                const message = response.data.message
                console.log(imageUrl)
                htmlSuccess += `<img src="${imageUrl}" alt="" width="160">`

                htmlAlert +=`<div class='animate__animated animate__bounceInLeft alert alert-success'>
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                ${message}
                            </div>`

                uploadedImage.innerHTML = htmlSuccess
                responseContainer.innerHTML = htmlAlert

            })
            .catch(function (error) {
                // catch will run when we get back an http error from the server
                // responce code between 400 - 500
                const errorMessages = error.response.data.errors
                console.log(errorMessages);
                if (errorMessages.length > 0) {
                    htmlAlert += `<div class='animate__animated animate__bounceInLeft alert alert-error'>
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                        ${errorMessages}
                                  </div>`

                    responseContainer.innerHTML = htmlAlert
                }
            })
            .finally(function () {
                toggleInputs(inputs)
            })
    })
}

function toggleInputs(inputs) {
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = !inputs[i].disabled
    }
}
