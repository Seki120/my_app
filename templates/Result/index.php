<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Result> $result
 */
?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<div class="result index content">
    <?= $this->Html->link(__('New Score'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Score Board') ?></h3>
    <div class="table-responsive" style="height:200px;">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('timing') ?></th>
                    <th><?= $this->Paginator->sort('kill') ?></th>
                    <th><?= $this->Paginator->sort('death') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('grade') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <?php $aKill = array(); $aDate = array();?>
            <?php $kKill = array();?>
            <?php $sKill = array();?>
            <tbody>
                <?php foreach ($result as $result): ?>
                    <?php if($result->name === 'Ap12ple05'){
                        $aKill[]=($this->Number->format($result->kill));
                        $aDate[]=($result->date);
                     } else if($result->name === 'kuroyu'){
                        $kKill[]= ($this->Number->format($result->kill));
                     } else {
                        $sKill[] = ($this->Number->format($result->kill));
                     } ?>
                    <tr>
                        <td><?= $this->Number->format($result->id) ?></td>
                        <td><?= h($result->date) ?></td>
                        <td><?= $this->Number->format($result->timing) ?></td>
                        <td><?= $this->Number->format($result->kill) ?></td>
                        <td><?= $this->Number->format($result->death) ?></td>
                        <td><?= h($result->created) ?></td>
                        <td><?= $result->grade === null ? '' : $this->Number->format($result->grade) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $result->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $result->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
        <canvas id="myChart"></canvas>
    </div>
    <!-- <?php print_r($aKill); ?>
    <?php print_r($kKill) ?>
    <?php print_r($sKill) ?> -->
    <?php $aKill_array = json_encode($aKill); $aDate_array = json_encode($aDate);?>
    <?php $kKill_array = json_encode($kKill);?>
    <?php $sKill_array = json_encode($sKill);?>
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

<script>
  const ctx = document.getElementById('myChart');
  let aKill = JSON.parse('<?php echo $aKill_array; ?>');
  let kKill = JSON.parse('<?php echo $kKill_array; ?>');
  let sKill = JSON.parse('<?php echo $sKill_array; ?>');
  let aDate = JSON.parse('<?php echo $aDate_array; ?>');
  console.log(aKill);
  console.log(aDate);
  console.log(kKill);
  console.log(sKill);

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: aDate,
      datasets: [{
        label: 'Ap12ple05 kill score',
        data: aKill,
        borderWidth: 3
      },{
        label: 'kuroyu kill score',
        data: kKill,
        borderWidth: 3
      },
      {
        label: 'sinamon kill score',
        data: sKill,
        borderWidth: 3
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>