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
            <?= $this->Html->link(__('Edit Result'), ['action' => 'edit', $result->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Result'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Result'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Result'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="result view content">
            <h3><?= h($result->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($result->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Timing') ?></th>
                    <td><?= $this->Number->format($result->timing) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kill') ?></th>
                    <td><?= $this->Number->format($result->kill) ?></td>
                </tr>
                <tr>
                    <th><?= __('Death') ?></th>
                    <td><?= $this->Number->format($result->death) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grade') ?></th>
                    <td><?= $result->grade === null ? '' : $this->Number->format($result->grade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($result->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($result->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($result->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($result->comment)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
