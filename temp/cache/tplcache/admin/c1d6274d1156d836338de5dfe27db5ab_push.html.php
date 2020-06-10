<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">链接推送设置</a></li>
</ul>
<div id="admin_right_b">
<div class="divtips">本工具仅推送本站已添加的站点的链接（<u>链接根据URL规则自动生成</u>）！<br>
注：域名填写需和平台一致，注意是否带有www，注意是否带有https://<br>
如：平台的域名为 <u>www.a.com</u> , token填写的域名也必需为<u>www.a.com</u> 
</div>
<form method="post">
<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig">
<tr class="tdbg item_title">
	<td width="250" align="right"><i class="typcn typcn-cog"></i> 自动推送设置</td>
	<td><font style="color:red;font-weight:500">程序自动向百度/神马搜索推送链接，可加快搜索引擎抓取收录速度</font></td>
</tr>
<tr class="tdbg">
	<td align="right" class="config_td_first">自动推送开关：</td>
	<td class="icheck_radios">
		<label><input type="radio" name="con[push_open]" value="1"<?php if($this->_var['push_open']): ?> checked<?php endif; ?>>开启</label>
		<label><input type="radio" name="con[push_open]" value="0"<?php if(! $this->_var['push_open']): ?> checked<?php endif; ?>>关闭</label>
		<span>蜘蛛或访客访问前台时自动触发推送，<font color="red">如造成服务器卡，可使用手动挂机</font></span>
	</td>
</tr>
<tr>
  <td align="right" class="config_td_first"><font color="blue">百度·MIP</font>每次推送数量：</td>
  <td class="tdbg" colspan="4"><input name="con[push_num_mip]" type="text" value="<?php echo $this->_var['push_num_mip']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>每次推送的链接数量，一般100-1000</span></td>
</tr>
<tr>
  <td align="right" class="config_td_first"><font color="blue">百度·熊掌</font>每次推送数量：</td>
  <td class="tdbg" colspan="4"><input name="con[push_num_yd]" type="text" value="<?php echo $this->_var['push_num_yd']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>每次推送的链接数量，一般10-1000</span></td>
</tr>
<tr>
  <td align="right" class="config_td_first"><font color="blue">百度·平台</font>每次推送数量：</td>
  <td class="tdbg" colspan="4"><input name="con[push_num_zz]" type="text" value="<?php echo $this->_var['push_num_zz']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>每次推送的链接数量，一般100-2000</span></td>
</tr>
<tr>
  <td align="right" class="config_td_first"><font color="blue">神马·MIP</font>每次推送数量：</td>
  <td class="tdbg" colspan="4"><input name="con[push_num_smmip]" type="text" value="<?php echo $this->_var['push_num_smmip']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>每次推送的链接数量，一般100-1000</span></td>
</tr>
<tr>
  <td align="right" class="config_td_first">推送间隔时间：</td>
  <td class="tdbg" colspan="4"><input name="con[push_interval]" type="text" value="<?php echo $this->_var['push_interval']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>秒，每次推送的间隔时间，建议值：60-300</span></td>
</tr>
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 各平台推送token设置</td>
	<td></td>
