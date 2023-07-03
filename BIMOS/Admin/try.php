
<?php
    $id = 123; // The ID value you want to pass

    // Generate the URL with the ID as a query parameter
    $url = "second-page.php?id=" . $id;

    // Redirect to the second page
    header("Location: " . $url);
    exit();


    //Next page
    if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use the ID in your code as needed
    // ...
    }
?>

<?php
    //Delete query
    // Assuming you have established a database connection
    $conn = mysqli_connect("localhost", "username", "password", "database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = 123; // The ID of the record you want to delete

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM your_table_name WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        $message = "Record deleted successfully.";
        $status = "success";
    } else {
        $message = "Error deleting record: " . $conn->error;
        $status = "error";
    }

    // Close the statement and database connection
    $stmt->close();
    mysqli_close($conn);

    // Display toastr alert
    echo "<script>
            toastr.$status('$message');
        </script>";
?>

<?php
    //Update query
    // Assuming you have established a database connection
    $conn = mysqli_connect("localhost", "username", "password", "database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = 123; // The ID of the record you want to confirm

    // Prepare the update query
    $stmt = $conn->prepare("UPDATE your_table_name SET status = 'confirmed' WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        $message = "Record confirmed successfully.";
        $status = "success";
    } else {
        $message = "Error confirming record: " . $conn->error;
        $status = "error";
    }

    // Close the statement and database connection
    $stmt->close();
    mysqli_close($conn);

    // Display toastr alert
    echo "<script>
            toastr.$status('$message');
        </script>";
?>

<script>
  Command: toastr["error"]("Are you the six fingered man?")

    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }

    Command: toastr["success"]("Inconceivable!")

    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
</script>

<?php
    //Session Timeout 
    // Start or resume the session 
    session_start();  
    // Check if the user is logged in and the last activity time is set 
    if (isset($_SESSION['loggedin']) && isset($_SESSION['last_activity'])) {     
    // Get the current timestamp     
    $current_time = time();      
    // Calculate the elapsed time since the last activity     
    $elapsed_time = $current_time - $_SESSION['last_activity'];     
    // Check if the elapsed time is greater than 30 minutes (in seconds)    
     $timeout = 30 * 60; // 30 minutes in seconds     
     if ($elapsed_time > $timeout) {         
        // User has been inactive for too long, log them out  

        session_unset();  // Unset all session variables         
        session_destroy();  // Destroy the session   

        // Redirect the user to the login page or any other desired page         
        header("Location: index.html");         
        exit();     
    }      
    // Update the last activity time to the current timestamp    
     $_SESSION['last_activity'] = $current_time; 
    }
?>
<?php
//Pagination for a page
// Establish a database connection
include "connection.php";

// Define the number of records to display per page
$records_per_page = 10;

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Retrieve the total number of records in the database
$total_records_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM your_table_name");
$total_records = mysqli_fetch_assoc($total_records_query)['total'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Retrieve the records for the current page
$records_query = mysqli_query($con, "SELECT * FROM your_table_name LIMIT $offset, $records_per_page");

// Display the records
while ($row = mysqli_fetch_assoc($records_query)) {
    // Display the record data
    echo $row['column1'] . " - " . $row['column2'] . "<br>";
}

// Display the pagination links
echo "<div class='pagination'>";

// Previous page link
if ($current_page > 1) {
    echo "<a href='?page=" . ($current_page - 1) . "'>Previous</a>";
}

// Page numbers
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=$i'>$i</a>";
}

// Next page link
if ($current_page < $total_pages) {
    echo "<a href='?page=" . ($current_page + 1) . "'>Next</a>";
}

echo "</div>";

// Close the database connection
mysqli_close($con);


?>


<?php



//Pagination for a table
// Establish a database connection
include "connection.php";

// Define the number of records to display per page
$records_per_page = 10;

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Retrieve the total number of records in the database
$total_records_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM your_table_name");
$total_records = mysqli_fetch_assoc($total_records_query)['total'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Retrieve the records for the current page
$records_query = mysqli_query($con, "SELECT * FROM your_table_name LIMIT $offset, $records_per_page");

// Display the table
echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>Column 1</th>';
echo '<th>Column 2</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Display the records
while ($row = mysqli_fetch_assoc($records_query)) {
    echo '<tr>';
    echo '<td>' . $row['column1'] . '</td>';
    echo '<td>' . $row['column2'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Display the pagination links
echo '<nav aria-label="Page navigation">';
echo '<ul class="pagination">';

// Previous page link
if ($current_page > 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a></li>';
}

// Page numbers
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<li class="page-item' . ($current_page == $i ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
}

// Next page link
if ($current_page < $total_pages) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a></li>';
}

echo '</ul>';
echo '</nav>';

// Close the database connection
mysqli_close($con);

?>

<?php

//Preventing user from going back after logging out
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// ...

// Code for logging out
if (isset($_GET['logout'])) {
    // Perform necessary logout operations
    
    // Clear all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>


//Social Media
<?php
// Define your social media handles or profile URLs
$socialMediaHandles = [
    'facebook' => 'https://www.facebook.com/your-page',
    'twitter' => 'https://twitter.com/your-handle',
    'instagram' => 'https://www.instagram.com/your-handle',
    'linkedin' => 'https://www.linkedin.com/in/your-profile',
];

// Function to generate social media icons/links
function generateSocialMediaIcons($handles)
{
    $icons = [
        'facebook' => '<i class="fab fa-facebook"></i>',
        'twitter' => '<i class="fab fa-twitter"></i>',
        'instagram' => '<i class="fab fa-instagram"></i>',
        'linkedin' => '<i class="fab fa-linkedin"></i>',
    ];

    $output = '<ul class="social-media-icons">';
    foreach ($handles as $key => $url) {
        $output .= '<li><a href="' . $url . '" target="_blank">' . $icons[$key] . '</a></li>';
    }
    $output .= '</ul>';

    return $output;
}

// Usage: generate social media icons
echo generateSocialMediaIcons($socialMediaHandles);
?>


//For WhatsApp
<?php
// Function to generate WhatsApp link
function generateWhatsAppLink($phoneNumber, $message)
{
    $whatsAppLink = 'https://api.whatsapp.com/send?phone=' . urlencode($phoneNumber) . '&text=' . urlencode($message);
    return $whatsAppLink;
}

// Usage: Generate WhatsApp link with a pre-filled message
$phoneNumber = '+1234567890'; // Replace with your WhatsApp phone number
$message = 'Hello, I have a question.'; // Replace with your desired pre-filled message

$whatsAppLink = generateWhatsAppLink($phoneNumber, $message);

// Redirect the user to the WhatsApp link
header("Location: $whatsAppLink");
exit();
?>


//Second One
<?php
// Function to generate the WhatsApp chat button
function generateWhatsAppChatButton($phoneNumber, $message)
{
    $whatsAppChatButton = '<a href="https://api.whatsapp.com/send?phone=' . urlencode($phoneNumber) . '&text=' . urlencode($message) . '" target="_blank" class="whatsapp-chat-button">Chat on WhatsApp</a>';
    return $whatsAppChatButton;
}

// Usage: Generate WhatsApp chat button
$phoneNumber = '+1234567890'; // Replace with your WhatsApp phone number
$message = 'Hello, I have a question.'; // Replace with your desired initial message

$whatsAppChatButton = generateWhatsAppChatButton($phoneNumber, $message);

// Display the WhatsApp chat button
echo $whatsAppChatButton;
?>

