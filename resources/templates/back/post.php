<main>
    <?php display_message(); ?>
    <button type="button" class="btn btn-lg action-button"><i class="fas fa-plus"></i>Aggiungi nuovo post</button>
    <form action="" method="post" class="needs-validation mt-4" novalidate>
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
</main>

<script src="https://cdn.tiny.cloud/1/vucbpm5krf4dg1gnij1tc4opj2wlgcqa8f8l0grw3xr4zkga/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#testo',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor paste",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo paste | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        entities: "160,nbsp",
        entity_encoding: "named",
        entity_encoding: "raw"
      });
</script>
<script src="../js/validate.js"></script>
