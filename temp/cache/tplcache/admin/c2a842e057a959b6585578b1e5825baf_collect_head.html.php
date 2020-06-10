<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><ul id="admin_sub_title">
	<li <?php if(ACTION_NAME == 'index'): ?>class="sub"<?php else: ?>class="unsub"<?php endif; ?>><a href="<?php echo url('admin/collect/index'); ?>">规则管理</a></li>
	<li <?php if(ACTION_NAME == 'edit'): ?>class="sub"<?php else: ?>class="unsub"<?php endif; ?>><a href="javascript:" onclick="addmodel();"><?php if($this->_var['id'] == 0): ?>添加<?php else: ?>编辑<?php endif; ?>规则</a></li>
	<li class="unsub"><a href="javascript:" onclick="nodeImport(0,'导入新规则');">导入规则</a></li>
</ul>
<script type="text/javascript">
function nodeImport(id){
	if(!id) id='';
	art.dialog.open('?admin-collect-import-id-'+id,{lock:true,title:'导入规则',id:'nodeTestifrm',width:'700px',height:'400px'});
}
function addmodel(){
	art.dialog({
		id:'ctype',
		lock:true,
		title:'选择规则类型',
		content:'规则类型：<select name="model" id="model"><option value="title">文章标题</option><option value="typename">子页标题</option><option value="pic">图片地址</option><option value="content">句子</option><option value="body">整篇内容</option></select>',
		ok: function(){
				var m=$("#model option:selected").val();
				if(m=='content'){
					m='body-split-1';
				}
				location.href="?admin-collect-edit-model-"+m;
			}
	});
	return false;
}
</script>