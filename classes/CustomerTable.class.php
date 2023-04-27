<?php
class CustomersTable {
  private $result;

  public function __construct($result) {
    $this->result = $result;
  }

  public function generate() {
    $html = '
      <h2>Customers Table</h2>
      <ul>
        <li><a href="add_user.php">Add User</a></li>
      </ul>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Login</th>
          <th>Phone</th>
          <th>Address</th>
          <th>City</th>
          <th>Edit/Remove</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($this->result)) {
      $html .= '
        <tr>
          <td>' . $row['ID'] . '</td>
          <td>' . $row['Name'] . '</td>
          <td>' . $row['Gender'] . '</td>
          <td>' . $row['Email'] . '</td>
          <td>' . $row['Login'] . '</td>
          <td>' . $row['Phone'] . '</td>
          <td>' . $row['Address'] . '</td>
          <td>' . $row['City'] . '</td>
          <td>
            <a href="edit_user.php?id=' . $row['ID'] . '">Edit</a>
            <a href="remove_user.php?id=' . $row['ID'] . '">Remove</a>
          </td>
        </tr>';
    }

    $html .= '
      </table>';

    return $html;
  }
}
?>
