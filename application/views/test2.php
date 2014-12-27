<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "style/css/imgareaselect-default.css"; ?>" />
-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "style/css/imgareaselect-animated.css"; ?>" />
<title>imgareaselect</title>
<style type="text/css">
<!--
.pic1{ width:948px; height:100px; border:1px dashed #000; background:url(pic.jpg) no-repeat left top;}
.pic2 img{ border:solid 1px;}
.div{ margin:0 auto;width:90%;} 
-->
</style>
</head>
<body>
<script type="text/javascript" src="<?php echo base_url(). "style/scripts/jquery.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(). "style/scripts/jquery.imgareaselect.pack.js"; ?>"></script>

<script type="text/javascript">
function preview(img, selection) {
    if (!selection.width || !selection.height)
        return;
    
    var scaleX = 100 / selection.width;
    var scaleY = 100 / selection.height;

    $('#preview img').css({
        width: Math.round(scaleX * 300),
        height: Math.round(scaleY * 300),
        marginLeft: -Math.round(scaleX * selection.x1),
        marginTop: -Math.round(scaleY * selection.y1)
    });
	var scaleZ = <?php echo $scaleZ;?>;
    $('#x1').val(Math.floor(selection.x1 * scaleZ));
    $('#y1').val(Math.floor(selection.y1 * scaleZ));
    $('#x2').val(Math.floor(selection.x2 * scaleZ));
    $('#y2').val(Math.floor(selection.y2 * scaleZ));
    $('#w').val(Math.floor(selection.width * scaleZ));
    $('#h').val(Math.floor(selection.height * scaleZ));    
}

$(function () {
    $('#photo').imgAreaSelect({ handles: true, fadeSpeed: 200, onSelectChange: preview });
});
</script>

<div class="div">
  <div style="float: left; width: 65%;">
    <p class="instructions">
      	在图片上点击并选择一个矩形区域
    </p>
 
    <div style="margin: 0 0.3em; width: 600px; height: 300px;">
      <img id="photo" src="<?php echo $url;?>" style="width: <?php echo $width;?>px;"/>
    </div>
  </div>
 
  <div style="float: left; width: 35%;">
    <table style="margin-top: 1em;">
      <thead>
        <tr>
          <th colspan="2" style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;">
                                坐标
          </th>
          <th colspan="2" style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;">
                               尺寸
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 10%;"><b>X<sub>1</sub>:</b></td>
 		      <td style="width: 30%;"><input type="text" id="x1" value="-" style = "width:60px" /></td>
 		      <td style="width: 20%;"><b>Width:</b></td>
   		    <td><input type="text" value="-" id="w" style = "width:60px" /></td>
        </tr>
        <tr>
          <td><b>Y<sub>1</sub>:</b></td>
          <td><input type="text" id="y1" value="-" style = "width:60px" /></td>
          <td><b>Height:</b></td>
          <td><input type="text" id="h" value="-" style = "width:60px" /></td>
        </tr>
        <tr>
          <td><b>X<sub>2</sub>:</b></td>
          <td><input type="text" id="x2" value="-" style = "width:60px" /></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td><b>Y<sub>2</sub>:</b></td>
          <td><input type="text" id="y2" value="-" style = "width:60px" /></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <form method="post" action="<?php echo site_url('img/img_area'); ?>">
	    <table style="margin-top: 1em;">
	    	<tr>
				<th>URL：</th>
	    		<td height="24"><input type="text" name="url" id="url" value="" /></td>
				<td><input type="submit" name="submit" value="提交" /></td>
			</tr>
	    </table>
    </form>
  </div>
</div>

</body>
</html>
