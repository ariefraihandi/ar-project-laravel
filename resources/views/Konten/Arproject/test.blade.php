<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <button onclick="getFollowerCount('IGQWRNTkJzelJ6OGdYQ3NfakN4SnZALMXVwdFNEWVdzenNQSzBJZAHNqWHQ0eHlXd1FUbzF5aUxoa0RiWFB2U1ZAuWVZACamZApRWRQUGZADRlZAFUGtDcFJGYjktTDJ4U1ppb0ZAkN1NNRGk5OENZAZAUoyMEVQV2hCODZAMeGcZD', '6732367156829081')">Get Follower Count</button>
    <p>Follower Count: <span id="followerCount"></span></p>

    <script>
        function getFollowerCount(accessToken, userId) {
            $.ajax({
                url: `https://graph.instagram.com/v13.0/${userId}?fields=followers_count&access_token=${accessToken}`,
                method: 'GET',
                success: function (response) {
                    $("#followerCount").text(response.followers_count);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#followerCount").text('Error fetching follower count: ' + errorThrown);
                }
            });
        }
    </script>
</body>
</html>
