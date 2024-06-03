<?php require_once("include/connection.php"); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>action</th>
            <th>action</th>
            <th>SN</th>
            <th>Complaint Date</th>
            <th>Customer Name</th>
            <th>Complaint Subject</th>
            <th>Complaints Details</th>
            <th>Worker Name</th>
            <th>Worker Description</th>
            <th>Complaint Status</th>
            <th>Complaint Priority</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $sql="SELECT c.*,p.fname as personname FROM cuscomplaint c
        Join personalinfo p ON p.perid=c.fname";
        $sqlrun=mysqli_query($con,$sql);
        while($rows=mysqli_fetch_assoc($sqlrun)){
            $fdsdgsf=$rows['fnamew'];
            $sqdsl="SELECT fname,perid FROM personalinfo where perid='$fdsdgsf'";
            $swewqlrun=mysqli_query($con,$sqdsl);
            $rtyows=mysqli_fetch_assoc($swewqlrun);
            $safasf=$rtyows['fname'];
            $workerid=$rtyows['perid'];
             ?>
                <tr>
					<td class='text-center'>
						<button type="button" class="btn btn-primary btn-sm pull-left" data-bs-toggle="modal" data-bs-target="#exampleModal"
                         onclick="CRUDOP('update','<?php echo $rows['complaintid'];?>','<?php echo date('Y-m-d',strtotime($rows['complaintdate'])); ?>',
                         '<?php echo $rows['personname']; ?>','<?php echo $rows['complaintsub']; ?>','<?php echo $rows['complaint']; ?>','<?php echo $workerid; ?>'
                         ,'<?php echo $rows['workerdis']; ?>','<?php echo $rows['compstatus']; ?>','<?php echo $rows['coppriority']; ?>');"><i class="fa fa-plus"></i> Update </button>
					</td>
					<td class='text-center'> 
						<button type="button" class="btn btn-danger btn-sm pull-left" onclick="CRUDOPAjax('delete','<?php echo $rows['complaintid'];?>');"><i class="fa fa-plus"></i> Delete </button>
					</td>
                    <td><?php echo ++$ii; ?></td>
                    <td><?php echo date('d-m-Y h:i:s A',strtotime($rows['complaintdate'])); ?></td>
                    <td><?php echo $rows['personname']; ?></td>
                    <td><?php echo $rows['complaintsub']; ?></td>
                    <td><?php echo $rows['complaint']; ?></td>
                    <td><?php echo $safasf; ?></td>
                    <td><?php echo $rows['workerdis']; ?></td>
                    <td><?php echo $rows['compstatus']; ?></td>
                    <td><?php echo $rows['coppriority']; ?></td>
                </tr>
            <?php
        }
    ?>
    </tbody>
</table>