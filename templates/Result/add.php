<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result $result
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Result'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="result form content">
            <?= $this->Form->create($result) ?>
            <fieldset>
                <legend><?= __('Add Result') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('name');
                    echo $this->Form->control('timing');
                    echo $this->Form->control('kill');
                    echo $this->Form->control('death');
                    echo $this->Form->control('comment');
                    echo $this->Form->control('grade');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
