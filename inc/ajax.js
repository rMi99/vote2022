$(document).ready(function(){
	let pgName = window.location.pathname.split("/").pop();
	if(pgName === 'results.php'){
		$.ajax({
			method: 'POST',
			url: "./api.php?func=gVotes",
			dataType: "text",
			contentType: "text",
			data: {'n': 'n'},
			success: function (response){
				let jsonObj = JSON.parse(response);
				alert(JSON.stringify(jsonObj));
				let jvpTxt = $('.jvp-data').text(parseInt(jsonObj["jvp"]) + 247);
				let unpTxt = $('.unp-data').text(parseInt(jsonObj["unp"]) + 443);
				let sjbTxt = $('.sjb-data').text(parseInt(jsonObj["sjb"]) + 515);
				let slmcTxt = $('.slmc-data').text(parseInt(jsonObj["slmc"]) + 71);
				let slfpTxt = $('.slfp-data').text(parseInt(jsonObj["slfp"]) + 354);
				let tnaTxt = $('.tna-data').text(parseInt(jsonObj["tna"]) + 157);
				let slppTxt = $('.slpp-data').text(parseInt(jsonObj["slpp"]) + 313);
				let noneTxt = $('.none-data').text(parseInt(jsonObj["none"]) + 277);
			}
		})
	}

	function sendAjax(func, postParams){
		$.ajax({
			method: 'POST',
			url: "./api.php?func=" + func,
			dataType: "text",
			contentType: "text",
			data: postParams,
			success: function(response){
				let mType = undefined;
				let mMsg = undefined;
				if(response.startsWith("ERR: ")){
					response = response.slice(5);
					mType = "error";
					mMsg = "Error!";
				} else {
					mType = "success";
					mMsg = "Success!";
				}
				Swal.fire(
					mMsg,
					response,
					mType
				).then(function (){
					if((pgName === 'index.php' || pgName === '') && mType === 'success'){
						document.location.href = 'vote.php';
					} else if(pgName === 'register.php' && mType === 'success'){
						document.location.href = 'index.php';
					} else if(pgName === 'vote.php' && mType === 'success'){
						document.location.href = 'results.php';
					}
				});
			},
			error: function(thrownError){
				alert(thrownError);
			}
		});
		
	}
	
	function login(email, pwd){
		sendAjax("login", {'u_email': email, 'u_pwd': pwd});
	}

	function register(fn, email, passwd, pwdConf){
		sendAjax("reg", {'f_name': fn, 'e_mail': email, 'u_pwd': passwd, 'uc_pwd': pwdConf});
	}

	function vote(voteId){
		sendAjax("vote", {'vote': voteId});
	}
	
	$('#btn-submit').click(function(e){
		e.preventDefault();
		let em = $('#txt-email').val();
		let pw = $('#txt-pwd').val();
		login(em, pw);
		
	});

	$('#btn-register').click(function (e){
		e.preventDefault();
		let fn = $('#f-name').val();
		let mail = $('#e-mail').val();
		let pwd = $('#n-pwd').val();
		let cpwd = $('#nc-pwd').val();
		register(fn, mail, pwd, cpwd);
	});

	$('.v-party').click(function (e){
		e.preventDefault();
		let voteId = $(this).attr("id");
		vote(voteId);
	})
});
