@extends('layouts.enter')

@section('title', '注册')

@section('form')
	<form id="loginForm">
		{{ csrf_field() }}
		<ul class="register_radio clearfix">
            <li>
            	找工作
              	<input type="radio" value="0" name="type" /> 
            </li>
            <li>
           	    招人
              	<input type="radio" value="1" name="type" /> 
            </li>
        </ul>
    	<input type="text" id="email" name="email" tabindex="1" placeholder="请输入常用邮箱地址" />
        <span class="error" style="display:none;" id="beError"></span>
        <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
    	<label class="fl registerJianJu" for="checkbox">
    		<input type="checkbox" id="checkbox" name="checkbox" checked  class="checkbox valid" />我已阅读并同意<a href="h/privacy.html" target="_blank">《拉勾用户协议》</a>
   		</label>
        <input type="submit" id="submitLogin" value="注 &nbsp; &nbsp; 册" />
        
        <input type="hidden" id="callback" name="callback" value=""/>
        <input type="hidden" id="authType" name="authType" value=""/>
        <input type="hidden" id="signature" name="signature" value=""/>
        <input type="hidden" id="timestamp" name="timestamp" value=""/>
    </form>
@endsection

@section('jump')
	<div>已有拉勾帐号</div>
	<a  href="login.html"  class="registor_now">直接登录</a>
@endsection
             
@section('script')
    <script type="text/javascript">
    $(document).ready(function(e) {
    	$('.register_radio li input').click(function(e){
    		$(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
    	});
    	
    	$('#email').focus(function(){
    		$('#beError').hide();
    	});
    	//验证表单
	    	 $("#loginForm").validate({
	    	        rules: {
	    	        	type:{
	    	        		required: true
	    	        	},
			    	   	email: {
			    	    	required: true,
			    	    	email: true
			    	   	},
			    	   	password: {
			    	    	required: true,
			    	    	rangelength: [6,16]
			    	   	},
			    	   	checkbox:{required:true}
			    	},
			    	messages: {
			    		type:{
	    	        		required:"请选择使用拉勾的目的"
	    	        	},
			    	 	email: {
			    	    	required: "请输入常用邮箱地址",
			    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
			    	   	},
			    	   	password: {
			    	    	required: "请输入密码",
			    	    	rangelength: "请输入6-16位密码，字母区分大小写"
			    	   	},
			    	   	checkbox: {
			    	    	required: "请接受拉勾用户协议"
			    	   	}
			    	},
			    	errorPlacement:function(label, element){/* 
			    		if(element.attr("type") == "radio"){
			    			label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
			    		}else if(element.attr("type") == "checkbox"){
			    			label.inserresult.contenttAfter($(element).parent()).css('clear','left');
			    		}else{
			    			label.insertAfter(element);
			    		} */			    		
			    		/*modify nancy*/
			    		if(element.attr("type") == "radio"){
			    			label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
			    		}else if(element.attr("type") == "checkbox"){
			    			label.insertAfter($(element).parent()).css('clear','left');
			    		}else{
			    			label.insertAfter(element);
			    		};	
			    	},
			    	submitHandler:function(form){
			    		var type =$('input[type="radio"]:checked',form).val();
			    		var email =$('#email').val();
			    		var password =$('#password').val();
			    		var resubmitToken = $("input[name='_token']").val();
			    		
			    		var callback = $('#callback').val();
			    		var authType = $('#authType').val();
			    		var signature = $('#signature').val();
			    		var timestamp = $('#timestamp').val();
			    		
			    		$(form).find(":submit").attr("disabled", true);

			            $.ajax({
			            	type:'POST',
			            	data: {email:email,password:password,type:type,_token:resubmitToken, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
			            	url:'{{action('SimpleController@reg_act')}}',
			            	dataType:'json'
			            }).done(function(result) {
		            		$("input[name='_token']").val(result.resubmitToken);
			            	if(result.success){
			            		window.location.href=result.content;			            		
			            	}else{
								$('#beError').text(result.msg).show();
			            	}
			            	$(form).find(":submit").attr("disabled", false);			           		
			            });
			        }  
	    	});
    });
    </script>
@endsection

