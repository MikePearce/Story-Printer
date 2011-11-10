<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
    
    private $_numberOfColumns;
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'Story Printer';
        $this->data->error = $this->data->info = '';
        $this->_numberOfColumns = 9;
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
    		    
    		    // If we've got a decent CSV, then redirec to the stories
    		    if ($this->_convertStories($this->upload->data())) {
    		        
    		        $filename = '../uploads/numberofuploads.txt';
    		        $contents = file_get_contents($filename);
    		        
    		        // Record the upload
    		        if ($han = fopen($filename, 'w+'))
    		        {
    		            $contents++;
    		            fwrite($han, $contents);
    		            fclose($filename);
    		        }

    		        // Then show the stories
    		        redirect('stories/view');
    		    }
    		    // Otherwise, show the error.
    		    else {
    		        $this->layout->view('welcome_message', $this->data);
    		    }
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
	    $this->data->stories = (isset($_SESSION['stories']) 
	                                ? $_SESSION['stories'] 
	                                : false
	                            );
    	$this->layout->view('stories', $this->data);
	}
	
	/**
	 * Clear the stories from the session
	 * @return void
	 */
	public function clear()
	{
	    $_SESSION['stories'] = false;
	    redirect('stories');
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
            redirec('stories/view');
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
                "effort" => '0',
                "status" => '',
                "type" => '',
                "sprint" => '',
                "release" => ''
            )
        ); 
	    
     	redirect('stories/view');
	 }
	
	/**
	 * Given the data about the file, read it and create the session array of
	 * stories
	 * @param $upload_data array - Contains data about the uploaded file
	 **/	 
	private function _convertStories($upload_data)	
	{
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
                
                // Check the columns
                if (count($data) != $this->_numberOfColumns) {
                    $this->data->error = 'Your column count is wrong, '.
                    'check your CSV against the instructions below';
                    $_SESSION['stories'] = false;
                    $ret = FALSE;
                    break;
                }
                else {
                     // ignore the first row?
                    if ($this->input->post('ignore_first_row') AND !$ignored) {
                        $ignored = TRUE;
                        continue;
                    }

                    for($i = 0; $i < count($data); $i++) {
                        $_SESSION['stories'][$row][$csv_fields[$i]] = strip_tags($data[$i]);
                    }
                    $row++;
                    $i = 0;
                    
                    // Hooray!
                    $ret = TRUE;
                }
            }    	
        }
        // We couldnt read it!
        else {
            // Throw error
            $this->data->error = 'Cannot open the uploaded file, try again';
            $ret = FALSE;
        }
        
		// All done? Delete the file and 
		unlink($upload_data['full_path']);
		
		// Fin.
		return $ret;
		
	}
}