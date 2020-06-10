<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['toptitle']; ?></title>
<meta name="description" content="<?php echo $this->_var['description']; ?>" />
<meta name="keywords" content="<?php echo $this->_var['keywords']; ?>" />
<link href="<?php echo $this->_var['theme_path']; ?>/data/cache/style_11_common.css" rel="stylesheet" media="screen" type="text/css" />
<link href="<?php echo $this->_var['theme_path']; ?>/data/cache/style_11_portal_index.css" rel="stylesheet" media="screen" type="text/css" />
<script src="<?php echo $this->_var['theme_path']; ?>/static/js/common.js" type="text/javascript"></script>
</head>
<body>
<?php echo $this->fetch('head.html'); ?>

<div class="moke-main2">



<div class="area cl">
  
  
  <div class="modxt reNews">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?><div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list8 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><p class="p1"><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>"><?php echo $this->_var['vo']['title']; ?></a></p><span class="s1 color"><?php echo $this->_var['postdate']; ?> </span></li>
      <?php }} ?>
     </ul>
    </div>
</div>

  
<div class="modxt reNews ml10">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list8 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><p class="p1"><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>"><?php echo $this->_var['vo']['title']; ?></a></p><span class="s1 color"><?php echo $this->_var['postdate']; ?></span></li>
      <?php }} ?>
     </ul>
    </div>
</div>
  

  
  

<div class="modr reNews">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list30 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["2d495707c30fb0756455126765588124"]=$this->tag_block_loop(array('type'=>'link','row'=>'10',))){ foreach($this->_tags_data["2d495707c30fb0756455126765588124"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>" style=" display:inline-block;width:226px;"><?php echo $this->_var['vo']['title']; ?></a><span style=" position:relative;display:inline-block; width:30px; *margin-top:-3px;"><?php echo $this->_var['postdate']; ?></span></li>
      <?php }} ?>
     </ul>
    </div>
</div>


</div>

<div class="area cl">
  
  
  <div class="modxt reNews">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list8 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><p class="p1"><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>"><?php echo $this->_var['vo']['title']; ?></a></p><span class="s1 color"><?php echo $this->_var['postdate']; ?> </span></li>
      <?php }} ?>
     </ul>
    </div>
</div>

  
<div class="modxt reNews ml10">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list8 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><p class="p1"><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>"><?php echo $this->_var['vo']['title']; ?></a></p><span class="s1 color"><?php echo $this->_var['postdate']; ?></span></li>
      <?php }} ?>
     </ul>
    </div>
</div>
  

  
  

<div class="modr reNews">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list30 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>" style=" display:inline-block;width:226px;"><?php echo $this->_var['vo']['title']; ?></a><span style=" position:relative;display:inline-block; width:30px; *margin-top:-3px;"><?php echo $this->_var['postdate']; ?></span></li>
      <?php }} ?>
     </ul>
    </div>
</div>


</div>
<div class="area cl">
  
  
  <div class="modxt reNews">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list8 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><p class="p1"><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>"><?php echo $this->_var['vo']['title']; ?></a></p><span class="s1 color"><?php echo $this->_var['postdate']; ?> </span></li>
      <?php }} ?>
     </ul>
    </div>
</div>

  
<div class="modxt reNews ml10">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list8 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><p class="p1"><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>"><?php echo $this->_var['vo']['title']; ?></a></p><span class="s1 color"><?php echo $this->_var['postdate']; ?></span></li>
      <?php }} ?>
     </ul>
    </div>
</div>
  

  
  

<div class="modr reNews">
    <?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["0555f103940f017c57c2edd16d374bba"]=$this->tag_block_loop(array('type'=>'typename','row'=>'1',))){ foreach($this->_tags_data["0555f103940f017c57c2edd16d374bba"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
      <div class="title"><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"  class="fr">更多</a><a target="_blank" href="<?php echo $this->_var['vo']['typeurl']; ?>"><strong><?php echo $this->_var['vo']['typename']; ?></strong></a><?php }} ?></div>
    <div class="inner">
      <ul class="list30 cl">
<?php if(!isset($this->_tags_data)){ $this->_tags_data=array(); } if($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"]=$this->tag_block_loop(array('type'=>'arclist','row'=>'10',))){ foreach($this->_tags_data["c662f9ec573bece546fa5b528c0cfc51"] as $this->_var["k"]=>$this->_var["vo"]){ ?>
       <li ><a href="<?php echo $this->_var['vo']['url']; ?>" target="_blank" title="<?php echo $this->_var['vo']['title']; ?>" style=" display:inline-block;width:226px;"><?php echo $this->_var['vo']['title']; ?></a><span style=" position:relative;display:inline-block; width:30px; *margin-top:-3px;"><?php echo $this->_var['postdate']; ?></span></li>
      <?php }} ?>
     </ul>
    </div>
</div>


</div>




<?php echo $this->fetch('footer.html'); ?>

</body>
</html>