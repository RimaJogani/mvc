<?php $configGroups = $this->getConfigGroups()->getData(); ?>
<?php //print_r($configGroups); ?>
<table class="table">
	<tr>
		<td>GroupId</td>
		<td>Name</td>
		<td>createdDate</td>
	</tr>

	<?php if(!$configGroups): ?>
		<tr>
			<td colspan="3"><center>No records found</center></td>
		</tr>
	<?php else: ?>
		<?php foreach($configGroups as $key => $value): ?>
			<tr>
				<td><?php echo $value->groupId; ?></td>
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->createdDate; ?></
<td></td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
</table>