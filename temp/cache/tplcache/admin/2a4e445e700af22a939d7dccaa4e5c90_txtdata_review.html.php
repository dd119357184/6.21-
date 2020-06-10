<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<div style="padding:0 10px 10px 10px;">
	<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig">
		<tr>
			<td align="right" width="130" class="config_td_first">文件：</td>
			<td><?php echo $this->_var['file']; ?></td>
		</tr>
		<tr>
		  <td align="right" class="config_td_first">前<?php echo $this->_var['linenum']; ?>条预览：</td>
		  <td><div style="max-height:400px;overflow:auto;background:#eee;max-width: 550px;">
					<pre style="padding:0 10px;margin:0"><?php echo htmlspecialchars($this->_var['txt_data']); ?></pre>
				  </div>
			</td>
		</tr>
	</table>
</div>