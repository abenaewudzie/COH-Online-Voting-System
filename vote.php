<?php include ('head.php');?>
<?php include("sess.php")?>
<body>
    <div id="wrapper">
        <?php include ('side_bar.php');?>
    </div>
    
    <form method="POST" action="vote_result.php">
        <div id="candidateSelection">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"><center>PRESIDENT</center></div>
                    <div class="panel-body">
                        <?php
                            $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'President'") or die(mysql_errno());
                            while($fetch = $query->fetch_array()) {
                        ?>
                        <div id="position">
                            <img src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                            <center>
                                <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                            </center>
                            <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="pres_id" class="president"></center>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"><center>VICE PRESIDENT</center></div>
                    <div class="panel-body">
                        <?php
                            $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Vice President'") or die(mysql_errno());
                            while($fetch = $query->fetch_array()) {
                        ?>
                        <div id="position">
                            <img class="imaged-rounded" src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                            <center>
                                <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                            </center>
                            <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="vp_id" class="vp"></center>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Next Button -->
            <div class="col-lg-12 text-right" style="margin-top: 20px;">
                <button type="button" class="btn btn-info" id="nextButton">Next</button>
            </div>
        </div>

        <!-- Additional Candidate Information Section -->
        <div id="additionalCandidateInfo" style="display: none;">
            <div class="col-lg-12">
                <h3>Additional Candidate Information</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><center>GENERAL SECRETARY</center></div>
                            <div class="panel-body">
                                <?php
                                    $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'General Secretary'") or die(mysql_errno());
                                    while($fetch = $query->fetch_array()) {
                                ?>
                                <div id="position">
                                    <img src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                                    </center>
                                    <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="gsecretary_id" class="gsecretary"></center>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><center>FINANCIAL SECRETARY</center></div>
                            <div class="panel-body">
                                <?php
                                    $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Financial Secretary'") or die(mysql_errno());
                                    while($fetch = $query->fetch_array()) {
                                ?>
                                <div id="position">
                                    <img src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                                    </center>
                                    <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="fsecretary_id" class="fsecretary"></center>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Button for Additional Candidates -->
            <div class="col-lg-12 text-right" style="margin-top: 20px;">
                <button type="button" class="btn btn-info" id="nextAdditionalButton">Next</button>
            </div>

            <!-- Back Button -->
            <div class="col-lg-12 text-left" style="margin-top: 20px;">
                <button type="button" class="btn btn-secondary" id="backToCandidateInfoButton">Back</button>
            </div>
        </div>

        <!-- New Page for PRO, Organizing Secretary, and Treasurer -->
        <div id="additionalCandidates" style="display: none;">
            <div class="col-lg-12">
                <h3>Other Candidates</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><center>PRO</center></div>
                            <div class="panel-body">
                                <?php
                                    $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'PRO'") or die(mysql_errno());
                                    while($fetch = $query->fetch_array()) {
                                ?>
                                <div id="position">
                                    <img src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                                    </center>
                                    <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="pro_id" class="pro"></center>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><center>TREASURER</center></div>
                            <div class="panel-body">
                                <?php
                                    $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Treasurer'") or die(mysql_errno());
                                    while($fetch = $query->fetch_array()) {
                                ?>
                                <div id="position">
                                    <img src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                                    </center>
                                    <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="treasurer_id" class="treasurer"></center>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><center>ORGANIZING SECRETARY</center></div>
                            <div class="panel-body">
                                <?php
                                    $query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Organizing Secretary'") or die(mysql_errno());
                                    while($fetch = $query->fetch_array()) {
                                ?>
                                <div id="position">
                                    <img src="admin/<?php echo $fetch['img']?>" style="border-radius:6px;" height="150px" width="150px" class="img">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-xs" style="border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                                    </center>
                                    <center><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="organizer_id" class="organizer"></center>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-lg-12 text-right" style="margin-top: 20px;">
                    <button class="btn btn-success ballot" type="submit" name="submit">Submit Ballot</button>
                </div>

                <!-- Back Button for Additional Candidates -->
                <div class="col-lg-12 text-left" style="margin-top: 10px;">
                    <button type="button" class="btn btn-secondary" id="backToAdditionalInfoButton">Back</button>
                </div>
            </div>
        </div>
    </form>
</body>

<?php include ('script.php')?>

<script type="text/javascript">
    $(document).ready(function() {
        $(".president").on("change", function() {
            if ($(".president:checked").length == 1) {
                $(".president").attr("disabled", "disabled");
                $(".president:checked").removeAttr("disabled");
            } else {
                $(".president").removeAttr("disabled");
            }
        });

        $(".vp").on("change", function() {
            if ($(".vp:checked").length == 1) {
                $(".vp").attr("disabled", "disabled");
                $(".vp:checked").removeAttr("disabled");
            } else {
                $(".vp").removeAttr("disabled");
            }
        });

        // Handle Next Button
        $("#nextButton").on("click", function() {
            $("#candidateSelection").hide(); // Hide candidate selection
            $("#additionalCandidateInfo").show(); // Show additional candidate information
        });

        // Handle Next Button for Additional Candidates
        $("#nextAdditionalButton").on("click", function() {
            $("#additionalCandidateInfo").hide(); // Hide additional candidate information
            $("#additionalCandidates").show(); // Show other candidates
        });

        // Handle Back Button for Additional Candidate Info
        $("#backToCandidateInfoButton").on("click", function() {
            $("#additionalCandidateInfo").hide(); // Hide additional candidate information
            $("#candidateSelection").show(); // Show candidate selection
        });

        // Handle Back Button for Additional Candidates
        $("#backToAdditionalInfoButton").on("click", function() {
            $("#additionalCandidates").hide(); // Hide additional candidates
            $("#additionalCandidateInfo").show(); // Show additional candidate information
        });
    });
</script>
</html>