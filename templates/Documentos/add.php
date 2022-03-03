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
            <?= $this->Html->link(__('List Documentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentos form content">
            <?= $this->Form->create($documento) ?>
            <fieldset>
                <legend><?= __('Agregar Documento') ?></legend>
                <?php
                    echo $this->Form->control('DOC_NOMBRE',['label'=>'Nombre']);
                    echo $this->Form->control('DOC_CONTENIDO',['label'=>'Contenido']);                    
                    echo $this->Form->control('DOC_ID_TIPO',['label'=>'Tipo','options'=>$tipodocs]);
                    echo $this->Form->control('DOC_ID_PROCESO',['label'=>'Proceso','options'=>$procesos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
