function trackin(){
	var trackout = document.getElementById('out');
	var trackin = document.getElementById('in');
	var stat = document.getElementById('status');
	var receive = document.getElementById('receive');
	var search = document.getElementById('search');
	document.getElementById("result").style.display = 'none';
	document.getElementById("boxsearch").style.display = '';
	trackout.disabled = false;
	trackin.disabled = true;
	receive.style.display = '';
	search.style.display = 'none';
	stat.innerHTML = "***RECEIVE***";
	document.getElementById('form').action = 'in.php';
	document.getElementById('submit').value = 'Receive';
}

function trackout(){
	var trackin = document.getElementById('in');
	var trackout = document.getElementById('out');
	var stat = document.getElementById('status');
	var receive = document.getElementById('receive');
	var search = document.getElementById('search');
	document.getElementById("result").style.display = '';
	document.getElementById("boxsearch").style.display = 'none';
	trackin.disabled = false;
	trackout.disabled = true;
	receive.style.display = 'none';
	search.style.display = '';
	stat.innerHTML = "***WITHDRAW***";
	document.getElementById('form').action = 'out.php';
	document.getElementById('bttnSearch').type = 'submit';
	document.getElementById('submit').value = 'Withdraw';
}

function bttnsearch(){
	if (document.forms[0].elements.namedItem('machine_no')){
		document.getElementById('machine_no').removeAttribute('required');
		document.getElementById('remarks').removeAttribute('required');
		document.getElementById('client').removeAttribute('required');
		document.getElementById('form').action = '';
	}else if(document.forms[0].elements.namedItem('r_shots')){
		document.getElementById('r_shots').removeAttribute('required');
		document.getElementById('r_machine').removeAttribute('required');
		document.getElementById('r_status').removeAttribute('required');
		document.getElementById('r_remarks').removeAttribute('required');
		document.getElementById('r_client').removeAttribute('required');
		document.getElementById('form').action = '';
	}else{
		document.getElementById('form').action = '';
	}
}

function inventSearch(){
	if (document.forms[0].elements.namedItem('delete')){
		document.getElementById('form').action = '';
		allowSubmit();
	}else{
		document.getElementById('form').action = '';
	}
}

function allowSubmit(){
		document.getElementById('lf_name').removeAttribute('required');
		document.getElementById('box_no').removeAttribute('required');
		document.getElementById('clamp_serno').removeAttribute('required');
		document.getElementById('insert_serno').removeAttribute('required');
		document.getElementById('package').removeAttribute('required');
		document.getElementById('in_out').removeAttribute('required');
		document.getElementById('dra').removeAttribute('required');
		document.getElementById('status').removeAttribute('required');
		document.getElementById('machine_model').removeAttribute('required');
		document.getElementById('max_shots').removeAttribute('required');
		document.getElementById('machine_no').removeAttribute('required');
		document.getElementById('shots').removeAttribute('required');
		document.getElementById('remarks').removeAttribute('required');
}

function chkfield(){
	var button = document.getElementById('submit').value;
	
	if (document.forms[0].elements.namedItem('r_shots')){
		document.getElementById('r_shots').removeAttribute('required');
		document.getElementById('r_machine').removeAttribute('required');
		document.getElementById('r_status').removeAttribute('required');
		document.getElementById('r_remarks').removeAttribute('required');
		document.getElementById('r_client').removeAttribute('required');
	}
	
	if (document.forms[0].elements.namedItem('machine_no')){
		document.getElementById('machine_no').removeAttribute('required');
		document.getElementById('remarks').removeAttribute('required');
		document.getElementById('client').removeAttribute('required');
	}
	
	if (button == 'Withdraw'){
			if (!document.forms[0].elements.namedItem('client')){
				document.getElementById('submit').type = 'button';
				alert ('Please search the LF Name first');
			}else{
				var machineNo = document.getElementById('machine_no').value;
				var remarks = document.getElementById('remarks').value;
				var stats = document.getElementById('wStatus').value;
				var client = document.getElementById('client').value;
				var in_out = document.getElementById('in_out').value;
			
				if (stats == 'EVALUATION'){
					document.getElementById('submit').type = 'button';
					alert('This item cannot be withdraw due to under EVALUATION. Please ask your immediate supervisor.')
				}else if(in_out == 'OUT'){
					document.getElementById('submit').type = 'button';
					alert ('This Item was already OUT.');
				}else if(machineNo =='' || remarks =='' || client ==''){
					document.getElementById('machine_no').required = true;
					document.getElementById('remarks').required = true;
					document.getElementById('client').required = true;
				}else{
					//document.getElementById('submit').type = 'submit';
				}
			}
				
		}else{
			if (!document.forms[0].elements.namedItem('r_shots')){
				document.getElementById('submit').type = 'button';
				alert ('Please search the Box No. first');
			}else{
				var shotCount = document.getElementById('r_shots').value;
				var rMchineNo = document.getElementById('r_machine').value;
				var status = document.getElementById('r_status').value;
				var rRemarks = document.getElementById('r_remarks').value;
				var rclient = document.getElementById('r_client').value;
				var r_in_out = document.getElementById('r_in_out').value;
				
				if (r_in_out == 'IN'){
					document.getElementById('submit').type = 'button';
					alert ('This Item was already IN.');
				}else if (shotCount =='' || rMchineNo =='' || status =='' || rRemarks =='' || rclient ==''){
					document.getElementById('r_shots').required = true;
					document.getElementById('r_machine').required = true;
					document.getElementById('r_status').required = true;
					document.getElementById('r_remarks').required = true;
					document.getElementById('r_client').required = true;
				}else{
					document.getElementById('submit').type = 'submit';
				}
			}
		}
}

