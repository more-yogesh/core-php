<?php
include('../connection.php');

$countryQuery = "SELECT * FROM `countries`";

$countries = $db->query($countryQuery);

$passwordError = '';
if (isset($_POST['submit'])) {


    $tempName = $_FILES['user_image']['tmp_name'];
    $fileName = $_FILES['user_image']['name'];
    $destination = '../assets/uploaded_files/' . $fileName;
    move_uploaded_file($tempName, $destination);

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hobbies = implode("-", $_POST['hobbies']);
    $address = $_POST['address'];
    $country = $_POST['country_id'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $passwordError =  "Password not match";
    } else {
        $insertQuery = "INSERT INTO `students` (`email`, `name`, `mobile`, `password`, `gender`, `address`, `hobbies`, `user_image`, `country_id`) VALUES ('$email', '$name', '$mobile', '$password', '$gender', '$address', '$hobbies', '$fileName', '$country')";

        if ($db->query($insertQuery)) {
            // echo "1 Record inserted!";
            header('location:index.php');
        } else {
            echo "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="role" value="student">
        <table border="0">
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name" placeholder="Enter Your Name"></td>
            </tr>
            <tr>
                <td><label for="mobile">mobile</label></td>
                <td><input type="number" name="mobile" id="mobile"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" id="male" name="gender" value="male" checked><label for="male">I am male</label></br>
                    <input type="radio" name="gender" value="female" checked>I am female</br>
                </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td><input type="checkbox" name="hobbies[]" value="travel">Travel<br />
                    <input type="checkbox" name="hobbies[]" value="reading">Reading<br />
                    <input type="checkbox" name="hobbies[]" value="eating">Eating<br /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="" rows="10" cols="60">G8, Swaminayarnt</textarea></td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select name="country_id">
                        <option value="">SELECT COUNTRY</option>
                        <?php
                        while ($country = $countries->fetch_object()) {
                        ?>
                            <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>User Image</td>
                <td><input type="file" name="user_image" id="" accept="image/*"></td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" name="password" id="password" value="d1d21d2"></td>
            </tr>
            <tr>
                <td><label for="confirm_password">confirm password</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password">
                    <span style="color:red;">
                        <?php
                        echo $passwordError;
                        ?>
                    </span>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="submit" value="ADD" /></td>
            </tr>
        </table>

    </form>
</body>

</html>