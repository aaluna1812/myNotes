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
            return respuestaHTML.innerHTML  = tpl;
        }
    }
    xhr.open("POST", "utils/selectAllNotes.php", true);
    xhr.send();
}

function showAddNoteModal(){
    document.getElementById('titleNoteForm').value = '';
    document.getElementById('newNoteForm').value = '';
    //document.querySelector("#addNoteModal").display = 'block';
    $("#addNoteModal").modal('show');
}

function addNote(){
    const noteTitle = document.getElementById('titleNoteForm');
    const newNote = document.getElementById('newNoteForm');

    if (!noteTitle.value && !newNote.value) {
        alert("Sorry. To save a new note you have to fill in the title and note fields")
    } else {
        let formData = new FormData();
        formData.append("noteTitle", noteTitle.value);
        formData.append("newNote", newNote.value);

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // TODO => Falta com obtinc la resposta de l'arxiu addNote.php per controlar errors
                //         Potser que no siga necessari ja que en la consulta esta posat per a que
                //         mostre un error
                $("#addNoteModal").modal('hide');
                loadNotes();
            }
        }
        xhr.open("POST", "utils/addNote.php", true);
        xhr.send(formData);
    }
}

window.addEventListener('load', function(event){
    loadNotes();
    const btnShowModalAddNote = document.querySelector("#btnShowModalAddNote");
    const btnAddNote = document.querySelector("#btnAddNote");
    btnShowModalAddNote.addEventListener("click",showAddNoteModal, false);
    btnAddNote.addEventListener("click", addNote, false)
});



