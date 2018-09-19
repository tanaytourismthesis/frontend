<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Home extends MX_Controller {

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
          'view' => 'home/home',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/home.js"
      ),
      array( // CSS Files
        "assets/css/home.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

  public function load_news($searchkey = '', $start = 0, $limit = 4, $id = 'all', $slug = NULL){
    $path = ENV['api_path'];
    $api_name = 'news/load_news';
    $creds = ENV['credentials'];

    $client = new GuzzleHttp\Client(['verify' => FALSE]);

    $args = [
      "slug" => $slug,
      "id" => $id,
      "start" => $start,
      "limit" => $limit,
      "searchkey" => $searchkey
    ];

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
