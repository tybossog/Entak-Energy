                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php
// define variables and set to empty values
$email = $userPwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $userPwd = test_input($_POST["password"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername = "localhost";
$username = "root";
$password = "cosmogarri";
$dbname = "EntakDb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM Users WHERE password = '$userPwd'");
  $stmt->execute();

  // set the resulting array to associative
  //returns true or false
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $user = $stmt->fetchAll();

  if ($result = true) {
    echo json_encode($user);
  } else {
    echo "failed";
  }

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>                  
