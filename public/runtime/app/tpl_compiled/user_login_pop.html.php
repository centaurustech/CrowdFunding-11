<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/ajax_user_login.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/ajax_user_login.js";
?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<style>
	.control-group{float:left;overflow:visible;}
	.holder_tip{left:0;top:0;}
</style>
<div class="blank"></div>
<!--中间开始-->
<div class="logwrap clearfix" style="background:#fff">
    <form id="user_login_form" name="user_login_form" action="<?php
echo parse_url_tag("u:user#do_login|"."".""); 
?>">
        <div class="logleft" style="margin-left:0px;">
           	<div class="control-group">
				<label class="control-label">账户</label>
				<div class="control-text">
					<div class="pr f_l">
						<input type="text" name="email" id="email" value="" class="textbox" />
						<span class="holder_tip">手机号/会员名/邮箱</span>
					</div>
				</div>
				<div class="blank0"></div>
			</div>
			<div class="control-group">
				<label class="control-label">密码</label>
				<div class="control-text">
					<div class="pr f_l">
						<input type="password"  autocomplete="off" name="user_pwd" id="user_pwd" value="" class="textbox" />
						<span class="holder_tip">请输入登录密码</span>
					</div>
				</div>
				<div class="blank0"></div>
			</div>
			<?php if (app_conf ( "USER_VERIFY_STATUS" ) == 1): ?>	
				<div class="control-group">
 					<label class="control-label">验证码</label>
					<div class="control-text">
						<input type="text" id="image_code" name="image_code" class="textbox" style="width:50px;" />
						<img src="./verify.php?name=login_verify" alt="./verify.php?name=login_verify" id="verify" align="absmiddle" height="41">
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
			<?php else: ?>
			 		<input type="hidden" id="image_code" name="image_code" class="textbox f_l" value="0" style="width:50px;margin-right:10px" />
					<img src="./verify.php?name=login_verify" alt="./verify.php?name=login_verify" id="verify" align="absmiddle" height="41" style="display:none;">
			<?php endif; ?>
			<div class="blank0"></div>
	        <div class="control-group smaller-control-group tl">
	        	<label class="control-label"></label>
	        	<label class="ui_checkbox" rel="carry_type">
					<input type="checkbox" value="1" name="auto_login" checked="checked" />记住我（下次自动登录）
		</label>
		<div class="shell login" style="clear:both;text-align: center;">
                			没有账号？<a href="<?php
echo parse_url_tag("u:user#register|"."".""); 
?>" style="color:#0196db;">快速注册</a>
            		</div>

	        </div>     
	        <div class="blank0"></div>
			<div class="control-group"> 
				<label class="title control-label"></label>
				<div class="control-text">
					<input type="button" value="登录" name="submit_form" class="ui-button theme_bgcolor mr10" id="btn_do_login" />
					<input type="hidden" value="1" name="ajax" />
 					<a href="<?php
echo parse_url_tag("u:user#getpassword|"."".""); 
?>" style="color:#1184df;font-size:13px;">忘记密码？</a>
				</div>
			</div>
        </div>
        <!-- 2016-4-26加图片 删除合作登录 -->
       	<img src="app/Tpl/fanwe_1/images/feiji2.png" style="width:260px;height:240px;position:absolute;right:60px;top:80px;">
        <!-- <div class="logright">
            	 	<div class="shell login">
                没有账号？<a href="<?php
echo parse_url_tag("u:user#register|"."".""); 
?>" style="color:#0196db;">快速注册</a>
            </div>
               		 <div class="linebg clearfix shell">
                <b class="fond"></b>
                合作账号登录
                <b class="back"></b>
            </div>
        			<?php 
$k = array (
  'name' => 'api_login',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
        </div> -->
    </form>
</div>
<!--中间结束-->
<script type="text/javascript">
	$(function(){
		show_tip();
		ui_checkbox();
		setTimeout(autofillHide, 100);
		$("#verify").bind("click",function(){
 			timenow = new Date().getTime();
			$(this).attr("src",$(this).attr("alt")+"&rand="+timenow);
		});
	});
	function autofillHide(){
	 	var obj = $("input[name='email']");
		var text = obj.val();
		if(text){
			$("#user_login_form").find(".holder_tip").hide();
		}
		else{
			$("#user_login_form").find(".holder_tip").show();
		}
	}		
</script>
<div class="blank"></div>