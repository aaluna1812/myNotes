function loadNotes(){
    // Esto esta sacado del libro de Carlos Azaustre
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            const respuesta = JSON.parse(this.responseText);
            const respuestaHTML = document.getElementById('notesCol');
            let tpl = '';

            for (let i = 0, long = respuesta['data'].length; i < long; i++) {
                tpl += "<div class='card' id='"+respuesta['data'][i]['id']+"'>"+
                            "<div class='card-body'>"+
                                "<h5 class='card-title'>"+respuesta['data'][i]['title']+"</h5>"+
                                "<p class='card-text'>"+respuesta['data'][i]['note']+"</p>"+
                            "</div>"+
                        "</div>";
            }
            respuestaHTML.innerHTML  = tpl;
        }
    }


    xhr.open("POST", "utils/selectAllNotes.php", true);
    xhr.send();
}

function showAddNoteModal(){
    document.getElementById('titleNoteForm').value = '';
    document.getElementById('newNoteForm').value = '';
    $("#addNoteModal").modal('show');
}

function addNote(){

    let noteTitle = document.getElementById('titleNoteForm').value;
    let newNote = document.getElementById('newNoteForm').value;

    if (!newNote && !noteTitle) {
        alert("Sorry. If you don't write a note I can't save it")
    }else{
        let divNote = document.createElement('div');
        divNote.className = 'colNota';
        //divNote.id = "nota"
        let title = document.createElement('p');
        title.className = "h4";
        title.id = "titleNote";
        let note = document.createElement('p');
        note.id = "note"
        title.innerHTML = noteTitle;
        note.innerHTML = newNote;
        divNote.appendChild(note);
        divNote.insertBefore(title, note)
        document.getElementById('notasGuardadas').appendChild(divNote);
        $("#addNoteModal").modal('hide');

        console.log(document.getElementsByClassName('colNota').length);
        addListener(true, noteTitle, newNote);
    }
}

window.addEventListener('load', function(event){
    loadNotes();
});



