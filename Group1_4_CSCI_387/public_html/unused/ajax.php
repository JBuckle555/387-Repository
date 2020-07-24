<?php
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'insert':
                insert();
                break;
            case 'select':
                select();
                break;
        }
    }

    function select() {
        
        exit;
    }

    function insert() {
        echo "The insert function is called.";
        exit;
    }
?>
