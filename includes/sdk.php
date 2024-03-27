<?php
class HarkerLloreda {
	public $domain = "https://harkerlloreda.com/admin_hl_wp/index.php/wp-json/wp/v2/";
	public $url = "https://harkerlloreda.com/admin_hl_wp/";
	public $infoGnrl = array();
    public $language = "";
    public $palabras = "";
    public $production = true;
    public $accessToken = "098f6bcd4621d373cade4e832627b4f6*1.4";
    public $environment = 0;
    private $headers = array();

    public function __construct($language = "es", $development = false) {
        if ($development) {
            $this->production = false;
        }
        $this->language = $language;
        $this->infoGnrl = $this->gInfo();
        $this->palabras = $this->getPalabrasDeInterfaz();
        $this->headers = array('Access-token: '.$this->accessToken.'','Environment-set: '.$this->environment,'Content-Type: application/json');
    }
    
    function orekaQueryCollection($moduleID,$sort,$orientation,$quantity,$page,$p = false){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://oreka.harkerlloreda.com/api/public/v1/collection/'.$moduleID.'/'.$sort.'/'.$orientation.'/'.$quantity.'/'.$page,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => $this->headers
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }
    public function orekaPostRow($modules, $rows, $idfies, $types, $values){
        $service_url="http://oreka.harkerlloreda.com/api/public/v1/create";
        $iRows=0;
        if(!is_array($modules)){
            $modules=[$modules];
            $rows=[$rows];
            $idfies=[$idfies];
            $ntypes=count(explode(",", $types));
            $types=[$types];
            $nvalues=count($values);
            if($ntypes==$nvalues)
                $values=[[$values]];
        }

        $data=new stdClass();
        $body=new stdClass();
        for ($i=0; $i < count($modules); $i++) { 
            $currFields=explode(",", $idfies[$i]);
            $currTypes=explode(",", $types[$i]);
            for ($j=0; $j < $rows[$i]; $j++) {
                $newrow=new stdClass();
                $newrow->module=$modules[$i];
                $newrow->types="";
                $newrow->values=new stdClass();
                $newrow->idfields=new stdClass();
                $newrow->typefields=new stdClass();
                for ($k=0; $k < count($currFields); $k++) {
                    $val="val$k";
                    $type="type$k";
                    $idfie="id$k";
                    $newrow->values->$val=$values[$i][$j][$k];
                    $newrow->idfields->$idfie=$currFields[$k];
                    $newrow->typefields->$type=$currTypes[$k];
                }
                $newrowS="newrow$iRows";
                $data->$newrowS=$newrow;
                $iRows++;
            }
        }
        $body->data=$data;
        $body=json_encode($body);
        return $this->orekaMakePostCall($service_url,$body);
    }
    public function orekaMakePostCall($url,$body="{}"){
        //array_push($this->headers,'Content-Length: '.strlen($body));
        //array_push($this->headers,'Content-Type: application/json');
        $service_url = $url;
        $ch = curl_init($service_url);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        // curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        // curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        $ch_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $decoded = json_decode($ch_response);
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("MakePostCall JSON Error[$service_url]: " . json_last_error_msg() . " - ". $http_code . " - " . $ch_response . "\n", 3, __DIR__ . "/json_error.log");
        }
        return $decoded; 
    }
    function query($url, $body = "", $cache = false, $queryParams = null){
        if ($queryParams === null) {
            $queryParams = ['field' => 'idioma_de_este_contenido', 'value' => $this->language];
        }
		$cacheAbsoluteRoute = "/home/tiendasantuario/public_html/host/bilingual/cache";
        $query = http_build_query($queryParams);
		$endpoint ="{$this->domain}$url?$query";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$filetitle = $this->get_alias($endpoint . "?" . $query_string) . ".json";
		if ($cache) {
			if (!file_exists($cacheAbsoluteRoute)) {
				mkdir($cacheAbsoluteRoute, 0777, true);
			}
			$path = $cacheAbsoluteRoute . "/" . $filetitle;

			if (file_exists($path)) {
				//echo "exists";
				$data = file_get_contents($path);
				$ok =  json_decode($data);
				return $ok->response;
			} else {
				$output = curl_exec($ch);
				$request = json_decode($output);

				$finalstructure = '{"endpoint":"' . $endpoint . '","lastUpdate":"' . date("Y-m-d") . '","response":' . $output . '}';
				$bwriting = file_put_contents($path, $finalstructure);
				curl_close($ch);
				if ($request === null) {
					$jsonLastError = json_last_error();
					$jsonLastErrorMsg = json_last_error_msg();
					echo "JSON decoding error: $jsonLastError ($jsonLastErrorMsg)";
				} else {
					return  $request;
				}
			}
		} else {
			$output = curl_exec($ch);
			// Remove U+FEFF character
			$output = preg_replace('/\x{FEFF}/u', '', $output);
			// Remove BOM
			if (strpos($output, "\uFEFF") === 0) {
				$output = substr($output, 3);
			}
			$request = json_decode($output);
			curl_close($ch);

			if ($request === null) {
				$jsonLastError = json_last_error();
				$jsonLastErrorMsg = json_last_error_msg();
				echo "JSON decoding error: $jsonLastError ($jsonLastErrorMsg)";
			} else {
				return  $request;
			}
		}
	}
    function gInfo(){
        // if(isset($_SESSION[$this->language]['ginfo'])){
        //     $gnrl = $_SESSION[$this->language]['ginfo'];
		// } else {
            if($this->language == "es"){
                $result = $this->query("pages/109");                
            }else{
                $result = $this->query("pages/277");
            }
			$gnrl = $result;
            
		// 	$_SESSION[$this->language]['ginfo'] = $gnrl;
		// }
		return $gnrl;
	}
    function getConceptosDePago(){
        $conceptos = $this->orekaQueryCollection("42","lord","upward","10","1");
        return $conceptos;
    }
    function gBannerHome(){
        // if(isset($_SESSION[$this->language]['hl_sliders'])){
        //     $banners = $_SESSION[$this->language]['hl_sliders'];
        // } else {
            $result = $this->query("hl_sliders");
            $banners = $result;
    
        //     $_SESSION[$this->language]['hl_sliders'] = $banners;
        // }
        return $banners;
   
    }
    function gPage($id){
        $result = $this->query("pages/$id");
        return $result;
    }
    function gEquipoDestacadoHome(){
        // if(isset($_SESSION[$this->language]['hl_miembros_destacados'])){
        //     $equipo_destacados = $_SESSION[$this->language]['hl_miembros_destacados'];
        // } else {
            $queryParams = ['field' => 'destacar_en_el_home,idioma_de_este_contenido', 'value' => 'Si,'.$this->language];
            $result = $this->query("hl_miembros", "", null, $queryParams);
            $equipo_destacados = $result;
        //     $_SESSION[$this->language]['hl_miembros_destacados'] = $equipo_destacados;
        // }
        return $equipo_destacados;
    }
    function gTeamMembers(){
        $queryParams = ['field' => 'destacar_en_el_home,idioma_de_este_contenido', 'value' => 'No,'.$this->language];
        $result = $this->query("hl_miembros", "", null, $queryParams);
        $equipo_destacados = $result;
        return $equipo_destacados;
    }
    function getDoctor($id){
        $queryParams = ['field' => 'idioma_de_este_contenido', 'value' => $this->language];
        $result = $this->query("hl_miembros/".$id, "", null, $queryParams);
        $doctor = $result;
        return $doctor;
    }
    function gFidelizacion($page){
        // if(isset($_SESSION[$this->language]['gFidelizacion'])){
        //     $result = $_SESSION[$this->language]['gFidelizacion'];
        // } else {
            $result = $this->query("pages/$page", "", null, []);
        //     $_SESSION[$this->language]['gFidelizacion'] = $result;
        // }
        return $result;
    }
    function gConvenios(){
        // if(isset($_SESSION[$this->language]['gConvenios'])){
        //     $result = $_SESSION[$this->language]['gConvenios'];
        // } else {
            $result = $this->query("pages/416", "", null, []);
        //     $_SESSION[$this->language]['gConvenios'] = $result;
        // }
        return $result;
    }
    function gEmpresasConvenios(){
        $result = $this->query("hl_empconvenio", "", null, []);
        return $result;
    }
    function gAntesDespues($id){
        $result = $this->query("hl_antes_despues/".$id, "", null, []);
        return $result;
    }
    function gLinea($id){
        $result = $this->query("hl_lines/".$id, "", null, []);
        return $result;
    }
    function gTestimoniosDoctor($idDoctor){
        $queryParams = ['field' => 'miembro_del_equipo_relacionado', 'value' => $idDoctor];
        $result = $this->query("hl_testimonios", "", null, $queryParams );
        return $result;
    }
    function gTestimoniosLinea($idLinea){
        $queryParams = ['field' => 'linea_a_la_que_pertenece', 'value' => $idLinea];
        $result = $this->query("hl_testimonios", "", null, $queryParams );
        return $result;
    }
    function gTestimoniosInternational(){
        $queryParams = ['field' => 'incluir_testimonio_en_pacientes_internacionales,idioma_de_este_contenido', 'value' => '1,'.$this->language];
        $result = $this->query("hl_testimonios", "", null, $queryParams );
        return $result;
    }
    function gTestimoniosPro($idPro){
        $queryParams = ['field' => 'procedimiento_que_se_realizo', 'value' => $idPro];
        $result = $this->query("hl_testimonios", "", null, $queryParams );
        return $result;
    }
    function gTestimoniosInternacional(){
        $queryParams = ['field' => 'incluir_testimonio_en_pacientes_internacionales', 'value' => '1'];
        $result = $this->query("hl_testimonios", "", null, $queryParams );
        return $result;
    }
    function gProcedimientosPorLinea($linea){
        $queryParams = ['field' => 'linea_a_la_que_pertenece', 'value' => $linea, 'per_page'=>100];
        $result = $this->query("hl_list_proced", "", null, $queryParams);
        return $result;
    }
    function gProcedimientosPorCategoria($category){
        if($this->language == 'es'){
            $line = '401';
        }else{
            $line = '979';
        }
        $queryParams = ['field' => 'categoria_de_procedimiento_relacionada,linea_a_la_que_pertenece', 'value' => $category. ','. $line , 'per_page'=>100];
        $result = $this->query("hl_list_proced", "", null, $queryParams);
        return $result;
    }
    function gProcedimientosDestacados(){
        $queryParams = ['field' => 'destacar_pro,idioma_de_este_contenido', 'value' => '1,'.$this->language, 'per_page'=>100];
        $result = $this->query("hl_list_proced", "", null, $queryParams);
        return $result;
    }
    function gProcedimientosInternational(){
        $queryParams = ['field' => 'destacar_para_pacientes_internacionales,idioma_de_este_contenido', 'value' => '1,'.$this->language, 'per_page'=>100];
        $result = $this->query("hl_list_proced", "", null, $queryParams);
        return $result;
    }
    function gProcedimiento($id){
        $queryParams = ['field' => 'idioma_de_este_contenido', 'value' => $this->language];
        $result = $this->query("hl_list_proced/{$id}", "", null, $queryParams);
        return $result;
    }
    function gExtraInfoHome(){
        if($this->language == "es"){
            $result1 = $this->query("pages/30");
            $result2 = $this->query("pages/14");
        }else{
            $result1 = $this->query("pages/291");
            $result2 = $this->query("pages/282");
        }

        $equipo_destacados = array();
        $equipo_destacados["fuera"]=$result1;
        $equipo_destacados["tour"]=$result2;
        return $equipo_destacados;
    }
    function gPacientesFueraDeColombia($id){
        if(isset($id)){
            $result1 = $this->query("pages/$id");
        }else if($this->language == "es"){
            $result1 = $this->query("pages/30");
        }else{
            $result1 = $this->query("pages/291");
        }
        return $result1;
    }
    function gEquipoHumano(){
        if($this->language == "es"){
            $result = $this->query("pages/28");
        }else{
            $result = $this->query("pages/815");
        }
        return $result;
    }
    function gCategoriasProcedimientos($id= null){
        if($id == null){
            $result = $this->query("hl_cat_proced");
        }else{
            $result = $this->query("hl_cat_proced/".$id);

        }
        $categorias = $result;
        return $categorias;
    }
    function getPalabrasDeInterfaz(){
        // if(isset($_SESSION['palabras'])){
        //     $palabras = $_SESSION['palabras'];
		// } else {
            $palabrasES = $this->query("pages/176");
            $palabrasEN = $this->query("pages/326");
            $palabras = array();
            // Obtener el contenido entre las etiquetas <p>
            preg_match_all('/<p>(.*?)<\/p>/', $palabrasES->content->rendered, $matchesES);
            preg_match_all('/<p>(.*?)<\/p>/', $palabrasEN->content->rendered, $matchesEN);
            // Obtener el texto de cada coincidencia
            $textsES = $matchesES[1];
            $textsEN = $matchesEN[1];
            $palabras["es"]=$textsES;
            $palabras["en"]=$textsEN;
		// 	$_SESSION['palabras'] = $palabras;
		// }
        return $palabras;
    }
    function getProcedimientosPage(){
        // if(isset($_SESSION['procedimientosPage'])){
        //     $procedimientosPage = $_SESSION['procedimientosPage'];
		// } else {
            $procedimientosPage = array();
            $procedimientosPageES = $this->query("pages/128");
            $procedimientosPageEN = $this->query("pages/298");
            $procedimientosPage["es"] = $procedimientosPageES;
            $procedimientosPage["en"] = $procedimientosPageEN;
	    //     $_SESSION['procedimientosPage'] = $procedimientosPage;
		// }
		return $procedimientosPage;
        
    }
    public function reindexCache(){
        $dirPath = "/home/uiumji3ay04q/public_html/cache";
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
        echo "Caché reiniciado";
    }
    function get_alias($String){
        $String = html_entity_decode($String); // Traduce codificación

        $String = str_replace("¡", "", $String); //Signo de exclamación abierta.&iexcl;
        $String = str_replace("'", "", $String); //Signo de exclamación abierta.&iexcl;
        $String = str_replace("!", "", $String); //Signo de exclamación cerrada.&iexcl;
        $String = str_replace("¢", "-", $String); //Signo de centavo.&cent;
        $String = str_replace("£", "-", $String); //Signo de libra esterlina.&pound;
        $String = str_replace("¤", "-", $String); //Signo monetario.&curren;
        $String = str_replace("¥", "-", $String); //Signo del yen.&yen;
        $String = str_replace("¦", "-", $String); //Barra vertical partida.&brvbar;
        $String = str_replace("§", "-", $String); //Signo de sección.&sect;
        $String = str_replace("¨", "-", $String); //Diéresis.&uml;
        $String = str_replace("©", "-", $String); //Signo de derecho de copia.&copy;
        $String = str_replace("ª", "-", $String); //Indicador ordinal femenino.&ordf;
        $String = str_replace("«", "-", $String); //Signo de comillas francesas de apertura.&laquo;
        $String = str_replace("¬", "-", $String); //Signo de negación.&not;
        $String = str_replace("", "-", $String); //Guión separador de sílabas.&shy;
        $String = str_replace("®", "-", $String); //Signo de marca registrada.&reg;
        $String = str_replace("¯", "&-", $String); //Macrón.&macr;
        $String = str_replace("°", "-", $String); //Signo de grado.&deg;
        $String = str_replace("±", "-", $String); //Signo de más-menos.&plusmn;
        $String = str_replace("²", "-", $String); //Superíndice dos.&sup2;
        $String = str_replace("³", "-", $String); //Superíndice tres.&sup3;
        $String = str_replace("´", "-", $String); //Acento agudo.&acute;
        $String = str_replace("µ", "-", $String); //Signo de micro.&micro;
        $String = str_replace("¶", "-", $String); //Signo de calderón.&para;
        $String = str_replace("·", "-", $String); //Punto centrado.&middot;
        $String = str_replace("¸", "-", $String); //Cedilla.&cedil;
        $String = str_replace("¹", "-", $String); //Superíndice 1.&sup1;
        $String = str_replace("º", "-", $String); //Indicador ordinal masculino.&ordm;
        $String = str_replace("»", "-", $String); //Signo de comillas francesas de cierre.&raquo;
        $String = str_replace("¼", "-", $String); //Fracción vulgar de un cuarto.&frac14;
        $String = str_replace("½", "-", $String); //Fracción vulgar de un medio.&frac12;
        $String = str_replace("¾", "-", $String); //Fracción vulgar de tres cuartos.&frac34;
        $String = str_replace("¿", "-", $String); //Signo de interrogación abierta.&iquest;
        $String = str_replace("×", "-", $String); //Signo de multiplicación.&times;
        $String = str_replace("÷", "-", $String); //Signo de división.&divide;
        $String = str_replace("À", "a", $String); //A mayúscula con acento grave.&Agrave;
        $String = str_replace("Á", "a", $String); //A mayúscula con acento agudo.&Aacute;
        $String = str_replace("Â", "a", $String); //A mayúscula con circunflejo.&Acirc;
        $String = str_replace("Ã", "a", $String); //A mayúscula con tilde.&Atilde;
        $String = str_replace("Ä", "a", $String); //A mayúscula con diéresis.&Auml;
        $String = str_replace("Å", "a", $String); //A mayúscula con círculo encima.&Aring;
        $String = str_replace("Æ", "a", $String); //AE mayúscula.&AElig;
        $String = str_replace("Ç", "c", $String); //C mayúscula con cedilla.&Ccedil;
        $String = str_replace("È", "e", $String); //E mayúscula con acento grave.&Egrave;
        $String = str_replace("É", "e", $String); //E mayúscula con acento agudo.&Eacute;
        $String = str_replace("Ê", "e", $String); //E mayúscula con circunflejo.&Ecirc;
        $String = str_replace("Ë", "e", $String); //E mayúscula con diéresis.&Euml;
        $String = str_replace("Ì", "i", $String); //I mayúscula con acento grave.&Igrave;
        $String = str_replace("Í", "i", $String); //I mayúscula con acento agudo.&Iacute;
        $String = str_replace("Î", "i", $String); //I mayúscula con circunflejo.&Icirc;
        $String = str_replace("Ï", "i", $String); //I mayúscula con diéresis.&Iuml;
        $String = str_replace("Ð", "d", $String); //ETH mayúscula.&ETH;
        $String = str_replace("Ñ", "n", $String); //N mayúscula con tilde.&Ntilde;
        $String = str_replace("Ò", "o", $String); //O mayúscula con acento grave.&Ograve;
        $String = str_replace("Ó", "o", $String); //O mayúscula con acento agudo.&Oacute;
        $String = str_replace("Ô", "o", $String); //O mayúscula con circunflejo.&Ocirc;
        $String = str_replace("Õ", "o", $String); //O mayúscula con tilde.&Otilde;
        $String = str_replace("Ö", "o", $String); //O mayúscula con diéresis.&Ouml;
        $String = str_replace("Ø", "o", $String); //O mayúscula con barra inclinada.&Oslash;
        $String = str_replace("Ù", "u", $String); //U mayúscula con acento grave.&Ugrave;
        $String = str_replace("Ú", "u", $String); //U mayúscula con acento agudo.&Uacute;
        $String = str_replace("Û", "u", $String); //U mayúscula con circunflejo.&Ucirc;
        $String = str_replace("Ü", "u", $String); //U mayúscula con diéresis.&Uuml;
        $String = str_replace("Ý", "y", $String); //Y mayúscula con acento agudo.&Yacute;
        $String = str_replace("Þ", "b", $String); //Thorn mayúscula.&THORN;
        $String = str_replace("ß", "b", $String); //S aguda alemana.&szlig;
        $String = str_replace("à", "a", $String); //a minúscula con acento grave.&agrave;
        $String = str_replace("á", "a", $String); //a minúscula con acento agudo.&aacute;
        $String = str_replace("â", "a", $String); //a minúscula con circunflejo.&acirc;
        $String = str_replace("ã", "a", $String); //a minúscula con tilde.&atilde;
        $String = str_replace("ä", "a", $String); //a minúscula con diéresis.&auml;
        $String = str_replace("å", "a", $String); //a minúscula con círculo encima.&aring;
        $String = str_replace("æ", "a", $String); //ae minúscula.&aelig;
        $String = str_replace("ç", "a", $String); //c minúscula con cedilla.&ccedil;
        $String = str_replace("è", "e", $String); //e minúscula con acento grave.&egrave;
        $String = str_replace("é", "e", $String); //e minúscula con acento agudo.&eacute;
        $String = str_replace("ê", "e", $String); //e minúscula con circunflejo.&ecirc;
        $String = str_replace("ë", "e", $String); //e minúscula con diéresis.&euml;
        $String = str_replace("ì", "i", $String); //i minúscula con acento grave.&igrave;
        $String = str_replace("í", "i", $String); //i minúscula con acento agudo.&iacute;
        $String = str_replace("î", "i", $String); //i minúscula con circunflejo.&icirc;
        $String = str_replace("ï", "i", $String); //i minúscula con diéresis.&iuml;
        $String = str_replace("ð", "i", $String); //eth minúscula.&eth;
        $String = str_replace("ñ", "n", $String); //n minúscula con tilde.&ntilde;
        $String = str_replace("ò", "o", $String); //o minúscula con acento grave.&ograve;
        $String = str_replace("ó", "o", $String); //o minúscula con acento agudo.&oacute;
        $String = str_replace("ô", "o", $String); //o minúscula con circunflejo.&ocirc;
        $String = str_replace("õ", "o", $String); //o minúscula con tilde.&otilde;
        $String = str_replace("ö", "o", $String); //o minúscula con diéresis.&ouml;
        $String = str_replace("ø", "o", $String); //o minúscula con barra inclinada.&oslash;
        $String = str_replace("ù", "o", $String); //u minúscula con acento grave.&ugrave;
        $String = str_replace("ú", "u", $String); //u minúscula con acento agudo.&uacute;
        $String = str_replace("û", "u", $String); //u minúscula con circunflejo.&ucirc;
        $String = str_replace("ü", "u", $String); //u minúscula con diéresis.&uuml;
        $String = str_replace("ý", "y", $String); //y minúscula con acento agudo.&yacute;
        $String = str_replace("þ", "b", $String); //thorn minúscula.&thorn;
        $String = str_replace("ÿ", "y", $String); //y minúscula con diéresis.&yuml;
        $String = str_replace("Œ", "d", $String); //OE Mayúscula.&OElig;
        $String = str_replace("œ", "-", $String); //oe minúscula.&oelig;
        $String = str_replace("Ÿ", "-", $String); //Y mayúscula con diéresis.&Yuml;
        $String = str_replace("ˆ", "", $String); //Acento circunflejo.&circ;
        $String = str_replace("˜", "", $String); //Tilde.&tilde;
        $String = str_replace("–", "", $String); //Guiún corto.&ndash;
        $String = str_replace("—", "", $String); //Guiún largo.&mdash;
        $String = str_replace("'", "", $String); //Comilla simple izquierda.&lsquo;
        $String = str_replace("'", "", $String); //Comilla simple derecha.&rsquo;
        $String = str_replace("‚", "", $String); //Comilla simple inferior.&sbquo;
        $String = str_replace("\"", "", $String); //Comillas doble derecha.&rdquo;
        $String = str_replace("\"", "", $String); //Comillas doble inferior.&bdquo;
        $String = str_replace("†", "-", $String); //Daga.&dagger;
        $String = str_replace("‡", "-", $String); //Daga doble.&Dagger;
        $String = str_replace("…", "-", $String); //Elipsis horizontal.&hellip;
        $String = str_replace("‰", "-", $String); //Signo de por mil.&permil;
        $String = str_replace("‹", "-", $String); //Signo izquierdo de una cita.&lsaquo;
        $String = str_replace("›", "-", $String); //Signo derecho de una cita.&rsaquo;
        $String = str_replace("€", "-", $String); //Euro.&euro;
        $String = str_replace("™", "-", $String); //Marca registrada.&trade;
        $String = str_replace(":", "-", $String); //Marca registrada.&trade;
        $String = str_replace(" & ", "-", $String); //Marca registrada.&trade;
        $String = str_replace("(", "-", $String);
        $String = str_replace(")", "-", $String);
        $String = str_replace("?", "-", $String);
        $String = str_replace("¿", "-", $String);
        $String = str_replace(",", "-", $String);
        $String = str_replace(";", "-", $String);
        $String = str_replace("�", "-", $String);
        $String = str_replace("/", "-", $String);
        $String = str_replace(" ", "-", $String); //Espacios
        $String = str_replace(".", "", $String); //Punto
        $String = str_replace("&", "-", $String);
        $String = str_replace("“", "", $String);
        $String = str_replace("”", "", $String);
        $String = str_replace("+", "", $String);

        //Mayusculas
        $String = strtolower($String);

        return ($String);
    }
    function create_metas($seoId = '', $type = 'pages'){
        $canonicalURL = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
        if ($seoId == '') {
            if($this->language == 'es'){
                $seo = $this->query("$type/109");
            }else{
                $seo = $this->query("$type/277");
            }
        }else{
            $seo = $this->query("$type/$seoId");
        }
        global $metas, $urlMap;
        
        $ret = '';
        $metas['title'] = $seo->acf->titulo . " - " . $this->palabras[$this->language][45];
        $metas['desc'] = $seo->acf->descripcion;
        $metas['words'] = $seo->acf->palabras_clave;
        $metas['img'] =  $seo->acf->imagen;
        $ret = '<meta charset="utf-8">' . PHP_EOL;
        $ret .= '<link rel="canonical" href="' . $canonicalURL . '">' . PHP_EOL; 
        $ret .= '<meta name="keywords" content="' . $metas['words'] . '">' . PHP_EOL;
        $ret .= '<meta name="description" content="' . $metas['desc'] . '">' . PHP_EOL;
        $ret .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . PHP_EOL;
        $ret .= '<title>' . $metas['title'] . '</title>' . PHP_EOL;
        $ret .= '<meta name="thumbnail" content="' . $metas['img'] . '">' . PHP_EOL;
        $ret .= '<meta name="language" content="spanish">' . PHP_EOL;
        $ret .= '<meta name="twitter:card" content="summary_large_image">' . PHP_EOL;
        $ret .= '<meta name="twitter:site" content="@BogotaDCTravel">' . PHP_EOL;
        $ret .= '<meta name="twitter:title" content="' . $metas['title'] . '">' . PHP_EOL;
        $ret .= '<meta name="twitter:description" content="' . $metas['desc'] . '">' . PHP_EOL;
        $ret .= '<meta name="twitter:image" content="' . $metas['img'] . '">' . PHP_EOL;
        //$ret .= '<meta property="fb:app_id" content="865245646889167">'.PHP_EOL;

        $ret .= '<meta property="og:type" content="website">' . PHP_EOL;
        $ret .= '<meta property="og:title" content="' . $metas['title'] . '">' . PHP_EOL;
        $ret .= '<meta property="og:site_name" content="' . $metas['title'] . '">' . PHP_EOL;
        $ret .= '<meta property="og:description" content="' . $metas['desc'] . '">' . PHP_EOL;
        $ret .= '<meta property="og:image" content="' . $metas['img'] . '">' . PHP_EOL;
        // $ret .= '<meta property="og:image:width" content="' . $width . '">' . PHP_EOL;
        // $ret .= '<meta property="og:image:height" content="' . $height . '">' . PHP_EOL;
        $ret .= '<meta property="og:image:alt" content="' . $metas['title'] . '"/>' . PHP_EOL;
        $ret .= PHP_EOL;
        $ret .= "<!--[if IE]>\n";
        $ret .= "<script>\n";
        $ret .= "\n\tdocument.createElement('header');\n\tdocument.createElement('footer');";
        $ret .= "\n\tdocument.createElement('section');\n\tdocument.createElement('figure');\n\tdocument.createElement('aside');";
        $ret .= "\n\tdocument.createElement('nav');\n\tdocument.createElement('article');";
        $ret .= "\n</script>\n";
        $ret .= "\n<![endif]-->\n";
        return $ret;
    }
}