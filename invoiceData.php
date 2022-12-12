<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$company = $nip = "";
$companyErr = $nipErr = "";
$error = 0;

$sql = "SELECT `company`, `nip` FROM `customer` WHERE Id_Usr = $_SESSION[id]";
$result = $conn->query($sql);
$x = $result->fetch_assoc();
$company = $x['company'];
$nip = $x['nip'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["company"])) {
        if (isset($company)) {
            unset($company);
        }
    } else {
        $company = test_input($_POST["company"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $company)) {
            $companyErr = "Dozwolone są tylko liczby i litery";
            $error = 1;

        } else {
            $company = $company;
            $companyErr = "";
        }
    }

    if (empty($_POST["nip"])) {
        if (isset($nip)) {
            unset($nip);
        }
    } else {
        $nip = test_input($_POST["nip"]);
        if (!preg_match("/^[[0-9-{1}]*$/u", $nip)) {
            $nipErr = "Dozwolone są tylko liczby";
            $error = 1;

        } else {
            $nip = $nip;
            $nipErr = "";
        }
    }
    if($error == 0){
        $sql = "UPDATE `customer` SET `Company`='".$company."', `NIP`='".$nip."' WHERE Id_Usr = $_SESSION[id]";
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
        <h1 class="text-3xl font-bold w-full">Dane do faktury</h1>
        <div class="flex w-full">
            <form class="flex flex-col items-center gap-8 w-full" method="post" action="<?php echo htmlspecialchars("profile.php?step=3");?>">
                <?php input_container($companyErr, "Firma:", $company, "company") ?>
                <?php input_container($nipErr, "NIP:", $nip, "nip") ?>
                <div>
                    <button class="px-4 py-2 rounded-md bg-gray-100 border-gray-300" type="submit">Zamień</button>
                </div>
            </form>
        </div>
    </div>
</div>