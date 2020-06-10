<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><style type="text/css">
.area {
    width: 1006px;
    margin: 0 auto 10px;
}
.title {
    padding: 5px 15px 4px;
    font-size: 12px;
    font-weight: normal;
    border-bottom: 1px solid #cccccc;
}
.friendLink {
    padding: 9px 0 0 14px;
}
.f5 {
    width: 100%;
    overflow: hidden;
    clear: both;
    padding-bottom: 10px;
    height: 40px;
}
.f5 li {
    float: left;
    line-height: 14px;
    padding: 8px 10px 0px;
    white-space: nowrap;
}
.f5 li a {
    color: #666666;
    float: left;
}
</style>
<div class="area cl">
  

  
  <div class="clear"> </div>
 



<div class="modl" style="width:1006px;">
    <div class="module_wrap">
      <div class="tab_foot">
        <div class="title"><strong>友情链接</strong></div>
        <div class="main_wrap friendLink">
          <ul class="cl">
          <div class="bn lk">
			<ul class="f5">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["976aaf4546ee96e17a6fa10824e3d0c5"]=$this->tag_block_loop(array('type'=>'domain',))){ foreach($this->_tags_data["976aaf4546ee96e17a6fa10824e3d0c5"] as $this->_var["k"]=>$this->_var["vo"]){ ?><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank"><?php echo $this->_var['vo']['title']; ?></a><?php }} ?>
 <?php if($this->_var['links_open']): ?>
	 <ul class="f5">
	   <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["65b2a1fa104e5a94754905a6ce126c2e"]=$this->tag_block_loop(array('type'=>'link',))){ foreach($this->_tags_data["65b2a1fa104e5a94754905a6ce126c2e"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank"><?php echo $this->_var['vo']['title']; ?></a></li>
	   <?php }} ?>
	   </ul>
	   <?php endif; ?>
                       </ul>
          </div>
          </ul>
          <div class="clear"> </div>

        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<div id="ft" class="wp cl">

<span >
版权声明:本站资源均来自互联网，如果侵犯了您的权益请与我们联系，我们将在24小时内删除。
</span>
<p >
           Copyright &copy; 2016 Powered by <a href="<?php echo $this->_var['thisurl']; ?>"><?php echo $this->_var['title']; ?></a>,<a href="<?php echo $this->_var['web_url']; ?>"><?php echo $this->_var['web_name']; ?></a>&nbsp;&nbsp;<?php echo $this->_var['web_tongji']; ?> <a href="http://<?php echo $this->_var['host']; ?>/sitemap.xml">sitemap</a>
</p>

</div>

<?php echo $this->_var['web_share']; ?>
<?php echo $this->_var['web_bdpush']; ?>
<span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});</script>

