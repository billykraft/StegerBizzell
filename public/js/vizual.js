
var editableScriptPage = window.location.origin + '/vizual';

var editableGlyphSize = 20;

var editableModal1 = '<div style="z-index:10000" class="modal fade" id="editableMyModal" tabindex="-1" role="dialog" aria-labelledby="editableMyModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="editableMyModalLabel"></h4></div><div class="modal-body" id="editableMyModalBody">';
var editableModal2 = '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editableSubmit();"">Save changes</button></div></div></div></div>';
var editableModal = editableModal1 + editableModal2;

var editablePicInput = '<input id="editableInput" type="file" accept="image/*">';
var editableTextInput = '<textarea class="form-control" id="editableInput" rows="20" style="width:100%">*#*</textarea>';

var editableEditButton = '<p></p><button id="editableEditButton" onclick="editableToggleEdit();" class="btn btn-primary">Edit</button>';
var editableSaveButton = '<p></p><button style="float:left" id="editableSaveButton" name="editableIcon" onclick="editableSubmitAll();" class="btn btn-success">Publish</button>';
var editableCancelButton = '<p></p><button style="position:relative;left:10px" id="editableCancelButton" name="editableIcon" onclick="editableToggleEdit();" class="btn">Cancel</button>';

var editableIndex;
var editablePicIndex = 0;
var editableTextIndex = 1;
var editableUniqueTextIndex = 2;
var editableUniquePicIndex = 3;
var editableNumOfIndexes = 4;

var editableId;

var editableFirstImg;
var editableFirstTxt;
var editableFirstUniqueTxt;
var editableFirstUniqueImg;

var editableNoclickFxns = new Array();

/* format pics
var pics = document.getElementsByClassName('vizual-img');
var uniquePics = document.getElementsByClassName('vizual-unique-img');
editablePicFormat(pics);
editablePicFormat(uniquePics);

function editablePicFormat(pics){
	for(var i = 0; i < pics.length; i++){
		pics[i].style.backgroundSize = 'cover';
		pics[i].style.backgroundPosition = 'center';
	}
}
*/

editableWriteModal();

//editableWriteButtons();

editableImg();

var editableChanges;
editableNewChanges();

editableEditCSSInit();

var editableIconsHidden = false;
editableHideIcons();

function editableSetPage(pagename){
	document.getElementById('editableForm').action = pagename;
}

function editableFirstReset(){

	editableFirstImg = new Array();
	editableFirstInit('vizual-img',editableFirstImg);

	editableFirstTxt = new Array();
	editableFirstInit('vizual-txt',editableFirstTxt);

	editableFirstUniqueTxt = new Array();
	editableFirstInit('vizual-unique-txt',editableFirstUniqueTxt);

	editableFirstUniqueImg = new Array();
	editableFirstInit('vizual-unique-img',editableFirstUniqueImg);

}

function editableFirstInit(className, array){

	var items = document.getElementsByClassName(className);

	for(var i = 0; i < items.length; i++){
		array[items[i].id] = true;
	}

}

function editableNewChanges(){

	editableChanges = new Array();
	for(var i = 0; i < editableNumOfIndexes; i++){ editableChanges[i] = new Array(); }

}

function editableWriteModal(){
	document.write(editableModal);
}

function editableImg() {

	var imgs = document.getElementsByClassName("vizual-img");

	var texts = document.getElementsByClassName("vizual-txt");


	document.write("<form id='editableForm' action='"+ editableScriptPage +"' method='post' style='display:none'>");

	var editableLocation = location.pathname;

	if( editableLocation == "/" ){ editableLocation = "/index.php"; }

	document.write("<input name='editablePagename' value='"+editableLocation+"'/>");

	editableUpdate(imgs, "Img");

	editableUpdate(texts, "Txt");

	var uniqueTexts = document.getElementsByClassName("vizual-unique-txt");
	var uniqueImgs = document.getElementsByClassName("vizual-unique-img");

	for(var i = 0; i < uniqueTexts.length; i++){
		editableOverlayEditIcon(uniqueTexts[i], "UniqueTxt", uniqueTexts[i].id);
		uniqueTexts[i].name = "noclick";
		document.write('<textarea name="'+uniqueTexts[i].id+'_form"></textarea>');
	}

	for(var i = 0; i < uniqueImgs.length; i++){
		editableOverlayEditIcon(uniqueImgs[i], "UniqueImg", uniqueImgs[i].id);
		uniqueImgs[i].name = "noclick";
		document.write('<textarea name="'+uniqueImgs[i].id+'_form"></textarea>');
	}

	document.write("</form>");

}

