<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">屏蔽IP访问</a></li>
</ul>
<div id="admin_right_b">
<form method="post">
<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig">
<tr>
  <td align="right" width="200">功能说明：</td>
  <td>
	<div style="color:red">设置的指定IP范围将会被禁止访问</div>
  </td>
</tr>
<tr>
	<td align="right">屏蔽IP开关：</td>
	<td class="icheck_radios">
		<label><input type="radio" name="con[web_banip]" value="1"<?php if($this->_var['web_banip']): ?> checked<?php endif; ?>>开启</label>
		<label><input type="radio" name="con[web_banip]" value="0"<?php if(! $this->_var['web_banip']): ?> checked<?php endif; ?>>关闭</label>
	</td>
</tr>
<tr class="list">
  <td align="right">
	每行一个IP地址/(C段)<br>可使用星号通配符<font color=red>*</font><br><br>
	支持的格式如下：<br><br>
	<font>192.168.1.100<br>
	192.168.<font color='red'>*</font>.100<br>
	192.168.1.1<font color='red'>~</font>192.168.1.100</font></td>
  <td><textarea name="con[web_banip_list]" type="text" style="height:350px;width:400px;"><?php echo $this->_var['web_banip_list']; ?></textarea></td>
</tr>

    <tr >
	  <td>&nbsp;</td>
      <td align="left"><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
    </tr>
	</table>
</form>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
$("#dosave").click(function(){
	showDialog();
	$.ajax({
		type:"post",
		url:"<?php echo url('admin/banip/update'); ?>",
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