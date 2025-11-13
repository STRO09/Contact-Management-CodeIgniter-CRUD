<!DOCTYPE html>
<html>
  <head>
    <title>View Contacts - Sagar</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    body {
    background-color: #f8f9fa;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .navbar {
    margin-bottom: 30px;
    border-radius: 0;
    }
    .navbar-brand {
    font-weight: bold;
    font-size: 1.3em;
    }
    legend {
    font-size: 1.5em;
    font-weight: bold;
    color: #333;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
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
    .form-container {
    background: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    margin-top: 40px;
    }
    .form-group label {
    font-weight: 500;
    color: #555;
    }
    .form-control {
    border-radius: 6px;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn-primary {
    background-color: #007bff ;
    border: none;
    padding: 10px 20px;
    font-size: 1.1em;
    border-radius: 6px;
    transition: background-color 0.2s ease-in-out;
    }
    .btn-primary:hover {
    background-color: #0056b3;
    }
    footer {
    margin-top: 50px;
    padding: 20px;
    background: #222;
    color: #aaa;
    text-align: center;
    }
    </style>
  </head>
  <body>
    <header id="header">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Contact Management System</a>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo site_url('Sagarcontroller')?>">Contacts List</a></li>
              <li class="active"><a href="#">Add a Contact</a></li>
            </ul>
            <form class="navbar-form navbar-left" method="POST" role="search" action="<?php echo site_url('Sagarcontroller/getSingle')?>">
              <div class="form-group">
                <input type="text" class="form-control" name="contactname" placeholder="Search By Name...">
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
        <div class="form-container">
          <form action="<?= site_url('Sagarcontroller/insertForm') ?>" method="POST">
            <legend>Add a New Contact</legend>
            <div class="form-group">
              <label for="contactno">Contact Number <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="contactno" name="contactno" pattern="[0-9]{10}" placeholder="Enter 10-digit number" required>
            </div>
            <div class="form-group">
              <label for="contactname">Contact Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Enter full name" required>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address <span class="text-muted">(Optional)</span></label>
              <textarea name="address" id="inputAddress" class="form-control" rows="3" placeholder="Enter address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Insert</button>
          </form>
        </div>
      </div>
    </main>
    <footer>
      <p>&copy; <?php echo date('Y'); ?> Contact Management System - Sagar</p>
    </footer>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>