</tr>
<style type="text/css">
.tokentext td{ border-bottom:10px solid #eee;}
.tokentext .icheck_radios{ margin-bottom:10px;padding-bottom:10px;border-bottom:1px solid #ccc;}
.tokentext p{ color:blue;}
</style>
<tr class="tdbg tokentext">
  <td align="right" class="config_td_first">
	百度主动推送token参数<br>(<font color="red">百度站长平台中获取</font>)</td>
  <td style="padding:30px 10px;">
	<div class="icheck_radios push_configtype">
		<label><input type="radio" dataid="push_configtype_zz" name="con[push_configtype_zz]" value="1"<?php if($this->_var['push_configtype_zz']==1|| ! $this->_var['push_configtype_zz']): ?> checked<?php endif; ?>>编辑框模式</label>
		<label><input type="radio" dataid="push_configtype_zz" name="con[push_configtype_zz]" value="2"<?php if($this->_var['push_configtype_zz'] == 2): ?> checked<?php endif; ?>>文件模式</label>
		<span>数量少的用编辑框模式，<font color="red">超过1000个的请用文件模式</font></span>
	</div>
	<div class="push_configtype_zz_1" <?php if($this->_var['push_configtype_zz'] == 2): ?> style="display:none"<?php endif; ?>>
	每行一个，格式：<font color="green">site----token</font><br>
	<font>xxfseo.com----XK8msuaO2SpzYJxH</font><br><textarea name="con[token_list_zz]" type="text" style="height:150px;width:600px;"><?php echo $this->_var['token_list_zz']; ?></textarea>
	</div>
	<div class="push_configtype_zz_2" <?php if($this->_var['push_configtype_zz']==1|| ! $this->_var['push_configtype_zz']): ?> style="display:none"<?php endif; ?>>
		<input name="con[push_configfile_zz]" readonly type="text" id="zzfile" value="<?php echo $this->_var['push_configfile_zz']; ?>" class="input" size="30"> 
		<button onclick="window.parent.select_file(document,'zzfile','push_config');" type="button" class="button">选择文件</button>
		<button onclick="review('zzfile');" type="button" class="button button_inverse">预览</button>
		<p>请先上传文件至 /temp/data/push_config 文件夹（不要用中文名），格式和编辑框模式一样</p>
	</div>
  </td>
</tr>

<tr class="tdbg tokentext">
  <td align="right" class="config_td_first">
	熊掌ID推送token参数<br>(<font color="red">百度站长移动专区中获取</font>)</td>
  <td style="padding:30px 10px;">
	<div class="icheck_radios push_configtype">
		<label><input type="radio" dataid="push_configtype_yd" name="con[push_configtype_yd]" value="1"<?php if($this->_var['push_configtype_yd']==1|| ! $this->_var['push_configtype_yd']): ?> checked<?php endif; ?>>编辑框模式</label>
		<label><input type="radio" dataid="push_configtype_yd" name="con[push_configtype_yd]" value="2"<?php if($this->_var['push_configtype_yd'] == 2): ?> checked<?php endif; ?>>文件模式</label>
		<span>数量少的用编辑框模式，<font color="red">超过1000个的请用文件模式</font></span>
	</div>
	<div class="push_configtype_yd_1" <?php if($this->_var['push_configtype_yd'] == 2): ?> style="display:none"<?php endif; ?>>
		每行一个，格式：<font color="green">域名----appid----token----额度</font><br><font color="red">说明：优先推送天级收录，天极收录推送完才推送周级收录，额度为天级收录的额度</font><br>
		<font>a.com----1627329112----aI8Ytfas6avewHvw----10</font><textarea name="con[token_list_yd]" type="text" style="height:150px;width:600px;"><?php echo $this->_var['token_list_yd']; ?></textarea>
	</div>
	<div class="push_configtype_yd_2" <?php if($this->_var['push_configtype_yd']==1|| ! $this->_var['push_configtype_yd']): ?> style="display:none"<?php endif; ?>>
		<input name="con[push_configfile_yd]" readonly type="text" id="ydfile" value="<?php echo $this->_var['push_configfile_yd']; ?>" class="input" size="30"> 
		<button onclick="window.parent.select_file(document,'ydfile','push_config');" type="button" class="button">选择文件</button>
		<button onclick="review('ydfile');" type="button" class="button button_inverse">预览</button>
		<p>请先上传文件至 /temp/data/push_config 文件夹（不要用中文名），格式和编辑框模式一样</p>
	</div>
  </td>
</tr>

<tr class="tdbg tokentext">
  <td align="right" class="config_td_first">
	百度MIP推送token参数<br>(<font color="red">百度站长MIP中获取</font>)</td>
  <td>
	<div class="icheck_radios push_configtype">
		<label><input type="radio" dataid="push_configtype_mip" name="con[push_configtype_mip]" value="1"<?php if($this->_var['push_configtype_mip']==1|| ! $this->_var['push_configtype_mip']): ?> checked<?php endif; ?>>编辑框模式</label>
		<label><input type="radio" dataid="push_configtype_mip" name="con[push_configtype_mip]" value="2"<?php if($this->_var['push_configtype_mip'] == 2): ?> checked<?php endif; ?>>文件模式</label>
		<span>数量少的用编辑框模式，<font color="red">超过1000个的请用文件模式</font></span>
	</div>
	<div class="push_configtype_mip_1" <?php if($this->_var['push_configtype_mip'] == 2): ?> style="display:none"<?php endif; ?>>
		每行一个，格式：<font color="green">site----token</font><br>
		<font>xxfseo.com----XK8msuaO2SpzYJxH</font><br><textarea name="con[token_list_mip]" type="text" style="height:150px;width:600px;"><?php echo $this->_var['token_list_mip']; ?></textarea>
	</div>
	<div class="push_configtype_mip_2" <?php if($this->_var['push_configtype_mip']==1|| ! $this->_var['push_configtype_mip']): ?> style="display:none"<?php endif; ?>>
		<input name="con[push_configfile_mip]" readonly type="text" id="mipfile" value="<?php echo $this->_var['push_configfile_mip']; ?>" class="input" size="30"> 
		<button onclick="window.parent.select_file(document,'mipfile','push_config');" type="button" class="button">选择文件</button>
		<button onclick="review('mipfile');" type="button" class="button button_inverse">预览</button>
		<p>请先上传文件至 /temp/data/push_config 文件夹（不要用中文名），格式和编辑框模式一样</p>
	</div>
  </td>
</tr>
<tr class="tdbg tokentext">
  <td align="right" class="config_td_first">
	神马MIP推送token参数<br>(<font color="red">神马站长MIP中获取</font>)</td>
  <td>
	<div class="icheck_radios push_configtype">
		<label><input type="radio" dataid="push_configtype_smmip" name="con[push_configtype_smmip]" value="1"<?php if($this->_var['push_configtype_smmip']==1|| ! $this->_var['push_configtype_smmip']): ?> checked<?php endif; ?>>编辑框模式</label>
		<label><input type="radio" dataid="push_configtype_smmip" name="con[push_configtype_smmip]" value="2"<?php if($this->_var['push_configtype_smmip'] == 2): ?> checked<?php endif; ?>>文件模式</label>
		<span>数量少的用编辑框模式，<font color="red">超过1000个的请用文件模式</font></span>
	</div>
	<div class="push_configtype_smmip_1" <?php if($this->_var['push_configtype_smmip'] == 2): ?> style="display:none"<?php endif; ?>>
		每行一个，格式：<font color="green">site----user_name----token</font><br>
		<font>xxfseo.com----123@qq.com----e7c463e6ebd7e8ccddb8f6cc54898f13</font><br><textarea name="con[token_list_smmip]" type="text" style="height:150px;width:600px;"><?php echo $this->_var['token_list_smmip']; ?></textarea>
	</div>
	<div class="push_configtype_smmip_2" <?php if($this->_var['push_configtype_smmip']==1|| ! $this->_var['push_configtype_smmip']): ?> style="display:none"<?php endif; ?>>
		<input name="con[push_configfile_smmip]" readonly type="text" id="smmipfile" value="<?php echo $this->_var['push_configfile_smmip']; ?>" class="input" size="30"> 
		<button onclick="window.parent.select_file(document,'smmipfile','push_config');" type="button" class="button">选择文件</button>
		<button onclick="review('smmipfile');" type="button" class="button button_inverse">预览</button>
		<p>请先上传文件至 /temp/data/push_config 文件夹（不要用中文名），格式和编辑框模式一样</p>
	</div>
  </td>
</tr>
    <tr>
	  <td>&nbsp;</td>
      <td align="left"><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
    </tr>
	</table>
</form>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
$('.push_configtype input').on('ifChecked ifClicked', function(event){
	var classid=$(this).attr('dataid');
	if(this.value==1){
		$('.'+classid+'_1').show();$('.'+classid+'_2').hide();
	}else{
		$('.'+classid+'_2').show();$('.'+classid+'_1').hide();
	}
});
function review(fileid){
	var file=$('#'+fileid).val();
	if(file==""){
		showAlert('error','请先选择文件');
		return false;
	}
	top.art.dialog.open(file,{ lock:true,opacity:0.3,title:'文件预览',id:'reviewifrm',width:'700px',height:'500px'});
}
$("#dosave").click(function(){
	showDialog();
	$.ajax({
		type:"post",
		url:"<?php echo url('admin/push/update'); ?>",
		data:$("form").serialize(),
		dataType:'json',
		timeout:28000,
		global:false,
		success:function(data){
			if(data.status==1){
				showAlert('success','恭喜你，修改成功');
			}else{
				showAlert('error',data.info);
			}
		}
	});
 return false;
});
</script>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>