function editableUpdate(imgs, fxn){

	for(var i = 0; i < imgs.length; i++){
		
		imgs[i].id = "editable"+fxn+i;

		imgs[i].name = "noclick";

		editableOverlayEditIcon(imgs[i], fxn, imgs[i].id);

		document.write('<textarea name="editable'+fxn+i+'_form"></textarea');

	}

}

function editableOverlayEditIcon(element, fxn, id){
	var tempInner = element.innerHTML;

	var styleString = "";
	
	var dataString = 'data-toggle="modal" data-target="#editableMyModal"';

	var darkString = "color:white;";

	if( element.getAttribute("note") == "dark" ){
		darkString = "";
	}

	if( element.getAttribute("vicon") == "down" ){
		styleString += "position:relative;top:20%;";
	}

	var newInner = "<span onmouseleave=\"editableLeave('"+id+"');\" onmouseover=\"this.style.cursor='pointer'; editableHover('"+id+"');\" class='glyphicon glyphicon-edit' name='editableIcon' onclick=\"editableChange"+fxn+"('"+id+"');\" style='font-size:"+editableGlyphSize+"px;float:left;"+darkString+"z-index:1000;" + styleString + "' " + dataString + "></span>";

	element.innerHTML = newInner + tempInner;
}

function editableChangeImg(id){

	editableIndex = editablePicIndex;
	editableId = id;

	document.getElementById('editableMyModalLabel').innerHTML = "Change Picture";
	document.getElementById('editableMyModalBody').innerHTML = editablePicInput;

}

function editableChangeTxt(id){

	editableIndex = editableTextIndex;
	editableId = id;

	var oldText = editableGetText(editableId);

	document.getElementById('editableMyModalLabel').innerHTML = "Edit Text";
	document.getElementById('editableMyModalBody').innerHTML = editableTextInput.replace("*#*", oldText);

}

function editableChangeUniqueImg(id){

	editableIndex = editableUniquePicIndex;
	editableId = id;

	document.getElementById('editableMyModalLabel').innerHTML = "Change Picture";
	document.getElementById('editableMyModalBody').innerHTML = editablePicInput;

}

function editableChangeUniqueTxt(id){

	editableIndex = editableUniqueTextIndex;
	editableId = id;

	var oldText = editableGetText(editableId);

	document.getElementById('editableMyModalLabel').innerHTML = "Edit Text";
	document.getElementById('editableMyModalBody').innerHTML = editableTextInput.replace("*#*", oldText);

}

function editableSubmit(){

	var input = document.getElementById('editableInput');

	if( editableIndex == editablePicIndex ){

		if( input.files.length != 1 ){ return; }

		if( editableFirstImg[editableId] ){

			editableFirstImg[editableId] = false;

			editableChanges[editablePicIndex].push( {"id": editableId, "src": document.getElementById(editableId).style.backgroundImage} );

		}

    	var oFReader = new FileReader();
		oFReader.readAsDataURL(input.files[0]);

		oFReader.onload = function (oFREvent) {
			var el = document.getElementById(editableId);
		    el.style.backgroundImage = "url('"+oFREvent.target.result+"')";
		    el.style.backgroundSize = 'cover';
		    el.style.backgroundPosition = 'center';

		};

	}
	else if( editableIndex == editableTextIndex ){

		if( !editableCharCheck( input.value ) ){ return; }

		var old = editableChangeText(editableId, input.value);

		if( editableFirstTxt[editableId] ){

			editableFirstTxt[editableId] = false;

			editableChanges[editableTextIndex].push( {"id": editableId, "text": old} );

		}

	}
	else if( editableIndex == editableUniqueTextIndex ){

		if( !editableCharCheck( input.value ) ){ return; }

		var old = editableChangeText(editableId, input.value);

		if( editableFirstUniqueTxt[editableId] ){

			editableFirstUniqueTxt[editableId] = false;

			editableChanges[editableUniqueTextIndex].push( {"id": editableId, "text": old} );

		} 

	}
	else if( editableIndex == editableUniquePicIndex ){

		if( input.files.length != 1 ){ return; }

		if( editableFirstUniqueImg[editableId] ){

			editableFirstUniqueImg[editableId] = false;

			editableChanges[editableUniquePicIndex].push( {"id": editableId, "src": document.getElementById(editableId).style.backgroundImage} );

		}

    	var oFReader = new FileReader();
		oFReader.readAsDataURL(input.files[0]);

		oFReader.onload = function (oFREvent) {
			var el = document.getElementById(editableId);

			el.style.backgroundImage = "url('"+oFREvent.target.result+"')";

		    if( el.getAttribute("vrepeat") == "no" ){
		    	el.style.backgroundSize = "contain";
		    	el.style.backgroundRepeat = "no-repeat";
		    } else {
		    	el.style.backgroundSize = 'cover';
			    el.style.backgroundPosition = 'center';
		    }
		};

	}

}

