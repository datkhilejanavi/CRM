
<?php include_once('navbar.php');?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php include_once('header.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Recharge Details</h1>
                </div>
                <style>
                    .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                     }
                </style>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            
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
            </div>
        </div>
    <?php include_once('footer.php'); ?>
</div>
