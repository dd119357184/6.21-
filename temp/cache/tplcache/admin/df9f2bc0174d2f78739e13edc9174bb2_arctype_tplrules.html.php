<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">TKDB调用模板</a></li>
</ul>
<div id="admin_right_b">
<style type="text/css">
.boxlist dl{ width:120px;}
.boxlist dt p{ text-align:center;}
</style>
<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i>TKDB调用模板（一个模型一个设置） (<span class="tips" style="color:red">即：title、keywords、description、内容调用，注：如果模型未在这里建立内容模板，则使用默认模板</span>)</td>
</tr>
<tr>
	<td colspan="5">
	<div class="boxlist">
	<dl class="default">
		<dt><strong>默认的调用配置</strong><p>default</p></dt>
		<dd><a class="button button_small button_warning" href="javascript:" onclick="edit('default','默认的调用配置');">点击修改</a></dd>
	  </dl>
	<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<dl>
        <dt><strong><?php echo $this->_var['vo']['name']; ?></strong><p><?php echo $this->_var['vo']['dirname']; ?></p></dt>
        <dd><?php if($this->_var['vo']['isset']): ?><a class="button button_small button_success" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['dirname']; ?>','<?php echo $this->_var['vo']['name']; ?>');">修改</a>&nbsp;&nbsp;<a href="?admin-arctype-tplrules_del-dir-<?php echo $this->_var['vo']['dirname']; ?>" class="button button_small button_remove" onclick='return confirm("确定清除该配置？!");'>清除</a><?php else: ?><a class="button button_small" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['dirname']; ?>','<?php echo $this->_var['vo']['name']; ?>');">未设置，点击设置</a><?php endif; ?></dd>
      </dl>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?></div>
	</td>
</tr>
</table>
<script type="text/javascript">
function edit(id,typename){
	var title=id?'修改':'添加';
	art.dialog.open('?admin-arctype-tplrules_edit-dir-'+id,{
		lock:true,opacity:0.3,title:title+'内容调用模板【'+typename+'】',id:'openifrm',width:'850px',height:'520px',close: function () {
		window.location.reload();
	}});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>