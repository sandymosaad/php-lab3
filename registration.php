<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $resource = fopen('traineedata.txt', 'a');
    if (is_resource($resource)) {
        $uploadedFileName = $_FILES["img"]["name"];
        fwrite($resource, $_POST['username'] . ',' . $_POST['password'] . ',' . $_POST['firstname'] . ',' .
        $_POST['lastname'] . ',' . $_POST['country'] . ',' . $_POST['address'] . ',' . $_POST['gender'] . ',' . implode('.',
        $_POST['skills']) . ',' . $_POST['department'] . ',' . $uploadedFileName . "\n");

        fclose($resource);
    } else {
        echo 'Invalid filename';
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_FILES["img"]) && $_FILES["img"]["error"] == UPLOAD_ERR_OK) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;}

        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File upload error or file not found.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required><br><br>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required><br><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>

    <label for="country">Country:</label>
    <select id="country" name="country" required>
        <option value="">Select Country</option>
        <option value="Egypt">Egypt</option>
        <option value="USA">USA</option>
    </select><br><br>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" required>
    <label for="female">Female</label><br><br>

    <label>Skills:</label><br>
    <input type="checkbox" id="php" name="skills[]" value="PHP">
    <label for="php">PHP</label><br>
    <input type="checkbox" id="mysql" name="skills[]" value="MySQL">
    <label for="mysql">MySQL</label><br>
    <input type="checkbox" id="j2se" name="skills[]" value="J2SE">
    <label for="j2se">J2SE</label><br>
    <input type="checkbox" id="postgresql" name="skills[]" value="PostgreSQL">
    <label for="postgresql">PostgreSQL</label><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="department">Department:</label>
    <input type="text" id="department" name="department" value="OpenSource"><br><br>

    <label for="img">Upload your picture:</label>
    <input type="file" id="img" name="img"><br><br>

    <label for="captcha">Code Verification:</label>
    <p>Sh68Sa</p>
    <input type="text" id="captcha" name="captcha" required><br>
    <label>Please Insert the code above:</label><br><br>

    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>