<?php
// get all posts
$user_query = query("SELECT * FROM utenti");
confirm($user_query);
$users = array();
$i = 0;
while($row = fetch_array($user_query)) {
    $users[$i] = new User($row['id'], $row['username'], $row['password'], $row['nome'], $row['cognome']);
    $i++;
}
?>

<main class="users-main">
    <div>
        <?php display_message(); ?>
        <button type="button" class="btn btn-lg action-button" onclick="toggle_user_form();"><i class="fas fa-plus"></i>Aggiungi nuovo utente</button>
        <form action="" method="post" class="needs-validation mt-4" id="add-user-form" novalidate>
            <?php addUser(); ?>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Nome utente" name="nome" id="nome" required>
                <div class="invalid-feedback">Inserire il proprio nome</div>
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome</label>
                <input type="text" class="form-control" placeholder="Cognome utente" name="cognome" id="cognome" required>
                <div class="invalid-feedback">Inserire il proprio cognome</div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                <div class="invalid-feedback">Inserire uno username</div>
            </div>
            <div class="mb-3">
                <label for="psw1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="psw1" id="psw1" required>
                <div class="invalid-feedback">Inserire una password</div>
            </div>
            <div class="mb-3">
                <label for="psw2" class="form-label">Conferma password</label>
                <input type="password" class="form-control" placeholder="Conferma password" name="psw2" id="psw2" required>
                <div class="invalid-feedback">Le password non corrispondono</div>
            </div>
            <button type="submit" name="addUser" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="mb-0">Utenti amministratori</h3>
        </div>
        <div class="card-body">
            <table id="user-table-mobile">
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Nome</td>
                        <td>Cognome</td>
                        <td>Azioni</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u): ?>
                    <tr>
                        <td><?php echo $u->get_username(); ?></td>
                        <td><?php echo $u->get_name(); ?></td>
                        <td><?php echo $u->get_surname(); ?></td>
                        <td class="d-flex justify-content-start"><a class="btn btn-primary" href="../admin/index.php?edit-user&id=<?php echo $u->get_id(); ?>" role="button">Modifica</a><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo $u->get_id(); ?>">Elimina</button></td>
                        <div class="modal fade" role="dialog" id="deleteUserModal<?php echo $u->get_id(); ?>" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fw-bold fs-5" id="deleteUserModalLabel">Elimina utente</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Sei sicuro di voler eliminare questo utente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                        <a href="../admin/index.php?delete-user&id=<?php echo $u->get_id(); ?>" role="button" class="btn btn-danger">Conferma eliminazione</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row" id="user-card-mobile">
                <?php foreach($users as $u): ?>
                    <div class="card shadow rounded mb-2">
                        <div class="card-body">
                            <p class="card-title fw-bolder"><?php echo $u->get_username(); ?></p>
                            <p class="card-text"><?php echo $u->get_name(); ?> <?php echo $u->get_surname(); ?></p>
                            <a class="btn btn-primary" href="../admin/index.php?edit-user&id=<?php echo $u->get_id(); ?>" role="button">Modifica</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo $u->get_id(); ?>">Elimina</button>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" id="deleteUserModal<?php echo $u->get_id(); ?>" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title fw-bold fs-5" id="deleteUserModalLabel">Elimina utente</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Sei sicuro di voler eliminare questo utente?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <a href="../admin/index.php?delete-user&id=<?php echo $u->get_id(); ?>" role="button" class="btn btn-danger">Conferma eliminazione</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>   
            </div>
    </div>
</main>

<script src="../js/validate.js"></script>
<script>
    function toggle_user_form() {
        var form = document.getElementById("add-user-form");
        if(form.style.display == 'block')
            form.style.display = 'none';
        else
            form.style.display = 'block';
    }
</script>
