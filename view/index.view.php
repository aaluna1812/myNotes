<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/practica_1.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="js/practica_1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Practica 1</title>
</head>
<body>
    <div class="container">
        <div class="row" id="board">
            <div class="row rowNotes">
                <h2 class="h4">My Notes</h2>
            </div>
            <div class="row rowNotes" id="noteBoard">
                <div class="col-sm-3 btn-group">
                    <button type="button" class="btn btn-primary align-bottom" data-toggle="modal" data-target="#addNoteModal" id="btnShowModalAddNote">Add note</button>
                </div>
                <div class="col-9">
                    <div class="row" id="notasGuardadas">
                        <div class="col-sm-12" id="notesCol"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOQUE MODALES -->
    <div class="modal fade" tabindex="-1" id="addEditNoteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titleNote"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addNoteForm">
                    <div class="col-sm-6">
                        <label for="titleNoteForm" class="form-label">Note title</label>
                        <input type="text" class="form-control" id="titleNoteForm">
                    </div>
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <label for="newNoteForm" class="form-label">Note</label>
                        <textarea class="form-control" id="newNoteForm"></textarea>
                    </div>
                </form>
                <input type="hidden" id="idHiddenNote" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDeleteNote">Delete</button>
                <button type="button" class="btn btn-primary" id="btnEditNote">Edit</button>
                <button type="button" class="btn btn-primary" id="btnAddNote">Add</button>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="deleteNoteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titleNoteDelete">Delete note</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this note?</p>
                <input type="hidden" id="idHiddenDeleteNote" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelete">Delete</button>
            </div>
          </div>
        </div>
    </div>
</body>
</html>