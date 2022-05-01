<section class="form">
    <?php foreach($data['cursos'] as $curso) : ?>
        <option value="<?= $curso->id ?>"> <?= $curso->nombre_curso ?></option>
    <?php endforeach ?>
</section>