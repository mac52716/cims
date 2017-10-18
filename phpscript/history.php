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
<td><input id='searchVal' name='searchVal' type='text' style='width: 170px;' /></td>
<td><input name='bttnSearch' onclick="document.getElementById('form').action = '';" type='submit' value='SEARCH'/></td>
</div>
<hr>
<div style="width:100%;">
<div id="hist">
<table id='histtb'>
<tr style='background-color: blue; color: white;'>
<th id='resulttd'>BOX NO</th>
<th id='resulttd'>PACKAGE</th>
<th id='resulttd'>LF NAME</th>
<th id='resulttd'>MACHINE MODEL</th>
<th id='resulttd'>MACHINE NO</th>
<th id='resulttd'>CLAMP NO</th>
<th id='resulttd'>INSERT NO</th>
<th id='resulttd'>IN / OUT</th>
<th id='resulttd'>CLIENT</th>
<th id='resulttd'>OUT COUNT</th>
<th id='resulttd'>STATUS</th>
<th id='resulttd'>SHOTS</th>
<th id='resulttd'>MAX_SHOTS</th>
<th id='resulttd'>REMARKS</th>
<th id='resulttd'>CLERK</th>
<th id='resulttd'>DATE TIME</th>
<th id='resulttd'>ELAPSED</th>
</tr>
<?php include('hist.php');?>
</table>
</div>
</div>
<hr>
</div>
</form>
</div>
</div>
<?php include('../layout/footer.php') ?>
</div>
<script src="../js/track.js" type='text/javascript'></script>
<script type='text/javascript'>
window.onload = document.getElementById('history').style.backgroundColor = '#4CAF50';
</script>
</body>
</html>