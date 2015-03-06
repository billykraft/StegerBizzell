
var pathToVizual = '/vendor/vizual/';
var pathToVizualSubmit = '/vizual/uploaderSubmit';
var pathToVizualDelete = pathToVizual + 'uploaderDelete';

var vizualPlusGlyph = '<a data-toggle="modal" data-target="#vizualMyModal" style="display:none;width:200px" type="button" class="vizual-show btn btn-success btn-md margins15 dash-btn"><span class="glyphicon glyphicon-plus"></span>Add Project Gallery</a>';

var vizualModal1 = '<div class="modal fade" id="vizualMyModal" tabindex="-1" role="dialog" aria-labelledby="vizualMyModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="vizualMyModalLabel">Upload</h4></div><div class="modal-body" id="vizualMyModalBody">';

var vizualFormStart = '<form id="vizualForm" enctype="multipart/form-data" action="' + window.location.origin + pathToVizualSubmit + '" method="POST">';
var vizualTitle = '<input name="vizualTitle" type="text" class="form-control" placeholder="Title"><p></p>';
var vizualDescription = '<textarea name="vizualDescription" rows="10" type="text" class="form-control" placeholder="Description"></textarea><p></p>';
var vizualInput = '<input style="float:left" onchange="vizualUploadChange();" id="vizualInput" type="file" name="file[]" accept="image/*" multiple><div id="vizualSecondSubmit" style="visibility:hidden;text-align:right"><button type="button" style="margin-right:5px" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" onclick="vizualSubmit();">Save changes</button></div>';
var vizualCoverPic = '<input style="display:none" id="vizualCoverPic" name="vizualCoverPic">';
var vizualFormClose = '</form>';

var vizualPreview = '<p></p><div id="vizualLoading" style="display:block;width:0%;height:20px;background-color:#008AE6;border-radius:3px"></div><p id="vizualPleaseSelect" style="display:none"><font color="red">please select album cover</font></p><p></p><div id="vizualPreview" style="display:none"></div><br class="clear"/>';

var vizualModal2 = '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" onclick="vizualSubmit();">Save changes</button></div></div></div></div>';

var vizualModal = vizualModal1 + vizualFormStart + vizualCoverPic + vizualTitle + vizualDescription + vizualInput + vizualFormClose + vizualPreview + vizualModal2;

var vizualAreYouSureString = "<div style='display:none' id='-#-_sure'>Are You Sure? <button onclick='vizualSure(\"-#-\");' class='btn btn-success'>Yes</button>";
vizualAreYouSureString += " <button onclick='vizualNotSure(\"-#-\");' class='btn'>No</button></div>";

function vizualDrawPlus(){
	document.write(vizualPlusGlyph);
}

document.write(vizualModal);

function vizualDarken(element){
	element.style.backgroundColor = 'gray';
}

function vizualLighten(element){
	element.style.backgroundColor = 'white';
}

function vizualSubmit(){
	var done = true;

	//if( document.getElementById('vizualInput').files.length < 1 ){ done = false; }

	if( document.getElementById('vizualInput').files.length > 500 ){
		done = false;
		alert( "You can not upload more than 500 files");
	}

	var title = document.getElementsByName("vizualTitle")[0];

	if( title.value.length == 0 ){
		title.style.backgroundColor = "#FFCCCC";
		done = false;
	} else {
		title.style.backgroundColor = "white";
	}

	var desc = document.getElementsByName("vizualDescription")[0];

	if( desc.value.length == 0 ){
		desc.style.backgroundColor = "#FFCCCC";
		done = false;
	} else {
		desc.style.backgroundColor = "white";
	}
/*
	if( document.getElementById("vizualCoverPic").value.length == 0 ){
		alert("You must select a cover photo!");
		return;
	}
*/
	if( !done ){ return; }

	document.getElementById('vizualForm').submit();
}

var vizualFilesDone;
var vizualTotalFiles;
var vizualNewPreview;

