<?php
  require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>
    Sample Registered Companies and Contacts
    </title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <h1>Sample Registered Companies and Contacts</h1>
    <br>
    <header>
      <p>Welcome to this site. This is just a sample registration web app to show-off information stored in a sql database, css styling show-off, and the
      fetching of information from the sql database. Also in this app, there is php application and jquery. Companies shown here and phone numbers are 
      are not real. It's just a sample display. 
      <p>Go to <a href="registration.php">REGISTRATION PAGE</a></p></p>
      </header>
    <main>
    <table>
      <tr>
        <th>Companies name</th>
        <th>Contact person</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
      <?php
         $sql = "SELECT companyname, firstname, lastname, email, phonenumber from users";
         $result = $db -> query($sql);

         if ($result) {
             while($row = $result-> fetch()) {
                 echo "<tr><td>" . $row["companyname"] . "</td><td>" . $row["lastname"] . ", " . $row["firstname"] . "</td>
                 <td>" . $row["email"] . "</td><td>" . $row["phonenumber"] . "</td></tr>";
             }
         } else {
             echo "0 result";
         }
      ?>
    </table>
        </main>
        <footer>
             &copy; <?php echo date("Y"); ?>
        </footer>
</body>
</html>