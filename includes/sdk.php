<?php
class HarkerLloreda {
	public $domain = "https://harkerlloreda.com/admin_hl_wp/index.php/wp-json/wp/v2/";
	public $url = "https://harkerlloreda.com/admin_hl_wp/";
	public $infoGnrl = array();
    public $language = "";
    public $palabras = "";
    public $production = true;

    public function __construct($language = "es", $development = false) {
        if ($development) {
            $this->production = false;
        }
        $this->language = $language;
        $this->infoGnrl = $this->gInfo();
        $this->palabras = $this->getPalabrasDeInterfaz();
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
        if(isset($_SESSION[$this->language]['ginfo'])){
            $gnrl = $_SESSION[$this->language]['ginfo'];
		} else {
            if($this->language == "es"){
                $result = $this->query("pages/109");                
            }else{
                $result = $this->query("pages/277");
            }
			$gnrl = $result;
            
			$_SESSION[$this->language]['ginfo'] = $gnrl;
		}
		return $gnrl;
	}
    function gBannerHome(){
        if(isset($_SESSION[$this->language]['hl_sliders'])){
            $banners = $_SESSION[$this->language]['hl_sliders'];
        } else {
            $result = $this->query("hl_sliders");
            $banners = $result;
    
            $_SESSION[$this->language]['hl_sliders'] = $banners;
        }
        return $banners;
   
    }

    // ID que debe ir primero (puede ser 230 o 284)
    
    // Función de comparación personalizada
    function compararPorID($a, $b) {
        if($this->language == "es"){
            $idPrimero = 230;
        }else{
            $idPrimero = 284;
        }
        // Comprobamos si alguno de los IDs es el ID que debe ir primero
        $aPrimero = ($a->id === $idPrimero);
        $bPrimero = ($b->id === $idPrimero);
    
        // Si ambos deben ir primero o ninguno debe ir primero, comparamos por ID normalmente
        if ($aPrimero == $bPrimero) {
            return 0;
        }
    
        // Si solo uno de ellos debe ir primero, ese va primero
        return $aPrimero ? -1 : 1;
    }

    function gEquipoDestacadoHome(){
        if(isset($_SESSION[$this->language]['hl_miembros_destacados'])){
            $equipo_destacados = $_SESSION[$this->language]['hl_miembros_destacados'];
        } else {
            $queryParams = ['field' => 'destacar_en_el_home,idioma_de_este_contenido', 'value' => 'Si,'.$this->language];
            $result = $this->query("hl_miembros", "", null, $queryParams);
            $equipo_destacados = $result;
            $_SESSION[$this->language]['hl_miembros_destacados'] = $equipo_destacados;
        }
        return $equipo_destacados;
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
        if(isset($_SESSION['palabras'])){
            $palabras = $_SESSION['palabras'];
		} else {
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
			$_SESSION['palabras'] = $palabras;
		}
        return $palabras;
    }
    function getProcedimientosPage(){
        if(isset($_SESSION['procedimientosPage'])){
            $procedimientosPage = $_SESSION['procedimientosPage'];
		} else {
            $procedimientosPage = array();
            $procedimientosPageES = $this->query("pages/128");
            $procedimientosPageEN = $this->query("pages/298");
            $procedimientosPage["es"] = $procedimientosPageES;
            $procedimientosPage["en"] = $procedimientosPageEN;
	        $_SESSION['procedimientosPage'] = $procedimientosPage;
		}
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
    function create_metas($seoId){
        $canonicalURL = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
        if ($seoId == '') {
            $seoId = 4;
        }
        $seo = $this->query("seo/" . $seoId);
        $seo = $seo[0];
        global $metas, $urlMap;
        
        $ret = '';
        $metas['title'] = $seo->field_seo_title;
        $metas['desc'] = $seo->field_seo_desc;
        $metas['words'] = $seo->field_seo_keys;
        $metas['img'] = "https://www.bogotadc.travel" . $seo->field_seo_img;

        // list($width, $height, $type, $attr) = getimagesize("https://www.bogotadc.travel" . $seo->field_seo_img);

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