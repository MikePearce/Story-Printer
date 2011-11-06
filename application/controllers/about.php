<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'Story Printer > About';
        $this->data->error = $this->data->info = '';
    }
    
    public function index()
    {
        $filename = '../uploads/numberofuploads.txt';
	    $this->data->uploads = file_get_contents($filename);
        
        $this->layout->view('about', $this->data);
    }
}