<?php
include_once("connection.php");

//##############################################################################
/* FUNCTION check-Login -> true if logged-in else false
 *      codice)}
 *      #param password
 *      #return t.f
 */
function checkLogin($code, $pw){
    try {
        global $c;
        $sql ="SELECT * FROM dipendenti WHERE dip_codice = :code AND dip_password = :password;";
        $st = $c->prepare($sql); //return pdo obj statement
        $st->bindParam(':password', $pw); //associa contenuto
        $st->bindParam(':code', $code);
        $st->execute(); //esegue sql(query) su st(statement)
        $records = $st->fetch(PDO::FETCH_ASSOC); //records
        print_r($records);
        //echo"#################";
    }   catch (PDOException $e) {
        die("Errore durante la connessione al database!: ". $e->getMessage());
        }
        
        if ($records) {
            //autenticazione corretta
            $_SESSION['logged_in'] = true;  //assegno keys && values
            $_SESSION['dip_codice'] = $records['dip_codice'];
            $_SESSION['dip_password'] = $records['dip_password'];
        } else {
            //autenticazione fallita
            logout();
        }
}
//##############################################################################
/** FUNCTION loggedIn -> true if connected
 *      @return true/false
 */
function loggedIn(){
    //verifico se esiste la chiave
    if (!array_key_exists('logged_in', $_SESSION)) {
        $_SESSION['logged_in'] = false;
    }
    return $_SESSION['logged_in'];
}
//################################################################################
/** FUNCTION logout -> reset session parameters
 *      @return $SESSION values
 */
function logout(){
    $_SESSION['logged_in'] = false;
    $_SESSION['dip_codice'] = 0;
    $_SESSION['dip_password'] = "";
}

//################################################################################
/** FUNCTION search 
 *      @param post contenente valori di confronto
 *      @return vlaue confronto positivo
 */
function search($a){
    if ($a) {
        global $c;
        print_r($a);
        $k1 = $a['cerca'];
        //'%oma%' == :parametro bind
        $query = $c->prepare("SELECT *
                                FROM eventi
                                INNER JOIN tipologia ON eventi.eve_grado = tipologia.tip_id
                                WHERE eve_nome LIKE :search
                                OR eve_descrizione LIKE :search
                                OR tip_tipo LIKE :search
                                ORDER BY eve_nome;");
        $query->bindValue(':search' , '%' .$k1. '%' , PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();
        $row = $query->rowCount();//num rows
        
        if($row != 0){  
            foreach($result as $r){
                echo '<hr>
                    <ul>
                        <li> Nome: '.$r["eve_nome"].'</li>
                        <li>Data: '.$r["eve_data"].'</li>
                        <li>Tipologia: '.$r["tip_tipo"].'</li>
                    </ul>';
                    $nome = $r["eve_nome"];
                    $id = $r['eve_id'];
                    //echo "<a href=\"grazie.php?msg={$r['eve_nome']}\" ><button>Mi interessa</button></a>";
                    echo "<a href=\"grazie.php?msg=Grazie per l interesse: {$nome}&id={$id}\" class=\"btn btn-primary\">Mi interessa</a>";
                    echo "<a href=\"grazie.php?msg=Dispiace per il non interesse {$nome}&id={$id} \" class=\"btn btn-primary\">Non mi interessa</a>";

                
                //print_r($a);
            }
        }
    }
}
//################################################################################
/** FUNCTION dataConversion -> converte formato data * output user
 *        @param $data Y/m/d
 *        @return $data d/m/Y
 */
//substring
/** FUNCTION dataConversion2 -> converte formato data * query
 *        @param $data d/m/Y
 *        @return $data Y/m/d
 */
/** FUNCTION  updateInteresse(); ->  query update + 1
 *        @param id evento
 *        @return t-f
 */
function updateInteresse($id){
    try {
        global $c;
        
        $sql =  "UPDATE eventi
                SET eventi.eve_interesse = (eventi.eve_interesse) + 1
                WHERE eventi.eve_id = :id;";
        $st = $c->prepare($sql); //return pdo obj statement
        $st->bindParam(':id', $id);
        $st->execute(); //esegue sql(query) su st(statement)
        //$exist = $st->fetch(PDO::FETCH_ASSOC); //records
        return true;
    }   catch (PDOException $e) {
        die("Errore durante la connessione al database!: ". $e->getMessage());
        }
    }
/** FUNCTION  updateNonInteresse(); ->  query update + 1
 *        @param id evento
 *        @return t-f
 */
function updateNonInteresse($id){
    try {
        global $c;
        echo "<hr>";
        echo "$id";
        echo "<hr>";
        $sql =  "UPDATE eventi
                SET eventi.eve_non_interesse = (eventi.eve_non_interesse) + 1
                WHERE eventi.eve_id = :id;";
        $st = $c->prepare($sql); //return pdo obj statement
        $st->bindParam(':id', $id);
        $st->execute(); //esegue sql(query) su st(statement)
        //$exist = $st->fetch(PDO::FETCH_ASSOC); //records
        return true;
    }   catch (PDOException $e) {
        die("Errore durante la connessione al database!: ". $e->getMessage());
        }
    }
    // query per tipo tipologia


function tipologie(){
    try {
            global $c;
            $sql =  "SELECT tipologia.tip_tipo, COUNT(eve_id) as conto
                    FROM eventi
                    INNER JOIN tipologia ON eventi.eve_grado = tipologia.tip_id
                    GROUP BY tipologia.tip_tipo;";
            $st = $c->prepare($sql); //return pdo obj statement
            $st->execute(); //esegue sql(query) su st(statement)
            $records = $st->fetch(PDO::FETCH_ASSOC); //records
    }   catch (PDOException $e) {
        die("Errore durante la connessione al database!: ". $e->getMessage());
            }
        print_r($records);
        echo $records['tip_tipo'] . " = " . $records['conto'] ;     
}


//query evento con + click
function eventoPiuClick(){
    try {
        global $c;
        $sql =  "SELECT eventi.eve_nome, SUM(eventi.eve_interesse + eventi.eve_non_interesse) as maxclick
                FROM eventi
                INNER JOIN tipologia ON eventi.eve_grado = tipologia.tip_id
                ORDER BY eventi.eve_nome DESC
                LIMIT 1;";
        $st = $c->prepare($sql); //return pdo obj statement
        $st->execute(); //esegue sql(query) su st(statement)
        $records = $st->fetch(PDO::FETCH_ASSOC); //records
}   catch (PDOException $e) {
    die("Errore durante la connessione al database!: ". $e->getMessage());
        }
    //print_r($records);
    echo "L'evento con più click in assoluto è: " . $records['eve_nome'] . " con un totale di " . $records['maxclick'] . " click";      
}