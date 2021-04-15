<?php 

$post_query = query("SELECT COUNT(*) as tot FROM post");
confirm($post_query);
$tot_row1 = fetch_array($post_query);
$tot_post = $tot_row1['tot'];

$cons_query = query("SELECT COUNT(*) as tot FROM consulenze");
confirm($cons_query);
$tot_row2 = fetch_array($cons_query);
$tot_cons = $tot_row2['tot'];

$users_query = query("SELECT COUNT(*) as tot FROM utenti");
confirm($users_query);
$tot_row3 = fetch_array($users_query);
$tot_users = $tot_row3['tot'];

$recent_post_query = query("SELECT * FROM post ORDER BY post_data DESC LIMIT 4");
confirm($recent_post_query);
$recent_post = array();
$j = 0;
while($row = fetch_array($recent_post_query)) {
    $pd = $row['post_data'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($pd));
    $recent_post[$j] = new Post($row['id'], $row['titolo'], $pdate, $row['cat_id'], $row['testo']);
    $j++;
}

$rec_cons_query = query("SELECT * FROM consulenze ORDER BY data_tx DESC LIMIT 10");
confirm($rec_cons_query);
$recent_cons = array();
$i = 0;
while($row = fetch_array($rec_cons_query)) {
    $recent_cons[$i] = new Consulenza($row['id'], $row['nome'], $row['cognome'], $row['email'], $row['telefono'], $row['messaggio'], $row['codice_tx'], $row['stato_tx'], $row['data_tx']);
    $i++;
}

?>

<main>
    <div class="cards">
        <div class="card">
            <div class="card-header">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-body">
                <p class="h1"><?php echo $tot_post; ?></p>
                <p>post pubblicati</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-balance-scale"></i>
            </div>
            <div class="card-body">
                <p class="h1"><?php echo $tot_cons; ?></p>
                <p>consulenze richieste</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-body">
                <p class="h1"><?php echo $tot_users; ?></p>
                <p>utenti</p>
            </div>
        </div>
    </div>
    <div class="recent">
        <div class="rec-posts mb-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Post recenti</h3>
                    <a role="button" class="btn" href="index.php?post">Vedi tutti<i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <td>Titolo post</td>
                                <td>Categoria post</td>
                                <td>Data post</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recent_post as $p): ?>
                            <tr>
                                <td><?php echo $p->get_title_ant(); ?></td>
                                <td><?php echo $p->get_cat_name(); ?></td>
                                <td><?php echo $p->get_data(); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="rec-cons mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Ultime consulenze richieste</h3>
                    <a role="button" class="btn" href="index.php">Vedi tutti<i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Cognome</td>
                                <td>Email</td>
                                <td>Recapito telefonico</td>
                                <td>Data</td>
                                <td>Stato</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recent_cons as $c): ?>
                            <tr>
                                <td><?php echo $c->get_nome(); ?></td>
                                <td><?php echo $c->get_cognome(); ?></td>
                                <td><?php echo $c->get_email(); ?></td>
                                <td><?php echo $c->get_phone(); ?></td>
                                <td><?php echo $c->get_data(); ?></td>
                                <td class="<?php if($c->get_state() == 'completato'){echo 'state state-succ';} else {echo 'state state-no';} ?>"><i class="fas fa-check-circle"></i><span><?php echo $c->get_state(); ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
