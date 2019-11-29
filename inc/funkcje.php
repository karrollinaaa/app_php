<?php

function get_menu($id, $strona) {
    Baza::db_query('SELECT * FROM menu');
    foreach (Baza::$ret as $t) {
        echo'
<li class="nav-item active';

    if($t['id'] == $id {
        echo ' active';
        $strona = $t;
    }
    
echo '">
    <a class="nav-link" href="'.$t['id'].'">'.$t['tytul'].'</a>
</li>
        ';
    }
}


function get_kom($kom) {
    foreach ($kom as $v) {
        echo '<p class="text-info">'.$v.'</p>';
    }
}

?>
