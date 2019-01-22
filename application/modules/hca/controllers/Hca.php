<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Hca extends MX_Controller {

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
          'view' => 'hca/hca',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/history.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function allhistory($slug = NULL){
    $data = [];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'hca/allhistory',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/allhistory.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function othercultures($slug = NULL){
    $data = [];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'hca/othercultures',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/othercultures.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

}
?>
