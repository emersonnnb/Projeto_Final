<?php

//permissao atualziação //recebe informações vindas do array de permissão
function Permissao($item,$id){
global $conexao;
$sql=mysqli_query($conexao,"select * from permissoes where id_usuario='".$id."' and item='".$item."' ");	
if(mysqli_num_rows($sql)>=1){mysqli_query($conexao,"update permissoes set valor='ativo' where id_usuario='".$id."' and item='".$item."' ");}
else{mysqli_query($conexao,"insert into permissoes (id_usuario,item,valor) VALUES ('$id','$item','ativo') ");}
};

//função verifica se existem liberação apra acesso ao menu
function PermissaoCheck($item,$id){
global $conexao;
$sql=mysqli_query($conexao,"select * from permissoes where id_usuario='".$id."' and item='".$item."' and valor='ativo' ");	
if(mysqli_num_rows($sql)>=1){ return 'checked';}
};

//função limpa ponto e traço
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
$estadocivil = array('Casado(a)','Divorciado(a)','Separdo Judicialmente','Solteiro(a)','Viúvo(a)','União estavel');

//case de meses por valor
switch (date("m")) {
    case "01":    @$mes = Janeiro;     break;
    case "02":    @$mes = Fevereiro;   break;
    case "03":    @$mes = Março;       break;
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
    // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('-', $data);
    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    // Depois apenas fazemos o cálculo já citado :)
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
        'Š'=>'S', 'š'=>'s', 'Ð'=>'D', 'd'=>'d', 'Ž'=>'Z',
        'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r',  );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    // converte para minúsculo
    $string = strtolower($string);
    // remove caracteres indesejáveis (que não estão no padrão)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    // Remove múltiplas ocorrências de hífens ou espaços
    $string = preg_replace("/[\s-]+/", " ", $string);
    // Transforma espaços e underscores em hífens
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

//diferença entre datas o tipo deve ser '99-99-9999';
function mesesPassados($dataInicial,$dataFinal){
    //cácular juros se completou um mês ou mais
    $data1 = new DateTime($dataInicial);
    $data2 = new DateTime($dataFinal);
    $intervalo = $data1->diff($data2);
    // dias passados {$intervalo->d} dias";
    //anos {$intervalo->y} anos";
    //retora os mês passados
    return "{$intervalo->m}";
};
?>