<div class="dashboards form">
<?php echo $this->Form->create('Dashboard');?>	
    <?php
        echo $this->Form->input('name');
        echo $this->Form->hidden('id');
    ?>
<?php echo $this->Form->end(__('Submit'));?>
</div>
