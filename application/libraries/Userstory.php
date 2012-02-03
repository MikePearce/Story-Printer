<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userstory {
    
    /**
    * The Title of the story ('The one with the input field')
    */
    public $title;    
    
    /**
    * The body of the story (As a... I need... so that.)
    */
    public $story;

    /**
    * The conditions of satisfaction or acceptance criteria
    */
    public $cos;

    /**
    * The stakeholder(s) for this story
    */    
    public $stakeholder;

    /**
    * The Efford (story points, t-shirts)
    */
    public $effort;

    /**
    * Is it 'done', or 'ready'?
    */
    public $status;

    /**
    * INitial Scope, or emergent?
    */
    public $type;

    /**
    * Which sprint is it in?
    */
    public $sprint;

    /**
    * Which release is it in
    */
    public $release;    

    public function __construct($story)
    {
        // Foreach value in the array, set the doodah
        foreach($story AS $var => $val) {
            $this->$var = strip_tags($val);
        }
        
        return $this;
        
    }
    
    /**
     * Does it have the minimum required to be a story?
     */
     
    public function isValid() {
       return ($this->story);
    }
    
    public static function fetch($id) {
        return $this;
    }
    
    public static function create($story) {
        return new Userstory($story);
    }
    
    public static function update($story) {
        return $this;
    }
    
}