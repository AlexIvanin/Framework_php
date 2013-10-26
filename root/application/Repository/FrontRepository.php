<?php

class FrontRepository extends DatabaseService 
{
    public function addMessageFeedback($messageFeedback)
        {
            $title = $messageFeedback['title'];
            $message = $messageFeedback['message'];

            $q = $this->getConnection()->prepare('INSERT INTO feedback (title, message) VALUES (:title, :message)');
            $q->bindValue('title', $title);
            $q->bindValue('message', $message);
            $q->execute();
        }
}

