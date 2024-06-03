<?php require_once("include/connection.php"); ?>
<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>update</th>
                            <th>delete</th>
                            <th>Bill Number</th>
                            <th>Customer Name</th>
                            <th>Select Plan</th>
                            <th>Transaction Type</th>
                            <th>Recharge Amount</th>
                            <th>Advance Recharge Amount</th>
                            <th>Remaining Recharge Amount</th>
                            <th>Expiry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sql="SELECT c.*,p.fname as fnamecus, pl.pname,p.perid,pl.id FROM recharge c 
                                join personalinfo p on p.perid=c.fname
                                join tblplantype pl on pl.id=c.plan";
                    
                        $sqlrun=mysqli_query($con,$sql);
                        while($rows=mysqli_fetch_assoc($sqlrun)){
                            ?>
                                <tr>
                                    <td class='text-center'>
                                        <button type="button" class="btn btn-primary btn-sm pull-left" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        onclick="CRUDOP('update','<?php echo $rows['bill'];?>','<?php echo $rows['perid']; ?>',
                                        '<?php echo $rows['id']; ?>','<?php echo $rows['transactiontype']; ?>','<?php echo $rows['rechargeamount']; ?>','<?php echo $rows['adamount']; ?>','<?php echo $rows['remamount']; ?>',
                                        '<?php echo $rows['planenddate'];?>');"><i class="fa fa-plus"></i> Update </button>
                                    </td>
                                    <td class='text-center'> 
                                        <button type="button" class="btn btn-danger btn-sm pull-left" onclick="CRUDOPAjax('delete','<?php echo $rows['bill'];?>');"><i class="fa fa-plus"></i> Delete </button>
                                    </td>
                                    <td><?php echo $rows['bill']; ?></td>
                                    <td><?php echo $rows['fnamecus']; ?></td>
                                    <td><?php echo $rows['pname']; ?></td>
                                    <td><?php echo $rows['transactiontype']; ?></td>
                                    <td><?php echo $rows['rechargeamount']; ?></td>
                                    <td><?php echo $rows['adamount']; ?></td>
                                    <td><?php echo $rows['remamount']; ?></td>
                                    <td><?php echo $rows['planenddate']; ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>