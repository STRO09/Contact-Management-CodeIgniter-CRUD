<!DOCTYPE html>
<html>
  <head>
    <title>View Contacts - Sagar</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/ciproject/assets/styles.css">
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
              <li class="active"><a href="<?php echo site_url('Sagarcontroller')?>">Contacts List</a></li>
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
                  <li><a href="<?php echo site_url('SagarController/uploadCSV')?>">Upload CSV</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main style="margin-top:80px; margin-bottom: 80px;">
      <div class="container" style="border: 1px solid #337ab7; width: 500px; margin-top: 130px; ">
        <legend class="text-center">PREVIEW OF CSV DATA</legend>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Phone Number</th>
              <th>Contact Name</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($contacts as $contact) {
            ?>
            <tr>
              <td> <?= $contact['contactno'] ?> </td>
              <td> <?= $contact['contactname'] ?> </td>
              <td> <?= $contact['address'] ?> </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <form action="<?= site_url('Sagarcontroller/insertMultiple') ?>" method="POST">
          <h3 class="text-center">Confirm Insertion ? </h3>
          <div class="text-center">
            <?php foreach ($contacts as $i => $contact): ?>
            <input type="hidden" name="contacts[<?= $i ?>][contactno]" value="<?= $contact['contactno'] ?>">
            <input type="hidden" name="contacts[<?= $i ?>][contactname]" value="<?= $contact['contactname'] ?>">
            <input type="hidden" name="contacts[<?= $i ?>][address]" value="<?= $contact['address'] ?>">
            <?php endforeach; ?>
            <button type="submit" class="btn btn-success">Insert</button>
            <button type="button" onclick="window.location.href='<?php echo site_url("SagarController") ?>' " class="btn btn-danger">Cancel</button>
          </div>
        </form>
      </div>
    </main>
    <footer class="navbar-inverse navbar-fixed-bottom">
      <p>&copy; <?php echo date('Y'); ?> Contact Management System - Sagar</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  </body>
</html>