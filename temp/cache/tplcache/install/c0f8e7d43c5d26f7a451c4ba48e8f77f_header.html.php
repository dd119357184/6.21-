<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?>
<div class="header">
	<div class="logo"><?php echo $this->_var['cms_name']; ?> <span>x<?php echo $this->_var['cms_version']; ?></span></div>
	<div class="step">
		<div class="line"></div>
		<ul class="step_num">
		    <li class="<?php if($this->_var['setupclass'] == 'setup'): ?>current<?php endif; ?>"><span class="num">1</span><p class="name">阅读安装协议</p></li>
			<li class="<?php if($this->_var['setupclass'] == 'setup2'): ?>current<?php endif; ?>"><span class="num">2</span><p class="name">检测安装环境</p></li>
			<li class="<?php if($this->_var['setupclass'] == 'setup3'): ?>current<?php endif; ?>"><span class="num">3</span><p class="name">网站信息配置</p></li>
			<li class="<?php if($this->_var['setupclass'] == 'setup4'): ?>current<?php endif; ?>"><span class="num">4</span><p class="name">开始安装</p></li>
		</ul>
	</div>
</div>