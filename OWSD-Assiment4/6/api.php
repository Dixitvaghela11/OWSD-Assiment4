<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$books = [
    ['id' => 1, 'title' => '1984', 'author' => 'George Orwell', 'year' => 1949],
    ['id' => 2, 'title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'year' => 1960],
    ['id' => 3, 'title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'year' => 1925],
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($books);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $newBook = [
        'id' => count($books) + 1,
        'title' => $data['title'],
        'author' => $data['author'],
        'year' => $data['year']
    ];
    echo json_encode(['message' => 'Book added', 'book' => $newBook]);
    exit();
}

http_response_code(405);
echo json_encode(['message' => 'Method not allowed']);
?>

// IT //
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kiran Hospital | OPD Assessment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="../khshelpdesk/img/fav.ico" />
	<!-- css -->
	<link href="../khshelpdesk/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../khshelpdesk/css/cubeportfolio.min.css" rel="stylesheet" />
	<link href="../khshelpdesk/css/style.css?r=20180516" rel="stylesheet" />
	<link href="../khshelpdesk/css/elegant-icons-style.css" rel="stylesheet" />
	<link href="../khshelpdesk/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../khshelpdesk/css/lightbox.min.css" rel="stylesheet" type="text/css" media="screen" />
	<!-- Theme skin -->
	<link href="../khshelpdesk/skins/default.css" rel="stylesheet" id="t-colors" />
	<script src="../khshelpdesk/js/jquery-1.10.2.min.js"></script>
	<!-- <script src="js/jquery-1.7.1.min.js"></script> -->
	<script type="text/javascript" src="../khshelpdesk/jquery/moment.js"></script>
	<link rel="stylesheet" href="../khshelpdesk/jquery/jquery.datetimepicker.css">
	<script src="../khshelpdesk/js/jquery.min.js"></script>
	<script type="text/javascript" src="../khshelpdesk/jquery/jquery.js"></script>
	<script type="text/javascript" src="../khshelpdesk/jquery/jquery.datetimepicker.full.min.js"></script>
	<script>
		$.datetimepicker.setDateFormatter({
	        parseDate: function (date, format) {
	           var d = moment(date, format);
	           return d.isValid() ? d.toDate() : false;
	        },
	        
	        formatDate: function (date, format) {
	           return moment(date).format(format);
	        }
	     });
	</script>
	<script src="../khshelpdesk/js/modernizr.custom.js"></script>
	<script src="../khshelpdesk/js/jquery.easing.1.3.js"></script>
	<script src="../khshelpdesk/js/bootstrap.min.js"></script>
	<script src="../khshelpdesk/js/jquery.appear.js"></script>
	<script src="../khshelpdesk/js/stellar.js"></script>
	<script src="../khshelpdesk/js/classie.js"></script>
	<script src="../khshelpdesk/js/uisearch.js"></script>
	<script src="../khshelpdesk/js/jquery.cubeportfolio.min.js"></script>
	<script src="../khshelpdesk/js/google-code-prettify/prettify.js"></script>
	<script src="../khshelpdesk/js/animate.js"></script>
	<script src="../khshelpdesk/js/custom.js"></script>
	<script src="../khshelpdesk/js/impfunction.js?v=070120201511"></script>
	<!-- =======================================================
	    Theme Name: Sailor
	    Theme URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
	    Author: BootstrapMade
	    Author URL: https://bootstrapmade.com
	======================================================= -->
</head>
<body>
	<div id="wrapper" style="min-height: 100%!important;">
		<!-- start header -->
		<header class="w3-top">
			<div class="navbar navbar-default navbar-static-top">
	            <div class="">
                	<div class="col-md-4 col-lg-4 w3-large">
	                    <a href="/khsopd/"><img src="../khshelpdesk/img/logo.png" alt="" style="height: auto; width: 50%; padding: 0px 0px 0px 0px;"/></a>
	                    <b class="w3-margin-0">OPD Assessment</b>
					</div>
					<div class="col-md-8 col-lg-8" >
						<div class="w3-row">
					        <ul class="nav navbar-nav pull-right">
<li class="w3-padding-0"><a href="userlist.php"><i class="fa fa-user"></i> Users</a></li>

<li class="w3-padding-0"><a href="opdreport.php"><i class="fa fa-file-text-o" title="OPD Report"></i> OPD Report</a></li>
<li class="w3-padding-0"><a href="opdlist.php"><i class="fa fa-list" title="OPD List"></i> OPD List</a></li>
<li class="w3-padding-0"><a href="/khsopd/?msg=signout"><i class="glyphicon glyphicon-log-out" title="Signout"></i> Sign Out</a></li>
<li class="w3-padding-0"><a href="userpass.php"><i class="glyphicon glyphicon-user" title="Change Password"></i> Admin</a></li>
<!-- /khshelpdesk/usermaster.php?todo=upd -->
</ul>
			            </div>
		            </div>
	            </div>
	        </div>
		</header>
		<!-- end header -->
		<section id="content" class="w3-padding-top-72">
			<div class="">
				<div class="row">
			    	<div class="col-lg-12">
						<html>
<head><title> User Master </title>
<!-- <script src="js/jquery.mask.min.js"></script> -->
<script language="JavaScript" type="text/javascript">
	function readURL(input,x) 
	{
		//alert(input.files[0].name);
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();
			x = '#'+x;
			reader.onload = function (e) 
			{
				$(x).attr('src', e.target.result);
				$(x+"_data").val(e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script language="JavaScript" type="text/javascript">
	function ValidateSel(Form)
	{
		return true;
	}
	
	function check()
	{	
		if (!justcheckblnk(document.cmast.USR_NAME)){ 
			$("#msginfo").html("<b class='w3-text-red'>Please enter valid Name.</b>");
			$('#msgbox').addClass('w3-show');
			$('#msgboxcall').val('usr_name');
			$('#msgbtn').focus();
			return false;
		}

		if (!justcheckblnk(document.cmast.DEPT_ID)){ 
			$("#msginfo").html("<b class='w3-text-red'>Please Select valid Department.</b>");
			$('#msgbox').addClass('w3-show');
			$('#msgboxcall').val('DEPT_ID');
			$('#msgbtn').focus();
			return false;
		}

		if (!justcheckblnk(document.cmast.USR_TYPE)){ 
			$("#msginfo").html("<b class='w3-text-red'>Please Select valid User Type.</b>");
			$('#msgbox').addClass('w3-show');
			$('#msgboxcall').val('USR_TYPE');
			$('#msgbtn').focus();
			return false;
		}
		
		if (!justcheckblnk(document.cmast.USR_LOGINID)){ 
			$("#msginfo").html("<b class='w3-text-red'>Please enter valid LogIn ID.</b>");
			$('#msgbox').addClass('w3-show');
			$('#msgboxcall').val('USR_LOGINID');
			$('#msgbtn').focus();
			return false;
		}

		if ($('#USR_TYPE').val()=="HOD"){
			if (!justcheckblnk(document.cmast.USR_EMAIL)){ 
				$("#msginfo").html("<b class='w3-text-red'>Please enter valid E-Mail ID.</b>");
				$('#msgbox').addClass('w3-show');
				$('#msgboxcall').val('usr_email');
				$('#msgbtn').focus();
				return false;
			}			
		}

		if($('#logindet').is(':checked'))
		{
			if (!justcheckblnk(document.cmast.new_password)){ 
				$("#msginfo").html("<b class='w3-text-black-red'>Please enter valid New Password.</b>");
				$('#msgbox').addClass('w3-show');
				$('#msgboxcall').val('new_password');
				$('#msgbtn').focus();
				return false;
			}
			
			if (!justcheckblnk(document.cmast.confirm_password)){ 
				$("#msginfo").html("<b class='w3-text-black-red'>Please enter valid Confirm Password.</b>");
				$('#msgbox').addClass('w3-show');
				$('#msgboxcall').val('confirm_password');
				$('#msgbtn').focus();
				return false;
			}
			
			if ($("#new_password").val() != $("#confirm_password").val())
			{
				$("#msginfo").html("<b class='w3-text-black-red'>New Password and Confirm Password not matched.</b>");
				$('#msgbox').addClass('w3-show');
				$('#msgboxcall').val('confirm_password');
				$('#msgbtn').focus();
				return false;
			}
		}
		
		document.getElementById('spinner').style.display='block';
		$.ajax({
			url: "usermaster.php",
			data: $("#cmast").serialize(),
			type: "POST",
			success: function(data){
				//alert(data);
				var obj = jQuery.parseJSON( data );
				if(obj.status == "success" && obj.errorcode == "0000")
				{
					$("#msginfo").html("<b>"+obj.message+"</b>");
					$('#msgbox').addClass('w3-show');
					$('#msgboxcall').val('usr_name');
					$('#msgbtn').focus();
					window.location.replace("userlist.php");
				}
				else if(obj.status == "fail")
				{
					$("#msginfo").html("<b class='w3-text-red'>"+obj.message+"</b>");
					$('#msgbox').addClass('w3-show');
					$('#msgboxcall').val('usr_name');
					$('#msgbtn').focus();
				}
				document.getElementById('spinner').style.display='none';
			},
			error: function (jqXHR, exception) {
				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				$("#msginfo").html("<b class='w3-text-red'>"+msg+"</b>");
				$('#msgbox').addClass('w3-show');
				$('#msgboxcall').val('usr_name');
				$('#msgbtn').focus();
				document.getElementById('spinner').style.display='none';
			}
		});
		return true;
	}

	function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
        if(!pattern.test(emailAddress.value))
		{
			$("#msginfo").html("<b class='w3-text-red'>Please enter valid E-mail.</b>");
			$('#msgbox').addClass('w3-show');
			$('#msgboxcall').val('usr_email');
			$('#msgbtn').focus();
		}
    };
</script>
</head>
<body>

<form id="cmast" name="cmast" action="usermaster.php" method="POST" >
<div class="w3-row w3-padding-hor-16">
	<div class="w3-col w3-padding">
		<div class="w3-card-4">
			<div class="w3-row w3-light-grey">
				<div class="w3-col m6 l6 w3-padding w3-large">
					<strong>Add New User</strong>
				</div>
				<div class="w3-col m6 l6">
					<div class="btn-group w3-right">
						<a class="btn btn-success" onclick="return check();" title="Save"><i class="fa fa-fw fa-lg fa-save"></i></a>
						<a class="btn btn-danger" onclick="window.location.replace('userlist.php');" title="Close"><i class="fa fa-fw fa-lg fa-times"></i></a>
					</div>
				</div>
			</div>
			<div class="w3-row w3-padding-hor-16">
				<div class="w3-col m3 l3 w3-padding">
					<div class="w3-row">
						<a class="w3-pointer" onclick="document.querySelector('#usr_pimg_file').click();" title="Upload Image">
							<div class="w3-display-container w3-card-8">
								<img id="usr_pimg" class="uploadimg" src="userprofile/no_image.png" onerror="this.src='../khshelpdesk/userprofile/no_image.png'" style="width:100%;"/>
								<div class="w3-display-bottomleft w3-center w3-large uploadimghover w3-input w3-border-0"><strong>Change</strong></div>
							</div>
						</a>
						<input type="hidden" id="usr_pimg_data" name="usr_pimg_data" value="" />
						<input type="file" id="usr_pimg_file" name="usr_pimg_file" accept=".png,.jpg,.jpeg" onChange="readURL(this,'usr_pimg');" style="visibility: hidden;" />
					</div>
					<div class="w3-row w3-padding-top">
						<strong>Note:</strong> The recommended dimensions for a photo in ratio of 1:1 (i.e. 250px X 250px, 512px X 512px)
					</div>
				</div>
				<div class="w3-col m9 l9">
					<div class="w3-col m6 l6 w3-padding">
						<div class="w3-row w3-light-grey w3-padding w3-large">
							<strong>Personal Details</strong>
						</div>
						<div class="w3-row w3-padding">
							<div class="w3-row">
								<div class="form-group">
									<strong>Full Name: *</strong>
									<input type="text" id="usr_name" name="USR_NAME" class="form-control input-md" value="" maxlength="255" style="width:100%!important;" placeholder="Name*"/>
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>Department: *</strong>
									<select name='DEPT_ID' id="DEPT_ID" class="form-control input-md" style="width:100%!important;"  >
										<option value=''>Select Department</option><option value='2' >Counseling</option><option value='3' >Frontdesk</option><option value='1' >IT</option><option value='4' >Management Office</option>
									</select>
									<script type="text/javascript">
										document.getElementById('DEPT_ID').value = '';
										if('' != '') document.getElementById('DEPT_ID').value = '';
									</script>
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>Type: *</strong>
									<select name='USR_TYPE' id="USR_TYPE" class="form-control input-md" style="width:100%!important;"  >
										<option value='USER' selected >User</option><option value='CON'>Counsellor</option><option value='HOD' >HOD</option>
									</select>
									<script type="text/javascript">
										document.getElementById('USR_TYPE').value = '';
										if('USER' != '') document.getElementById('USR_TYPE').value = 'USER';
									</script>
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>E-Mail:</strong>
									<input type="text" id="usr_email" name="USR_EMAIL" class="form-control input-md" value="" maxlength="150" style="width:100%!important;" placeholder="E-mail" onblur="isValidEmailAddress(this);" />
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>Mobile:</strong>
									<input type="text" id="usr_mobile" name="USR_MOBILE" class="form-control input-md" value="" style="width:100%!important;" placeholder="Mobile"/>
									<script> 
										$("#usr_mobile").mask("9999999999", {placeholder: "Mobile"});
									</script>
								</div>
							</div>
							<input type="hidden" id="usr_id" name="id" value=""/>
							<input type="hidden" name="but" value="Add"/>
							<input type="hidden" name="can" value='Cancel'/>
						</div>
					</div>
					<div class="w3-col m6 l6 w3-padding">
						<div class="w3-row w3-light-grey w3-padding w3-large">
							<div class="w3-col s5 m5 l5">
								<strong>Login Details</strong>
							</div>
							<div class="w3-col s7 m7 l7 w3-medium">
								<div class="w3-right w3-hide">
									Update credentials <input type="checkbox" name="logindet" id="logindet" onchange="return enalogindet(this.checked);" value="true" checked />
								</div>
							</div>
						</div>
						<div class="w3-row w3-padding">
							<div class="w3-row">
								<div class="form-group">
									<strong>LogIn ID: *</strong>
									<input type="text" id="USR_LOGINID" name="USR_LOGINID" class="form-control input-md" value="" maxlength="255" style="width:100%!important;" placeholder="LogIn ID.*"   />
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>Password:</strong>
									<input type="password" id="new_password" name="new_password" class="form-control input-md" maxlength="255" style="width:100%!important;" placeholder="Password..."   />
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>Confirm Password:</strong>
									<input type="password" id="confirm_password" name="confirm_password" class="form-control input-md" maxlength="255" style="width:100%!important;" placeholder="Confirm Password..."  />
								</div>
							</div>
							<div class="w3-row">
								<div class="form-group">
									<strong>Status: *</strong>
									<select name='STATUS_FLG' id="STATUS_FLG" class="form-control input-md" style="width:100%!important;"  >
										<option value='ACTV' selected >Active</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	if("" != "") $('#msgbox').addClass('w3-show');
</script>
<script type="text/javascript">
	function enalogindet(check){
		if(check)
		{
			$("#USR_LOGINID").removeAttr("disabled");
			$("#new_password").removeAttr("disabled");
			$("#confirm_password").removeAttr("disabled");
		}
		else
		{
			$("#USR_LOGINID").attr("disabled","TRUE");
			$("#new_password").attr("disabled","TRUE");
			$("#confirm_password").attr("disabled","TRUE");
		}
	}

	function userenalogindet(check){
		if(check)
		{
			$("#new_password").removeAttr("disabled");
			$("#confirm_password").removeAttr("disabled");
		}
		else
		{
			$("#new_password").attr("disabled","TRUE");
			$("#confirm_password").attr("disabled","TRUE");
		}
	}
</script>
</form>
</body>
</html>
					</div>
				</div>
			</div>
		</section>
		<footer class="w3-bottom">
			<div class="">
				<div class="row">
					<div class="col-lg-6">
						<div class="copyright w3-text-white">
							<p>&copy; Kiran Hospital - All Right Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div id="spinner" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom w3-card-8">
			<i class="fa fa-spinner fa-3x w3-display-middle w3-spin w3-text-white"></i>
		</div>
	</div>
	<input type="hidden" id="msgboxcall" name="msgboxcall" value="" />
	<div id="msgbox" class="w3-modal ">
		<div class="w3-modal-content w3-card-8">
			<div class="w3-container w3-light-grey w3-padding-hor-8">
				<div class="w3-col w3-large w3-padding-8">
					<strong><i class="fa fa-fw fa-exclamation-triangle"></i>Message</strong>
				</div>
			</div>
			<div class="w3-padding w3-padding-hor-16">
				<div class="w3-row w3-padding-hor-8">
					<div class="w3-col w3-large w3-padding w3-text-dark-grey">
						<p id="msginfo"></p>
					</div>
				</div>
			</div>
			<div class="w3-col w3-white w3-padding w3-padding-hor-16">
				<button type="button" class="w3-right btn btn-success" onclick="$('#msgbox').removeClass('w3-show');$('#msginfo').html('');$('#'+$('#msgboxcall').val()).focus();" id="msgbtn">OK
				</button>
			</div>
		</div>
	</div>
	<!-- <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a> -->
	<!-- javascript
	    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
</body>
<script>
   if("" != "") $('#msgbox').addClass('w3-show');
</script>
</html>
