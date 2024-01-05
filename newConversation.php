<?php
// newConversation.php
session_start();

if (isset($_SESSION['thread_id'])) {
    unset($_SESSION['thread_id']); 
}
if (isset($_SESSION['latest_assistant_response'])) {
    unset($_SESSION['latest_assistant_response']);
}
if (isset($_SESSION['message_send'])) {
    unset($_SESSION['message_send']);
}
if (isset($_SESSION['message_received'])) {
    unset($_SESSION['message_received']);
}
header("Location: index.html"); 
exit();
?>
