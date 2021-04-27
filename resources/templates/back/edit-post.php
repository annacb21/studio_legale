<?php
if(isset($_GET['id'])) {
    $post_query = query("SELECT * FROM post WHERE id = {$_GET['id']}");
    confirm($post_query);
    $row = fetch_array($post_query);
    $d = $row['post_data'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($d));
    $post = new Post($row['id'], $row['titolo'], $pdate, $row['cat_id'], $row['testo']);

    switch($post->get_cat()) {
        case 1:
            $activecat = "News";
            $cat1 = "Eventi";
            $num1 = '2';
            $cat2 = "Pubblicazioni";
            $num2 = '3';
            break;
        case 2:
            $activecat = "Eventi";
            $cat1 = "Pubblicazioni";
            $num1 = '3';
            $cat2 = "News";
            $num2 = '1';
            break;
        case 3:
            $activecat = "Pubblicazioni";
            $cat1 = "Eventi";
            $num1 = '2';
            $cat2 = "News";
            $num2 = '1';
            break;
    }
}
?>

<main class="edit-post-main">
    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php?post">Gestione Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifica post '<?php echo $post->get_title(); ?>'</li>
        </ol>
    </nav>
    <div>
        <?php display_message(); ?>
        <form action="" method="post" class="needs-validation" novalidate>
            <?php editPost($_GET['id']); ?>
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="titolo" id="titolo" required value="<?php echo $post->get_title(); ?>">
                <div class="invalid-feedback">Inserire un titolo per il post</div>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" required>
                    <option selected value="<?php echo $post->get_cat(); ?>"><?php echo $activecat; ?></option>
                    <option value="<?php echo $num1; ?>"><?php echo $cat1; ?></option>
                    <option value="<?php echo $num2; ?>"><?php echo $cat2; ?></option>
                </select>
                <div class="invalid-feedback">Selezionare una categoria per il post</div>
            </div>
            <div class="mb-3">
                <label for="testo" class="form-label">Testo</label>
                <textarea class="form-control" name="testo" id="testo" rows="5" required><?php echo $post->get_text(); ?></textarea>
                <div class="invalid-feedback">Inserire un testo per il post</div>
            </div>
            <button type="submit" name="editPost" class="btn btn-primary">Salva modifiche</button>
            <a class="btn btn-dark" href="../admin/index.php?post" role="button">Annulla</a>
        </form>
    </div>
</main>

<script src="https://cdn.tiny.cloud/1/vucbpm5krf4dg1gnij1tc4opj2wlgcqa8f8l0grw3xr4zkga/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../js/textEditor.js"></script>
<script src="../js/validate.js"></script>