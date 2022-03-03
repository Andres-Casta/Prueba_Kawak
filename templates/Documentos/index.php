<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documento[]|\Cake\Collection\CollectionInterface $documentos
 */
?>
<div class="documentos index content">
    <?= $this->Html->link(__('New Documento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'], ['class' => 'button float-right']) ?>
    <h3><?= __('Documentos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('NOMBRE') ?></th>
                    <th><?= $this->Paginator->sort('CODIGO') ?></th>
                    <th><?= $this->Paginator->sort('CONTENIDO') ?></th>
                    <th><?= $this->Paginator->sort('TIPO') ?></th>
                    <th><?= $this->Paginator->sort('PROCESO') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documentos as $documento): ?>
                <tr>
                    <td><?= $this->Number->format($documento->DOC_ID) ?></td>
                    <td><?= h($documento->DOC_NOMBRE) ?></td>
                    <td><?= h($documento->DOC_CODIGO) ?></td>
                    <td><?= h($documento->DOC_CONTENIDO) ?></td>
                    <td><?= h($tipodocs[$documento->DOC_ID_TIPO]) ?></td>
                    <td><?= h($procesos[$documento->DOC_ID_PROCESO]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $documento->DOC_ID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documento->DOC_ID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documento->DOC_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->DOC_ID)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
