<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'Story Printer > About';
    }
    
    public function index()
    {
        $this->layout->view('about', $this->data);
    }
}