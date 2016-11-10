@extends('layouts.enter')

@section('title', '登录')


@section('form')
	<form id="loginForm" action="index.html">
		<input type="text" id="email" name="email" value="" tabindex="1" placeholder="请输入登录邮箱地址" />
	  	<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
		<span class="error" style="display:none;" id="beError"></span>
	    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
	    <a href="reset.html" class="fr" target="_blank">忘记密码？</a>
	    
		<!--<input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />-->
		<a style="color:#fff;" href="index.html" class="submitLogin" title="登 &nbsp; &nbsp; 录"/>登 &nbsp; &nbsp; 录</a>

	    
	    <input type="hidden" id="callback" name="callback" value=""/>
        <input type="hidden" id="authType" name="authType" value=""/>
        <input type="hidden" id="signature" name="signature" value=""/>
        <input type="hidden" id="timestamp" name="timestamp" value=""/>
	</form>
@endsection

@section('jump')	
	<div>还没有拉勾帐号？</div>
	<a  href="register.html"  class="registor_now">立即注册</a>
@endsection
			    
@section('script')
	<script type="text/javascript">
	$(function(){
		//验证表单
		 	$("#loginForm").validate({
		 		/* onkeyup: false,
		    	focusCleanup:true, */
		        rules: {
		    	   	email: {
		    	    	required: true,
		    	    	email: true
		    	   	},
		    	   	password: {
		    	    	required: true
		    	   	}
		    	},
		    	messages: {
		    	   	email: {
		    	    	required: "请输入登录邮箱地址",
		    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
		    	   	},
		    	   	password: {
		    	    	required: "请输入密码"
		    	   	}
		    	},
		    	submitHandler:function(form){
		    		if($('#remember').prop("checked")){
		      			$('#remember').val(1);
		      		}else{
		      			$('#remember').val(null);
		      		}
		    		var email = $('#email').val();
		    		var password = $('#password').val();
		    		var remember = $('#remember').val();
		    		
		    		var callback = $('#callback').val();
		    		var authType = $('#authType').val();
		    		var signature = $('#signature').val();
		    		var timestamp = $('#timestamp').val();
		    		
		    		$(form).find(":submit").attr("disabled", true);
		            $.ajax({
		            	type:'POST',
		            	data:{email:email,password:password,autoLogin:remember, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
		            	url:ctx+'/user/login.json'
		            }).done(function(result) {
						if(result.success){
						 	if(result.content.loginToUrl){
								window.location.href=result.content.loginToUrl;
		            		}else{
		            			window.location.href=ctx+'/';
		            		} 
						}else{
							$('#beError').text(result.msg).show();
						}
						$(form).find(":submit").attr("disabled", false);
		            }); 
		        }  
			});
	})
	</script>
@endsection
