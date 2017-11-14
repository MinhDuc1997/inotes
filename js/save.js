var domain = 'http://techitvn.com/inotepad/';

function stringGen(len)
{
    var text = '';
    
    var charset = 'abcdefghijklmnopqrstuvwxyz0123456789';
    
    for( var i=0; i < len; i++ )
        text += charset.charAt(Math.floor(Math.random() * charset.length));
    
    return text;
}

function SaveNote(){
	var random = stringGen(16);
	var title = document.getElementById('edit_title');
	var note_temp = document.getElementById('edit_textarea');
	var note = '';
	var note_editor = document.getElementsByClassName('ql-editor')[0];

	var d = new Date();

	if($('#edit_textarea').css('display') == 'block'){

		if(title.value.length == 0 && note_temp.value.length == 0){
			document.getElementById('p-url').style.display = 'block';
			document.getElementById('p-url').innerHTML = 'Không có gì để lưu';
			document.getElementById('url').innerHTML = '';
		}

		else{

			var lines = $('#edit_textarea').val().split('\n');
			for(var i = 0;i < lines.length;i++){
			    note += lines[i] + '<br>';
			}
			
			/*if (typeof(Storage) !== 'undefined') { 
			    sessionStorage.setItem('title', title.value);
			    sessionStorage.setItem('note', note);
			    sessionStorage.setItem('note-url',random);
		    	//alert(sessionStorage.getItem('note'));
			} 
			else {
			    alert('Trình duyệt này không hỗ trợ');
			}
*/			
			$.ajax({
	            type: "POST",
                url: domain + 'hand/save.php',
                data: ({
                	title: title.value,
                	random: random,
                	note: note
                }),
	            success: function(data)
	                {
	                    //alert("success!");
	                    document.getElementById('p-url').style.display = 'block';
					    document.getElementById('p-url').innerHTML = 'Đã lưu: ('+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds() +')';
					    document.getElementById('url').setAttribute('href', domain + 'note/open.php?note=' + random);
					   	document.getElementById('url').innerHTML = domain + 'note/open.php?note=' + random;
					   	var url_gl = domain + 'note/open.php?note=' + random;
	                	get_gl_auto(url_gl);
	                }
	        });
		}
	}
	if($('#edit_textarea').css('display') != 'block'){
		//alert(title.value);
		//alert(note_editor.innerHTML);
		if(title.value.length == 0 && note_editor.innerHTML.length == 11){
			document.getElementById('p-url').style.display = 'block';
			document.getElementById('p-url').innerHTML = 'Không có gì để lưu';
			document.getElementById('url').innerHTML = '';
		}
		else{
			//alert(note_editor.innerHTML);
			$.ajax({
	            type: "POST",
                url: domain + 'hand/save.php',
                data: ({
                	title: title.value,
                	random: random,
                	note: note_editor.innerHTML
                }),
	            success: function(data)
	                {
	                    //alert("success!");
	                    document.getElementById('p-url').style.display = 'block';
					    document.getElementById('p-url').innerHTML = 'Đã lưu: ('+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds() +')';
					    document.getElementById('url').setAttribute('href',domain + 'note/open.php?note=' + random);
					   	document.getElementById('url').innerHTML = domain + 'note/open.php?note=' + random;
	                	var url_gl = domain + 'note/open.php?note=' + random;
	                	get_gl_auto(url_gl);
	                }
	        });
		}
	}
}