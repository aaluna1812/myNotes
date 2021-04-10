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

function showAddNoteModal(e){
    e.preventDefault();
    document.getElementById('titleNoteForm').value = '';
    document.getElementById('newNoteForm').value = '';
    //document.querySelector("#addNoteModal").display = 'block';
    $("#addNoteModal").modal('show');
}

function addNote(e){
    e.preventDefault();
    let noteTitle = document.getElementById('titleNoteForm').value;
    let newNote = document.getElementById('newNoteForm').value;
    console.log(noteTitle);
    console.log(newNote);
}

window.addEventListener('load', function(event){
    loadNotes();
    const btnShowModalAddNote = document.querySelector("#btnShowModalAddNote");
    const btnAddNote = document.querySelector("#btnAddNote");
    btnShowModalAddNote.addEventListener("click",showAddNoteModal, false);
    btnAddNote.addEventListener("click", addNote, false)
});



