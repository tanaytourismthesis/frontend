<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Hf extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('home_model');
	}

  public function index(){
    $data = [];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'hf/hf',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/hane.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

   public function search($slug = NULL ) {
     $data = [];

     $template = ENV['default_template'];

     $this->template->build_template (
       'Home', //Page Title
        array( // Views
         array(
        'view' => 'hf/search',
          'data' => $data
        )
       ),
      array( // JavaScript Files
      ),
      array( // CSS Files
        "assets/css/search.css"
      ),
       array( // Meta Tags

       ),
       $template // template page
     );
 }

public function hotelinfo($slug = NULL ) {
  $data = [];

  $template = ENV['default_template'];

  $this->template->build_template (
    'Home', //Page Title
     array( // Views
      array(
     'view' => 'hf/hotelinfo',
       'data' => $data
     )
    ),
   array( // JavaScript Files
   ),
   array( // CSS Files
     "assets/css/hotelinfo.css"
   ),
    array( // Meta Tags

    ),
    $template // template page
  );
}
}

?>
