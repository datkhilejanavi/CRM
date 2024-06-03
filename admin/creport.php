<?php include_once('navbar.php');?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php include_once('header.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Complaint Details</h1>
                </div>
                <style>
                    .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                     }
                </style>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           
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
                        $sql="SELECT c.*,p.fname,p.perid as personname FROM cuscomplaint c
                        Join personalinfo p ON p.perid=c.fname
                        ";
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
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</div>
