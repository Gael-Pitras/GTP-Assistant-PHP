<?php
// sendMessage.php
session_start();

require_once 'chatManager.php';
$chatManager = new ChatManager();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le message de l'utilisateur depuis la requête
    $data = json_decode(file_get_contents('php://input'), true);
    $userMessage = isset($data['message']) ? $data['message'] : '';

    if (isset($_SESSION['thread_id'])) {
        $chatManager->setThreadId($_SESSION['thread_id']);
    } else {
        $chatManager->startThread();
        $_SESSION['thread_id'] = $chatManager->getThreadId();
    }

    $chatManager->sendMessage("user", $userMessage);
    $chatManager->createRun();

    
    if (!isset($_SESSION["message_send"])) {
        $_SESSION["message_send"] = 0;
    }
    $_SESSION["message_send"]++;
    $response = ['success' => true];
    echo json_encode($response);

} else {
    http_response_code(405); // Méthode non autorisée
    echo "Méthode non autorisée.";
}
