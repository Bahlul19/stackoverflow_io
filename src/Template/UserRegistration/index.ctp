<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRegistration[]|\Cake\Collection\CollectionInterface $userRegistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Registration'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userRegistration index large-9 medium-8 columns content">
    <h3><?= __('User Registration') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userRegistration as $userRegistration): ?>
            <tr>
                <td><?= $this->Number->format($userRegistration->id) ?></td>
                <td><?= h($userRegistration->name) ?></td>
                <td><?= h($userRegistration->email) ?></td>
                <td><?= h($userRegistration->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userRegistration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userRegistration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userRegistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRegistration->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
