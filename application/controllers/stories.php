<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'Story Printer';
        $this->load->helper(array('form', 'url', 'file', 'string'));
    }

	/**
	 * Shows the site index and handles the uploading
	 * @return void
	 */
	public function index()
	{
	    $this->data->error = '';

	    // If there is an upload detected
		$this->load->library('form_validation');
    	$this->form_validation->set_rules(
		    'userfile', 
		    'Story File', 
		    'required'
		);

        // If it fails validation, then show them!
		if ($this->input->post())
		{
		    // Initialize the library
	        $this->load->library('upload', 
	            array(
	                'upload_path' => '../uploads/',
	                'allowed_types' => 'csv'
	            )
	        );
	        
            // If the upload fails
    		if (!$this->upload->do_upload())
    		{
    			$this->data->error = $this->upload->display_errors(
    			    '<p class="error">', '</p>'
    			);
	            $this->layout->view('welcome_message', $this->data); 
    		}
    		// Successful upload
    		else {
    		    // Get info
    			$upload_data = $this->upload->data();
    			
    			// CSV fields
    			$csv_fields = array(
    			    "id",
    			    "story",
    			    "cos",
    			    "stakeholder",
    			    "effort",
    			    "status",
    			    "type",
    			    "sprint",
    			    "release"
    			);
    			
    			// Open and read
    			$ignored = FALSE;
    			$row = 0;
                if (($handle = fopen($upload_data['full_path'], "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        
                        // ignore the first row?
                        if ($this->input->post('ignore_first_row') AND !$ignored) {
                            $ignored = TRUE;
                            continue;
                        }

                        for($i = 0; $i < count($data); $i++) {
                            $this->data->stories[$row][$csv_fields[$i]] = $data[$i];   
                        }
                        $row++;
                        $i = 0;
                    }
                }
                
    			// All done? Delete the file and 
    			unlink($upload_data['full_path']);
    			
    			$_SESSION['stories'] = $this->data->stories;
    			
    			redirect('stories/view');
    			
    		}
		}
		else {
		    $this->layout->view('welcome_message', $this->data); 
		}
	}
	
	/**
	 * View the stories
	 * @return void
	 */
	public function view()
	{
	    $this->data->stories = $_SESSION['stories'];
    	$this->layout->view('stories', $this->data);
	}
	
	/**
	 * Clear the stories from the session
	 * @return void
	 */
	public function clear()
	{
	    $_SESSION['stories'] = null;
	    redirect('stories');
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */