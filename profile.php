<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" media="all" href="static/css/bootstrap.min.css">

        <title>Home</title>

    <title>My Drive | Profile</title>
</head>
<body class="p-3 mb-2 bg-light text-black">
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a href="index.html" class="navbar-brand">
            <img src="images/unlimited-cloud-storage-2.jpg" height="28" alt="CoolBrand" />
            My Drive Storage
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <body class="p-3 mb-2 bg-light text-black">
        <div class="container">
            <div id="logoutDiv">
                <form action="profile.php" method="POST">
                    <button type="submit" id="logout_button" class="btn btn-secondary float-right">Logout</button>
                </form>
            </div>    
            <div id="contentDiv" style="clear: right;">
                <nav style="clear: right;">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-files-tab" data-toggle="tab" href="#nav-files" role="tab" aria-controls="nav-files" aria-selected="true">Files</a>
                        <a class="nav-item nav-link" id="nav-notes-tab" data-toggle="tab" href="#nav-notes" role="tab" aria-controls="nav-notes" aria-selected="false">Notes</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-files" role="tabpanel" aria-labelledby="nav-files-tab">

                        <form action="include/upload.inc.php" action="#" enctype="multipart/form-data" method="POST">
                            <div class="container">
                                <div class="row" style="margin: 1em;">
                                    <div class="col-sm-2">
                                        <label for="fileUpload">Upload a New File:</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-dark">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <footer class="footer position-fixed">
        <div class="container fixed-bottom">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
        <div class="table-responsive">
                            <table class="table table-striped" id="fileTable">
                                <thead>
                                    <tr>
                                        <th style="width:20%" scope="col"></th>
                                        <th style="width:80%" scope="col">File Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr">
                                    <td>
                                        <a target="_blank" href="#" class="btn btn-success">View</a>

                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                    <th scope="row">File.txt</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-notes" role="tabpanel" aria-labelledby="nav-notes-tab">
                        <button style="margin: 0.25em;" type="button" class="btn btn-info float-right" onclick="showNoteModal()">
                            + Add a New Note
                        </button>

                        <div class="table-responsive">
                            <div  aria-activedescendant="" class="alert alert-success fill-parent" if="${param.success}">
                                <span id="noteOpSuccess" text="${param.message}">Operation Success</span>
                            </div>

                            <div  class="alert alert-danger fill-parent" if="${param.error}">
                                <span id="noteOpError" text="${param.message}">Operation Failed</span>
                            </div>
                            <table class="table table-striped" id="noteTable">
                                <thead>
                                    <tr>
                                        <th style="width:20%" scope="col"></th>
                                        <th style="width:20%" scope="col">Title</th>
                                        <th style="width:60%" scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr each="note: ${notes}">
                                        <td>
                                            <button type="button" class="btn btn-success"
                                                    onclick="showNoteModal('ID-1','Title-1', 'Description-1')">Edit
                                            </button>
                                            <a href="@{'home/notes/delete/' + ${note.noteid}}" class="btn btn-danger">Delete</a>
                                        </td>
                                        <th scope="row">Note Title</th>
                                        <td>Note Description </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="noteModalLabel">Note</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" action="@{/home/notes}" method="POST">
                                            <input type="hidden" name="noteId" id="note-id">
                                            <div class="form-group">
                                                <label for="note-title" class="col-form-label">Title</label>
                                                <input type="text" name= "noteTitle" class="form-control" id="note-title" maxlength="20" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="note-description" class="col-form-label">Description</label>
                                                <textarea class="form-control" name="noteDescription" id="note-description" rows="5" maxlength="1000" required></textarea>
                                            </div>
                                            <button id="noteSubmit" type="submit" class="d-none"></button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="$('#noteSubmit').click();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Alert Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p id="error"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="static/js/jquery-slim.min.js"></script>
        <script src="static/js/popper.min.js"></script>
        <script src="static/js/bootstrap.min.js"></script>

        <!--For opening the note modal-->
        <script type="text/javascript">
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                console.log("tab shown...");
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');

            if (activeTab) {
               $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
            }

            // For opening the note modal
            function showNoteModal(noteId, noteTitle, noteDescription) {
                console.log('NoteID: '+noteId+" NoteTitle: "+noteTitle+" NoteDescription: "+noteDescription);
                $('#note-id').val(noteId ? noteId : '');
                $('#note-title').val(noteTitle ? noteTitle : '');
                $('#note-description').val(noteDescription ? noteDescription : '');
                $('#noteModal').modal('show');
            }
        </script>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>