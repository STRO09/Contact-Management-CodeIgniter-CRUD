<!DOCTYPE html>
<html>
  <head>
    <title>View Contacts - Sagar</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <header id="header" class="">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Contact Management System</a>
          </div>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li ><a href="<?php echo site_url('Sagarcontroller')?>">Contacts List</a></li>
              <li class="active"><a href="#">Add a Contact</a></li>
            </ul>
            <form class="navbar-form navbar-left" method="POST" role="search" action="<?php echo site_url('Sagarcontroller/getSingle')?>">
              <div class="form-group">
                <input type="text" class="form-control" name="contactname" placeholder="Search By Name....">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
            </div><!-- /.navbar-collapse -->
          </div>
        </nav>
      </header>
      <main>
        <div class="container m-5 p-5">
          <form action="<?= site_url('Sagarcontroller/insertForm') ?>" method="POST">
            <legend> Add a new Contact</legend>
            <div class="form-group">
              <label for="">Contact Number</label><span class="text-danger"> *</span>
              <input type="text" class="form-control" pattern="[0-9]{10}" id="" placeholder="Input field"  name="contactno"required>
            </div>
            <div class="form-group">
              <label for="">Contact Name</label> <span class="text-danger"> *</span>
              <input type="text" class="form-control" id="" placeholder="Input field" name="contactname" required>
            </div>
            <div class="form-group">
              <label for="">Address</label> <span>  (Optional)</span>
              <textarea name="address" id="inputAddress" class="form-control" rows="3"></textarea>
            </div>
            <button type="Submit" class="btn btn-primary">
            Insert
            </button>
          </form>
        </div>
      </main>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </body>
  </html>