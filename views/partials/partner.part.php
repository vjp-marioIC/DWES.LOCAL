<?php
// SI EXISTE EL ARRAY DE ASOCIADOS, CUENTO LOS ELEMENETOS DEL ARRAY
// SI ES <= 3 LOS MUESTRO
if (isset($asociados)) {
    if (count($asociados) <= 3) {
        $mostrarAsociados = $asociados;
    } else {
        $mostrarAsociados = obtenerTresElementosAleatoriosArray($asociados);
    }
}
?>

<?php foreach ($mostrarAsociados as $asociado): ?>
    <ul class="list-inline">
        <li>
            <img src="../../images/index/<?= $asociado->getLogo(); ?>" alt="<?= $asociado->getDescripcion(); ?>" title="<?= $asociado->getDescripcion(); ?>">
        </li>
        <li>
            <?= $asociado->getNombre(); ?>
        </li>
    </ul>
<?php endforeach; ?>