<?php

/**
 * Detect mobile devices
 *Mobil Tesbit
 * 
 * 
 */
class MobileDetect {
    
	
	const DEVICE_ANDROID	= "android";
	const DEVICE_BLACKBERRY	= "blackberry";
	const DEVICE_IPHONE		= "iphone";
	const DEVICE_OPERA		= "opera";
	const DEVICE_PALM		= "palm";
	const DEVICE_WINDOWS	= "windows";
	const DEVICE_GENERIC	= "generic";
	const DEVICE_IPAD		= "ipad";
	const DEVICE_NORMAL		= "normal";
	
   
    private $_useragent;
    private $_isMobile     	= false;
    private $_isAndroid    	= null;
    private $_isBlackberry 	= null;
    private $_isIphone		= null;
    private $_isOpera      	= null;
    private $_isPalm       	= null;
    private $_isWindows    	= null;
    private $_isGeneric    	= null;
    private $_isIpad		= null;
	private $_devices 		= array(
        "android"       => "android",
        "blackberry"    => "blackberry",
        "iphone"        => "(iphone|ipod)",
        "opera"         => "opera mini",
        "palm"          => "(avantgo|blazer|elaine|hiptop|palm|plucker|xiino)",
        "windows"       => "(iemobile|ppc|smartphone|windows phone)",
        "generic"       => "(kindle|mobile|mmp|midp|o2|pda|pocket|psp|symbian|smartphone|treo|up.browser|up.link|vodafone|wap)",
        "ipad"			=> "ipad"
    );
    public function __construct() {
        $this->_useragent = $_SERVER['HTTP_USER_AGENT'];
        foreach ($this->_devices as $device => $regexp) {
        	if ($this->IsDevice($device) && $this->_isMobile == FALSE) {
    	        $this->_isMobile = true;
            }
        }
    }
     private function IsDevice($device) {
	
        $var    = "Is" . ucfirst($device);
        $return = @$this->$var === null ? (bool) preg_match("/" . $this->_devices[strtolower($device)] . "/i", $this->_useragent) : $this->$var;
        if ($device != 'generic' && $return == true) {
            $this->_isGeneric = false;
        }

        return $return;
    }
    
   
    public function GetDevice(){
    	foreach($this->_devices as $device_string => $regex){
    		if( $this->IsDevice($device_string) ){
    			return $device_string;
    		}
    	}
    	return self::DEVICE_NORMAL;
    }

    
    public function __call($name, $arguments) {
        $device = substr($name, 2);
        if ($name == "Is" . ucfirst($device)) {
            return $this->IsDevice($device);
        } else {
            trigger_error("Method $name is not defined", E_USER_ERROR);
        }
    }


   
    public function IsMobile() {
        return $this->_isMobile;
    }

}