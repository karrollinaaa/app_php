<?php   

class Baza {
    private $db = null;
    var $ret = array();
    var $mode = PDO::FETCH_ASSOC;
    var$kom = array();
    

    function __construct($dbfile) {
        if(!file_exists($dbfile))
            $this->$kom[] = "Brak pliku bazy! Tworzę nowy!";
        try {
            $this->db = new PDO("sqlite:$dbfile");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOexception $e) {
            $this->kom[] = 'Błąd: '.$e->getMessage()."\n";
        }
        $this->init_tables();
    }


    function init_tables() {
        global $db, $kom;
        if (file_exists('baza/baza.sql')) {
            $q = "SELECT name FROM sqlite_master WHERE type='table' AND name='menu'";
            $ret = array();
            db_query($q, $ret);
            if(empty($ret)) {
                $sql = file_get_contents('baza/baza.sql');
                $db->exec($sql);
                $kom[] = "Utworzono tabelę!";
            }
        }
    }


    function db_query($q, &$ret) {
        global $db;
        $r = null;
        try {
            $r = $db->query($q);
        } catch(PDOexception $e) {
            echo($e->getMEssage());
            }
        if ($r) {
            $ret = $r->fetchAll();
            return true;
        }
        return false;
    }
    
    
}

?>
