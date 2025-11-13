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
      h2 {
        font-weight: 600;
        margin-bottom: 20px;
        color: #444;
      }
      .contact-card {
        background: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        margin-top: 20px;
        transition: transform 0.2s ease-in-out;
      }
      .contact-card:hover {
        transform: translateY(-3px);
      }
      .contact-card p {
        font-size: 1.1em;
        margin: 10px 0;
      }
      .contact-card strong {
        color: #007bff;
      }
      .alert-info, .alert-danger {
        font-size: 1.1em;
        border-radius: 6px;
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
              <li class="active"><a href="<?php echo site_url('Sagarcontroller')?>">Contacts List</a></li>
              <li><a href="<?php echo site_url('Sagarcontroller/loadinsert')?>">Add a Contact</a></li>
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
        <h2>
          <?php echo isset($contact) ? "<div class='alert alert-info'>Found Your Contact!</div>" : "<div class='alert alert-danger'>No Contacts Found...</div>"; ?>
        </h2>

        <?php
        echo isset($contact) ?
        "
        <div class='contact-card text-center'>
          <p><strong>Contact Number:</strong> " . $contact['contactno'] . "</p>
          <p><strong>Contact Name:</strong> " . $contact['contactname'] . "</p>
          <p><strong>Contact Address:</strong> " . $contact['address'] . "</p>
        </div>
        " : "";
        ?>
      </div>
    </main>

    <footer>
      <p>&copy; <?php echo date('Y'); ?> Contact Management System - Sagar</p>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
