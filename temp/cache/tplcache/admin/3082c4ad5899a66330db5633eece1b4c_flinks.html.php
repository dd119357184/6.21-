<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">友情链接设置</a></li>
</ul>
<style type="text/css">
.linksconfig dl {border: 1px dotted #ccc;background-color: #f8f8f8;float: left;width: 220px;padding: 10px;margin: 0 15px 15px 0;text-align: center;}
.linksconfig dl:hover{ border-color:#2288cc}
.linksconfig dt {padding: 8px 0;color: #555;}
.linksconfig dt p {padding-top: 5px;color: #555;text-align:left;line-height:20px;}
.linksconfig dt .title{ padding:0 0 10px 0;margin-bottom:5px;text-align: center;font-weight:bold;font-size:15px;border-bottom: 1px dotted #ccc;color:#222}
.linksconfig dd {color: #ccc;}
.linksconfig dl.default{ border-color:#ff6600;background-color:#fff9f0;}
</style>
<div id="admin_right_b">
<div class="divtips">
	<p>本功能可方便大家交换/出售链接使用，可自定义过期时间，域名，显示的页面</p>
</div>
<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i> 友情链接调用配置</td>
</tr>
<tr>
	<td colspan="5">
	<div class="linksconfig">
	<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<dl class="default">
        <dt>
			<p class="title"><?php echo $this->_var['vo']['name']; ?></p>
			<p>友链开关：<?php if($this->_var['vo']['open']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>调用条数：<b><?php echo $this->_var['vo']['show_num']; ?></b> 条</p>
			<p>友链条数：<b style="color:red"><?php echo empty($this->_var['vo']['flinks_num']) ? 0 : $this->_var['vo']['flinks_num']; ?></b> 条</p>
			<p>-----调用域名------<br><?php echo empty($this->_var['vo']['domain']) ? '未设置' : $this->_var['vo']['domain']; ?>...<br>-----------</p>
			<p>修改时间：<b><?php echo now_date_color($this->_var['vo']['addtime']); ?></b></p>
		</dt>
        <dd><a class="button button_small button_success" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');">修改</a>&nbsp;&nbsp;<a href="?admin-flinks-del-id-<?php echo $this->_var['vo']['id']; ?>" class="button button_small button_remove" onclick='return confirm("确定删除?删除后不可恢复!");'>删除</a></dd>
      </dl>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
	
	<dl>
		<dt>
			<p class="title">点击添加</p>
			<p>友链开关：----</p>
			<p>调用条数：----</p>
			<p>友链条数：----</p>
			<p>调用域名：----<br>----<br>----<br></p>
			<p>修改时间：----</p>
		</dt>
		<dd><a class="button button_small button_warning" href="javascript:" onclick="edit('0','添加调用配置');">点击添加</a></dd>
	  </dl>
	</div>
	</td>
</tr>
<tr>
      <td colspan="5" class="tdbg">
		<div class="divtips">
			<p>默认模板并未添加有友情链接的调用，如需调用，请修改模板加入调用标签。</p>
		</div>
		<div>
			<p>模板调用标签如下：<br>
				<font color="red">{<a></a>loop type="flink"}</font><br>
					<font color="blue">&lt;a href="{<a></a>$vo.url}"&gt;{<a></a>$vo.title}&lt;/a&gt;</font><br>
				<font color="red">{<a></a>/loop} </font>
			</p>
		</div>
	  </td>
	</tr>
</table>
<script type="text/javascript">
function edit(id,typename){
	var title=id?'修改':'添加';
	art.dialog.open('?admin-flinks-edit-id-'+id,{
		lock:true,opacity:0.3,title:title+'友情链接配置【'+typename+'】',id:'openifrm',width:'800px',height:'550px'});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>