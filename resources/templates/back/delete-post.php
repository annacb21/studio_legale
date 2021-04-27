<?php

    if(isset($_GET['id'])) {

        $query = query("DELETE FROM post WHERE id = '{$_GET['id']}' ");
        confirm($query);

        set_message("Post eliminato con successo", "alert-success");
        redirect("../admin/index.php?post");

    }

?>