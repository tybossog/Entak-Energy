                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php
// define variables and set to empty values
$newUser = $user = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newUser = test_input($_POST["newUser"]);
}

function test_input($data) {
  $data = trim($data);
  //$data = stripslashes($data);
//  $data = htmlspecialchars($data);
  return $data;
}

$user = json_decode($newUser);

$servername = "localhost";
$username = "root";
$password = "cosmogarri";
$dbname = "EntakDb";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email,
     phone, address, gender, password)
  VALUES (:firstname, :lastname, :email, :phone, :address, :gender, :password)");
  $stmt->bindParam(':firstname', $firstName);
  $stmt->bindParam(':lastname', $lastName);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':phone', $phone );
  $stmt->bindParam(':address', $address);
  $stmt->bindParam(':gender', $gender);
  $stmt->bindParam(':password', $password);

  // insert a row
  $firstName = $user->firstName;
  $lastName = $user->lastName;
  $email = $user->email;
  $phone = $user->phone;
  $address = $user->address;
  $gender = $user->gender;
  $password = $user->password;
  $stmt->execute();

  echo "New record created successfully";
} catch(PDOException $e) {
  echo  $e->getMessage();
}

$conn = null;
?>                  