function editableGetText(id){

	var inner = document.getElementById(id).innerHTML;

	var i = 0;
	while( !(inner[inner.length-1-i] == '>') || editableText(inner[inner.length-i-2]) ){ i++; }

	return inner.substr(inner.length-i, i);

}

function editableText(c){
	if( c != "n" ){ return true; } // </span>
	return false;
}

function editableChangeText(id, text){

	var tempInner = document.getElementById(id).innerHTML;

	var i = 0;
	while( !(tempInner[tempInner.length-1-i] == '>') || editableText(tempInner[tempInner.length-i-2]) ){ i++; }

	var startIndex = tempInner.length-i;

	var ret = tempInner.substr(startIndex,i);

	document.getElementById(id).innerHTML = tempInner.substr(0, tempInner.length-ret.length) + text;

	return ret;

}

function editableHideIcons(){

	var word;

	if( editableIconsHidden ){
		word = "block";
		document.getElementById("editableEditButton").style.display = "none";
		var els = document.getElementsByClassName("vizual-ignore");
		for(var i = 0; i < els.length; i++){
			els[i].style.display = "none";
		}

		editableNoclickFxns = new Array();
		var els = document.getElementsByClassName("vizual-noclick");
		for(var i = 0; i < els.length; i++){
			editableNoclickFxns[i] = els[i].onclick;
			els[i].onclick = function(){ return false; };
		}

		editableFirstReset();

		editableEditCSSEdit(true);

		editableOnEditing();

		editableShows(true);
	}
	else {
		editableCancelChanges();
		word = "none";
		document.getElementById("editableEditButton").style.display = "block";
		var els = document.getElementsByClassName("vizual-ignore");
		for(var i = 0; i < els.length; i++){
			els[i].style.display = "block";
		}

		var els = document.getElementsByClassName("vizual-noclick");
		for(var i = 0; i < editableNoclickFxns.length; i++){
			els[i].onclick = editableNoclickFxns[i];
		}

		editableEditCSSEdit(false);

		editableOffEditing();

		editableShows(false);
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
				//field.value = editableFixApost(field.value);
			}
			else if( i == editableUniqueTextIndex ){
				field.value = editableGetText(temp["id"]);
				//field.value = editableFixApost(field.value);
			}
			else if( i == editableUniquePicIndex ){
				field.value = object.style.backgroundImage;
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
			else if( i == editableUniqueTextIndex ){
				editableChangeText( changes[j]["id"], changes[j]["text"] );
			}
			else if( i == editableUniquePicIndex ){
				document.getElementById(changes[j]["id"]).style.backgroundImage = changes[j]["src"];
			}

		}

	}

	editableNewChanges();

}

function editableGetPosition(element) {
    var xPosition = 0;
    var yPosition = 0;
  
    while(element) {
        xPosition += (element.offsetLeft - element.scrollLeft + element.clientLeft);
        yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
        element = element.offsetParent;
    }
    return { x: xPosition, y: yPosition };
}

