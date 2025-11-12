<!DOCTYPE html>
<html>
<head>
  <title>View Contacts - Sagar</title>
</head>


<body>



<div>
 
  <form action="<?= site_url('Sagarcontroller/insertForm') ?>" method="POST">
  <h2> Add a new Contact</h2>
  <div>
    Contact Number :
    <input type="number" name="contactno" required> <br>
    Contact Name:
    <input type="text" name="contactname" required> <br>
    Address:
    <textarea name="address">
    </textarea> <br>

    <button type="Submit">
      Insert
    </button>
  </div>
  </form>
</div>



  <div>
    <h2>------------CONTACTS-------</h2>
    <table>
      <thead>
        <th>
          Phone Number
        </th>
        <th>
          Contact name
        </th>
        <th>
          Address
        </th>
        <th>Actions</th>
      </thead>
      <tbody>
        <?php
        foreach($contacts as $contact) {
        ?>

        <tr>
          <td> <?= $contact['Contact'] ?> </td>
          <td> <?= $contact['Name'] ?> </td>
          <td> <?= $contact['Address'] ?> </td>
          <td> <a href="<?= site_url('Sagarcontroller/editForm'.$contact['id']) ?>">Edit</a>
           <a href="<?= site_url('Sagarcontroller/deleteForm'.$contact['id']) ?>">Delete</a>
          </td>

        </tr>
        <?php
      }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>