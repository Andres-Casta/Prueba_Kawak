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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $documento->DOC_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $documento->DOC_ID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Documentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentos form content">
            <?= $this->Form->create($documento) ?>
            <fieldset>
                <legend><?= __('Edit Documento') ?></legend>
                <?php
                    //Se muestran los datos y se cargan los valores a 
                    echo $this->Form->control('DOC_NOMBRE',['label'=>'Nombre']);
                    echo $this->Form->control('DOC_CONTENIDO',['label'=>'Contenido']);                    
                    echo $this->Form->control('DOC_ID_TIPO',['label'=>'Tipo','options'=>$tipodocs]);
                    echo $this->Form->control('DOC_ID_PROCESO',['label'=>'Proceso','options'=>$procesos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
