<?php
if(isset($_GET['id'])) {
    $query = query("SELECT * FROM consulenze WHERE id = '{$_GET['id']}'");
    confirm($query);
    $row = fetch_array($query);
    $con = new Consulenza($row['id'], $row['nome'], $row['cognome'], $row['email'], $row['telefono'], $row['messaggio'], $row['codice_tx'], $row['stato_tx'], $row['data_tx']);
}
?>

<main>
    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php?cons">Gestione consulenze</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dettagli consulenza con id: <?php echo $con->get_id(); ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Nome e cognome richiedente:</span><span><?php echo $con->get_nome(); ?> <?php echo $con->get_cognome(); ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Email richiedente:</span><span><?php echo $con->get_email(); ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Recapito telefonico richiedente:</span><span><?php echo $con->get_phone(); ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Codice richiesta:</span><span><?php echo $con->get_codex(); ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Data richiesta:</span><span><?php echo $con->get_data(); ?></span></li>
                <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Stato richiesta:</span><span><?php echo $con->get_state(); ?></span></li>
                <li class="list-group-item">
                    <p class="fw-bold">Messaggio richiesta:</p>
                    <p><?php echo $con->get_msg(); ?></p>
                </li>
            </ul>
        </div>
    </div>
</main>