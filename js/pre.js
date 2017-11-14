var domain = 'http://techitvn.com/inotepad/';

function stringGen(len)
{
    var text = '';
    
    var charset = 'abcdefghijklmnopqrstuvwxyz0123456789';
    
    for( var i=0; i < len; i++ )
        text += charset.charAt(Math.floor(Math.random() * charset.length));
    
    return text;
}

function PreNote(){
	var random = stringGen(16);
	var title = document.getElementById('edit_title');
	var note_temp = document.getElementById('edit_textarea');
	var note = '';
	var note_editor = document.getElementsByClassName('ql-editor')[0];

	var d = new Date();

	if($('#edit_textarea').css('display') == 'block'){

		if(title.value.length == 0 && note_temp.value.length == 0){
			document.getElementById('p-url').style.display = 'block';
			document.getElementById('p-url').innerHTML = 'Không có gì để xem';
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
                url: domain + 'hand/pre.php',
                data: ({
                	title: title.value,
                	random: random,
                	note: note
                }),
	            success: function(data)
	                {
	                   window.open(domain + 'note/pre.php?note='+random)
	                }
	        });
		}
	}
	if($('#edit_textarea').css('display') != 'block'){
		//alert(title.value);
		//alert(note_editor.innerHTML);
		if(title.value.length == 0 && note_editor.innerHTML.length == 11){
			document.getElementById('p-url').style.display = 'block';
			document.getElementById('p-url').innerHTML = 'Không có gì để xem';
			document.getElementById('url').innerHTML = '';
		}
		else{
			$.ajax({
	            type: "POST",
                url: domain + 'hand/pre.php',
                data: ({
                	title: title.value,
                	random: random,
                	note: note_editor.innerHTML
                }),
	            success: function(data)
	                {
	                    //alert("success!");
	                     window.open(domain + 'note/pre.php?note='+random)
	                }
	        });
		}
	}
}