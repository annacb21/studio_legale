<?php
// get all posts
$post_query = query("SELECT * FROM post");
confirm($post_query);
$all_post = array();
$i = 0;
while($row = fetch_array($post_query)) {
    $pd = $row['post_data'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($pd));
    $all_post[$i] = new Post($row['id'], $row['titolo'], $pdate, $row['cat_id'], $row['testo']);
    $i++;
}
?>

<main class="post-main">
    <div>
        <?php display_message(); ?>
        <button type="button" class="btn btn-lg action-button" onclick="toggle_post_form();"><i class="fas fa-plus"></i>Aggiungi nuovo post</button>
        <form action="" method="post" class="needs-validation mt-4" id="add-post-form" novalidate>
            <?php addPost(); ?>
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" placeholder="Titolo post" name="titolo" id="titolo" required>
                <div class="invalid-feedback">Inserire un titolo per il post</div>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" required>
                    <option selected>Seleziona la categoria del post</option>
                    <option value="1">News</option>
                    <option value="2">Eventi</option>
                    <option value="3">Pubblicazioni</option>
                </select>
                <div class="invalid-feedback">Selezionare una categoria per il post</div>
            </div>
            <div class="mb-3">
                <label for="testo" class="form-label">Testo</label>
                <textarea class="form-control" name="testo" id="testo" rows="5" required></textarea>
                <div class="invalid-feedback">Inserire un testo per il post</div>
            </div>
            <button type="submit" name="addPost" class="btn btn-primary">Pubblica</button>
        </form>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="mb-0">Post pubblicati</h3>
        </div>
        <div class="card-body">
            <table id="post-table-mobile">
                <thead>
                    <tr>
                        <td>Titolo post</td>
                        <td>Categoria post</td>
                        <td>Data post</td>
                        <td>Azioni</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($all_post as $p): ?>
                    <tr>
                        <td><?php echo $p->get_title_ant(); ?></td>
                        <td><?php echo $p->get_cat_name(); ?></td>
                        <td><?php echo $p->get_data(); ?></td>
                        <td class="d-flex justify-content-between"><a class="btn btn-primary" href="../admin/index.php?edit-post&id=<?php echo $p->get_id(); ?>" role="button">Modifica</a><a class="btn btn-danger" href="#" role="button">Elimina</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row" id="post-card-mobile">
                <?php foreach($all_post as $p): ?>
                    <div class="card shadow rounded mb-2">
                        <div class="card-body">
                            <p class="card-title fw-bolder"><?php echo $p->get_title(); ?></p>
                            <p class="card-subtitle mb-2 text-muted"><?php echo $p->get_data(); ?></p>
                            <p class="card-text"><?php echo $p->get_cat_name(); ?></p>
                            <a class="btn btn-primary" href="../admin/index.php?edit-post&id=<?php echo $p->get_id(); ?>" role="button">Modifica</a>
                            <a class="btn btn-danger" href="#" role="button">Elimina</a>
                        </div>
                    </div>
                <?php endforeach; ?>   
            </div>
    </div>
</main>

<script src="https://cdn.tiny.cloud/1/vucbpm5krf4dg1gnij1tc4opj2wlgcqa8f8l0grw3xr4zkga/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../js/textEditor.js"></script>
<script src="../js/validate.js"></script>
<script>
    function toggle_post_form() {
        var form = document.getElementById("add-post-form");
        if(form.style.display == 'block')
            form.style.display = 'none';
        else
            form.style.display = 'block';
    }
</script>
