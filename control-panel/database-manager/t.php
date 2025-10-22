<?php
# namespace vm_database; 

class webhoock
{   
    public $database;
    public $webhoocks_dir;

    public function __construct() {
        $this->webhoocks_dir = dirname(__FILE__).DIRECTORY_SEPARATOR."webhoocks";
        @include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."client.module.php"; 

    }


    public function create_database($name,$source,$link){
        $pwd = $this->webhoocks_dir.DIRECTORY_SEPARATOR."vm_source_".hash("sha256",$name);

        #Create Directory For The Webhoock
        if (!is_dir($pwd)){
            mkdir($pwd);
        }

        $database = uniqid("vm_database_").".db";
        $this->database = new database_manager();
        $this->database->override_connection($pwd.DIRECTORY_SEPARATOR.$database);

        #Create Command Structure 
        $cmd_str_file = $pwd.DIRECTORY_SEPARATOR."cmd.str";
        $cmd_str = [
            'agent'=>'agents.vm',
            "source"=>$source,
            "data" => $database,
            'webhoock'=>$link,
        ];
        file_put_contents($cmd_str_file,json_encode($cmd_str));
        echo $pwd;
    }

    public function create_user($username,$password,$database,$auth){
        $pwd = $this->webhoocks_dir.DIRECTORY_SEPARATOR."vm_source_".hash("sha256",$database);
        if (!is_dir($pwd)){
            return trigger_error(" [Webhoock] Database Does Not Exists ".$database);
        }

        $credentials = [];
        $credentials['username'] = $this->encryption($username);
        $credentials['password'] = hash("sha256",$password);
        $credentials['database'] = $this->encryption($database);
        $credentials['auth'] = $this->encryption($auth);

        $agents_file = $pwd.DIRECTORY_SEPARATOR."agents.vm";
        $e = file_put_contents($agents_file,$this->encryption(base64_encode(json_encode($credentials,JSON_PRETTY_PRINT))));
    }

    public function login($database,$username,$password,$auth){        
        $pwd = $this->webhoocks_dir.DIRECTORY_SEPARATOR."vm_source_".hash("sha256",$database);
        if (!is_dir($pwd)){
            return trigger_error(" [Webhoock] Database Does Not Exists ".$database);
        }

        die(0);

        $credentials = [];
        $credentials['username'] = $this->encryption($username);
        $credentials['password'] = hash("sha256",$password);
        $credentials['database'] = $this->encryption($database);
        $credentials['auth'] = $this->encryption($auth);

        $agents_file = $pwd.DIRECTORY_SEPARATOR."agents.vm";
        $e = file_put_contents($agents_file,$this->encryption(base64_encode(json_encode($credentials,JSON_PRETTY_PRINT))));

    }

    public function encryption($input){
        $algo = openssl_get_cipher_methods()[60];
        $passphrase = hash('sha256','webhoock.database');
        $e = openssl_encrypt($input,$algo,$passphrase);
        return $e;
    }

    public function decryption($input){
        $algo = openssl_get_cipher_methods()[60];
        $passphrase = hash('sha256','webhoock.database');
        $e = openssl_decrypt($input,$algo,$passphrase);
        return $e;   
    }

    public function create_weblink(){
        $template = "http\\{DOMAIN}\@database\{LINK_CODE}\\";

        $link_code = uniqid('vm_database_').'_'.str_shuffle(hash("sha256","@database"));
        #http://127.0.0.1:3000/vm-admin/database/
        return 'http://127.0.0.1:3000/@database/'.$link_code.'/';
        #echo $link_code ;
    }

    public function query($sql){
        #For The Following Do A SQL Statement Check 
        $e = $this->database->query($sql);
        return $e;
    }

    public function establish_connection($source){
        $this->database = $source;
    }
}


$e = new webhoock();
# Create A New Database With Restrictions To The IP Address Only
# $e->create_database('magazine.reidrop.co.za','82.129.98.10',$e->create_weblink());
$e->create_database('database','127.0.0.1',$e->create_weblink());

# Create A User For The Database 
$e->create_user('user','password','database','auth');

$e->login('database','user','passwoord','auth');
?>