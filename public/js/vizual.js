
// to toggle icons, call "editableHideIcons();"

var editableIconSource = 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRA3WZLMrVQJiq7Pc-2IEdgbulJm53jrNqWb5By5nEs2zXMgzNvO2dabQ';

// var editableScriptPage = 'vizual/vizual.php';

var editableIconWidthPx = 20;
var editableIconHeightPx = 20;

var editableModal1 = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel"></h4></div><div class="modal-body" id="myModalBody">';
var editableModal2 = '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editableSubmit();"">Save changes</button></div></div></div></div>';
var editableModal = editableModal1 + editableModal2;

var editablePicInput = '<input id="editableInput" type="file" accept="image/*">';
var editableTextInput = '<textarea id="editableInput" rows="10" style="width:100%">*#*</textarea>';

var editableEditButton = '<p></p><button id="editableEditButton" onclick="editableToggleEdit();" class="btn btn-primary">Edit</button>';
var editableSaveButton = '<p></p><button style="float:left" id="editableSaveButton" name="editableIcon" onclick="editableSubmitAll();" class="btn btn-success">Save Changes</button>';
var editableCancelButton = '<p></p><button style="position:relative;left:10px" id="editableCancelButton" name="editableIcon" onclick="editableToggleEdit();" class="btn">Cancel</button>';

var editableIndex;
var editablePicIndex = 0;
var editableTextIndex = 1;
var editableNumOfIndexes = 2;

var editableId;

editableWriteModal();

editableWriteButtons();

editableImg();

var editableChanges;
editableNewChanges();

var editableIconsHidden = false;
editableHideIcons();

function editableNewChanges(){

	editableChanges = new Array();
	for(var i = 0; i < editableNumOfIndexes; i++){ editableChanges[i] = new Array(); }

}

function editableWriteModal(){
	document.write(editableModal);
}

function editableImg() {

	var imgs = document.getElementsByClassName("editable-img");

	var texts = document.getElementsByClassName("editable-txt");

	if( imgs.length > 0 || texts.length > 0 ){

		document.write("<form id='editableForm' action='"+ editableScriptPage +"' method='post' style='display:none'>");

	}

	editableUpdate(imgs, "Img");

	editableUpdate(texts, "Txt");

	if( imgs.length > 0 || texts.length > 0 ){

		document.write("</form>");

	}

}

function editableUpdate(imgs, fxn){

	for(var i = 0; i < imgs.length; i++){
		
		imgs[i].id = "editable"+fxn+i;

		var tempInner = imgs[i].innerHTML;

		var styleString = "";
		
		var dataString = 'data-toggle="modal" data-target="#myModal"';

		var newInner = "<span class='glyphicon glyphicon-edit' name='editableIcon' onclick='editableChange"+fxn+"(\"editable"+fxn+i+"\");' style='float:left;" + styleString + "' " + dataString + "></span>";

		imgs[i].innerHTML = newInner + tempInner;

		document.write('<input name="editable'+fxn+i+'_form"/>');

	}

}

function editableChangeImg(id){

	editableIndex = editablePicIndex;
	editableId = id;

	document.getElementById('myModalLabel').innerHTML = "Change Picture";
	document.getElementById('myModalBody').innerHTML = editablePicInput;

}

function editableChangeTxt(id){

	editableIndex = editableTextIndex;
	editableId = id;

	var oldText = editableGetText(editableId);

	document.getElementById('myModalLabel').innerHTML = "Edit Text";
	document.getElementById('myModalBody').innerHTML = editableTextInput.replace("*#*", oldText);

}

function editableSubmit(){

	var input = document.getElementById('editableInput');

	if( editableIndex == editablePicIndex ){

		if( input.files.length != 1 ){ return; }

		editableChanges[editablePicIndex].push( {"id": editableId, "src": document.getElementById(editableId).style.backgroundImage} );

    	var oFReader = new FileReader();
		oFReader.readAsDataURL(input.files[0]);

		oFReader.onload = function (oFREvent) {
		    document.getElementById(editableId).style.backgroundImage = "url('"+oFREvent.target.result+"')";
		    document.getElementById(editableId).style.backgroundSize = 'cover';
		    document.getElementById(editableId).style.backgroundPosition = 'center';
		};

	}
	else if( editableIndex == editableTextIndex ){

		var old = editableChangeText(editableId, input.value);

		editableChanges[editableTextIndex].push( {"id": editableId, "text": old} );

	}

}

function editableGetText(id){

	var inner = document.getElementById(id).innerHTML;

	var i = 0;
	while( !(inner[inner.length-1-i] == '>' && inner[inner.length-2-i] == 'v') ){ i++; }

	return inner.substr(inner.length-i, i);

}

function editableChangeText(id, text){

	var tempInner = document.getElementById(id).innerHTML;

	var i = 0;
	while( !(tempInner[tempInner.length-1-i] == '>' && tempInner[tempInner.length-2-i] == 'v' ) ){ i++; }

	var startIndex = tempInner.length-i;

	var ret = tempInner.substr(startIndex,i);

	document.getElementById(id).innerHTML = tempInner.substr(0, tempInner.length-ret.length) + text;

	return ret;

}

function editableHideIcons(){

	if( editableIconsHidden ){
		word = "block";
		document.getElementById("editableEditButton").style.display = "none";
		var els = document.getElementsByName("ignore");
		for(var i = 0; i < els.length; i++){
			els[i].style.display = "none";
		}
	}
	else {
		editableCancelChanges();
		word = "none";
		document.getElementById("editableEditButton").style.display = "block";
		var els = document.getElementsByName("ignore");
		for(var i = 0; i < els.length; i++){
			els[i].style.display = "block";
		}
	}

	editableIconsHidden = !editableIconsHidden;

	var icons = document.getElementsByName("editableIcon");

	for(var i = 0; i < icons.length; i++){

		icons[i].style.display = word;

	}

}

function editableWriteButtons(){

	document.write( editableEditButton );
	document.write( editableSaveButton );
	document.write( editableCancelButton );

}

function editableToggleEdit(){

	editableHideIcons();

}

function editableSubmitAll(){

	for(var i = 0; i < editableChanges.length; i++){
		for(var j = 0; j < editableChanges[i].length; j++){
			var temp = editableChanges[i][j];
			var object = document.getElementById(temp["id"]);
			var field = document.getElementsByName(temp["id"]+"_form")[0];
			if( i == editablePicIndex ){
				field.value = object.style.backgroundImage;
			}
			else if( i == editableTextIndex ){
				field.value = editableGetText(temp["id"]);
			}
		}
	}

	document.getElementById('editableForm').submit();

}

function editableCancelChanges(){

	for(var i = 0; i < editableChanges.length; i++){

		var changes = editableChanges[i];

		for(var j = 0; j < changes.length; j++){

			if( i == editablePicIndex ){
				document.getElementById(changes[j]["id"]).style.backgroundImage = changes[j]["src"];
			}
			else if( i == editableTextIndex ){
				editableChangeText( changes[j]["id"], changes[j]["text"] );
			}

		}

	}

	editableNewChanges();

}
