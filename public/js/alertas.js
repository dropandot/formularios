(async () => {
    const { value: accept } = await Swal.fire({
        icon: 'success',
        title: '¡Felicidades!',
        text: 'La inscripción a sido realizada con exito ✨'
    })
    
    if (accept) {
        //Swal.fire('You agreed with T&C :)')
        window.location.href = "agradecimiento";
    }
})()