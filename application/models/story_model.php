<?
class Story_model extends CI_Model {
    
    /**
     * Constructor
     * - Just fires the parent
     */
    public function __construct() {
        
        parent::__construct();
    }
    
    /** STATIC **/
    public static function create() {

    }

    public static function update() {

    }

    public static function fetch($id) {
      echo 'fetching: '. $id;
    }
    

}