<?php require_once("include/connection.php"); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>update</th>
            <th>delete</th>
            <th>SrNo</th>
            <th>Account Type</th>
            <th>First Name</th>
            <th>Contact No</th>
            <th>Email Id</th>
            <th>Address</th>
            <th>Alter Contact Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $sql="SELECT * FROM `personalinfo`";
            $sqlrun=mysqli_query($con,$sql);
            while($rows=mysqli_fetch_assoc($sqlrun)){
        ?>
        <tr>
            <td class='text-center'>
                <button type="button" class="btn btn-primary btn-sm pull-left" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onclick="CRUDOP('update','<?php echo $rows['perid'];?>','<?php echo $rows['actype'];?>',
                '<?php echo $rows['fname']; ?>','<?php echo $rows['mb']; ?>','<?php echo $rows['email']; ?>'
                ,'<?php echo $rows['address']; ?>','<?php echo $rows['altmb']; ?>');"><i class="fa fa-plus"></i> Update </button>
            </td>
            <td class='text-center'> 
                <button type="button" class="btn btn-danger btn-sm pull-left" onclick="CRUDOPAjax('delete','<?php echo $rows['perid'];?>');"><i class="fa fa-plus"></i> Delete </button>
            </td>
            <td><button type="button" class="btn btn-info"><?php echo $rows['perid']; ?></button></td>
            <td><?php echo $rows['actype']; ?></td>
            <td><?php echo $rows['fname']; ?></td>
            <td><?php echo $rows['mb']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['address']; ?></td>
            <td><?php echo $rows['altmb']; ?></td>
        </tr>
        <?php
        }
        ?>
            
                
    </tbody>
</table>