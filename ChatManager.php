<?php
// ChatManager.php
class ChatManager {
    private $client;
    private $threadId;
    private const API_KEY = 'YOUR-API-KEY';
    private const ASSISTANT_ID = 'YOUR-ASSIST-ID';

    public function __construct() {
        require 'vendor/autoload.php';
        $this->client = OpenAI::client(self::API_KEY); 
    }
    
    public function startThread() {
        $response = $this->client->threads()->create([]);
        $this->threadId = $response->id;
    }

    
    public function setThreadId($threadId) {
        $this->threadId = $threadId;
    }

    public function getThreadId() {
        return $this->threadId;
    }

    public function sendMessage($role, $content) {
        $this->client->threads()->messages()->create($this->threadId, [
            'role' => $role,
            'content' => $content,
        ]);
    }

    public function createRun() {
        $this->client->threads()->runs()->create(
            threadId: $this->threadId, 
            parameters: [
                'assistant_id' => self::ASSISTANT_ID,
            ]
        );
    }

    public function getAssistantResponse() {
        $response = $this->client->threads()->messages()->list($this->threadId, [
            'limit' => 10,
        ]);

        foreach ($response->data as $message) {
            if ($message->role == 'assistant') {
                return $message->content[0]->text->value;
            }
        }

        return false;
    }
}

?>