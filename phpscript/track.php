<?php
require('../layout/header.php');
require('../database/dbcon.php');
?>
<div class="main">
<div class="content">
<div class="intro">
<form id='form' action='' method='post'>
<div style="width: 100%; height: 300px; margin-top:35px;">
<div style="width: 100%; text-align: center;">
<input type="button" id="out" onclick="trackout()" value="WITHDRAW" style="margin-left: 10px; width:100px;"/>
<input type="button" id="in" onclick="trackin()" value="RECEIVE" style="margin-right: 10px; width:100px;"/>
</div>
<hr>
<div style="width:100%;">
<div style="text-align: center; height:30px; color: red; font-size: 20px;" id="status"></div>

<table id='search' style='margin: 0px auto 0px auto;'>
<tr>
<td>LF Name.:</td>
<td><input id='searchVal' name='searchVal' type='text' style='width: 170px;' /></td>
<td><input id='bttnSearch' name='bttnSearch' onclick="bttnsearch();" type='submit' value='SEARCH'/></td>
</tr>
</table>

<table id='receive' style='margin: 0px auto 0px auto;'>
<tr>
<td>Box No.:</td>
<td><input id='box_noIn' name='box_noIn' type='text' style='width: 170px;' onblur=''/></td>
<td><input name='boxNoSearch' onclick="boxin()" type='button' value='SEARCH'/></td>
</tr>
</table>

<div id="result">
<table id='resulttb'>
<tr style='background-color: blue; color: white;'>
<th id='resulttd'>BOX NO</th>
<th id='resulttd'>PACKAGE</th>
<th id='resulttd'>LF NAME</th>
<th id='resulttd'>MACHINE MODEL</th>
<th id='resulttd'>DRAWING</th>
<th id='resulttd'>CLAMP NO</th>
<th id='resulttd'>INSERT NO</th>
<th id='resulttd'>IN / OUT</th>
<th id='resulttd'>OUT COUNT</th>
<th id='resulttd'>STATUS</th>
<th id='resulttd'>REMARKS</th>
</tr>
<?php include('withdraw.php');?>
</table>
</div>

<div id="boxsearch">
</div>
</div>
<hr>
<div style='text-align: center; height:30px; color: red; font-size: 20px;'>
<input id='submit' type='submit' onclick='chkfield()' name='ok' style='width: 100px;'/>
</div>
</div>
</form>
</div>
</div>
<?php include('../layout/footer.php') ?>
</div>
<script src="../js/track.js" type='text/javascript'></script>
<script type='text/javascript'>
window.onload = trackout();addRowHandlers();document.getElementById('track').style.backgroundColor = '#4CAF50';
</script>
</body>
</html>
