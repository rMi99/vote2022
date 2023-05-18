<?php 
class Integrity {
    static function IsEmail($m) {
        if(filter_var($m, FILTER_VALIDATE_EMAIL))
            return true;
        return false;
    }
    
    static function IsName($name) {
        if(strpos($name, " ") == true){
            $nameParts = explode(" ", $name);
            foreach ($nameParts as $nme){
                $nme = trim($nme);
                if(ctype_alpha($nme) == false){
                    return false;
                }
            }
            return true;
        }
        
        if(ctype_alpha($name))
            return true;
        return false;
    }
    
    static function IsPassword($password) {
        if($password != "" && $password != NULL && strlen($password) >= 6)
            return true;
        return false;
    }
}

