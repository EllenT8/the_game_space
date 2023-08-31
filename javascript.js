
function validarSenha(){
    
    var senha = document.getElementById("senha").value;
    /*var link = document.createElement('link');

    link.setAttribute('rel', 'stylesheet');
    link.setAttribute('type', 'text/css');
    link.setAttribute('href', 'https://fonts.googleapis.com/css?family=Roboto+Slab:wght@200');
    document.head.appendChild(link);*/

    if (senha.length <7 || senha[0]== " " || senha.length >21){
        /*var errom = "Preencha o campo com no mínimo 7 caracteres e no máximo 21";
        errom.style.fontFamily = 'Roboto Slab';*/
        document.getElementById("erroSenha").innerHTML ="<span style=' color: rgb(239, 213, 252);'>* Preencha o campo com no mínimo 7 caracteres e no máximo 21</span>"
    } else {
        document.getElementById("erroSenha").innerHTML = "<span style='color: rgb(239, 213, 252);'>Senha válida</span>"
    }

}


