<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRegistration $userRegistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Registration'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userRegistration form large-9 medium-8 columns content">
    <?= $this->Form->create($userRegistration) ?>
    <fieldset>
        <legend><?= __('Add User Registration') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
