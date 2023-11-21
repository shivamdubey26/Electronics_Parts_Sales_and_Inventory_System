<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form submitted, process the data
    $categoryName = $_POST['category_name'];

    // Validate the input (you may add more validation as needed)
    if (empty($categoryName)) {
        echo "Category name cannot be empty!";
    } else {
        // Insert the category into the database
        $insertQuery = "INSERT INTO category (CNAME) VALUES ('$categoryName')";
        $insertResult = mysqli_query($db, $insertQuery);

        if ($insertResult) {
            echo "Category added successfully!";
        } else {
            echo "Error adding category: " . mysqli_error($db);
        }
    }
}
?>

<!-- Your existing code -->

<?php
$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {
        ?>
        <script type="text/javascript">
            // then it will be redirected
            alert("Restricted Page! You will be redirected to POS");
            window.location = "pos.php";
        </script>
        <?php
    }
}
?>

<!-- Form for adding category -->
<form method="post" action="">
    <label for="category_name">Category Name:</label>
    <input type="text" name="category_name" required>
    <button type="submit">Add Category</button>
</form>
