function loadNotes(){
    // Esto esta sacado del libro de Carlos Azaustre
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            const respuesta = JSON.parse(this.responseText);
            const respuestaHTML = document.getElementById('notesCol');
            let tpl = '';
            for (let i = 0, long = respuesta['data'].length; i < long; i++) {
                let id = respuesta['data'][i]['id'];
                let title = respuesta['data'][i]['title'];
                let note = respuesta['data'][i]['note'];
                
                tpl += "<div class='card note' id='"+id+"' onclick='showEditNoteModal("+id+")'>"+
                            "<div class='card-body'>"+
                                "<h5 class='card-title'>"+title+"</h5>"+
                                "<p class='card-text'>"+note+"</p>"+
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
    document.getElementById('titleNote').innerHTML = "Add Note";
    document.getElementById('btnEditNote').style.display = 'none';
    document.getElementById('btnDeleteNote').style.display = 'none';
    //document.querySelector("#addEditNoteModal").modal('show');
    $("#addEditNoteModal").modal('show');
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
                $("#addEditNoteModal").modal('hide');
                loadNotes();
            }
        }
        xhr.open("POST", "utils/addNote.php", true);
        xhr.send(formData);
    }
}

function showEditNoteModal(id){
    const title = document.getElementById(id).getElementsByTagName('h5')[0].innerHTML;
    const note = document.getElementById(id).getElementsByTagName('p')[0].innerHTML;

    document.getElementById('idHiddenNote').value = id;
    document.getElementById('titleNoteForm').value = title;
    document.getElementById('newNoteForm').value = note;
    document.getElementById('titleNote').innerHTML = "Edit Note";
    document.getElementById('btnAddNote').style.display = 'none';
    //document.querySelector("#addEditNoteModal").modal('show');
    $("#addEditNoteModal").modal('show');
    
}

function editNote(){
    const idNote = document.getElementById('idHiddenNote').value;
    console.log("EL ID A EDITAR ES: " + idNote);
    
    const noteTitle = document.getElementById('titleNoteForm');
    const newNote = document.getElementById('newNoteForm');

    if (!noteTitle.value && !newNote.value) {
        alert("Sorry. To save a new note you have to fill in the title and note fields")
    } else {
        let formData = new FormData();
        formData.append("idNote", idNote);
        formData.append("noteTitle", noteTitle.value);
        formData.append("newNote", newNote.value);

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // TODO => Falta com obtinc la resposta de l'arxiu addNote.php per controlar errors
                //         Potser que no siga necessari ja que en la consulta esta posat per a que
                //         mostre un error
                $("#addEditNoteModal").modal('hide');
                loadNotes();
            }
        }
        xhr.open("POST", "utils/editNote.php", true);
        xhr.send(formData);
    }

}

window.addEventListener('load', function(event){
    loadNotes();
    const btnShowModalAddNote = document.querySelector("#btnShowModalAddNote");
    const btnAddNote = document.querySelector("#btnAddNote");
    const btnEditNote = document.querySelector("#btnEditNote");
    btnShowModalAddNote.addEventListener("click",showAddNoteModal, false);
    btnAddNote.addEventListener("click", addNote, false);
    btnEditNote.addEventListener("click", editNote, false);
});



