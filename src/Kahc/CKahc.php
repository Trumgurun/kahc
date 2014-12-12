<?php

namespace Anax\Kahc;

class CKahc implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
    
    private $Types = ['warning', 'debug', 'error', 'success'];
    
private function searchMessages()
    {
        $messages = $this->session->get("Message", []);
         if(!isset($messages))    
        {
            return null;
        } 
        return $messages;
    }
private function emptyMessages(){
        $this->session->set("Message", null);
    }
	
private function addMessages($Types, $bambo)
    {
        $messages = $this->searchMessages();
        $messages[] = ['Types' => $Types, 'bambo' => $bambo];
        $this->session->set('Message', $messages);
    }
    
public function Message($Types, $bambo = null){
        
        if(isset($bambo)){
            $this->addMessages($Types, $bambo);} 
		else if ($Types == 'success'){
            $this->addMessages($Types, "Page loaded successfully");}
		else if ($Types == 'debug'){
            $this->addMessages($Types, "This is a debug message");} 
		else if ($Types == 'warning'){
            $this->addMessages($Types, "Your command was unseccessful, please become a better leader.");} 
		else if ($Types == 'error'){
            $this->addMessages($Types, "Error, error... bip...bip");} 
    }
public function getMessages()
    {
        $htmlMessages = null;
        foreach($this->searchMessages() as $key => $bambo){
            $htmlMessages .= "<div id=\"{$bambo['Types']}\">{$bambo['bambo']}</div>";        
        }
        $this->emptyMessages();
        
        return $htmlMessages;
    }
}