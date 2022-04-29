document.addEventListener('DOMContentLoaded', cargando);


function cargando() {
    if (document.querySelector('#formLogin')) {
        let formLogin = document.querySelector('#formLogin');
        
        formLogin.onsubmit = (e) => {
            e.preventDefault();
            let strEmail = document.querySelector('#loginEmail').value;
            let strPass = document.querySelector('#loginPassword').value;

            if (strEmail == '' || strPass == '') {
                alert('los campos estan vacios')
            } else {
                let data = new FormData(formLogin);


                let link = base_url + "/login/ingresar"
                fetch(link, {
                    method: 'POST',
                    body: data,
                })
                    .then(function (response) {
                        if (response.ok) {
                            return response.json()
                        } else {
                            throw "Error en la llamada Ajax";
                        }

                    })
                    .then(function (res) {
                        if(res.msg=='ok'){
                            location.href = base_url+'/dashboard'
                        }
                    })
                    .catch(function (err) {
                        console.log(err);
                    });
            }
        }
    }
}

