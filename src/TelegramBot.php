<?php

/**
 * TelegramBot PHP unofficial library.
 *
 * TelegramBot is an unofficial library for use the Telegram APIs for bot.
 *
 * @version 1.0.2
 * @author ParanoiaSystem
 */

namespace Telegram;

class TelegramBot
{

    public function __construct($token, $username){
        define('TOKEN', $token);
        define('USERNAME', $username);
        
    }

    public function getMe()
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/getMe");
        return $jsonResponse;
    }

    public function sendMessage($chat_id, $text, $disable_web_page_preview = false, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'text' => $text);
        if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($disable_web_page_preview)
            $this->array_push_assoc($arrayPost, 'disable_web_page_preview', $disable_web_page_preview);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendMessage", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function forwardMessage($chat_id, $from_chat_id, $message_id){
    	$arrayPost = array('chat_id' => $chat_id, 'from_chat_id' => $from_chat_id, 'message_id' => $message_id);
    	$jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/forwardMessage", $arrayPost);
        return json_decode($jsonResponse);
    }
    
    public function sendPhoto($chat_id, $photo, $caption = false, $reply_to_message_id = false, $reply_markup = false){
        $arrayPost = array('chat_id' => $chat_id, 'photo' => $photo);
    	if($caption)
            $this->array_push_assoc($arrayPost, 'caption', $caption);
        if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendPhoto", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function sendAudio($chat_id, $audio, $duration = 0, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'audio' => $audio);
    	if($duration > 0)
            $this->array_push_assoc($arrayPost, 'duration', $duration);
        if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendAudio", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function sendDocument($chat_id, $document, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'document' => $document);
    	if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendDocument", $arrayPost);
        return json_decode($jsonResponse);
    }
    
    public function sendSticker($chat_id, $sticker, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'sticker' => $sticker);
    	if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendSticker", $arrayPost);
        return json_decode($jsonResponse);
    }
    
    public function sendVideo($chat_id, $video, $duration = 0, $caption = false, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'video' => $video);
    	if($duration > 0)
            $this->array_push_assoc($arrayPost, 'duration', $duration);
        if($caption)
            $this->array_push_assoc($arrayPost, 'caption', $caption);
        if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendVideo", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function sendLocation($chat_id, $latitude, $longitude, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'latitude' => $latitude, 'longitude' => $longitude);
    	if($reply_to_message_id)
            $this->array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            $this->array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendLocation", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function sendChatAction($chat_id, $action){
    	$arrayPost = array('chat_id' => $chat_id, 'action' => $action);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendChatAction", $arrayPost);
        return json_decode($jsonResponse);
    }
    
    public function getUserProfilePhotos($user_id, $offset = false, $limit = false){
    	$arrayPost = array('user_id' => $user_id);
    	if($offset)
    		$this->array_push_assoc($arrayPost, 'offset', $offset);
    	if($limit)
    		$this->array_push_assoc($arrayPost, 'limit', $limit);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/getUserProfilePhotos", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function getUpdates($offset = false, $limit = false, $timeout = false)
    {
        $arrayPost = array();
        if ($offset)
            $this->array_push_assoc($arrayPost, 'offset', $offset);
        if ($limit)
            $this->array_push_assoc($arrayPost, 'limit', $limit);
        if ($timeout)
            $this->array_push_assoc($arrayPost, 'timeout', $timeout);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/getUpdates", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function setWebhook($url = false){
        $arrayPost = array();
        if ($url)
            $this->array_push_assoc($arrayPost, 'url', $url);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/setWebhook", $arrayPost);
        return json_decode($jsonResponse);
    }

    public function hook()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }

    public function test($json)
    {
        $json = json_decode($json, true);
        if(USERNAME == $json['result']['username'])
            return true;
        else
            return false;
    }

    private function array_push_assoc(&$array, $key, $value){
	   $array[$key] = $value;
    }

    private function curl_call($url, $post=array(), $headers=array()){
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "ParanoiaBot 1.0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (count($post)) {
            curl_setopt($ch, CURLOPT_POST, true);

            foreach($attachments as $attachment){
                if(isset($post[$attachment])){
                    $post[$attachment] = $this->curlFile($post[$attachment]);
                    break;
                }
            }

            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        $r = curl_exec($ch);
        curl_close($ch);
        return $r;
    }

    private function curlFile($path){
        if (is_array($path))
            return $path['file_id'];

        $realPath = realpath($path);

        if (class_exists('CURLFile'))
            return new \CURLFile($realPath);

        return '@' . $realPath;
    }

}
