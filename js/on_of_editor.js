function on_of_editor(){
	var check = document.getElementById('on-of-editor');
	var turn = document.getElementById('edit_textarea');

	if($('#edit_textarea').css('display') == 'block'){
		$('#edit_textarea').css('display','none');
		$('#toolbar-container').css('display','block');
		$('#editor').css('display','block');
		return;
	}
	if($('#edit_textarea').css('display') != 'block'){
		$('#edit_textarea').css('display','block');
		$('#toolbar-container').css('display','none');
		$('#editor').css('display','none');
		return;
	}
	
	

}