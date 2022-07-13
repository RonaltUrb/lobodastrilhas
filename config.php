<?php
if(@$token=='h3h11432hbiu412'){
	$url='';
	$nomeCliente = 'Lobos da Trilhas';
	$descricaoCliente = 'Lobos da Trilhas';
	
	// session_start();

	ini_set("memory_limit","64M" );
	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
	date_default_timezone_set("America/Fortaleza");
	ini_set('display_errors','Off');
	//CONEXÃO COM O BANCO	
	
	// $conexaobanco=array('179.127.80.7','cervejar_admin','S@intb@!2020','cervejar_sites');
	// $conecta=mysqli_connect($conexaobanco[0],$conexaobanco[1],$conexaobanco[2], $conexaobanco[3]);

	// if(!$conecta){
	// 	exit("<div align='center' style='color:#FF000; font-weight:bold;'>Servidor ocupado. Tente mais tarde.</div>");
	// }

	//VALIDA O CAMPO E-MAIL
	function validaEmail($email){
		$conta = "^[a-zA-Z0-9\._-]+@";
		$domino = "[a-zA-Z0-9\._-]+.";
		$extensao = "([a-zA-Z]{2,4})$";
		$pattern = $conta.$domino.$extensao;
		if (ereg($pattern, $email)){
			return true;
		} else {
			return false;
		}
	}

	//YYYY-MM-DD para DD/MM/YYYY
	function todata($data){
		$data=explode("-",$data);
		return $data[2].'/'.$data[1].'/'.$data[0];
	}

	//YYYY-MM-DD HH:MM:SS para DD/MM/YYYY HH:MM
	function totime($var){
	    $data = str_replace('/', '-', $var);
	    $retorno = date("d/m/Y H:i", strtotime($data));
	    return $retorno;
	};
	
	//DD/MM/YYYY para YYYY-MM-DD
	function datato($data){
		$data=explode("/",$data);
		return $data[2].'-'.$data[1].'-'.$data[0];
	}

	//DD/MM/YYYY para YYYY-MM-DD
	function datato2($data){
		$data=explode("/",$data);
		return $data[2].$data[1].$data[0];
	}

	//TRANSFORMA 0.00 EM R$0,00
	function tovalor($num){
		$real=number_format($num,2,',','.');
		$formatado="R$".$real;
		return $formatado;
	}

	//TRANSFORMA R$0,00 EM 0.00
	function valorto($valor,$retira=true){
		if($retira){
			$valor=str_replace('R$','',$valor);
		}
		$valo=str_replace('.','',$valor); 
		$valo=str_replace(',','.',$valo);
		return $valo;
	}

	function retiraAcento($var) {
		$var = strtolower($var);
		$nn=str_replace('ç','c',$var);
		$nn=str_replace('á','a',$nn);
		$nn=str_replace('ã','a',$nn);
		$nn=str_replace('à','a',$nn);
		$nn=str_replace('â','a',$nn);
		$nn=str_replace('è','e',$nn);
		$nn=str_replace('é','e',$nn);
		$nn=str_replace('ê','e',$nn);
		$nn=str_replace('í','i',$nn);
		$nn=str_replace('ì','i',$nn);
		$nn=str_replace('î','i',$nn);
		$nn=str_replace('ó','o',$nn);
		$nn=str_replace('ò','o',$nn);
		$nn=str_replace('õ','o',$nn);
		$nn=str_replace('ô','o',$nn);
		$nn=str_replace('ú','u',$nn);
		$nn=str_replace('ù','u',$nn);
		$nn=str_replace('û','u',$nn);
		$nn=str_replace('Ç','c',$nn);
		$nn=str_replace('Á','a',$nn);
		$nn=str_replace('Ã','a',$nn);
		$nn=str_replace('À','a',$nn);
		$nn=str_replace('Â','a',$nn);
		$nn=str_replace('È','e',$nn);
		$nn=str_replace('É','e',$nn);
		$nn=str_replace('Ê','e',$nn);
		$nn=str_replace('Í','i',$nn);
		$nn=str_replace('Ì','i',$nn);
		$nn=str_replace('Î','i',$nn);
		$nn=str_replace('Ó','o',$nn);
		$nn=str_replace('Ò','o',$nn);
		$nn=str_replace('Õ','o',$nn);
		$nn=str_replace('Ô','o',$nn);
		$nn=str_replace('Ú','u',$nn);
		$nn=str_replace('Ù','u',$nn);
		$nn=str_replace('Û','u',$nn);	
		$nn = str_replace(" ","-",$nn);
		return $nn;
	}
	function acentoToUpper($var) {
		$var = strtolower($var);
		$nn=str_replace('ç','Ç',$var);
		$nn=str_replace('á','Á',$nn);
		$nn=str_replace('ã','Ã',$nn);
		$nn=str_replace('à','À',$nn);
		$nn=str_replace('â','Â',$nn);
		$nn=str_replace('è','È',$nn);
		$nn=str_replace('é','É',$nn);
		$nn=str_replace('ê','Ê',$nn);
		$nn=str_replace('í','Í',$nn);
		$nn=str_replace('ì','Ì',$nn);
		$nn=str_replace('î','Î',$nn);
		$nn=str_replace('ó','Ó',$nn);
		$nn=str_replace('ò','Ò',$nn);
		$nn=str_replace('õ','Õ',$nn);
		$nn=str_replace('ô','Ô',$nn);
		$nn=str_replace('ú','Ú',$nn);
		$nn=str_replace('ù','Ù',$nn);
		$nn=str_replace('û','Û',$nn);
		return $nn;
	}
	function urlAmigavel($string){
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
		$string = utf8_decode($string);
		$string = strtr($string, utf8_decode($a), $b);
		$string = strip_tags(trim($string));
		$string = str_replace(" ","-",$string);
		$string = str_replace(array("-----","----","---","--"),"-",$string);
		return strtolower(utf8_encode($string));
	}

	function enviaEmail($nome,$email_from,$email,$mensagem,$assunto){
		require_once("./phpmail/class.phpmailer.php");
		$mail             = new PHPMailer();
		$body             = $mensagem;
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = 'tls';                 // sets the prefix to the servier
		// $mail->Host       = 'smtp.office365.com';      // sets GMAIL as the SMTP 
		$mail->Host       = 'mail.cervejariasc.com.br';      // sets GMAIL as the SMTP 
		$mail->Port       = '587';                   // set the SMTP port
		$mail->Username   = 'noreply@cervejariasc.com.br';  // GMAIL username
		$mail->Password   = 'NO@Saintbier';            // GMAIL password
		$mail->From       = 'noreply@cervejariasc.com.br';
		$mail->FromName   = utf8_decode('');
		$mail->Subject    = utf8_decode($assunto);
		$mail->AltBody    = utf8_decode($mensagem); //Text Body
		$mail->WordWrap   = 50; // set word wrap
		$mail->MsgHTML(utf8_decode($body));
		$mail->AddReplyTo($email_from,$nome);
		$mail->AddAddress($email);
		
		$mail->IsHTML(true); // send as HTML
	   
		if(!$mail->Send()) {
			return false; 
		} else {
			return true;
		}
	}

	//TRANSFORMA X em X.00, X.X em X.X0
	function arrumaZeros($str){
		if($str==''){
			$ret='0.00';			
		} else {
			$string=explode('.',$str);
			if($string[1]==''){
				$ret=$str.'.00';
			} else {
				if(count($string[1])==1){
					$ret=$str.'0';
				} else {
					$ret=$str;
				}
			}
		}
		return $ret;
	}

	function sec($string){
		global $conecta;
		return mysqli_real_escape_string($conecta, $string);
	}

	function alert($str){
		return '<script>alert("'.$str.'");</script>';
	}
	
	function console($str){
		return '<script>console.log("'.$str.'");</script>';
	}

	function loc($str){
		return '<script>window.location="'.$str.'";</script>';
	}

	function mnr($sql){
		return mysqli_num_rows($sql);
	}

	function mfa($str){
		return mysqli_fetch_array($str);	
	}

	function mq($str){
		global $conecta;
		return mysqli_query($conecta, $str);	
	}

	function mr($mysql,$area){
		$mysql->data_seek(0);
		$res=$mysql->fetch_assoc(); 
		$field=$res[$area]; 
		return $field; 
	}

	function GET($campo){
		return sec($_GET[$campo]);
	}

	function POST($campo){
		return sec($_POST[$campo]);
	}
	
	//TRANSFORMA LATIN E UTF
	function latintoutf($str){
		$str=str_replace('\u00e1','á',$str); $str=str_replace('\u00e0','à',$str); $str=str_replace('\u00e2','â',$str); $str=str_replace('\u00e3','ã',$str); $str=str_replace('\u00e4','ä',$str); $str=str_replace('\u00c1','Á',$str); $str=str_replace('\u00c0','À',$str); $str=str_replace('\u00c2','Â',$str); $str=str_replace('\u00c3','Ã',$str); $str=str_replace('\u00c4','Ä',$str); $str=str_replace('\u00e9','é',$str); $str=str_replace('\u00e8','è',$str); $str=str_replace('\u00ea','ê',$str); $str=str_replace('\u00c9','É',$str); $str=str_replace('\u00c8','È',$str); $str=str_replace('\u00ca','Ê',$str); $str=str_replace('\u00cb','Ë',$str); $str=str_replace('\u00ed','í',$str); $str=str_replace('\u00ec','ì',$str); $str=str_replace('\u00ee','î',$str); $str=str_replace('\u00ef','ï',$str); $str=str_replace('\u00cd','Í',$str); $str=str_replace('\u00cc','Ì',$str); $str=str_replace('\u00ce','Î',$str); $str=str_replace('\u00cf','Ï',$str); $str=str_replace('\u00f3','ó',$str); $str=str_replace('\u00f2','ò',$str); $str=str_replace('\u00f4','ô',$str); $str=str_replace('\u00f5','õ',$str); $str=str_replace('\u00f6','ö',$str); $str=str_replace('\u00d3','Ó',$str); $str=str_replace('\u00d2','Ò',$str); $str=str_replace('\u00d4','Ô',$str); $str=str_replace('\u00d5','Õ',$str); $str=str_replace('\u00d6','Ö',$str); $str=str_replace('\u00fa','ú',$str); $str=str_replace('\u00f9','ù',$str); $str=str_replace('\u00fb','û',$str); $str=str_replace('\u00fc','ü',$str); $str=str_replace('\u00da','Ú',$str); $str=str_replace('\u00d9','Ù',$str); $str=str_replace('\u00db','Û',$str); $str=str_replace('\u00e7','ç',$str); $str=str_replace('\u00c7','Ç',$str); $str=str_replace('\u00f1','ñ',$str); $str=str_replace('\u00d1','Ñ',$str); $str=str_replace('\u0026','&',$str); $str=str_replace('\u0027',"'",$str);
		return $str;
	}
	
	//TIPO 1 - PASSA A ABREVIAÇÃO E RETORNA EM ESCRITO
	//TIPO 2 - PASSA EM ESCRITO E RETORNA ABREVIAÇÃO
	function retornaUf($str,$tipo){
		$estados=array(
			'AC'=>'Acre',
			'AL'=>'Alagoas',
			'AP'=>'Amapá',
			'AM'=>'Amazonas',
			'BA'=>'Bahia',
			'CE'=>'Ceará',
			'DF'=>'Distrito Federal',
			'ES'=>'Espírito Santo',
			'GO'=>'Goiás',
			'MA'=>'Maranhão',
			'MT'=>'Mato Grosso',
			'MS'=>'Mato Grosso do Sul',
			'MG'=>'Minas Gerais',
			'PR'=>'Paraná',
			'PB'=>'Paraíba',
			'PA'=>'Pará',
			'PE'=>'Pernambuco',
			'PI'=>'Piauí',
			'RJ'=>'Rio de Janeiro',
			'RN'=>'Rio Grande do Norte',
			'RS'=>'Rio Grande do Sul',
			'RO'=>'Rondonia',
			'RR'=>'Roraima',
			'SC'=>'Santa Catarina',
			'SE'=>'Sergipe',
			'SP'=>'São Paulo',
			'TO'=>'Tocantins'	
		);
		if($tipo==1){
			$retorno=$estados[$str];
		} else {
			$retorno=array_search($str,$estados);
		}
		return $retorno;
	}

	function retornaEstados(){
		$estados=array(
			'AC'=>'Acre',
			'AL'=>'Alagoas',
			'AP'=>'Amapá',
			'AM'=>'Amazonas',
			'BA'=>'Bahia',
			'CE'=>'Ceará',
			'DF'=>'Distrito Federal',
			'ES'=>'Espírito Santo',
			'GO'=>'Goiás',
			'MA'=>'Maranhão',
			'MT'=>'Mato Grosso',
			'MS'=>'Mato Grosso do Sul',
			'MG'=>'Minas Gerais',
			'PR'=>'Paraná',
			'PB'=>'Paraíba',
			'PA'=>'Pará',
			'PE'=>'Pernambuco',
			'PI'=>'Piauí',
			'RJ'=>'Rio de Janeiro',
			'RN'=>'Rio Grande do Norte',
			'RS'=>'Rio Grande do Sul',
			'RO'=>'Rondonia',
			'RR'=>'Roraima',
			'SC'=>'Santa Catarina',
			'SE'=>'Sergipe',
			'SP'=>'São Paulo',
			'TO'=>'Tocantins'	
		);
		return $estados;
	}

	function insert($array,$tabela){
		global $conecta;
		$chav='';
		$val='';
		foreach($array as $chave=>$valor){
			$chav=$chav.$chave.',';
			$val=$val."'".sec($valor)."',";	
		}
		$tamanho=strlen($chav)-1;
		$tamanho2=strlen($val)-1;
		$chav=substr($chav,0,$tamanho);
		$val=substr($val,0,$tamanho2);
		$consulta=mysqli_query($conecta, "INSERT INTO ".$tabela." (".$chav.") VALUES (".$val.")");
		if($consulta){
			return true;	
		} else {
			return false;
		}
	}

	function update($array,$tabela,$where,$where2){
		global $conecta;
		$query='';
		$a=0;
		foreach($array as $chave=>$valor){
			if($a==0){
				$query=$query." ".$chave."='".sec($valor)."'";
			} else {
				$query=$query.", ".$chave."='".sec($valor)."'";
			}
			$a++;
		}
		$query=mysqli_query($conecta, "UPDATE ".$tabela." SET ".$query." WHERE ".$where."='".$where2."'");
		if($query){
			return true;	
		} else {
			return false;
		}
	}

	//TRANSFORMA XXXXXXXX EM XXXXX-XXX
	function toCep($str){
		return substr($str,0,5).'-'.substr($str,5,3);
	}

	//GERA TOKEN COM 15 CARACTERES - PASSAR VALUE CASO QUEIRA COM OUTRA QUANTIDADE
	function geraToken($qnt=15){
		$caracteres=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','z','y','w','0','1','2','3','4','5','6','7','8','9');
		$token='';
		for($i=1;$i<=$qnt;$i++){
			$caracter=array_rand($caracteres);
			$token.=$caracteres[$caracter];
		}
		return $token;
	}

	//LIMITAR TEXTOS
	function limitarTexto($str,$limitar=500,$limpar=true){
		if ($limpar == true ){
			$str= strip_tags ($str);
		}
		if (strlen($str) <= $limitar){
			return $str ;
		}
		$str = substr($str, 0, strrpos(substr($str, 0, $limitar),' ')).' [...]';
		return $str;
	}

	function arquivo($arquivo){
		if(is_file($arquivo)){
			$conteudo = fopen($arquivo, "rb");
			$retorno = '';
			while (!feof($conteudo)) {
			  $retorno .= fread($conteudo, 8192);
			}
			fclose($conteudo);	
			return $retorno;
		} else {
			return false;	
		}
	}

	function setPage($informacoes,$pagina){
		$conteudo = arquivo($pagina);
		foreach($informacoes as $label=>$item){
			$conteudo = str_replace('{'.$label.'}',$item,$conteudo);
		}
		return $conteudo;
	}

	function curl($path, $method='GET', $array=''){
		global $urlBackend;
		$ch = curl_init();
		if($method == 'POST'){
  			curl_setopt($ch, CURLOPT_POST, 1);
		}
		curl_setopt($ch, CURLOPT_URL, $urlBackend.$path);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if($method == 'POST'){
  			curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
		} 		
		$contents = curl_exec($ch);
		$contents = json_decode($contents);
		return $contents;
	}	

	function uploadFile($arquivo){
		$target_dir = getcwd().DIRECTORY_SEPARATOR."painel/arquivos/";
		$name = $arquivo["name"];
		$ext = end((explode(".", $name)));
		$nomeArquivo = geraToken(25).'.'.$ext;
		$target_file = $target_dir.$nomeArquivo;

		if($arquivo["size"] > 5000000) {
		    return false;
		}
		
	    if(move_uploaded_file($arquivo["tmp_name"], $target_file)) {
	        return $nomeArquivo;
	    } else {
	        return false;
	    }
	}
	
	function msgSucesso($msg){
		if($msg){
			$retorno = '<div class="alert alert-success alert-dismissible fade show">';
	          $retorno .= '<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Fechar">';
	            $retorno .= '<i class="fa fa-times"></i>';
	          $retorno .= '</button>';
	          $retorno .= '<span>'.$msg.'</span>';
	        $retorno .= '</div>';
	    } else {
	    	$retorno = '';
	    }
        return $retorno;
	}

	function msgErro($msg){
		if($msg){
			$retorno = '<div class="alert alert-danger alert-dismissible fade show">';
	          $retorno .= '<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Fechar">';
	            $retorno .= '<i class="fa fa-times"></i>';
	          $retorno .= '</button>';
	          $retorno .= '<span>'.$msg.'</span>';
	        $retorno .= '</div>';
	    } else {
	    	$retorno = '';
	    }
        return $retorno;
	}
	
	function mktimeAtual(){
		return mktime(date('H'),date('i'),date('s'),date('n'),date('j'),date('y'));
	}
	
	function primeiroDiaMesAnterior(){
		return mktime(0,0,0,date('n')-1,1,date('y'));
	}

	function primeiroDiaMesAtual(){
		return mktime(0,0,0,date('n'),1,date('y'));
	}

	function ultimoDiaMesAnterior(){
		$mesAtual = date('Y-m-d');
		$ultimoDia = date('t',strtotime($mesAtual));
		return mktime(23,59,59,date('n')-1,$ultimoDia-1,date('y'));
	}

	function retornaMes($mes){
		if($mes == '01'){
			return 'Janeiro';
		}
		if($mes == '02'){
			return 'Fevereiro';
		}
		if($mes == '03'){
			return 'Março';
		}
		if($mes == '04'){
			return 'Abril';
		}
		if($mes == '05'){
			return 'Maio';
		}
		if($mes == '06'){
			return 'Junho';
		}
		if($mes == '07'){
			return 'Julho';
		}
		if($mes == '08'){
			return 'Agosto';
		}
		if($mes == '09'){
			return 'Setembro';
		}
		if($mes == '10'){
			return 'Outubro';
		}
		if($mes == '11'){
			return 'Novembro';
		}
		if($mes == '12'){
			return 'Dezembro';
		}
	}

	function traduzDia($dia){
		if($dia == 'Monday'){
			return 'Seg';
		}
		if($dia == 'Tuesday'){
			return 'Ter';
		}
		if($dia == 'Wednesday'){
			return 'Qua';
		}
		if($dia == 'Thursday'){
			return 'Qui';
		}
		if($dia == 'Friday'){
			return 'Sex';
		}
		if($dia == 'Saturday'){
			return 'Sáb';
		}
		if($dia == 'Sunday'){
			return 'Dom';
		}
	}

	function pagSeguroStatus($status){
		if($status == '1'){
			return 'Aguardando pagamento';
		}
		if($status == '2'){
			return 'Em análise';
		}
		if($status == '3'){
			return 'Paga';
		}
		if($status == '4'){
			return 'Dispónivel';
		}
		if($status == '5'){
			return 'Em disputa';
		}
		if($status == '6'){
			return 'Devolvida';
		}
		if($status == '7'){
			return 'Cancelada';
		} 
	}

	function tratarTelefone($tel){
		$telefoneCorrigido = str_replace('(', '', $tel);
	  	$telefoneCorrigido = str_replace(')', '', $telefoneCorrigido);
	  	$telefoneCorrigido = str_replace('-', '', $telefoneCorrigido);
	  	$telefoneCorrigido = str_replace(' ', '', $telefoneCorrigido);
	  	return $telefoneCorrigido;
	}

}
?>