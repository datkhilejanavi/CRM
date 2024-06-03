<?php 
	require_once("include/connection.php");
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Update</th>
			<th>Delete</th>
			<th>SrNo</th>
			<th>Plan Name</th>
			<th>Speed-Limits</th>
			<th>Plan Price</th>
			<th>Plan Duration</th>
			<th>photo</th>
		</tr>
	</thead>
	<tbody>
	<?php $sql="SELECT * FROM `tblplantype`";
		$sqlrun=mysqli_query($con,$sql);
		while($rows=mysqli_fetch_assoc($sqlrun)){
			?>
				<tr>
					<td class='text-center'>
						<button type="button" class="btn btn-primary pull-left" 
						data-bs-toggle="modal" data-bs-target="#exampleModal" 
						onclick="CRUDOP('update','<?php echo $rows['id'];?>','<?php echo $rows['pname']; ?>','<?php echo $rows['splimit']; ?>','<?php echo $rows['planprice']; ?>','<?php echo $rows['duration']; ?>','<?php echo $rows['photo']; ?>');"><i class="fa fa-plus"></i> Update </button>
					</td>
					<td class='text-center'> 
						<button type="button" class="btn btn-danger pull-left" onclick="CRUDOPAjax('delete','<?php echo $rows['id'];?>');"><i class="fa fa-plus"></i> Delete </button>
					</td>
					<td><?php echo $rows['id']; ?></td>
					<td><?php echo $rows['pname']; ?></td>
					<td><?php echo $rows['splimit']; ?></td>
					<td><?php echo $rows['planprice']; ?></td>
					<td><?php echo $rows['duration']; ?></td>
					<td class="text-center"><img src="<?php echo $rows['photo']; ?>" class="img img-responsive" width="50px" height="50px"></td>
				</tr>
			<?php
		}
	?>
	</tbody>
</table>