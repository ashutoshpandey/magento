<!DOCTYPE html>
<html>
<head>
    {{HTML::style(asset("public/css/bootstrap.css"))}}
    {{HTML::style(asset("public/css/terms.css"))}}
    <title>About</title>

</head>
@include("sub.header")
<body>
<div class="container" style="min-height: 500px;">
    <div class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <h4>About Us</h4>
                    <p>
                        Zantama is being developed into a forum to bring together global
                        experts in holistic wellness. The consultation with the wellness
                        expert can happen through video, audio or text chat on the Zantama
                        portal. The appointment can be made by you through our convenient and
                        easy to use system. At the appointed time, you can go to your
                        dashboard and consult with the expert through the video link. We
                        provide secure payment gateways like Paypal and PayU to pay
                        consultation fee, if there is any.
                    </p>
                    <br>
                    <p>
                        We encourage you to let us know about any experts who you think would
                        want to be part of our venture and could benefit users. We are not
                        restricting ourselves to the categories which already exist and are
                        willing to look at new ones.
                    </p>
                    <br>
                    <p>
                        Lastly and most importantly, we are keen to have your feedback about
                        our system and the experts. It will help us improve your experience on
                        our portal.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@include("sub.footer")
</body>
</html>