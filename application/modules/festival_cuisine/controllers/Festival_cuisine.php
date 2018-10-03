<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Festival_cuisine extends MX_Controller {

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
          'view' => 'festival_cuisine/fc',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/festival.js"
      ),
      array( // CSS Files
        "assets/css/festival.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function load_pages(){
    $path = ENV['api_path'];
    $api_name = 'pages/load_pages';
    $creds = ENV['credentials'];

    $client = new GuzzleHttp\Client(['verify' => FALSE]);
    $post = (isJsonPostContentType()) ? decodeJsonPost($this->security->xss_clean($this->input->raw_input_stream)) : $this->input->post();
    $args = $post['params'];

    $url = $path . $api_name;

    $request = $client->request(
      'POST',
      $url,
      array_merge($creds, ['form_params' => $args])
    );

    $response = $request->getBody()->getContents();

    header( 'Content-Type: application/x-json' );
    echo $response;
  }
}
?>
