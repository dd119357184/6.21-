<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">扫描本地图片</a></li>
	<li class="tips"></li>
</ul>
<div id="admin_right_b">
<form method="post">
<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig">
<tbody>
<tr>
  <td align="right" width="150">功能说明：</td>
  <td>
	<div style="color:red">扫描本地文件夹的图片，然后将地址写入图片链接库里。</div>
  </td>
</tr>
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 扫描设置</td>
	<td></td>
</tr>
<tr>
  <td align="right" class="config_td_first">扫描路径：</td>
  <td><?php echo $this->_var['rootpath']; ?><input name="dirname" type="text" id="dirname" style="text-align:left" class="input" value="" size="30"> 填写你的图片文件夹路径</td>
</tr>
<tr>
	<td align="right">网站分类：</td> 
	<td align="left"><select name="typedir" id="typedir">
	<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
		<option value="<?php echo $this->_var['vo']['dirname']; ?>"><?php echo $this->_var['vo']['name']; ?></option>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
		</select>
	</td>
</tr>
<tr>
  <td align="right" class="config_td_first">保存文件名：</td>
  <td><input name="filename" type="text" id="filename" style="text-align:right" class="input" value="s<?php echo date('Y-m-d'); ?>" size="10"> .txt，不用加后缀. 文件将会保存在对应分类的图片库，<font color="red">如果已存在的文件将被覆盖</font></td>
</tr>
<tr>
  <td align="right"></td>
  <td><button type="button" id="ssbtn" class="button">开始扫描</button> <span class="returnmsg"></span></td>
</tr>
</tbody>
</table>
</form>
<div class="runtime"></div>  
</div>
<style type="text/css">
.returnmsg{ color:red}
</style>
<script type="text/javascript">
$("#ssbtn").click(function(){
	var _this=this;
	$(_this).html('正在扫描...').attr('disabled',true);
	$('.returnmsg').html('');
	check_status();
	$.ajax({
		type: "POST",
		dataType: "html",
		url: '<?php echo url('admin/tools/scanpic'); ?>',
		data:$("form").serialize(),
		success: function (d) {
			$(_this).html('开始扫描').attr('disabled',false);
			$('.returnmsg').html(d).show();
		}
	});
});
function check_status(){
	$.ajax({
		dataType: "html",
		url: '<?php echo url('admin/tools/scanpic?ac=check'); ?>',
		success: function (d) {
			if(d=='ok'){
				return false;
			}else if(d){
				$('.returnmsg').html(d).show();
			}
			setTimeout(function(){ check_status(); },500);
		}
	});
}
</script>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>