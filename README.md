
# Chat avec l'Assistant OpenAI

## Description
Ce projet implémente un système de chat simple permettant aux utilisateurs de communiquer avec un assistant virtuel développé (GPTs) via OpenAI. Le backend est écrit en PHP et utilise la bibliothèque cliente OpenAI pour interagir avec l'assistant.

## Fonctionnalités
- Démarrage d'une nouvelle conversation avec l'assistant OpenAI.
- Envoi de messages de l'utilisateur à l'assistant.
- Réception et affichage des réponses de l'assistant.
- Gestion des sessions pour maintenir le contexte de la conversation.

## Installation
1. Clonez le dépôt sur votre serveur local ou distant.
2. Exécutez `composer install` pour installer les dépendances nécessaires.
```
composer require openai-php/client
```
```
composer require guzzlehttp/guzzle
```
3. Configurez votre clé API OpenAI dans `ChatManager.php`.

## Utilisation
- Lancez votre serveur PHP.
- Accédez au fichier `sendMessage.php` pour envoyer un message à l'assistant.
- Utilisez `verifyResponse.php` pour récupérer la réponse de l'assistant.

## Structure du Projet
- `sendMessage.php`: Gère l'envoi des messages de l'utilisateur.
- `verifyResponse.php`: Vérifie et récupère les réponses de l'assistant.
- `ChatManager.php`: Fournit la logique pour communiquer avec l'API OpenAI.




