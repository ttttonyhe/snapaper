<?php require 'header.php' ?>
	<div class="uk-container" style="margin-top: 10%;">
	<div class="sub-title-div" style="margin-bottom:60px;display: flex;">
	<div style="
	width: 97%;
">
		<h1 class="sub-title-h1">Comments</h1>
		<p class="sub-title-p">Post your opinion...</p>
	</div>
	<div style="text-align: right;padding-top: 30px;">
		<a onclick="history.go(-1);"><svg width="40" height="40" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="uk-icon uk-svg" style="margin-right: 15px;color: #333;margin-top: -1px;"><line fill="none" stroke="#000" x1="5.5" y1="9.5" x2="15" y2="9.5"></line><line fill="none" stroke="#000" x1="5" y1="1.5" x2="9" y2="1.5"></line><polyline fill="none" stroke="#000" stroke-width="1.03" points="8.5,6.5 5.5,9.5 8.5,12.5"></polyline><polyline fill="none" stroke="#000" points="12.5,7 12.5,2.5 9.5,2.5 9.5,3.5 4.5,3.5 4.5,2.5 1.5,2.5 1.5,15.5 12.5,15.5 12.5,12"></polyline></svg></a>
	</div>
	</div>
	
			<div class="uk-card uk-card-default uk-card-body" style="padding: 50px 250px;">
				<style>
					.v .vwrap .vheader.item2 .vinput{
						    width: 49% !important;
                            margin-left: 1% !important;
					}
					.v .vwrap .vheader .vinput{
						    border-bottom: 1px solid #eee !important;
					}
					.v .veditor{
						    font-size: 1rem !important;
                            padding-left: 15px !important;
					}
					.v .vwrap .vcontrol{
						    padding: 15px 10px !important;
					}
					.v .vbtn{
						    padding: .5rem 2.25rem !important;
					}
					.v .vlist .vcard .vhead .vnick{
						    color: #1abc9c !important;
						    font-size: 1.2rem !important;
                            letter-spacing: 1px !important;
                            line-height: 20px !important;
                            margin-right: .875rem !important;
					}
					.v .vlist .vcard .vhead .vsys{
                            padding: .1rem .7rem !important;
                            background: #fafafa !important;
                            color: #b3b1b1 !important;
                            font-size: .35rem !important;
                            margin-right: .1rem !important;
					}
					.v .vwrap {
                            border: 1px solid #eee !important;
                            border-radius: 2px !important;
                            box-shadow: 0px 0px 6px rgba(0,0,0,.06) !important;
                            margin-bottom: 50px !important;
                            padding: 20px !important;
}
.v .power{
	display: none !important;
}
.v p{
	margin: 0px !important;
}
.at{
	display: none !important;
}
.v .vlist .vcard .vquote{
    padding: 0 2rem !important;
    margin-right: 10px !important;
    border-left: 1px dashed hsla(0,0%,93%,.5) !important;
    box-shadow: 0px 0px 6px rgba(0,0,0,.06) !important;
}
.v .vlist .vcard .vh .vmeta .vat{
	font-size: .8125rem !important;
    color: #00BCD4 !important;
    border: 1px solid #00BCD4 !important;
    padding: 0px 20px !important;
    font-weight: 500 !important;
    border-radius: 50px !important;
}
				</style>
				<div id="vcomments"></div>
	<script>
		new Valine({
			el: '#vcomments',
			appId: 'yzdkI6IndrUgvelD0BajMJGL-9Nh9j0Va',
			appKey: 'gKXkn52anitHbmeCU2mL0gVF',
			notify:false,
	        verify:false,
	        avatar:'mp',
	        placeholder: 'Leave a Comment...',
	        meta:['nick','mail'],
	        lang:'en'
		})
	</script>
				
				</div>
			</div>
	</body>
</html>