<html>

<head>

    <script src='http://static.opentok.com/webrtc/v2.2/js/opentok.min.js'></script>

    {{HTML::style(asset("/public/css/bootstrap.css"))}}

    <style type="text/css">
        .chatcontainer{
            width: 850px;
            margin: auto;
        }

        .chatwin{
            width: 400px;
            float: left;
        }

        .clear{
            clear: both;
        }
    </style>


</head>
<body>

<?php if($start){ ?>

<script type="text/javascript">
    // Initialize API key, session, and token...
    // Think of a session as a room, and a token as the key to get in to the room
    // Sessions and tokens are generated on your server and passed down to the client
    var apiKey = "44987292";
    var sessionId = "{{$session_id}}";
    var token = "{{$token_id}}";

    // Initialize session, set up event listeners, and connect
    var session = OT.initSession(apiKey, sessionId);

    session.on("streamCreated", function(event) {
        session.subscribe(event.stream, "mySubscriberDiv", {width:400, height:300});
    });

    session.connect(token, function(error) {
        var publisher = OT.initPublisher("myPublisherDiv", {width:400, height:300});
        session.publish(publisher);
    });
</script>

<div class="chatcontainer">

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-12">

            <h1>Video Chat Started</h1>

            <div clas="chatwin">
                <div id="myPublisherDiv"></div>
            </div>


            <div clas="chatwin">
                <div id="mySubscriberDiv"></div>
            </div>

            <div class="clear"></div>
            <?php } else { ?>

                No meeting for now...

            <?php } ?>

        </div>

    </div>

</div>

</div>
</body>
</html>