//verificar cpf
jQuery('.cpf').mask('999.999.999-99').change(function() {
    value = jQuery(this).val();
    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    while (cpf.length < 11) cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
    //return this.optional(element) || retorno; 
    if (retorno == false) {
        alert('CPF Inválido!');
        jQuery(this).val('');
        jQuery(this).focus();
    }
});

/******************************************************************************************************/
jQuery('.data').mask('99-99-9999');
jQuery('.celular').mask('(99)99999-9999');
jQuery('.fixo').mask('(99)9999-9999');
jQuery('.cep').mask('99999-999');
jQuery('.cnpj').mask('99.999.999/9999-99');
jQuery('.cpf2').mask('999.999.999-99');
jQuery('.hora').mask('99:99');
jQuery('.numeroprocesso').mask('9999999-99.9999.9.99.9999');
jQuery('.real').maskMoney({symbol:"R$",decimal:",",thousands:"."});

//estqoue
function estoque(){
  window.location.href='estoque.php';  
};
//estoque minimo
function estoqueMinimo(){
    window.location.href='estoque-minimo.php';
};
//vencimentos
function vencimentos(){
    window.location.href='vencimentos.php';
};
//vendas
function vendas(){
    window.location.href='vendas.php';
};
//pdv
function pdv(){
    window.location.href='pdv.php';
};
//usuarios
function usuarios(){
    window.location.href='usuarios.php';
};
//alterar usuário
function alterarUsuario(id){
    window.location.href='alterar-usuario.php?id='+id;
};

//COLOCA ESSES SCRIPTS EM UM ARQUIVO QUE TU POSSA CONSUMIR NO TEU PROJETO TODO

//aqui tu converte real em moeda
function getMoney(str){ 
    if(str.match(/-/)){ return (parseInt( str.replace(/[\D]+/g,''))*-1); }else{ return parseInt( str.replace(/[\D]+/g,'') );}
};
    
//aqui tu converte moeda em real
function formatReal( int ){
        var tmp = int+'';
        var neg = false;
        if(tmp.indexOf("-") == 0)
        {
            neg = true;
            tmp = tmp.replace("-","");
        }

        if(tmp.length == 1) tmp = "0"+tmp

        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6)
            tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

        if( tmp.length > 9)
            tmp = tmp.replace(/([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g,".$1.$2,$3");

        if( tmp.length > 12)
            tmp = tmp.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g,".$1.$2.$3,$4");

        if(tmp.indexOf(".") == 0) tmp = tmp.replace(".","");
        if(tmp.indexOf(",") == 0) tmp = tmp.replace(",","0,");

    return (neg ? '-'+tmp : tmp);
};