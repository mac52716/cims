<?php
require('../layout/header.php');
require('../database/dbcon.php');
?>
<div class="main">
<div class="content">
<div class="intro">
<form id='form' action='inventQuery.php' method='post'>
<div style="width: 100%; height: 300px; margin-top:45px;">
<div style="width: 100%; text-align: center;">
<input id='searchVal' name='searchVal' type='text' style='width: 170px;' />
<input name='bttnSearch' onclick="inventSearch()" type='submit' value='SEARCH'/>
<input name='addItem' type='button' value='ADD ITEM' onclick='addInvent()' style='width: 100px; margin-left: 5px;' />
</div>
<hr>
<div style="width:100%;">
<div id='newItem'>
<table style='margin: auto; padding-top: 10px;'>
			<tr>
			<td>LF Name: </td>
			<td><input id='addlf_name' name='addlf_name' type='text' /></td>
			<td>Box No.: </td>
			<td><input id='addbox_no' name='addbox_no' type='text' /></td>
			</tr>
			<tr>
			<td>Clamp Serial No.: </td>
			<td><input id='addclamp_serno' name='addclamp_serno' type='text' /></td>
			<td>Insert Serial No.: </td>
			<td><input id='addinsert_serno' name='addinsert_serno' type='text' /></td>
			</tr>
			<tr>
			<td>Package: </td>
			<td><input id='addpackage' name='addpackage' type='text' /></td>
			<td>Drawing No.: </td>
			<td><input id='adddra' name='adddra' type='text' /></td>
			</tr>
			<tr>
			<td>In / Out: </td>
			<td><input id='addin_out' name='addin_out' type='text' /></td>
			<td>Status: </td>
			<td><select id='addstatus' name='status' >
			<option value='' selected></option>
			<option value='GOOD'>GOOD</option>
			<option value='NO GOOD'>NO GOOD</option>
			<option value='EVALUATION'>EVALUATION</option>
			</select></td>
			</tr>
			<td>Machine Model: </td>
			<td><input id='addmachine_model' name='machine_model' type='text' /></td>
			<td>Max Shot: </td>
			<td><input id='addmax_shots' name='addmax_shots' type='text' /></td>			
			</tr>
			<tr>
			<td>Machine No.: </td>
			<td><input id='addmachine_no' name='addmachine_no' type='text' /></td>
			<td>Shot Count: </td>
			<td><input id='addshots' name='addshots' type='text' /></td>
			</tr>
			<tr>
			<td>Remarks: </td>
			<td colspan='4'><textarea id='addremarks' name='addremarks' style='height:50px; width: 425px; resize: none;' ></textarea></td>
			</tr>
			<tr>
			<td colspan='4' style='text-align: center; padding-top:10px;'><input name='save' type='submit' value='SAVE' onclick='chckSave()' />
			<input name='cancel' type='button' value='CANCEL' onclick='cancelAdd()'/></td>
			</tr>
			</table>
</div>
<div id="inventItem" style='height: 450px;'>
<table id='inventTb' style='font-family: verdana; font-size:9px;'>
<tr style='background-color: blue; color: white;'>
<th id='resulttd'>BOX NO</th>
<th id='resulttd'>PACKAGE</th>
<th id='resulttd'>LF NAME</th>
<th id='resulttd'>MACHINE MODEL</th>
<th id='resulttd'>MACHINE NO</th>
<th id='resulttd'>DRAWING</th>
<th id='resulttd'>CLAMP NO</th>
<th id='resulttd'>INSERT NO</th>
<th id='resulttd'>IN / OUT</th>
<th id='resulttd'>OUT COUNT</th>
<th id='resulttd'>STATUS</th>
<th id='resulttd'>SHOTS</th>
<th id='resulttd'>MAX COUNT</th>
<th id='resulttd'>REMARKS</th>
<th id='resulttd'>DATE/TIME</th>
<th id='resulttd'>ELAPSED</th>
</tr>
<?php include('inventList.php');?>
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
window.onload = inventRowHandlers();document.getElementById('inventory').style.backgroundColor = '#4CAF50';cancelAdd();
</script>
</body>
</html>
