<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class News extends MX_Controller {

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
          'view' => 'news/news',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/news.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function details($slug = NULL) {
    $data = [];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'news/details',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/details.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function allnews($slug = NULL) {
    $data = [];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'news/allnews',
          'data' => $data
        )
      ),
      array( // JavaScript Files

      ),
      array( // CSS Files
        "assets/css/allnews.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }
}
?>
