<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a>网站管理</a></li>
	<li class="unsub"><a href="javascript:" onclick="edit(0);">添加网站</a></li>
</ul>

<div id="admin_right_b">
	
  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
   <form method="post"> 
	<tr>
	  <td width="30" align='center' class="title_bg">id</td>
	  <td width="100" align='center' class="title_bg">分组名称</td>
	  <td width="60" align='center' class="title_bg">所属模型</td>
      <td width="120" class="title_bg">域名</td>
	  <td width="60" align='center' class="title_bg">文件夹</td>
	  <td width="60" align='center' class="title_bg">网站模式</td>
	  <td width="70" align='center' class="title_bg">内容模式</td>
	  <td width="60" align='center' class="title_bg">URL模式</td>
	  <td width="70" align='center' class="title_bg">手机版</td>
	  <td width="70" align='center' class="title_bg">MIP站点</td>
	  <td width="60" align='center' class="title_bg">域名数量</td>
	  <td width="50" align='center' class="title_bg">关键词</td>
	  <td width="50" align='center' class="title_bg">外链</td>
	  <td width="60" align='center' class="title_bg">域名前缀</td>
	  <td width="100" align='center' class="title_bg">修改时间</td>
      <td width="100" align='center' class="title_bg">管理</td>
	  <td class="title_bg">&nbsp;</td>
    </tr>
	<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td align="center" height="25"><?php echo $this->_var['vo']['id']; ?></td>
	  <td align="center"><a href="javascript:" onclick="edit(<?php echo $this->_var['vo']['id']; ?>);" title="点击修改"><?php echo $this->_var['vo']['name']; ?></a></td>
	  <td align="center"><?php echo $this->_var['vo']['typename']; ?></td>
	  <td>&nbsp;&nbsp;<a href="javascript:" onclick="edit(<?php echo $this->_var['vo']['id']; ?>);" title="点击修改"><?php echo $this->_var['vo']['domain']; ?></a></td>
	  <td align="center"><?php echo $this->_var['vo']['dirname']; ?></td>
	  <td align="center"><?php if($this->_var['vo']['domain_mod'] == 2): ?>单域名<?php else: ?>泛域名<?php endif; ?></td>
	  <td align="center"><font color="green"><?php if($this->_var['vo']['bodytype'] == 2): ?>句子拼凑<?php else: ?>文章库内容<?php endif; ?></font></td>
	  <td align="center"><?php if($this->_var['vo']['urltype'] == 1): ?>随机模式<?php else: ?>固定模式<?php endif; ?><?php if($this->_var['vo']['urlrules_cache'] == '0'): ?>(不缓存)<?php else: ?>(缓存)<?php endif; ?></td>
	   <td align="center"><?php if($this->_var['vo']['mobile_open']): ?><font color="green">开启</font><?php else: ?>关闭<?php endif; ?></td>
	   <td align="center"><?php if($this->_var['vo']['mip_open']): ?><font color="green">是</font><?php else: ?>否<?php endif; ?></td>
	  <td align="center"><b class="red"><?php echo $this->_var['vo']['domain_num']; ?></b></td>
	  <td align="center"><?php echo $this->_var['vo']['haskeywords']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['haslink']; ?></td>
	  <td align="center"><?php if($this->_var['vo']['prefix_type']): ?>自定义<?php else: ?><font class="c9">自动生成</font><?php endif; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['addtime']; ?></td>
	  <td align="center"><a href="javascript:" onclick="edit(<?php echo $this->_var['vo']['id']; ?>);" class="button button_small">修改</a> <a href="?admin-domain-del-id-<?php echo $this->_var['vo']['id']; ?>" onclick='return confirm("确定删除?删除后不可恢复!");' class="button button_small button_remove">删除</a></td>
	  <td align="center">&nbsp;</td>
	 </tr>
	<?php endforeach; else: ?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
		<td align="center" colspan='17' height="25">请先添加网站分组！</td>
	</tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	</form>
	<tr>
		  <td colspan="17" class="tdbg" style="padding:20px 0;">
		  <span class="right"></span>&nbsp;&nbsp;
		  <button type="button" class="button button_inverse" onClick="tiqu();"><i class="typcn typcn-link"></i>全站链接提取</button>
	</td>
    </tr>
  </table>
<script type="text/javascript">
function tiqu(){
	art.dialog({
		lock:true,
		title:'全站链接提取工具',
		content:'每个域名提取数量：<input name="num" type="text" class="input" size="3" id="num" value="10" />',
		ok: function(){
			if($('#num').val()!=''){
				var url="?g=plus&m=url&a=index&num="+$('#num').val();
				var win = window.open(url);
				if(win==null){
					top.location.href=url;
				}
			}
		}
	});
}
</script>
<div class="divtips" style="font-size:13px;margin-top:10px;">
	<p>提示：</p>
	<p>网站分组管理，可以个性化每个网站的风格、内容、站点模式、关键词、外链等</p>
	<p>关键词、内容优化、外链是基于网站分组进行管理</p>
	<p><b>这里关键词、外链显示为 无 时，表示该分组未上传有文件，全局的和这里无关</b></p>
</div>
<div class="runtime"></div>  
</div>
<script type="text/javascript">

function edit(id){
	var title=id?'修改':'添加';
	art.dialog.open('?admin-domain-edit-id-'+id,{
		lock:true,opacity:0.3,title:title+'网站',id:'openifrm',width:'660px',height:'530px'});
}
</script>
</body>
</html>