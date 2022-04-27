window.onload = function() {
    let form = document.getElementById('upload-image');

    form.addEventListener('submit', function(e){//what is "e"
        e.preventDefault();

        let responseContainer = document.getElementById('upload-response');
        let formData = new FormData(e.target);

        let inputs = document.querySelectorAll('form input, fomr textarea, form button');
        toggleInputs(inputs);

        //e.target is the form that was submitted by the user 
        axios.post(e.target.action,formData)
        .then(function(response) { //.then will run when good response will be send
            console.log(response);
        }).catch(function(error) { //catch block will run when error is thrown by the server
            console.log('error happened' + error);
            let htmlError = '';
            const errorMessages = error.response.data.errors  //array with all the error messages that were sent by  the server 
            if(errorMessages.length > 0){
                htmlError+= '<div class="alert alert-error"><ul>'
                for(let  i = 0; i < errorMessages.length; i++){
                    htmlError+= `<li>${errorMessages[i]}</li>`
                }
                htmlError += '</ul></div>';

                responseContainer.innerHTML = htmlError;
                console.log(htmlError);
            }

        }).finally(function() {
            toggleInputs(inputs);
        });

    })
    function toggleInputs(inputs){
        for(let i = 0;i < inputs.length;i++){
            inputs[i].disabled = !inputs[i].disabled;
        }
    }
}