<?php require_once("include/connection.php"); ?>
<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>update</th>
                            <th>delete</th>
                            <th>Bill Number</th>
                            <th>Customer Name</th>
                            <th>Account Type</th>
                            <th>Select Plan</th>
                            <th>Start Date</th>
                            <th>Expiry Date</th>
                            <th>Employee Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sql="SELECT c.*,p.fname as fnamecus,w.fname as fnameemp,pl.pname,p.perid as personid,w.perid as workerid,pl.id as planid FROM newconnection c 
                                join personalinfo p on p.perid=c.fname
                                join personalinfo w on w.perid=c.fnameworker
                                join tblplantype pl on pl.id=c.plan";
                    
                        $sqlrun=mysqli_query($con,$sql);
                        while($rows=mysqli_fetch_assoc($sqlrun)){
                            ?>
                                <tr>
                                    <td class='text-center'>
                                        <button type="button" class="btn btn-primary btn-sm pull-left" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        onclick="CRUDOP('update','<?php echo $rows['bill'];?>','<?php echo $rows['personid']; ?>','<?php echo $rows['transactiontype']; ?>','<?php echo $rows['planid']; ?>','<?php echo $rows['planstartdate']; ?>','<?php echo $rows['planenddate']; ?>','<?php echo $rows['workerid']; ?>');"><i class="fa fa-plus"></i> Update </button>
                                    </td>
                                    <td class='text-center'> 
                                        <button type="button" class="btn btn-danger btn-sm pull-left" onclick="CRUDOPAjax('delete','<?php echo $rows['bill'];?>');"><i class="fa fa-plus"></i> Delete </button>
                                    </td>
                                    <td><?php echo $rows['bill']; ?></td>
                                    <td><?php echo $rows['fnamecus']; ?></td>
                                    <td><?php echo $rows['transactiontype']; ?></td>
                                    <td><?php echo $rows['pname']; ?></td>
                                    <td><?php echo $rows['planstartdate']; ?></td>
                                    <td><?php echo $rows['planenddate']; ?></td>
                                    <td><?php echo $rows['fnameemp']; ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>