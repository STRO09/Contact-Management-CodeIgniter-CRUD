<!DOCTYPE html>
<html>
  <head>
    <title>View Contacts - Sagar</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/ciproject/assets/styles.css">
    <style>
    /* Position toast at top center */
    .toast-top {
    display: none; /* hidden by default */
    position: fixed;
    top: 70px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 250px;
    background: rgba(0,0,0,0.7);
    color: #fff;
    z-index: 9999;
    padding: 10px;
    border-radius: 4px;
    }
    </style>
  </head>
  <body>
    <header id="header" class="">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Contact Management System</a>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Contacts List</a></li>
              <li><a href="<?php echo site_url('Sagarcontroller/loadinsert')?>">Add a Contact</a></li>
            </ul>
            <form class="navbar-form navbar-left" method="POST" role="search" action="<?php echo site_url('Sagarcontroller/getSingle')?>">
              <div class="form-group">
                <input type="text" class="form-control" name="contactname" placeholder="Search By Name....">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href=" <?php echo site_url('SagarController/uploadCSV')?>">Upload CSV</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main style="margin-top:80px; ">
      <div class="container">
        <!-- Toast placed at top -->
        <?php if($this->session->flashdata('success')): ?>
        <div class="toast-top">
          <strong>Action Performed</strong><br>
          <?= $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <!-- legend and search  -->
        <fieldset>
          <div class="row">
            <legend class="col-sm-9">Contacts</legend>
            <div class="col-sm-3">
              <form class="form-inline">
                <div class="form-group"> Search: <input type="text" class="form-control" id="search"></div>
              </form>
            </div>
          </div>
        </fieldset>
        <!-- table -->
        <div style="max-height:400px; overflow-y:auto;">
          <table class="table table-striped table-hover" id="datatable">
            <thead>
              <tr>
                <th>Phone Number</th>
                <th>Contact Name</th>
                <th>Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody> <?php
              foreach($contacts as $contact) {
              ?> <tr>
                <td> <?= $contact['contactno'] ?> </td>
                <td> <?= $contact['contactname'] ?> </td>
                <td> <?= $contact['address'] ?> </td>
                <td>
                  <a data-toggle="modal" href='#modal-id' data-id="<?= $contact['id'] ?>" data-contactno="<?= $contact['contactno'] ?>" data-contactname="<?= $contact['contactname'] ?>" data-address="<?= $contact['address'] ?>" class="btn btn-xs btn-warning editBtn">Edit</a>
                  <a href="<?= site_url('Sagarcontroller/delete/'.$contact['id']) ?>" onClick="return confirm('Are you sure you want to delete? ')" class="btn btn-xs btn-danger">Delete</a>
                </td>
              </tr> <?php } ?> </tbody>
            </table>
          </div> <?= $links ?>
        </div>
        <!-- modal -->
        <div class="modal fade" id="modal-id">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="editForm" method="post" action="<?= site_url('Sagarcontroller/update') ?>">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Contact</h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" id="contact_id">
                  <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" class="form-control" name="contactno" id="contact_no">
                  </div>
                  <div class="form-group">
                    <label>Contact Name</label>
                    <input type="text" class="form-control" name="contactname" id="contact_name">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="contact_address">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </main>
      <footer class="navbar-inverse">
        <p>&copy; <?php echo date('Y'); ?> Contact Management System - Sagar</p>
      </footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script>
      $(document).ready(function() {
      var toast = $('.toast-top');
      if(toast.length) {
      toast.fadeIn(400).delay(3000).fadeOut(400);
      }
      });
      </script>
      <script>
      // to populate modals
      $(document).on("click", ".editBtn", function() {
      var id = $(this).data('id');
      var contactno = $(this).data('contactno');
      var contactname = $(this).data('contactname');
      var address = $(this).data('address');
      // Fill modal inputs
      $("#contact_id").val(id);
      $("#contact_no").val(contactno);
      $("#contact_name").val(contactname);
      $("#contact_address").val(address);
      });
      </script>
      <script>
      // Search functionality
      const search = document.getElementById('search');
      const table = document.getElementById('datatable');
      search.addEventListener('input', () => {
      const value = search.value.toLowerCase();
      const row = table.querySelectorAll("tbody tr");
      for(let i = 0; i < row.length; i++) {
      const td = row[i].querySelectorAll("td");
      let found = false;
      for(let j = 0; j < td.length; j++) {
      if(td[j].textContent.toLowerCase().includes(value)) {
      found = true;
      break;
      }
      }
      found ? row[i].style.display = "" : row[i].style.display = "none";
      }
      })
      </script>
    </body>
  </html>