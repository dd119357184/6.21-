<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<form method="post">
<input type="hidden" name="r[id]" value="<?php echo empty($this->_var['id']) ? 0 : $this->_var['id']; ?>">
<table border="0" cellpadding="8" cellspacing="0" class="tableConfig">
<tr>
      <td width="100" align="right" class="config_td_first">配置名称：</td>
      <td class="tdbg" colspan="4"><input name="r[name]" type="text" value="<?php echo $this->_var['name']; ?>" class="input" size="20"> <font color="#ff3300">*</font> 给本配置起个名字</td>
    </tr>
<tr>
	<td width="120" align="right" class="config_td_first">友链开关：</td>
	<td class="icheck_radios"><label><input type="radio" name="r[open]" value="1" <?php if($this->_var['open']): ?> checked<?php endif; ?>>开启</label>
	<label><input type="radio" name="r[open]" value="0" <?php if(! $this->_var['open']): ?> checked<?php endif; ?>>关闭</label>
	</td>
</tr>
<tr>
	<td width="120" align="right" class="config_td_first">页面显示：</td>
	<td class="icheck_radios"><label><input type="radio" name="r[show_page]" value="index" <?php if($this->_var['show_page']=='index'|| ! $this->_var['show_page']): ?> checked<?php endif; ?>>仅首页</label>
	<label><input type="radio" name="r[show_page]" value="all" <?php if($this->_var['show_page'] == 'all'): ?> checked<?php endif; ?>>首页和内页</label>
	</td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">友链调用条数：</td>
  <td class="tdbg"><input name="r[show_num]" type="text" class="input" value="<?php echo empty($this->_var['show_num']) ? 10 : $this->_var['show_num']; ?>" size="12">
  <span class="tips">当小于链接数量时，随机取链接显示</span>
  </td>
</tr>
<tr>
	 <td align="right" class="config_td_first">开启调用的域名：<br><br>一行一个，支持泛域名<br><font color="red">a.com<br>*.a.com</font><br></td>
	  <td><textarea name="domain" id="text" type="text" style="height:120px;width:250px;"><?php echo $this->_var['domain']; ?></textarea></td>
	</tr>
<tr>
	 <td align="left" class="config_td_first">友链URL(一行一个)：<br><br>格式：<br><font color="red">url地址#描文本#过期时间</font><br><br>如：<br>http://a.com/<font color="red">#</font>百度<font color="red">#</font>2019-10-11</td>
	  <td><textarea name="flinkstr" id="text" type="text" style="height:165px;width:550px;"><?php echo $this->_var['flinkstr']; ?></textarea></td>
	</tr>
<tr class="tdbg">
	  <td>&nbsp;</td>
      <td><button type="submit" id="savec" class="button">保存设置</button></td>
    </tr>
</table>
</form>
<script type="text/javascript">
$("#savec").click(function(){
	$(this).html('正在保存...');
	$.ajax({
		type:"post",
		url:"?admin-flinks-update",
		data:$("form").serialize(),
		dataType:'json',
		timeout:28000,
		global:false,
		success:function(data){
			if(data.status==1){
				showAlert('success',data.info);
				setTimeout(function(){ var win = art.dialog.open.origin;win.location.reload(); top.art.dialog.list['openifrm'].close(); },2000);
			}else{
				showAlert('error',data.info);
			}
		}
	});
 return false;
});
</script>
</body>
</html>