<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
    
    private $_numberOfColumns;
    private $_fields;
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'Story Printer';
        $this->data->error = $this->data->info = '';
        $this->_numberOfColumns = 9;
        $this->load->helper(array('form', 'url', 'file', 'string'));
        // CSV fields
		$this->_fields = array(
		    "story",
		    "cos",
		    "stakeholder",
		    "effort",
		    "status",
		    "type",
		    "sprint",
		    "release"
		);
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
	                'upload_path' => '/tmp',
	                'allowed_types' => 'csv'
	            )
	        );
	        
            // If the upload fails
    		if (!$this->upload->do_upload())
    		{
    			$this->data->error = $this->upload->display_errors('', '');
	            $this->layout->view('welcome_message', $this->data); 
    		}
    		// Successful upload
    		else {
    		    
    		    // Uploaded? Show them the converter
    		    if($this->_mapAndConvert($this->upload->data()))
    		    {
    		        $this->layout->view('mapping', $this->data);
    		    }
    		    
    		}
		}
		else {
		    $this->layout->view('welcome_message', $this->data); 
		}
	}
	
	/**
	 * Once the mapping has been done, do it
	 */
	public function map()
	{
	    // OK, let's check the stuff
	    if ($this->input->post())
	    {
	        // Setup the vars and empty the old stories
	        $new_stories = $new = array();
	        $user_stories = $_SESSION['stories'];
	        $_SESSION['stories'] = false;
	        $counter = 1;
	        // For each story...
	        foreach($user_stories AS $story) {


                // Iterate through OUR fields and assign THEIR field values
	            foreach($this->_fields AS $field) {
	                
	                // We might have a non-mapped field, if so, who cares?
                    if($this->input->post($field) == '') {
                        $new[$field] = false;
                    }
                    else {
                        $new[$field] = $story[$this->input->post($field)];
                    }
                    
                    // Do we want to skip this
                    if ($field == 'status') {
                        //What status are we looking for?
                        if ($this->input->post('status_done') == 1 AND strtolower($new[$field]) == 'done') {
                            continue 2;
                        }
                        if ($this->input->post('status_ready') == 1 AND strtolower($new[$field]) != 'ready') {
                            continue 2;
                        }
                    }
                    
    	        }
    	        
    	        // Check it's a useful story
    	        if ($new['story'] != FALSE) {    	            

        	        // Store the new stories
        	        $new['counter'] = $counter++;
    	            $_SESSION['stories'][] = $new;
    	        }
    	        $new = array();
 
    	        
	        }

	        // Then head to the view.
	        redirect('stories/view');
	    }
	    else {
	        redirect('stories');
	    }
	}
	
	/**
	 * View the stories
	 * @return void
	 */
	public function view($view_style = 'card')
	{
	    $this->data->stories = (isset($_SESSION['stories']) 
	                                ? $_SESSION['stories'] 
	                                : false
	                            );
	    $this->data->settings = $this->usero->getSettings();
	    // Simple view, or what?
	    if ($view_style == 'simple') {
	        $template = 'simple';
	        $this->data->template = 'card';
	    }
	    else {
	        $template = 'card';
	        $this->data->template = 'simple';
	    }
	    
	    // Return the view with the correct snippet
	    $this->data->stories = $this->load->view(
	        'snippets/story_'. $this->data->template .'.php', 
	        $this->data, true
	    );
    	$this->layout->view('stories', $this->data);
	}
	
	/**
	 * Clear the stories from the session
	 * @return void
	 */
	public function clear($id = false)
	{
	    if ($id === false) {
    	    $_SESSION['stories'] = false;
    	    redirect('stories');	        
	    }
	    else {
	        $_SESSION['stories'][$id] = false;
	        unset($_SESSION['stories'][$id]);
	        redirect('stories/view/'. $id);
	    }

	}
	
	/**
	 * Receives post from jeditable
	 */
	public function edit()
	{
        if ($id = $this->input->post('id')) {
            list($type, $index) = explode("_", $id);
            $_SESSION['stories'][$index][$type] = $this->input->post('value');
            echo preg_replace("%\n%", "<br />", $this->input->post('value'));
        }
        else {
            redirect('stories/view');
        }
        
	}
	
	/**
	 * Add another story
	 */
	 public function add()
	 {
	     // If they're new, or have cleared.
	     if (!isset($_SESSION['stories']) OR $_SESSION['stories'] == FALSE) {
	         $_SESSION['stories'] =  array();
	     }
        // Then pop one on the beginning (so it's at the top)
        array_unshift(
            $_SESSION['stories'], 
            array(
                "id" => '',
                "story" => 'Add your story',
                "cos" => 'Add your COS',
                "stakeholder" => '',
                "effort" => '',
                "status" => '',
                "type" => '',
                "sprint" => '',
                "release" => ''
            )
        ); 
	    
     	redirect('stories/view');
	 }
	 
	 /**
	  * Given the data in the file, show a page which allows them to
	  * map their columns
	  * @param $upload_data - Contains the PHP upload data of the file
	  */
	 private function _mapAndConvert($upload_data) {
	     
	     $_SESSION = $ret = FALSE;
	     
         // First, create an array that shows the mappings
         $row = 0;
         $first_row = FALSE;
         if (($handle = fopen($upload_data['full_path'], "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                // So, the first row should contain headers pull them out
                // and store them
                if (!$first_row) {
                    $csv_fields = array_map('strip_tags', $data);
                    $this->data->user_fields = $csv_fields;
                    $first_row = TRUE;
                    continue;
                }

                // Fill'er up
                $new_rows = array_map('strip_tags', $data);
                $_SESSION['stories'][] = @array_combine($csv_fields, array_pad($new_rows, count($csv_fields), ''));
            }
            
            // Now we have our csv stored, let's see how it fares against
            // what we want
            $this->data->fields = $this->_fields;
            
            // All done? Delete the file
            fclose($handle);
    		unlink($upload_data['full_path']);

    		$ret = TRUE;
        }
        // We couldnt read it!
        else {
            // Throw error
            $this->data->error = 'Cannot open the uploaded file, try again';
        }
        
        return $ret;
        	     
	 }	 
}
