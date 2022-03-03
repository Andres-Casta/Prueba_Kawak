<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documento $documento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Documento'), ['action' => 'edit', $documento->DOC_ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Documento'), ['action' => 'delete', $documento->DOC_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->DOC_ID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Documentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Documento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentos view content">
            <h3><?= h($documento->DOC_ID)." - ".h($documento->DOC_NOMBRE)      ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($documento->DOC_ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('NOMBRE') ?></th>
                    <td><?= h($documento->DOC_NOMBRE) ?></td>
                </tr>
                <tr>
                    <th><?= __('CONTENIDO') ?></th>
                    <td><?= h($documento->DOC_CONTENIDO) ?></td>
                </tr>               
                <tr>
                    <th><?= __('CODIGO') ?></th>
                    <td><?= h($documento->DOC_CODIGO) ?></td>
                </tr>
                <tr>
                    <th><?= __('TIPO') ?></th>
                    <td><?= h($tipodocs[$documento->DOC_ID_TIPO]) ?></td>
                </tr>
                <tr>
                    <th><?= __('PROCESO') ?></th>
                    <td><?= h($procesos[$documento->DOC_ID_PROCESO]) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
