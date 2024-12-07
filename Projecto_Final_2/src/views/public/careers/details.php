<?php 



include_once  __DIR__ .'/../../layouts/header.php';

$career = getDatosTarea();

?>

<?php if($tarea != null): ?>

<h2><?=$tarea['carrera']?> (<?=$tarea['semestre']?> - <?=$tarea['nombre']?> - <?=$tarea['fecha']?>)</h2>

<?php else: ?>

    <h2>No se encontró la tarea seleccionada.</h2>

    <a href="<?=BASE_URL?>">Volver al inicio</a>

<?php endif; ?>



<?php

include_once  __DIR__ .'/../../layouts/footer.php';

?>