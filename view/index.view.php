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
        <div class="row rowNotes">
            <div class="col-9">
                <h2 class="h4">My Notes</h2>
                <div id="notasGuardadas">
                    <div class="row">
                        <div class="col-sm-12" id="notesCol"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row rowNotes" style="margin-top: 50px;">
            <div class="col-sm-5 btn-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNoteModal" id="anyadirNota" onclick="showAddNoteModal()">Add note</button>
                <button type="button" class="btn btn-danger" id="borrarNota" onclick="showDeleteNoteModal()">Delete note</button>
            </div>
        </div>
    </div>
    <!-- BLOQUE MODALES -->
    <div class="modal fade" tabindex="-1" id="addNoteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Note</h5>
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="addNote()">Add</button>
            </div>
          </div>
        </div>
      </div>
</body>
</html>