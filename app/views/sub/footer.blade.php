<style>
    .homepage-footer{
		text-align:center;
		background:#041F02;
		padding-top:10px;
		float:left;
		width:100%;
		clear:both;
        font-family: 'gothamr-l';
	}
	
	.homepage-footer a{
		color:#fff;
		padding:5px 10px;
		display: inline-block;
        font-family: 'gothamr-l';
	}
</style>

<div class="homepage-footer ">
            <a href='{{HTML::path("/about","About")}}'>About</a> <span style="border-right:2px solid #fff; height:50px;"></span>
			<a href="#">Privacy</a> <span style="border-right:2px solid #fff; height:50px;"></span>
			<a href='{{HTML::path("/terms","Term of Use")}}'>Terms & Conditions</a> <span style="border-right:2px solid #fff; height:50px;"></span>
			<a href="#">Contact</a>
	<p style="text-align:center; color:#fff;">&copy; Copyright 2014 Zantama Inc.</p>
</div>