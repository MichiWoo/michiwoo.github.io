document.addEventListener('DOMContentLoaded', function() {
    var typed = new Typed('#typed', {
        strings: ['<span class="fa fa-wifi"></span>  Web Developer', '<span class="fa fa-user-o"></span>  Frontend Design', '<span class="fa fa-database"></span>  Backend Basic'],
        typeSpeed: 0,
        backSpeed: 0,
        fadeOut: true,
        loop: true
    });
});

const burgerButton = document.getElementById('burger-button');
burgerButton.addEventListener('click', toggleMenu);

const burgerButtonClose = document.getElementById('burger-buttonClose');
burgerButtonClose.addEventListener('click', toggleMenu);

const sectionDatos = document.getElementById('datos');
const sectionPortada = document.getElementById('portada');

const btnEnviarForm = document.getElementById('sendForm');
btnEnviarForm.addEventListener('click', mandarEmail);

function mandarEmail() {
    var inpName = document.getElementById('name');
    var name = inpName.value;
    
    var inpEmail = document.getElementById('email');
    var email = inpEmail.value;

    var inpMensaje = document.getElementById('message');
    var message = inpMensaje.value;
    
    var inpTelefono = document.getElementById('telefono');
    var telefono = inpTelefono.value;

    var goodToGo = false;
    var messageError = 'Tu solicitud no puede ser enviada';
    var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


    if (name && name.length > 0 && $.trim(name) !='' && message && message.length > 0 && $.trim(message) !='' && email && email.length > 0 && $.trim(email) !='' && telefono && telefono.length > 0 && $.trim(telefono) !='') {
        if (pattern.test(email)) {
            goodToGo = true;
        } else {
            console.log('Error en el correo');
            messageError = 'Por favor, revise su dirección de correo electrónico.';
            goodToGo = false;
        }
    } else {
        console.log('Algun campo está vacío');
        messageError = 'Tu debes llenar todos los campos del formulario!';
        goodToGo = false;
    }

    console.log(goodToGo);

    if (goodToGo) {

        var mandar_email = $.post('js/enviarMail.php', {nombre: name, mail: email, mensaje: message, telefono: telefono});
        mandar_email.done(function (data) {
        
            if (data.success = true) {
                console.log("Enviado");
                mostrarModalEmail(true);
            } else {
                mostrarModalEmail(false);
            }
        });
   
    } else {
            mostrarModalErrorEmail();
    
    }

}

function toggleMenu(){
    sectionDatos.classList.toggle('active');
    sectionPortada.classList.toggle('active');
    comprobarMenu();
};

function comprobarMenu(){
    if (sectionDatos.classList.contains('active')) {
        burgerButton.style.display = "none";
    } else {
        burgerButton.style.display = "initial";
    }
}

function mostrarModalEmail(trueOrFalse) {
    console.log(trueOrFalse);
}

function mostrarModalErrorEmail() {
    //Mostrar modal
    console.log('Modal Error Email');
}


