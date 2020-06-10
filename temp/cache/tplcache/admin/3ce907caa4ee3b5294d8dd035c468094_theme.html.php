<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:" onClick="selectTab('config0',this)">电脑模板(<?php echo $this->_var['total_pc']; ?>)</a></li>
	<li class="unsub"><a href="javascript:" id="mtab" onClick="selectTab('config1',this)">手机模板(<?php echo $this->_var['total_mobile']; ?>)</a></li>
	<li class="unsub"><a href="javascript:" id="miptab" onClick="selectTab('config2',this)">MIP模板(<?php echo $this->_var['total_mip']; ?>)</a></li>
	<span class='tips'>全部共有<?php echo $this->_var['total']; ?>套模板</span>
</ul>
<style type="text/css">
.list img{ border:1px solid #eee;height:120px;width:160px}
.list img.mobile{ height:220px;}
.list li{ float:left;margin:10px;background:#f8f8f8;padding:10px;border-right:1px dotted #ccc;}
.list p{ margin-bottom:5px;padding-bottom:5px;position: relative;}
.list .name{ border-bottom:1px dotted #bbb;text-align:center;}
.returnmsg{ color:red}
.theme_name {
    padding: 2px 4px;
    color: #fff;
    background-color: #555;
    border-radius: 4px;
	position: absolute;
    right: 6px;
    bottom: 6px;
	opacity: 0.8;
}
</style>
<script type="text/javascript">
function search_tpl(){
	art.dialog({
		lock:true,
		title:'查询网站绑定的模板小工具',
		content:'网站地址：<input name="domainstr" type="text" class="input" size="30" id="domainstr" value="http://www.xxfseo.com" /><br><br>所属模型：<select name="dirname" id="dirname"><?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?><option value="<?php echo $this->_var['vo']['dirname']; ?>"><?php echo $this->_var['vo']['name']; ?></option><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
	  </select>',
		ok: function(){
			if($('#domainstr').val()!=''){
				var url="?admin-theme-search_tpl-dirname-"+$('#dirname').val()+"-url-"+encodeURIComponent($('#domainstr').val());
				top.art.dialog.open(url,{ lock:true,title:'查询结果',id:'xxxtifrm',width:'500px'});
			}
		}
	});
}
</script>
<div id="admin_right_b" style="margin-top: -1px;">
<div class="divtips">注：未绑定模板的域名将会随机调用，支持泛域名绑定，如: *.abc.com，<b>注：域名必须是对应模型下的才有效</b> 
	<button type="button" class="button button_primary button_small" onClick="search_tpl();"><i class="typcn typcn-zoom-in"></i>查询网站模板</button></div>
<div id="config0">
<ul class="classlist">
<li <?php if($this->_var['type'] == ''): ?>class="cur"<?php endif; ?>><a href="?admin-theme-index-mtype-pc">全部分类</a></li>
<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<li <?php if($this->_var['type'] == $this->_var['vo']['dirname']): ?>class="cur"<?php endif; ?>><a href="?admin-theme-index-type-<?php echo $this->_var['vo']['dirname']; ?>-mtype-pc"><?php echo $this->_var['vo']['name']; ?>(<b><?php echo empty($this->_var['vo']['num_pc']) ? 0 : $this->_var['vo']['num_pc']; ?></b>)</a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
</ul>
<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i> 电脑模板列表 ( <font color="red">模板路径: template/模型文件夹/ </font> )</td>
</tr>
<tr>
	<td colspan="5">
	<div class="list">
	<?php $_from=$this->_var['pclist']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<form action="?admin-theme-update_config-mtype-pc" method="post">
	<input type="hidden" name="id" value="<?php echo $this->_var['vo']['dir']; ?>" />
	<li>
		<p class="picbox"><img src="<?php echo $this->_var['vo']['pic']; ?>"><font  class="theme_name"><?php echo $this->_var['vo']['typename']; ?></font></p>
		<p class="name"><font color="blue"><?php echo $this->_var['vo']['name']; ?></font></p>
		<p>绑定域名(一行一个)：</p>
		<p><textarea style="width:150px;height:100px;overflow:auto;" wrap="off" name="domain"><?php echo $this->_var['vo']['domain']; ?></textarea></p>
		<p><button type="button" class="button sbtn">保存</button> <span class="returnmsg"></span></p>
	</li></form>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?></div>
	</td>
</tr>
</table>
</div>

<div id="config1" style="display:none">
<ul class="classlist">
<li <?php if($this->_var['type'] == ''): ?>class="cur"<?php endif; ?>><a href="?admin-theme-index-mtype-mobile">全部分类</a></li>
<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<li <?php if($this->_var['type'] == $this->_var['vo']['dirname']): ?>class="cur"<?php endif; ?>><a href="?admin-theme-index-type-<?php echo $this->_var['vo']['dirname']; ?>-mtype-mobile"><?php echo $this->_var['vo']['name']; ?>(<b><?php echo empty($this->_var['vo']['num_mobile']) ? 0 : $this->_var['vo']['num_mobile']; ?></b>)</a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
</ul>
<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i> 手机模板列表 ( <font color="red">模板路径: template/模型文件夹_mobile/ </font> )</td>
</tr>
<tr>
	<td colspan="5">
	<div class="list">
	<?php $_from=$this->_var['mlist']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<form action="?admin-theme-update_config" method="post">
	<input type="hidden" name="id" value="<?php echo $this->_var['vo']['dir']; ?>" />
	<li>
		<p class="picbox"><img src="<?php echo $this->_var['vo']['pic']; ?>" class="mobile"><font  class="theme_name"><?php echo $this->_var['vo']['typename']; ?></font></p>
		<p class="name"><font color="blue"><?php echo $this->_var['vo']['name']; ?></font></p>
		<p>绑定域名(一行一个)：</p>
		<p><textarea style="width:150px;height:100px;overflow:auto;" wrap="off" name="domain"><?php echo $this->_var['vo']['domain']; ?></textarea></p>
		<p><button type="button" class="button sbtn">保存</button> <span class="returnmsg"></span></p>
	</li></form>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?></div>
	</td>
</tr>
</table>
</div>

<div id="config2" style="display:none">
<ul class="classlist">
<li <?php if($this->_var['type'] == ''): ?>class="cur"<?php endif; ?>><a href="?admin-theme-index-mtype-mip">全部分类</a></li>
<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<li <?php if($this->_var['type'] == $this->_var['vo']['dirname']): ?>class="cur"<?php endif; ?>><a href="?admin-theme-index-type-<?php echo $this->_var['vo']['dirname']; ?>-mtype-mip"><?php echo $this->_var['vo']['name']; ?>(<b><?php echo empty($this->_var['vo']['num_mip']) ? 0 : $this->_var['vo']['num_mip']; ?></b>)</a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
</ul>
<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i> MIP模板列表 ( <font color="red">模板路径: template/模型文件夹_mip/ </font> )</td>
</tr>
<tr>
	<td colspan="5">
	<div class="list">
	<?php $_from=$this->_var['miplist']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<form action="?admin-theme-update_config" method="post">
	<input type="hidden" name="id" value="<?php echo $this->_var['vo']['dir']; ?>" />
	<li>
		<p class="picbox"><img src="<?php echo $this->_var['vo']['pic']; ?>" class="mobile"><font  class="theme_name"><?php echo $this->_var['vo']['typename']; ?></font></p>
		<p class="name"><font color="blue"><?php echo $this->_var['vo']['name']; ?></font></p>
		<p>绑定域名(一行一个)：</p>
		<p><textarea style="width:150px;height:100px;overflow:auto;" wrap="off" name="domain"><?php echo $this->_var['vo']['domain']; ?></textarea></p>
		<p><button type="button" class="button sbtn">保存</button> <span class="returnmsg"></span></p>
	</li></form>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?></div>
	</td>
</tr>
</table>
</div>
<?php if($this->_var['mtype'] == 'mobile'): ?><script type="text/javascript">$('#mtab')[0].click();</script><?php endif; ?>
<?php if($this->_var['mtype'] == 'mip'): ?><script type="text/javascript">$('#miptab')[0].click();</script><?php endif; ?>
<script>
$(function() {
	$(".sbtn").click(function(){
		var _this=this;
		$(_this).html('正在保存...').attr('disabled',true);
		var $form=$(_this).parents('form');
		$.ajax({
			type: "POST",
			dataType: "html",
			url: $form.attr('action'),
			data: $form.serialize(),
			success: function (d) {
				$(_this).html('保存').attr('disabled',false);
				$('.returnmsg',$form).html(d).show().fadeOut(2000);
			}
		});
	});
});
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>