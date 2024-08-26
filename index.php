<?php include('head.php'); ?>
<body>
    <div class="container">
        <div class="row">
            <div style="position: absolute; top: 10px; right: 10px; font-size: 24px; color: red; font-weight: bold; font-family: 'Arial', sans-serif; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">
                <div id="countdownTimer"></div>
            </div>
            <div style="position: absolute; bottom: 40px; right: 10px; font-size: 28px; color: blue;">
                <div id="currentTime"></div>
            </div>
            <center><h3>Welcome to COH Voting System</h3></center>
            <center>
                <h4 id="currentDate"></h4>
            </center>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">Student Log in</h3></center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="username">ID no</label>
                                    <input class="form-control" placeholder="Please Log in your Username" name="idno" type="text" required="required" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="username">Password</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <button id="loginButton" class="btn btn-lg btn-success btn-block" name="login">Login</button>
                            </fieldset>
                            <?php include('login_query.php'); ?>
                        </form>
                        <div class="text-center mt-3">
                            <a href="chatbot.php" class="btn btn-secondary">Chat with Assistant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="votingStatus" class="text-center mt-3" style="font-size: 18px; color: red;"></div>
    </div>

    <?php include('script.php'); ?>

    <script type="text/javascript">
        // Function to format date
        function formatDate() {
            var today = new Date();
            var options = { 
                day: '2-digit', 
                month: '2-digit', 
                year: '2-digit' 
            };
            var dateString = today.toLocaleString('en-GB', options);
            document.getElementById("currentDate").innerHTML = dateString; // Date only
        }

        formatDate(); // Call the function to display date

        // Function to update the current time
        function updateCurrentTime() {
            var now = new Date();
            var options = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true  // Enable AM/PM format
            };
            var timeString = now.toLocaleTimeString('en-GB', options);
            document.getElementById("currentTime").innerHTML = timeString; // Time only
        }

        // Update the date and time every second
        setInterval(function() {
            formatDate();
            updateCurrentTime();
        }, 1000);

        // Set voting hours
        var votingStartTime = new Date();
        votingStartTime.setUTCHours(8, 0, 0); // 8:00 AM GMT

        var votingEndTime = new Date();
        votingEndTime.setUTCHours(16, 30, 0); // 4:30 PM GMT

        var loginButton = document.getElementById("loginButton");

        setInterval(function() {
            var now = new Date();
            now.setUTCHours(now.getUTCHours()); // Ensure now is in UTC
            var dayOfWeek = now.getUTCDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

            // Determine voting status
            if (dayOfWeek >= 1 && dayOfWeek <= 5) { // Monday to Friday
                if (now >= votingStartTime && now <= votingEndTime) {
                    loginButton.disabled = false; // Enable login button
                    document.getElementById("votingStatus").innerHTML = ""; // Clear status message
                } else {
                    loginButton.disabled = true; // Disable login button
                    document.getElementById("votingStatus").innerHTML = "Voting is closed at this time.";
                }
            } else {
                loginButton.disabled = true; // Disable login button on weekends
                document.getElementById("votingStatus").innerHTML = "Voting is closed at this time.";
            }

            // Countdown timer logic
            var countdownTime;
            if (now < votingStartTime) {
                countdownTime = votingStartTime - now; // Time until voting starts
            } else if (now > votingEndTime) {
                countdownTime = (new Date(votingStartTime.getTime() + (7 * 24 * 60 * 60 * 1000))) - now; // Time until next voting starts (next week)
            } else {
                // Voting is active, no countdown needed
                document.getElementById("countdownTimer").innerHTML = ""; 
                return; // Exit the function
            }

            // Calculate hours, minutes, and seconds for countdown
            var hours = Math.floor((countdownTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((countdownTime % (1000 * 60)) / 1000);

            document.getElementById("countdownTimer").innerHTML = "Next voting session starts in: " + hours + "h " + minutes + "m " + seconds + "s";

        }, 1000);

        // Handle login button click
        loginButton.addEventListener("click", function(event) {
            if (loginButton.disabled) {
                event.preventDefault(); // Prevent the form from submitting
                alert("Voting is not available at this time."); // Show alert
            }
        });
    </script>
</body>
</html>