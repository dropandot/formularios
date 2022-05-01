
<select name="cursos" id="cursos">
    <option value="0">--Seleccione un curso</option>
<?php foreach($data['cursos'] as $curso) : ?>
    <option value="<?= $curso->id ?>"> <?= $curso->nombre_curso ?></option>

 
<?php endforeach ?>


</select>
