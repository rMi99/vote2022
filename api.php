<?php
include_once './inc/Database.php';
include_once './inc/User.php';
include_once './inc/Logger.php';

header("Content-Type: text/javascript");
session_start();


//$dbConn = new Database("sql102.epizy.com", "epiz_31467586", "Cyber@123", 3306);
$dbConn = new Database("127.0.0.1", "root", "", 3306);
$strDb = $dbConn->initConnection();
$log = Logger::InitLogger('data-log-754.txt');
if(strpos($strDb, "ERROR")){
    echo $strDb;
    exit();
}
$dbPdo = $dbConn->getConnection();

function isSessionOn() {
    if(session_status() == PHP_SESSION_NONE || !isset($_SESSION['mKey']) || !isset($_SESSION['fKey']))
        return false;
    return true;
}


function userRegister(){
    $fname = NULL;
    $email = NULL;
    $passwd = NULL;
    $confPwd = NULL;
    if(isset($_POST['f_name']) &&
     isset($_POST['e_mail']) &&
        isset($_POST['u_pwd']) &&
        isset($_POST['uc_pwd'])
        ){
        $fname = $_POST['f_name'];
        $email = $_POST['e_mail'];
        $passwd = $_POST['u_pwd'];
        $confPwd = $_POST['uc_pwd'];
        $GLOBALS['log']->WriteOut("Registration Request : " . $fname . "/" . $email . "/" . $passwd . "/" . $confPwd . "/\n");
        $GLOBALS['log']->CloseFile();
    }
    else {
        echo 'ERR: API did not receive all the required data to complete the registration process...';
        exit();
    }
    
    
    $usr = new User($fname, $email, $passwd, $confPwd);
    $usrcRet = $usr->createUser($GLOBALS['dbPdo']);
    if($usrcRet == NULL)
    {
        echo "ලියාපදිංචිවීම සාර්ථකයි!";
        exit();
    } 
    echo $usrcRet;
    exit();
    
}

function userLogin(){
    $email = NULL;
    $pwd = NULL;
    
    if(!empty($_POST)){
        $email = $_POST['u_email'];
        $pwd = $_POST['u_pwd'];
        $GLOBALS['log']->WriteOut("Login Request : " . $email . "[/]" . $pwd . "[/]\n");
        $GLOBALS['log']->CloseFile();
    } else {
        echo 'ERR: API did not receive all the required data to complete the login process...';
        exit();
    }
    
    $usrInst = User::getUserEx($GLOBALS['dbPdo'], $email, $pwd);
    if($usrInst == null){
        echo "ERR: ඔබ ඇතුලත් කළ ඊ-තැපෑල හෝ මුරපදය වැරදියි. නැවතත් උත්සහ කරන්න.";
        exit();
    }
    $logRet = $usrInst->login($GLOBALS['dbPdo'], $email, $pwd);
    
    if($logRet != NULL)
    {
        echo $logRet;
        exit();
    }
    
    return null;
}

function getVotes(){
    $stmt = $GLOBALS['dbPdo']->prepare("SELECT SUM(vote='0') AS jvp, SUM(vote='1') AS unp, SUM(vote='2') AS sjb, SUM(vote='3') AS slmc 
    , SUM(vote='4') AS slfp, SUM(vote='5') AS tna, SUM(VOTE='6') AS slpp, SUM(vote='7') AS none FROM users");
    $stmt->execute();
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}

function addVote() {
    $str =  NULL;
    if(isset($_POST['vote']))
    {
        $str = $_POST['vote'];
    } else {
        echo 'ERR: API did not receive all the required data to complete the voting process...';
        exit();
    }
    echo User::vote($GLOBALS['dbPdo'], $str);
}

if(!isset($_GET['func']) || strlen($_GET['func']) <= 0)
{
    echo 'API received an empty input.';
    exit();
}

$split1 = explode('&', file_get_contents("php://input"));
foreach ($split1 as $part){
    $split2 = explode('=', $part);
    $_POST[urldecode($split2[0])] = urldecode($split2[1]);
}

$inFunc = $_GET['func'];
switch ($inFunc){
    case "reg":
        userRegister();
        break;
    case "login":
        userLogin();
        break;
    case "vote":
        addVote();
        break;
    case "gVotes":
        getVotes();
        break;
    default:
        echo 'API received an invalid input.';
        exit();
}