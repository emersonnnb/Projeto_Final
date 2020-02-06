validacao = 0;
function validaNome() {
    nome = form_contato.nome.value;
    if (nome.length < 10) {
        document.getElementById("vNome").style.color = "red";
        document.getElementById("vNome").innerHTML = " *";
        document.getElementById("nome").focus();
    } else {
        document.getElementById("vNome").style.color = "green";
        document.getElementById("vNome").innerHTML = " Ok";
        validacao++;
    }
    ;
}
;
function validaEmail() {
    email = form_contato.email.value;
    var email1 = document.getElementById("vEmail");
    var emailStatus = document.getElementById("emailStatus");
    if (email.indexOf('@') > 0 && email.indexOf('.') > 0) {
        email1.style.color = "green";
        email1.innerHTML = " Ok";
        emailStatus.innerHTML = "";
        emailStatus.classList.remove("alert");
        emailStatus.classList.remove("alert-danger");
        validacao++;
    } else {
        email1.style.color = "red";
        email1.innerHTML = " *";
        email1.focus();
        emailStatus.innerHTML = "Digite um email válido.";
        emailStatus.setAttribute("class", "alert alert-danger");
    }
}
;
function validaSenha() {
    var senha1 = form_contato.senha.value;
    var senha2 = form_contato.senha2.value;
    var valSenha = document.getElementById("vSenha");
    var senhaStatus = document.getElementById("senhastatus");
    if (senha1.length < 8) {
        valSenha.style.color = "red";
        valSenha.innerHTML = " *";
        senhaStatus.innerHTML = "Digite uma senha de no mínimo 8 digitos";
        senhaStatus.setAttribute("class", "alert alert-danger");
        document.getElementById("senha").focus();
    } else {
        valSenha.style.color = "green";
        valSenha.innerHTML = " Ok";
        senhaStatus.innerHTML = "";
        senhaStatus.classList.remove("alert");
        senhaStatus.classList.remove("alert-danger");
        validacao = 1;
    }
    if (validacao == 1 && senha2 >= 8) {
        if (senha1 == senha2) {
            document.getElementById("vSenha2").style.color = "green";
            document.getElementById("vSenha2").innerHTML = " Ok";
            senhaStatus.innerHTML = "";
            senhaStatus.classList.remove("alert");
            senhaStatus.classList.remove("alert-danger");
        } else {
            senhaStatus.innerHTML = "Senhas não confere.";
            senhaStatus.setAttribute("class", "alert alert-danger");
        }
    }
}
;
function validaCPF(cpf)
{
    erro = new String;
    var cpfStatus = document.getElementById("cpfStatus");
    if (cpf.value.length == 11)
    {
        cpf.value = cpf.value.replace('.', '');
        cpf.value = cpf.value.replace('.', '');
        cpf.value = cpf.value.replace('-', '');

        var nonNumbers = /\D/;

        if (nonNumbers.test(cpf.value))
        {
            erro = "A verificacao de CPF suporta apenas números!";
            cpf.focus();
            cpfStatus.innerHTML = erro;
            cpfStatus.setAttribute("class", "alert alert-danger");
        } else
        {
            if (cpf.value == "00000000000" ||
                    cpf.value == "11111111111" ||
                    cpf.value == "22222222222" ||
                    cpf.value == "33333333333" ||
                    cpf.value == "44444444444" ||
                    cpf.value == "55555555555" ||
                    cpf.value == "66666666666" ||
                    cpf.value == "77777777777" ||
                    cpf.value == "88888888888" ||
                    cpf.value == "99999999999") {

                erro = "Número de CPF inválido!"

            }

            var a = [];
            var b = new Number;
            var c = 11;

            for (i = 0; i < 11; i++) {
                a[i] = cpf.value.charAt(i);
                if (i < 9)
                    b += (a[i] * --c);
            }

            if ((x = b % 11) < 2) {
                a[9] = 0
            } else {
                a[9] = 11 - x
            }
            b = 0;
            c = 11;

            for (y = 0; y < 10; y++)
                b += (a[y] * c--);

            if ((x = b % 11) < 2) {
                a[10] = 0;
            } else {
                a[10] = 11 - x;
            }

            if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {
                erro = "Número de CPF inválido.";

            } else {
                cpfStatus.innerHTML = "";
                cpfStatus.classList.remove("alert");
                cpfStatus.classList.remove("alert-danger");
            }
        }
    } else
    {
        if (cpf.value.length == 0)
            return false
        else
            erro = "Número de CPF inválido.";
        cpf.focus();
        cpfStatus.innerHTML = erro;
        cpfStatus.setAttribute("class", "alert alert-danger");
    }
    if (erro.length > 0) {
        cpf.focus();
        cpfStatus.innerHTML = erro;
        cpfStatus.setAttribute("class", "alert alert-danger");
        return false;
    }
    return true;
}

$("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                        $("<img  />", {
                                "src": e.target.result,
                                "class": "thumb-image img-thumbnail img-responsive"
                        }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
        } else {
                alert("Este navegador nao suporta FileReader.");
        }
});
