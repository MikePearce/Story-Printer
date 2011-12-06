<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usero {
    
    public $iterations;
    public $releases;
    public $stakeholders;
    
    /**
     * THIS WHOLE CLASS IS A PEICE OF SHIT< FIX IT
     **/
    public function __construct() {
        
        if (!isset($_SESSION['user'])) {
            // Setup the user
            $this->iterations = 'Sprint';
            $this->releases = 'Release';
            $this->stakeholders = 'Stakeholder';            
        }
        else {
            // Setup the user
            $this->iterations = $_SESSION['user']['settings']['iterations'];
            $this->releases = $_SESSION['user']['settings']['releases'];
            $this->stakeholders = $_SESSION['user']['settings']['stakeholders'];
            
        }
        
    }
    
    /**
     * Gah, this is the wrong way of doing this, FIX IT FOOL!
     *
     */
    public function set($var, $val) {
        $this->$var = $val;
        $_SESSION['user']['settings'][$var] = $val;
    }
    
    public function getSettings() {
        return array(
            'iterations' => $this->iterations,
            'releases' => $this->releases,
            'stakeholders' => $this->stakeholders,                        
        );
    }
}