function search(){
	withdraw(document.getElementById('searchVal').value);
}
function withdraw(str) {
    if (str == "") {
        document.getElementById("result").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lfname.php?q=" + str,true);
        xmlhttp.send();
		
		document.getElementById('form').action = 'out.php';
		document.getElementById('submit').type = 'submit';
    }
	
}

function boxin(){
	receive(document.getElementById('box_noIn').value);
	
}
function receive(str) {
    if (str == "") {
        document.getElementById("boxsearch").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("boxsearch").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","receive.php?q=" + str,true);
        xmlhttp.send();
		
		//document.getElementById('form').action = 'out.php';
		document.getElementById('submit').type = 'submit';
    }
	
}

function addRowHandlers() {
    var table = document.getElementById("resulttb");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function(){ 
					var cell = row.getElementsByTagName("td")[0];
					var id = cell.innerHTML;
					//if (id == "<b>LOT NUMBER</b>"){
						//return "";
					//}else{
						//document.cookie = ("lotID", id);
						//document.getElementById("lotSummID").value = getcookie();
						//document.getElementById("form").action = 'lotinfo.php';
						//document.getElementById("form").submit();
					//}
					//alert("id:" + id);
					//alert(id);
					withdraw(id);
										
                };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
	
}

function inventRowHandlers() {
    var table = document.getElementById("inventTb");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function(){ 
					var cell = row.getElementsByTagName("td")[0];
					var id = cell.innerHTML;
					//if (id == "<b>LOT NUMBER</b>"){
						//return "";
					//}else{
						//document.cookie = ("lotID", id);
						//document.getElementById("lotSummID").value = getcookie();
						//document.getElementById("form").action = 'lotinfo.php';
						//document.getElementById("form").submit();
					//}
					//alert("id:" + id);
					//alert(id);
					inventory(id);
										
                };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
	
}

function inventory(str) {
    if (str == "") {
        document.getElementById("inventItem").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("inventItem").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","inventCntrl.php?q=" + str,true);
        xmlhttp.send();
		
		//document.getElementById('form').action = 'out.php';
		//document.getElementById('submit').type = 'submit';
    }
	
}

function showadd(){
	document.getElementById('addUser').style.display ='';
	document.getElementById('userList').style.display ='none';
}

function hideadd(){
	document.getElementById('addUser').style.display ='none';
	document.getElementById('userList').style.display ='';
}

function chckPass(){
	var newPass = document.getElementById('newPass').value;
	var rePass = document.getElementById('rePass').value;
	
	if (newPass != rePass){
		document.getElementById('error').innerHTML = "<p style='color: red;'>New Password and Re-type Password is not equal. Please try again!</p>";
		document.getElementById('change').type ='button';
		document.getElementById('updatePass').action ='';
	}else{
		document.getElementById('updatePass').action ='updatePass.php';
		document.getElementById('change').type ='submit';
	}
}

function addInvent(){
	document.getElementById('newItem').style.display = '';
	document.getElementById('inventItem').style.display = 'none';
	document.getElementById('form').action = 'newItem.php';
}

function cancelAdd(){
	document.getElementById('newItem').style.display = 'none';
	document.getElementById('inventItem').style.display = '';
	document.getElementById('addlf_name').removeAttribute('required');
	document.getElementById('addbox_no').removeAttribute('required');
	document.getElementById('addclamp_serno').removeAttribute('required');
	document.getElementById('addinsert_serno').removeAttribute('required');
	document.getElementById('addpackage').removeAttribute('required');
	document.getElementById('addin_out').removeAttribute('required');
	document.getElementById('adddra').removeAttribute('required');
	document.getElementById('addstatus').removeAttribute('required');
	document.getElementById('addmachine_model').removeAttribute('required');
	document.getElementById('addmax_shots').removeAttribute('required');
	document.getElementById('addmachine_no').removeAttribute('required');
	document.getElementById('addshots').removeAttribute('required');
	document.getElementById('addremarks').removeAttribute('required');
	document.getElementById('form').action = 'inventQuery.php';
}

function chckSave(){
	document.getElementById('addlf_name').required = true;
	document.getElementById('addbox_no').required = true;
	document.getElementById('addclamp_serno').required = true;
	document.getElementById('addinsert_serno').required = true;
	document.getElementById('addpackage').required = true;
	document.getElementById('addin_out').required = true;
	document.getElementById('adddra').required = true;
	document.getElementById('addstatus').required = true;
	document.getElementById('addmachine_model').required = true;
	document.getElementById('addmax_shots').required = true;
	document.getElementById('addshots').required = true;
	document.getElementById('addremarks').required = true;
}