function click(tag){	
	window.parent.jInsertEditorText(tag, $GKEditor);
	window.parent.document.getElementById('sbox-window').close();	
}