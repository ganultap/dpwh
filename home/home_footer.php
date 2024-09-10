<script>
    // Function to update session time
    function updateSessionTime() {
        // Make an AJAX call to a PHP script to get the remaining session time
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var remainingTime = this.responseText.split(':');
                var minutes = parseInt(remainingTime[0]);
                var seconds = parseInt(remainingTime[1]);
                document.getElementById("session-time").innerHTML = minutes + " minutes " + seconds + " seconds";
            }
        };
        xhttp.open("GET", "get_session_time.php", true);
        xhttp.send();
    }

    // Update session time every second
    setInterval(updateSessionTime, 1000);
</script>
<footer class="bg-blue-800 text-light mt-4 text-center">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>

    </div>
</footer>
</body>

</html>
