tinyMCEPopup.requireLangPack();

var YouTubeDialog = {
	init : function() {
	},

	insert : function() {
		// Insert the contents from the input into the document
		var alg = document.forms[0].youtubeAlign.value;
		if(alg == "" || alg == "justify") {
			var embedCode = '<iframe id="iframeyoutube" width="'+document.forms[0].youtubeWidth.value+'" height="'+document.forms[0].youtubeHeight.value+'" src="'+document.forms[0].youtubeID.value+'" frameborder="0"></iframe>';
		}
		else if(alg == "left" || alg == "right") {
			var embedCode = '<iframe style="float:'+alg+'" id="iframeyoutube'+alg+'" width="'+document.forms[0].youtubeWidth.value+'" height="'+document.forms[0].youtubeHeight.value+'" src="'+document.forms[0].youtubeID.value+'" frameborder="0" hspace="'+document.forms[0].youtubeHspace.value+'" vspace="'+document.forms[0].youtubeVspace.value+'"></iframe>';
		}
		else if(alg == "center"){
			var embedCode = '<iframe style="display: block; margin-left: auto; margin-right: auto;" id="iframeyoutube'+alg+'" width="'+document.forms[0].youtubeWidth.value+'" height="'+document.forms[0].youtubeHeight.value+'" src="'+document.forms[0].youtubeID.value+'" frameborder="0" hspace="'+document.forms[0].youtubeHspace.value+'" vspace="'+document.forms[0].youtubeVspace.value+'"></iframe>';
		}
		tinyMCEPopup.editor.execCommand('mceInsertRawHTML', false, embedCode);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(YouTubeDialog.init, YouTubeDialog);
