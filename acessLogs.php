class accessLogs{
    private $userName;
    private $time;
    private $module;

    function __construct($userLoggedIn, $module){
        if (isset($userLoggedIn)) {
            $this->userName = $userLoggedIn;
        } else {
            $this->userName = ' Visitante';
        }

        $this->time = date('d-m-Y H:i:s');
        $this->module = $module;
    }

    public function logText(){
        $logText = "O Usuário ".$this->userName." acessou o modulo '" .$this->module. "' em ".$this->time."\n\n";
        return $logText;
    }

    function writeLog(){
        $log = fopen("../includes/logs/logs.txt", "a");
        fwrite($log, $this->logText());
        fclose($log);
    }

}
