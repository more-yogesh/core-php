<?php

include '../connection.php';

$id = $_REQUEST['edit_id'];
$userRecord = "SELECT * FROM users WHERE id = $id";

$row = $db->query($userRecord);

$user = $row->fetch_object();

if (isset($_REQUEST['update'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hobbies = implode(",", $_POST['hobbies']);
    $address = $_POST['address'];
    $country = $_POST['country'];
    $confirm_password = $_POST['confirm_password'];

    $updateUserQuery  = "UPDATE users SET 
        `name` = '$name',
        mobile = '$mobile',
        email = '$email',
        gender = '$gender',
        hobbies = '$hobbies',
        `address` = '$address',
        country = '$country' WHERE id = $id
    ";

    if ($db->query($updateUserQuery)) {
        echo "updated!";
        header('location:index.php');
    } else {
        echo 'something wrong';
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
    <form action="" method="POST">
        <table border="0">
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name" placeholder="Enter Your Name" value="<?php echo $user->name; ?>"></td>
            </tr>
            <tr>
                <td><label for="mobile">mobile</label></td>
                <td><input type="number" name="mobile" id="mobile" value="<?php echo $user->mobile; ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" value="<?php echo $user->email; ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" id="male" name="gender" value="male" <?php
                                                                                if ($user->gender == 'male') {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>
                    <label for="male">I am male</label></br>
                    <input type="radio" name="gender" value="female" <?php
                                                                        if ($user->gender == 'female') {
                                                                            echo "checked";
                                                                        }
                                                                        ?>>
                    I am female
                    </br>
                </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <?php
                $hobbiesArray = explode(",", $user->hobbies);
                ?>
                <td><input type="checkbox" name="hobbies[]" value="travel" <?php
                                                                            if (in_array('travel', $hobbiesArray)) {
                                                                                echo 'checked';
                                                                            }
                                                                            ?>>Travel<br />
                    <input type="checkbox" name="hobbies[]" value="reading" <?php
                                                                            if (in_array('reading', $hobbiesArray)) {
                                                                                echo 'checked';
                                                                            }
                                                                            ?>>Reading<br />
                    <input type="checkbox" name="hobbies[]" value="eating" <?php
                                                                            if (in_array('eating', $hobbiesArray)) {
                                                                                echo 'checked';
                                                                            }
                                                                            ?>>Eating<br /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="" rows="10" cols="60"><?php echo $user->address; ?></textarea></td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select name="country">
                        <option value="">SELECT COUNTRY</option>
                        <option value="ind" <?php if ($user->country == 'ind') {
                                                echo "selected";
                                            }
                                            ?>>INDIA</option>
                        <option value="usa" <?php if ($user->country == 'usa') {
                                                echo "selected";
                                            }
                                            ?>>U.S.A.</option>
                        <option value="uk" <?php if ($user->country == 'uk') {
                                                echo "selected";
                                            }
                                            ?>>UK</option>
                        <option value="aud" <?php if ($user->country == 'aud') {
                                                echo "selected";
                                            }
                                            ?>>AUD</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="confirm_password">confirm password</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password">

                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="update" value="UPDATE" /></td>
            </tr>
        </table>

    </form>
</body>

</html>