var editableOriginalOpacities = new Array();

function editableHover(id){

	var element = document.getElementById(id);

	if(typeof editableOriginalOpacities[id] == 'undefined' ){
		editableOriginalOpacities[id] = element.style.opacity;
	}
	
	element.style.opacity = "0.5";

}

function editableLeave(id){

	document.getElementById(id).style.opacity = editableOriginalOpacities[id];

}

function editableEditCSSInit(){

	var items = document.getElementsByClassName("vizual-edit");

	for(var i = 0; i < items.length; i++){

		var inner = items[i].innerHTML;

		var id = items[i].id;

		items[i].innerHTML = inner + inner.replace( id + "-normal", id + "-edit" );

		var elements = getElementsByAttribute("vizual-id", id+"-edit");

		for(var j = 0; j < elements.length; j++){
			elements[j].style.display = "none";
		}

	}

}

function editableEditCSSEdit(editing){

	var items = document.getElementsByClassName("vizual-edit");

	var normal = "block";
	var edit = "none";

	if( editing ){
		normal = "none";
		edit = "block";
	}

	for(var i = 0; i < items.length; i++){

		var id = items[i].id;

		var elements = getElementsByAttribute("vizual-id", id+"-normal");

		for(var j = 0; j < elements.length; j++){
			elements[j].style.display = normal;
		}

		if( items[i].getAttribute("note") != "ignore" ){
			elements = getElementsByAttribute("vizual-id", id+"-edit");

			for(var j = 0; j < elements.length; j++){
				elements[j].style.display = edit;
			}
		}

	}

}

function getElementsByAttribute(attr, value) {

	var ret = new Array();

  /* Get the droids we're looking for*/
  var elements = document.getElementsByTagName("*");
 
  /* Loop through all elements */
  for (var ii = 0, ln = elements.length; ii < ln; ii++) {
 
    if (elements[ii].hasAttribute(attr) && elements[ii].getAttribute(attr) == value) {
 
    	ret.push( elements[ii] );

    }

  }

  return ret;
}

function editableFixApost(string){

	for(var i = 0; i < string.length; i++){
		if( string[i] == '\'' ){
			string = string.substring(0,i) + "\\'" + string.substring(i+1,string.length);
			i += 1;
		}
	}

	return string;

}

function editableShows(b){
	var display = "none";
	if( b ){
		display = "block";
	}
	var shows = document.getElementsByClassName("vizual-show");
	for(var i = 0; i < shows.length; i++){
		shows[i].style.display = display;
	}
}

function editableCharCheck(str){
	for(var i = 0; i < str.length; i++){
		if( str[i] == '<' ){
			var okay = false;
			if( i < str.length - 2 ){
					 if( str.substring(i,i+3) == "<b>" ){ okay = true; }
				else if( str.substring(i,i+3) == "<i>" ){ okay = true; }
				else if( str.substring(i,i+3) == "<u>" ){ okay = true; }
				else if( str.substring(i,i+3) == "<p>" ){ okay = true; }
			}
			if( i < str.length - 3 ){
					 if( str.substring(i,i+4) == "</b>" ){ okay = true; }
				else if( str.substring(i,i+4) == "</i>" ){ okay = true; }
				else if( str.substring(i,i+4) == "</u>" ){ okay = true; }
				else if( str.substring(i,i+4) == "</p>" ){ okay = true; }

				else if( str.substring(i,i+4) == "<br>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<li>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h1>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h2>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h3>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h4>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h5>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h6>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<h7>" ){ okay = true; }
				else if( str.substring(i,i+4) == "<ul>" ){ okay = true; }
			}
			if( i < str.length - 4 ){
					 if( str.substring(i,i+5) == "</li>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h1>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h2>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h3>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h4>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h5>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h6>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</h7>" ){ okay = true; }
				else if( str.substring(i,i+5) == "</ul>" ){ okay = true; }
			}

			if( !okay ){
				alert("invalid tag");
				return false;
			}
		}
	}
	return true;
}

function editableOnEditing(){
	$('#myCarousel').carousel('pause');
}

function editableOffEditing(){
	$('#myCarousel').carousel('cycle');
}
