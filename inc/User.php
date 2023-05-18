<?php 
include_once 'Integrity.php';
class User {
    public $fullName = NULL;
    public $emailAddr = NULL;
    public $password = NULL;
    public $confirmPwd = NULL;
    
    function __construct($fn, $mail, $pwd, $cpwd) {
        $this->fullName = $fn;
        $this->emailAddr = $mail;
        $this->password = $pwd;
        $this->confirmPwd = $cpwd;
    }
    
    private function __addUser($db){
        $stmt = $db->prepare("INSERT INTO users (f_name, email, password, vote) VALUES (:fn, :mail, :pwd, :vote)");
        $stmt->execute([
           "fn" => $this->fullName,
            "mail" => $this->emailAddr,
            "pwd" => $this->password,
            "vote" => NULL
        ]);
    }
    
    function createUser($dbConn) {
        if($dbConn == NULL)
            return null;

        if(User::getUserW($dbConn, $this->emailAddr) != null)
            return "ERR: ඔබ ඇතුලත් කරනු ලැබූ ඊ-තැපෑල දැනටමත් භාවිතයේ ඇත. වෙනත් ඊ-තෑපැල් ලිපිනයක් භාවිතා කරන්න.";

        if(!Integrity::IsName($this->fullName))
            return "ERR: ඔබ ඇතුලත් කරනු ලැබූ සම්පූර්ණ නාමයේ සුළු වරදක් පවතී. නැවතත් උත්සහ කරන්න.";
        if(!Integrity::IsEmail($this->emailAddr))
            return "ERR: ඔබ ඇතුලත් කරනු ලැබූ ඊ-තැපෑල වලංගු නැත. නැවතත් උත්සහ කරන්න.";
        if(!Integrity::IsPassword($this->password))
            return "ERR: ඔබ ඇතුලත් කරනු ලැබූ මුරපදය වලංගු නැත. නැවතත් උත්සහ කරන්න.";
        if($this->password !== $this->confirmPwd)
            return "ERR: ඔබ ඇතුලත් කරනු ලැබූ මුරපදය තහවුරු කරන්න.";
        $this->__addUser($dbConn);
        return NULL;
    }
    
    function getUser($db, $mail, $pwd) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([
            $mail,
            $pwd
        ]);
        if($stmt->rowCount() <= 0)
            return null;
        $userDat = $stmt->fetch();
        $userInst = new User($userDat['f_name'], $userDat['email'], $userDat['password'], NULL);
        return $userInst;
    }
    
    static function getUserEx($db, $mail, $pwd) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([
            $mail,
            $pwd
        ]);
        if($stmt->rowCount() <= 0)
            return null;
        $userDat = $stmt->fetch();
        $userInst = new User($userDat['f_name'], $userDat['email'], $userDat['password'], NULL);
        return $userInst;
    }

    static function getUserW($db, $mail){
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([
            $mail
        ]);
        if($stmt->rowCount() <= 0)
            return null;
        $userDat = $stmt->fetch();
        $userInst = new User($userDat['f_name'], $userDat['email'], $userDat['password'], NULL);
        return $userInst;
    }
    
    function login($db, $mail, $pwd){
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $uInst = $this->getUser($db, $mail, $pwd);
        if($uInst == null)
            return "ERR: ඔබ ඇතුලත් කරණු ලැබූ ඊ-තැපැල් ලිපිනය හෝ මුරපදය වැරදි‍යි. නැවතත් උත්සහ කරන්න.";
        $_SESSION['mKey'] = sha1($this->emailAddr);
        $_SESSION['fKey'] = md5($this->password);
        return "පුරනය වීම සාර්ථකයි!";
    }
    
    static function vote($db, $str){
        if(session_status() == PHP_SESSION_NONE)
            return "ERR: An internal error occurred within the API";
        switch ($str){
            case "0":
            case "1":
            case "2":
            case "3":
            case "4":
            case "5":
            case "6":
            case "7":
                break;
            default:
                return "ERR: API detected an attempt to send invalid data from the client side. Therefore the request was blocked.";
        }
        
        $stmt = $db->prepare("UPDATE users SET vote = :vote WHERE SHA1(email) = :mail AND MD5(password) = :pwd AND vote IS NULL");
        $stmt->execute([
            "vote" => $str,
            "mail" => $_SESSION['mKey'],
            "pwd" => $_SESSION['fKey']
        ]);
        if($stmt->rowCount() <= 0)
            return "ERR: ඔබ දැනටමත් ඡන්දය ප්‍රකාෂ කර ඇති බැවින් නැවත වතාවක් ඔබට ඡන්දය ප්‍රකාෂ කල නොහැක.";
        return "ඡන්දය ප්‍රකාෂ කිරීම සාර්ථකයි. ඔබට සිතූතියි.";
    }
}
