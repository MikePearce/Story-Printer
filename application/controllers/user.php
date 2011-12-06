<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'Story Printer > User';
        $this->data->error = $this->data->info = '';
    }
    
    public function index()
    {
        $this->layout->view('about', $this->data);
    }
    
    public function settings()
    {
        $this->data->settings = $this->usero->getSettings();
        $this->layout->view('user/settings', $this->data);
    }
    
    public function savesettings()
    {
         /**
    	 * Receives post from jeditable
    	 */
        if ($id = $this->input->post('id')) {
            $this->usero->set($id, $this->input->post('value'));
            echo $this->input->post('value');
        }
        else {
            redirect('/user');
        }
    }
}