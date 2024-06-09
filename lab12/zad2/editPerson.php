<?php
$conn = new PDO('mysql:host=localhost;dbname=w12_zadanie2', 'root', '');
if (isset($_POST['edit']))
    $_POST['edit_person'] = 1;
if (isset($_POST['editPerson'])){
    if (!isset($_POST['edit'])){
        $sql = "update people set first_name = '{$_POST['first_name']}', second_name = '{$_POST['second_name']}', email = '{$_POST['email']}' where ID = {$_POST['edit']}";
        $sql_result = $conn->query($sql);
        $result = $sql_result->fetch(PDO::FETCH_ASSOC);
        $conn = null;
        header("Location:main.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Person</title>
</head>
<body>
<h1>Edit Person Menu</h1>
<form method="post">
    <input type="text" name="first_name" placeholder="<?php echo $result['first_name']?>" required>
    <input type="text" name="second_name" placeholder="<?php echo $result['second_name']?>" required>
    <input type="email" name="email" placeholder="<?php echo $result['email']?>" required>
    <button value="<?php echo $result['Person_ID'] ?>" name="edit" type="submit">Edit</button>
</form>
</body>
</html>
