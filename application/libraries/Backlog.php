<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backlog {
    
    public static function addStory(Userstory $story) {
        $_SESSION['stories'][] = serialize($story);
    }
    
    public static function fetch() {
        return (isset($_SESSION['stories']) 
                    ? $_SESSION['stories'] 
                    : false
                );
    }
}