function vizualUploadChange(){
	var files = document.getElementById("vizualInput").files;

	document.getElementById("vizualPreview").style.display = "none";
	document.getElementById("vizualLoading").style.display = "block";
	document.getElementById("vizualLoading").style.width = "0px";

	document.getElementById("vizualPreview").innerHTML = "";

	if( files.length < 1 ){ return; }

	document.getElementById("vizualCoverPic").value = "";

	vizualFilesDone = 0;
	vizualTotalFiles = files.length;
	vizualNewPreview = "";

	for(var i = 0; i < files.length; i++){
		(function(file) {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(files[i]);

			oFReader.onload = function (oFREvent) {
			    vizualNewPreview += "<div name='vizualPreviews' id='"+file.name+"' class='thumbnail' style='float:left;width:142px;height:142px;background-size:cover;background-position:center;background-image:url("+oFREvent.target.result+")'></div>";
			    
			    vizualFilesDone += 1;

			    vizualUpdateLoadBar(vizualFilesDone,vizualTotalFiles);

			    if( vizualFilesDone == vizualTotalFiles ){
			    	//document.getElementById("vizualPreview").innerHTML = vizualNewPreview;
			    	document.getElementById("vizualLoading").style.display = "none";
			    	document.getElementById("vizualPreview").style.display = "block";
			    	//document.getElementById("vizualPleaseSelect").style.display = "block";
			    	//document.getElementById("vizualSecondSubmit").style.visibility = "visible";
			    }
			}
		})(files[i]);
	}

}

function vizualWriteEmbeds(){

	var vizualOutside = document.getElementById('vizual-outside');

	vizualOutside.style.display = "none";

	var vizualHTML = vizualOutside.innerHTML;

	var path = window.location.origin + pathToVizual + "uploadedFiles/";

	path += vizualGetPage() + "/";

	var keyCount = 0;

	for(var key in vizualDirectory){

		var tempID = "vizual-inside_"+keyCount;

		document.write( "<div id='"+tempID+"_wrap'>" + vizualHTML.replace("vizual-inside",tempID) );

		document.write( '<p></p><span id="'+tempID+'_trashcan" onclick="vizualBlockDelete(\''+tempID+'\');" class="glyphicon glyphicon-trash" aria-hidden="true"></span>' );

		document.write( vizualAreYouSureString.replace(/-#-/g,tempID) );

		document.write("</div>");

		for(var i = 0; i < vizualDirectory[key].length; i++){

			var src = path+key+"/"+vizualDirectory[key][i];

			var j = src.length-1;
			while( src[j] != '.' ){ j -= 1; }
			var k = j - 1;
			while( src[k] != '.' ){ k -= 1; }
			var embedType = src.substring(k+1, j);

			document.getElementById(tempID).innerHTML += '<embed class="vizual-embed vizual-embed-'+embedType+'" src="' + src + '">';

		}

		keyCount += 1;

	}

}

function vizualGetPage(){
	var page = window.location.href;
	var k = 1;

	while( k < page.length ){
		if( page[k-1] == '/' && page[k] == '/' ){
			k++;
			break;
		}
		k++;
	}

	page = page.substring(k);

	var count = 0;
	for(var i = 0; i < page.length; i++){
		if( page[i] == '/' ){
			count += 1;
		}
	}

	for(var i = 0; i < count; i++){
		page = page.replace("/","@");
	}

	return page;
}


function vizualBlockDelete(id){

	document.getElementById(id+"_trashcan").style.display = "none";
	document.getElementById(id+"_sure").style.display = "block";

}

function vizualNotSure(id){

	document.getElementById(id+"_trashcan").style.display = "block";
	document.getElementById(id+"_sure").style.display = "none";

}

function vizualSure(id){

	document.getElementById(id+"_wrap").style.display = "none";

	var num = id;
	var i = num.length - 1;
	while( num[i] != '_' ){ i -= 1; }
	num = num.substring(i+1);

	$.ajax({
	  type: "POST",
	  url: window.location.origin + pathToVizualDelete,
	  data: "folder_num="+num,
	  success: function(msg){
	        
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) {
	     alert("could not delete files");
	  }
	});

}

var selected = null;

function vizualHighlight(el){
	if( el == selected ){ return; }
	el.style.borderStyle = "solid";
	el.style.borderWidth = "5px";
	el.style.borderColor = "#E0E0EB";
}

function vizualUnhighlight(el){
	if( el != selected ){
		el.style.borderStyle = "none";
	}
}

function vizualSelect(el){
	document.getElementById("vizualPleaseSelect").style.display = "none";

	var els = document.getElementsByName("vizualPreviews");
	for(var i = 0; i < els.length; i++){
		if( els[i] == el ){
			var files = document.getElementById("vizualInput").files;
			for(var j = 0; j < files.length; j++){
				if( el.id == files[j].name ){
					document.getElementById("vizualCoverPic").value = document.getElementById("vizualInput").files[j].name;
					break;
				}
			}
			break;
		}
	}

	if( selected != null ){
		selected.style.borderStyle = "none";
	}

	selected = el;
	el.style.borderStyle = "solid";
	el.style.borderWidth = "5px";
	el.style.borderColor = "#70B8FF";
}

function vizualUpdateLoadBar(n,total){
	var perc = Math.floor( n * 100 / total );
	document.getElementById("vizualLoading").style.width = perc.toString() + "%";
}


