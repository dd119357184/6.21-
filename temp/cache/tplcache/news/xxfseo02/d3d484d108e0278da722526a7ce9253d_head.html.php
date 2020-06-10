<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="toptb"><script type="text/javascript">var _speedMark = new Date();</script></div><div id="hd">

<div class="wp">

<div class="hdc cl"><div class="logo"><h1 ><a href="<?php echo $this->_var['web_url']; ?>"><img src="/uploads/images/logo.png?n=<?php echo $this->_var['encode_name']; ?>&w=220"></a></h1></div>

                    <div id="scbar" class="cl">
<form name="formsearch" method="post" action="<?php echo $this->_var['web_path']; ?>" target="_blank">

<table cellspacing="0" cellpadding="0">
<tr>
<td class="scbar_icon_td"></td>
                <td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="showmenu xg1 xs2" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>
<td class="scbar_txt_td"><input type="text" name="q" id="scbar_txt" value="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"><strong class="hui">搜 索</strong></button></td>

</tr>
</table>
</form>
</div>
<script type="text/javascript">
initSearchmenu('scbar', '');
</script>
                    <div id="um" style="padding-right:0px;">
                    </div>
</div>
</div>
<div class="mainNavBox">
<div class="mainNav">
<div class="Nav">
  <a class="sel" href="/">首页</A>
      	<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["867bd280726de8047c6e64bfd2578026"]=$this->tag_block_menu(array('row'=>'10',))){ foreach($this->_tags_data["867bd280726de8047c6e64bfd2578026"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      	<a href='<?php echo $this->_var['vo']['typeurl']; ?>' <?php echo $this->_var['vo']['rel']; ?>><?php echo $this->_var['vo']['typename']; ?></a>
      	<?php }} ?>

</div>
 
<div class="clear"></DIV></DIV>
</DIV>
</div>
