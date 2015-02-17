
function price_el(element){

	element.value = price(element.value);

}

function price(string){

	var ret = "";

	for(var i = 0; i < string.length; i++){
		if( string[i] >= '0' && string[i] <= '9' ){
			ret += string[i];
		}
		else if( string[i] == '.' ){ break; }
	}

	if( ret.length == 0 ){ return ""; }

	ret = parseInt(ret);
	ret = ret.toString();

	ret = reverse(ret);
	string = "";

	for(var i = 0; i < ret.length; i++){
		if( i != 0 && i % 3 == 0 ){ string += ','; }
		string += ret[i];
	}
	string += "$";

	return reverse(string);

}

function reverse(string){

	var ret = "";

	for(var i = 0; i < string.length; i++){
		ret += string[string.length-1-i];
	}

	return ret;

}

function unprice(string){

	var ret = "";

	for(var i = 0; i < string.length; i++){
		if( string[i] >= '0' && string[i] <= '9' ){
			ret += string[i];
		}
		else if( string[i] == '.' ){ break; }
	}

	return ret;

}







