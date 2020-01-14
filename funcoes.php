<?php
include('conexao.php'); 

//permissao atualzia��o //recebe informa��es vindas do array de permiss�o
function Permissao($item,$id){
include('conexao.php'); 
$query = "select * from permissoes where id_usuario='".$id."' and item='".$item."'";
$sql=mysqli_query($conexao,$query)	;
if(mysqli_num_rows($sql)>=1)
    {mysqli_query($conexao,"update permissoes set valor='ativo' where id_usuario='".$id."' and item='".$item."' ");}
else{
    mysqli_query($conexao,"insert into permissoes (id_usuario,item,valor) VALUES ('$id','$item','ativo') ");}
};
    //fun��o verifica se existem libera��o apra acesso ao menu
function PermissaoCheck($item,$id){
include('conexao.php'); 
$query = "select * from permissoes where id_usuario='".$id."' and item='".$item."' and valor='ativo' ";	
$sql =	mysqli_query($conexao,$query);
if(mysqli_num_rows($sql)>=1){ return 'checked';}
};

//fun��o limpa ponto e tra�o
function limpaCPF_CNPJ($valor){
$valor = trim($valor);
$valor = str_replace(".", "", $valor);
$valor = str_replace(",", "", $valor);
$valor = str_replace("-", "", $valor);
$valor = str_replace("/", "", $valor);
return $valor;
};

function Moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
if(empty($valor)){return 0;}else{return $valor;} //retorna o valor formatado para gravar no banco
};//moeda

function Moeda2($valor) {
$valor = number_format($valor,2);
$source = array(',', '.');
$replace = array('.', '');
$valor = str_replace($source, $replace, $valor);
return $valor;
};//moeda2

function Real($valor){ if($valor==true){ return number_format($valor,2,',','.');} else { return '0,00';}};

//array de de estado civil
$estadocivil = array('Casado(a)','Divorciado(a)','Separdo Judicialmente','Solteiro(a)','Vi�vo(a)','Uni�o estavel');

//case de meses por valor
switch (date("m")) {
    case "01":    @$mes = Janeiro;     break;
    case "02":    @$mes = Fevereiro;   break;
    case "03":    @$mes = Mar�o;       break;
    case "04":    @$mes = Abril;       break;
    case "05":    @$mes = Maio;        break;
    case "06":    @$mes = Junho;       break;
    case "07":    @$mes = Julho;       break;
    case "08":    @$mes = Agosto;      break;
    case "09":    @$mes = Setembro;    break;
    case "10":    @$mes = Outubro;     break;
    case "11":    @$mes = Novembro;    break;
    case "12":    @$mes = Dezembro;    break; 
};

//idadeCerta
function idadeCerta($nascimento){
    // Declara a data! :P
    $data = $nascimento;
    // Separa em dia, m�s e ano
    list($dia, $mes, $ano) = explode('-', $data);
    // Descobre que dia � hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    // Depois apenas fazemos o c�lculo j� citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    return $idade;
};

function AspasForm($string){
	$string = str_replace('"',chr(146).chr(146), $string);
	$string = str_replace("'",chr(146), $string);
	return $string;
};

function AspasBanco($string){
	$string = str_replace(chr(146).chr(146),'"', $string);
	$string = str_replace(chr(146),"'",$string);
	return addslashes($string);
};

function url_amigavel($string){
    $table = array(
        '�'=>'S', '�'=>'s', '�'=>'D', 'd'=>'d', '�'=>'Z',
        '�'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A',
        '�'=>'A', '�'=>'A', '�'=>'C', '�'=>'E', '�'=>'E',
        '�'=>'E', '�'=>'E', '�'=>'I', '�'=>'I', '�'=>'I',
        '�'=>'I', '�'=>'N', '�'=>'O', '�'=>'O', '�'=>'O',
        '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'U', '�'=>'U',
        '�'=>'U', '�'=>'U', '�'=>'Y', '�'=>'B', '�'=>'Ss',
        '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a',
        '�'=>'a', '�'=>'a', '�'=>'c', '�'=>'e', '�'=>'e',
        '�'=>'e', '�'=>'e', '�'=>'i', '�'=>'i', '�'=>'i',
        '�'=>'i', '�'=>'o', '�'=>'n', '�'=>'o', '�'=>'o',
        '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'u',
        '�'=>'u', '�'=>'u', '�'=>'y', '�'=>'y', '�'=>'b',
        '�'=>'y', 'R'=>'R', 'r'=>'r',  );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    // converte para min�sculo
    $string = strtolower($string);
    // remove caracteres indesej�veis (que n�o est�o no padr�o)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    // Remove m�ltiplas ocorr�ncias de h�fens ou espa�os
    $string = preg_replace("/[\s-]+/", " ", $string);
    // Transforma espa�os e underscores em h�fens
    $string = preg_replace("/[\s_]/", "_", $string);
    // retorna a string
    return $string;
};//url_amigavel

//alertas de retorno
function alertsucesso(){
    echo'<div class="alert alert-success">
    <strong>Finalizado com sucesso</strong>.
    </div>';
};

function alertexcluir(){
    echo'<div class="alert alert-danger">
    <strong>Excluido</strong>.
    </div>';
};

function alertatualizacao(){
    echo'<div class="alert alert-warning">
    <strong>Atualizado</strong>.
    </div>';
};

//diferen�a entre datas o tipo deve ser '99-99-9999';
function mesesPassados($dataInicial,$dataFinal){
    //c�cular juros se completou um m�s ou mais
    $data1 = new DateTime($dataInicial);
    $data2 = new DateTime($dataFinal);
    $intervalo = $data1->diff($data2);
    // dias passados {$intervalo->d} dias";
    //anos {$intervalo->y} anos";
    //retora os m�s passados
    return "{$intervalo->m}";
};


?>