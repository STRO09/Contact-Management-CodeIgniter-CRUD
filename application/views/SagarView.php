<!DOCTYPE html>
<html>
  <head>
    <title>View Contacts - Sagar</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    body {
    background-color: #f8f9fa;
    }
    .navbar {
    margin-bottom: 30px;
    }
    legend {
    font-size: 1.5em;
    font-weight: bold;
    color: #333;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
    }
    .table {
    background: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .table th {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    }
    .table td {
    vertical-align: middle;
    }
    .table a {
    margin-right: 10px;
    text-decoration: none;
    }
    .table a:hover {
    text-decoration: underline;
    }
    .btn-default {
    background-color: #007bff;
    color: #fff;
    border: none;
    }
    .btn-default:hover {
    background-color: #0056b3;
    color: #fff;
    }
    .container {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
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
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main style="margin-top:80px;">
      <div class="container">
        <legend>Contacts</legend>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Phone Number</th>
              <th>Contact Name</th>
              <th>Address</th>
              <th>Actions</th>
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
              <td>
                <a href="<?= site_url('Sagarcontroller/editForm/'.$contact['id']) ?>" class="btn btn-xs btn-warning">Edit</a>
                <a href="<?= site_url('Sagarcontroller/delete/'.$contact['id']) ?>" class="btn btn-xs btn-danger">Delete</a>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </main>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  </body>
</html>