<?php 
$cons_query = query("SELECT * FROM consulenze ORDER BY data_tx DESC");
confirm($cons_query);
$cons = array();
$i = 0;
while($row = fetch_array($cons_query)) {
    $cons[$i] = new Consulenza($row['id'], $row['nome'], $row['cognome'], $row['email'], $row['telefono'], $row['messaggio'], $row['codice_tx'], $row['stato_tx'], $row['data_tx']);
    $i++;
}
?>

<main class="cons-main">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Consulenze online richieste</h3>
        </div>
        <div class="card-body">
            <table id="cons-table-mobile">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Cognome</td>
                        <td>Email</td>
                        <td>Telefono</td>
                        <td>Data</td>
                        <td>Stato</td>
                        <td>Azioni</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cons as $c): ?>
                    <tr>
                        <td><?php echo $c->get_nome(); ?></td>
                        <td><?php echo $c->get_cognome(); ?></td>
                        <td><?php echo $c->get_email(); ?></td>
                        <td><?php echo $c->get_phone(); ?></td>
                        <td><?php echo $c->get_data(); ?></td>
                        <td class="<?php if($c->get_state() == 'completato'){echo 'state state-succ';} else {echo 'state state-no';} ?>"><i class="fas fa-check-circle"></i><span><?php echo $c->get_state(); ?></span></td>
                        <td><a class="btn btn-primary" href="../admin/index.php?view-con&id=<?php echo $c->get_id(); ?>" role="button">Visualizza</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row" id="cons-card-mobile">
                <?php foreach($cons as $c): ?>
                    <div class="card shadow rounded mb-2">
                        <div class="card-body">
                            <p class="card-title fw-bolder"><?php echo $c->get_nome(); ?> <?php echo $c->get_cognome(); ?></p>
                            <p class="card-subtitle mb-2 text-muted"><?php echo $c->get_data(); ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $c->get_email(); ?></li>
                            <li class="list-group-item"><?php echo $c->get_phone(); ?></li>
                            <li class="list-group-item <?php if($c->get_state() == 'completato'){echo 'state state-succ';} else {echo 'state state-no';} ?>"><i class="fas fa-check-circle"></i><span><?php echo $c->get_state(); ?></span></li>
                        </ul>
                        <div class="card-body">
                            <a class="btn btn-primary" href="../admin/index.php?view-con&id=<?php echo $c->get_id(); ?>" role="button">Visualizza</a>
                        </div>
                    </div>
                <?php endforeach; ?>   
            </div>
    </div>
</main>
