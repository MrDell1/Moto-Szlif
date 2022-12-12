<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    //exit();
}

$username = $fname = $email = $lname = "";
$usernameErr = $fnameErr = $emailErr = $lnameErr = "";
$error = 0;
$sql = "SELECT `username` FROM `users` WHERE id = $_SESSION[id]";
$result = $conn->query($sql);
$x = $result->fetch_assoc();
$username = $x['username'];
$sql = "SELECT  `Fname`, `Email`, `Lname` FROM `customer`  WHERE Id_Usr = $_SESSION[id]";
$result = $conn->query($sql);
$x = $result->fetch_assoc();
$fname = $x['Fname'];
$email = $x['Email'];
$lname = $x['Lname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["username"])) {
        $usernameErr= "Imię jest wymagane";
        $error = 1;
    } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $username)) {
            $usernameErr = "Dozwolone są tylko litery";
            $error = 1;
        } else {
            $usernameErr = "";
        }
    }

    if (empty($_POST["fname"])) {
        $fnameErr = "Imię jest wymagane";
        $error = 1;
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $fname)) {
            $fnameErr = "Dozwolone są tylko litery";
            $error = 1;
        } else {
            $fnameErr = "";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr  = "Email jest wymagany";
        $error = 1;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Zły format adresu email";
            $error = 1;
        } else {
            $emailErr = "";
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Nazwisko jest wymagane";
        $error = 1;
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $lname)) {
            $lnameErr = "Dozwolone są tylko litery";
            $error = 1;
        } else {
            $lnameErr = "";
        }
    }

    if($error == 0){
        $sql = "UPDATE `users` SET `username`='".$username."' WHERE id = $_SESSION[id]";
        $conn ->query($sql);
        $sql = "UPDATE `customer` SET `Fname`='".$fname."', `Email`='".$email."' , `Lname`='".$lname."' WHERE Id_Usr = $_SESSION[id]";
        $conn ->query($sql);
    }
}


function input_container($err, $label, $session_name, $id)
{
    echo "<div class='flex flex-col'>";
    echo    "<label class='w-80' for='".$id."'>" . $label . "</label>";
    echo    "<span class='error'>";
    if (isset($err)) {
        echo $err;
    }
    echo    "</span>";
    echo    " <input type='text' class='px-2 py-2 w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]' name='".$id."' id='".$id."' ";
    if (!empty($session_name)) {
        echo "value='" . $session_name . "'";
    }
    echo    " > </div>";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="flex h-full w-full ">
    <div class="flex w-full flex-col gap-10 flex flex-col gap-6 items-center bg-gray-200 border border-gray-300 px-8 py-8 rounded-xl">
        <h1 class="text-3xl font-bold w-full">Twoje Dane</h1>
        <div class="flex w-full">
            <form class="flex flex-col items-center gap-8 w-full" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <?php input_container($usernameErr, "Nazwa użytkownika:", $username, "username") ?>
                <?php input_container($fnameErr, "Imię:", $fname, "fname") ?>
                <?php input_container($lnameErr, "Nazwisko:", $lname, "lname") ?>
                <?php input_container($emailErr, "E-mail:", $email, "email") ?>
                <div>
                    <button class="px-4 py-2 rounded-md bg-gray-100 border-gray-300" type="submit">Zamień</button>
                </div>
            </form>
        </div>
    </div>
</div>