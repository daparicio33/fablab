//Campos tipo Password
function mostrarContrasena(){
    var tipo = document.getElementById("password");
    var btn = document.getElementById("iconpassword");
    if(tipo.type == "password"){
        tipo.type = "text";
        btn.removeAttribute('class');
        btn.setAttribute('class','far fa-eye-slash')
    }else{
        tipo.type = "password";
        btn.removeAttribute('class');
        btn.setAttribute('class','far fa-eye')
    }
}
//Mensages de Confirmacion
$(document).ready(function(){
    setTimeout(() => {
        $("#info").hide();
    }, 12000);
    });
    $(document).ready(function(){
        setTimeout(() => {
        $("#error").hide();
    }, 12000);
});
//Desactivar los botones luego del envio de informacion
$('#frm').submit(function(event){
    $("#btn").attr("disabled",true);
});