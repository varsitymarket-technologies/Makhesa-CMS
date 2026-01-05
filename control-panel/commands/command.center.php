<?php
// deploy

#   TITLE   : Gitub Production Server Deployer Service   
#   DESC    : Automatically update the scripts for the servers. This will be the Push to Repository script 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/09/16

$intro_text = " 
\t##############################################
\t##############################################
\t__     ___    ____  ____ ___ _______   __
\t\ \   / / \  |  _ \/ ___|_ _|_   _\ \ / /
\t \ \ / / _ \ | |_) \___ \| |  | |  \ V /
\t  \ V / ___ \|  _ < ___) | |  | |   | |
\t   \_/_/   \_\_| \_\____/___| |_|   |_|
\t
\t __  __    _    ____  _  _______ _____
\t|  \/  |  / \  |  _ \| |/ / ____|_   _|
\t| |\/| | / _ \ | |_) | ' /|  _|   | |
\t| |  | |/ ___ \|  _ <| . \| |___  | |
\t|_|  |_/_/   \_\_| \_\_|\_\_____| |_|
\t
\t _            _                 _             _
\t| |_ ___  ___| |__  _ __   ___ | | ___   __ _(_) ___  ___
\t| __/ _ \/ __| '_ \| '_ \ / _ \| |/ _ \ / _` | |/ _ \ / __|
\t| ||  __/ (__| | | | | | | (_) | | (_) | (_| | |  __/\__ \
\t \__\___|\___|_| |_|_| |_|\___/|_|\___/ \__, |_|\___||___/
\t                                        |___/
\t[ENGINE-SERVICES] => The Engine CLI Application 
\tCreated By Hardy Hastings                                        
\t##############################################
\n\tThis application is responsible for managing the control panel by providing additional features that are available to database users. 
\n\t##############################################
\n\n
";

echo ($intro_text);
sleep(5);

function get_input($index=false){
    $line = trim(fgets(STDIN));
    // Split the input into command and arguments
    $parts = explode(' ', $line, 2); // Split only on the first space to get command and rest of the line
    if ($index == false){
        return $line;     
    }else{
        return $parts[$index] ?? trigger_error("Cannot Locate Data Sources");
    }
}

function label($label,$placeholder){
    e("\t[{$label}] ? ({$placeholder})");
}

function input($caption,$format="string"){
    
    // Start the CLI interaction loop
    while (true) {
    echo "{$caption}";
    // Read user input from the console
    $line = trim(fgets(STDIN));
    // Split the input into command and arguments
    $parts = explode(' ', $line, 2); // Split only on the first space to get command and rest of the line
    $description = $line; 
    if ($format == "string"){
        return $description;
    }else{
        return $parts;
    }



    exit(0);
}
}

function __error($e){
    $e_ = "ERROR ".$e;
    echo $e_;
    trigger_error($e_);
}

function e($e){
    echo $e;
}

function start_cli_application($source_code)
{
    // Start the CLI interaction loop
    while (true) {
        $e = dirname(__FILE__).DIRECTORY_SEPARATOR.$source_code.".script";
        if (file_exists($e)){
            @include_once $e;
        }else{
            __error("Failed To Find Source Package. Shutting Down Requests");
            return false;
        }
    }
}

function application_menu(){
    $menu_data = [
        'create.user' => "Creates New Admin Users For Your Control Panel",
        'core.patch' => 'Keep a version of your local project.',
        'core.update' => 'Uppdate Your Local application with the latest patches in the background.',
        'restore.website.database' => "Restores The Broken Website Database Structure",
        'restore.engine.database' => "Restores The Broken System Engine Database Structure",
        'restore.email.database' => "Restores The Broken System Email Database Structure",
        'restore.logs.database' => "Restores The Broken System Engine Logs Database Structure",
        'restore.register.database' => "Restores The Broken System Register Database Structure",
        'deploy.static.website' => "Deploys the site to the github website",
        'lock.site' => "Lock your website from external users",
        'git.version' => "Version Control For Your Control Panel",
        'web.server' => "Run the native PHP server",
        "web.tunnel" => "Configure The Website Tunnel To Allow.",
        "quit" => "Close This Application. "
    ];
    $i = 0;
    foreach ($menu_data as $key => $value) {
        $i ++;
        e("\t{$i}. {$key} | {$value}\n");
        # code...
    }
}

@application_menu();
echo "\n"; 
@label("MENU OPTION",'e.g health.report');
$menu_script = input(' ');
$e = start_cli_application($menu_script);
?>