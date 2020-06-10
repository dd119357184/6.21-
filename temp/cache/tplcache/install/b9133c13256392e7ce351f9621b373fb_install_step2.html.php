<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>运行环境检测 - <?php echo $this->_var['cms_name']; ?> x<?php echo $this->_var['cms_version']; ?></title>
<script type="text/javascript" src="static/js/jquery.js"></script>
<link href="<?php echo $this->_var['theme_path']; ?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<?php echo $this->fetch('header.html'); ?>
<div class="tips_box">
	<div class="tips_txt">
<p>程序运行需要的环境：PHP: 5.2 ~ 7.2</p>
<p>推荐使用 Linux+ PHP7.2</p>
<p>注：linux环境下时，文件所属用户组不能是root</p>
</div>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tablebox">
<tr class="head_bg">
	<td colspan="3" align="left">服务器环境检测：</td>
</tr>
<tr>
	<td>检测项目</td>
	<td>最低要求</td>
	<td>当前环境检测</td>
</tr>
<tr>
    <td>操作系统</td>
    <td>不限制</td>
    <td><span class="isgood">✔</span></td>
  </tr>
  <tr>
    <td>PHP 版本</td>
    <td>php5.2 ~ php7.2</td>
    <td><?php echo PHP_VERSION;?>（
<?php if(version_compare ( PHP_VERSION , '5.2.0' , '>=' ) && version_compare ( PHP_VERSION , '7.3.0' , '<' )): ?><span class="isgood">✔</span><?php else: ?><span class="hasw">✘</span><?php endif; ?>）</td>
  </tr>
  <tr>
    <td>数据库</td>
    <td>不需要</td>
    <td><span class="isgood">✔</span></td>
  </tr>
  <tr>
    <td>memory_limit</td>
    <td>>=128M</td>
    <td><?php if($this->_var['memory_limit']): ?><span class="isgood">✔</span><?php else: ?><span class="hasw">✘</span><?php endif; ?></td>
  </tr>
  <tr>
    <td>allow_url_fopen</td>
    <td><span class="isgood">✔</span></td>
    <td><?php if($this->_var['allow_url_fopen']): ?><span class="isgood">✔</span><?php else: ?><span class="hasw">✘</span><?php endif; ?></td>
  </tr>
  <tr>
    <td>mbstring</td>
    <td><span class="isgood">✔</span></td>
    <td><?php if($this->_var['mbstring']): ?><span class="isgood">✔</span><?php else: ?><span class="hasw">✘</span><?php endif; ?></td>
  </tr>
  <tr>
    <td>iconv</td>
    <td><span class="isgood">✔</span></td>
    <td><?php if($this->_var['iconv']): ?><span class="isgood">✔</span><?php else: ?><span class="hasw">✘</span><?php endif; ?></td>
  </tr>
  <tr>
    <td>采集函数</td>
    <td><span class="isgood">✔</span></td>
    <td><?php if($this->_var['fetch_mode']): ?><span class="isgood">✔</span><?php else: ?><span class="hasw">✘</span><?php endif; ?></td>
  </tr>
<tr class="head_bg">
	<td colspan="3" align="left">目录、文件权限检查：</td>
</tr>
<tr>
    <td>目录文件</td>
    <td>所需状态</td>
    <td>当前状态</td>
  </tr>
<?php $_from=$this->_var['testlist']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
<tr>
<td><?php echo $this->_var['vo']['path']; ?></td>
<td><span class="isgood">✔</span>读<span class="isgood">✔</span>写</td>
<td><?php if($this->_var['vo']['isread']): ?><span class="isgood">✔</span>读<?php else: ?><span class="hasw">✘</span>读<?php endif; ?>&nbsp;&nbsp;<?php if($this->_var['vo']['iswrite']): ?><span class="isgood">✔</span>写<?php else: ?><span class="hasw">✘</span>写<?php endif; ?></td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
</table>
<div class="btn_wrap">
	<input name="" type="button" class="next_btn" value="下一步" onclick="document.getElementsByClassName('hasw').length>0?alert('环境检测必须全部通过才能安装！'): location.href='/?install-step3';" />
	<input name="" type="button" class="prev_btn" value="上一步" onclick="history.go(-1);" />
	<div class="cl"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>