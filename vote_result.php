<?php include ('head.php');?>
<?php include ('sess.php');?>

<body>

    <div id="row">
        <?php 
            include ('side_bar.php');
            if(ISSET($_POST['submit'])) {
                if(!ISSET($_POST['pres_id'])) {
                    $_SESSION['pres_id'] = "";
                } else {
                    $_SESSION['pres_id'] = $_POST['pres_id'];
                }
                if(!ISSET($_POST['vp_id'])) {
                    $_SESSION['vp_id'] = "";
                } else {
                    $_SESSION['vp_id'] = $_POST['vp_id'];
                }
                if(!ISSET($_POST['gsecretary_id'])) {
                    $_SESSION['gsecretary_id'] = "";
                } else {
                    $_SESSION['gsecretary_id'] = $_POST['gsecretary_id'];
                }
                if(!ISSET($_POST['fsecretary_id'])) {
                    $_SESSION['fsecretary_id'] = "";
                } else {
                    $_SESSION['fsecretary_id'] = $_POST['fsecretary_id'];
                }
                if(!ISSET($_POST['treasurer_id'])) {
                    $_SESSION['treasurer_id'] = "";
                } else {
                    $_SESSION['treasurer_id'] = $_POST['treasurer_id'];
                }
                if(!ISSET($_POST['pro_id'])) {
                    $_SESSION['pro_id'] = "";
                } else {
                    $_SESSION['pro_id'] = $_POST['pro_id'];
                }
                if(!ISSET($_POST['woccom_id'])) {
                    $_SESSION['woccom_id'] = "";
                } else {
                    $_SESSION['woccom_id'] = $_POST['woccom_id'];
                }
                if(!ISSET($_POST['osecretary_id'])) {
                    $_SESSION['osecretary_id'] = "";
                } else {
                    $_SESSION['osecretary_id'] = $_POST['osecretary_id'];
                }
            }
        ?>
    </div>
    <center>
        <div class="col-lg-8" style="margin-left:240px;">
            <div class="alert alert-info">
                <label>PRESIDENT</label>
                <br />
                <?php
                    if(!$_SESSION['pres_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[pres_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-success">
                <label>VICE PRESIDENT</label>
                <br />
                <?php
                    if(!$_SESSION['vp_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[vp_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-success">
                <label>GENERAL SECRETARY</label>
                <br />
                <?php
                    if(!$_SESSION['gsecretary_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[gsecretary_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-info">
                <label>FINANCIAL SECRETARY</label>
                <br />
                <?php
                    if(!$_SESSION['fsecretary_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[fsecretary_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-success">
                <label>TREASURER</label>
                <br />
                <?php
                    if(!$_SESSION['treasurer_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[treasurer_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-info">
                <label>PRO</label>
                <br />
                <?php
                    if(!$_SESSION['pro_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[pro_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-success">
                <label>WOMEN'S COMMISSIONER</label>
                <br />
                <?php
                    if(!$_SESSION['woccom_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[woccom_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <div class="alert alert-info">
                <label>ORGANIZING SECRETARY</label>
                <br />
                <?php
                    if(!$_SESSION['osecretary_id']) {
                        // No action
                    } else {
                        $fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[osecretary_id]'")->fetch_array();
                        echo "<img src='admin/".$fetch['img']."' style='height:80px; width:80px; border-radius:500px;' /> " . $fetch['firstname']." ".$fetch['lastname']; 
                    }
                ?>
            </div>
            <br />
            <button type="button" data-toggle="modal" data-target="#result" class="btn btn-success">Submit Final Vote</button>
        </div>
    </center>
    
    <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">         
                    </h4>
                </div>
                <div class="modal-body">
                    <p class="alert alert-danger">Are you sure you want to submit your Votes? </p>
                </div>
                <div class="modal-footer">
                    <a href="submit_vote.php">
                        <button type="button" class="btn btn-success"><i class="icon-check"></i>&nbsp;Yes</button>
                    </a>
                    <a href="vote.php">
                        <button class="btn btn-danger" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Back</button>
                    </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</body>
<?php include ('script.php')?>
</html>