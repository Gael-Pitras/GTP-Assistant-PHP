<?php
// verifyReponse.php
session_start();

require_once 'chatManager.php';

$chatManager = new ChatManager();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
$assistantContent = false;

if (isset($_SESSION['thread_id'])) {
    $chatManager->setThreadId($_SESSION['thread_id']);
}

if (isset($_SESSION['latest_assistant_response'])) {
    $latestAssistantResponse = $_SESSION['latest_assistant_response'];
} else {
    $latestAssistantResponse = null;
}

$assistantContent = $chatManager->getAssistantResponse();

if (!$assistantContent || $latestAssistantResponse == $assistantContent) {   
        $assistantContent = false;
} else {
        if($latestAssistantResponse != $assistantContent){
             // Mettez à jour la session avec la dernière réponse de l'assistant
             $_SESSION['latest_assistant_response'] = $assistantContent;
        } else {
            $assistantContent = false;
        }  
}

if ($assistantContent) {
    if (!isset($_SESSION["message_received"])) {
        $_SESSION["message_received"] = 0;
    }
    $_SESSION["message_received"]++;
    $response = ['success' => true, 'response' => $assistantContent, 'sendCount' => $_SESSION["message_send"], 'receiveCount' => $_SESSION["message_received"]];
    echo json_encode($response);
} else {
    $response = ['success' => false];
    echo json_encode($response);
}
} else {
    http_response_code(405); // Méthode non autorisée
    echo "Méthode non autorisée.";
}
?>
