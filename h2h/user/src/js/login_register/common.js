//打开字滑入效果
window.onload = function(){
	$(".connect p").eq(0).animate({"left":"0%"}, 600);
	$(".connect p").eq(1).animate({"left":"0%"}, 400);
};
//jquery.validate表单验证
$(document).ready(function(){
	//登陆表单验证
	$("#loginForm").validate({
		rules:{
			password:{
				required:true,
				minlength:3,
				maxlength:32,
			},
			email:{
				required:true,//必
				isEmail:true,
			},
			identifyingCode:{
				required:true,//必填
			}
		},
		//错误信息提示
		messages:{
			password:{
				required:"必须填写密码",
				minlength:"密码至少为20个字符",
				maxlength:"密码至多为20个字符",
			},
			email:{

				required:"请输入邮箱地址",
				isEmail: "必须是校内邮箱"
			},
			identifyingCode:{
				required:"请填写验证码",//必填
			}
		},

	});
	//注册表单验证
	$("#registerForm").validate({
		rules:{
			password:{
				required:true,
				minlength:6,
				maxlength:20,
			},
			email:{
				required:true,
				isEmail:true,
			},
			confirm_password:{
				required:true,
				minlength:3,
				equalTo:'.password'
			},
			identifyingCode:{
				required:true,//必填
			},
			username:{
				required:true,//必填
			}
		},
		//错误信息提示
		messages:{
			password:{
				required:"必须填写密码",
				minlength:"密码至少为6个字符",
				maxlength:"密码至多为20个字符",
			},
			email:{
				required:"请输入邮箱地址",
				isEmail: "必须是校内邮箱"
			},
			confirm_password:{
				required: "请再次输入密码",
				minlength: "确认密码不能少于3个字符",
				equalTo: "两次输入密码不一致",//与另一个元素相同
			},
			identifyingCode:{
				required:"请填写验证码",//必填
			},
			username:{
				required:"请填写用户名",//必填
			}
		},
	});
	//添加自定义验证规则
	jQuery.validator.addMethod("isEmail", function(value, element) {
		var length = value.length;
		var email_number = /^\d{8}@bjtu.edu.cn$/;
		return this.optional(element) || (length === 20 && email_number.test(value));
	}, "必须是校内邮箱");
	
	
});
