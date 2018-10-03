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
        "assets/js/news.js"
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

  public function load_latest(){
    $path = ENV['api_path'];
    $api_name = 'news/load_news';
    $creds = ENV['credentials'];

    $client = new GuzzleHttp\Client(['verify' => FALSE]);
    $post = (isJsonPostContentType()) ? decodeJsonPost($this->security->xss_clean($this->input->raw_input_stream)) : $this->input->post();
    $slug = $post['slug'] ?? NULL;
    $id = $post['id'] ?? 'all';
    $start = $post['start'];
    $limit = $post['limit'];
    $searchkey = $post['searchkey'];
    $status = $post['status'] ?? 'all';
    $newsslug = $post['newsslug'] ?? 'all';

    $args = [
      "slug" => $slug,
      "id" => $id,
      "start" => $start,
      "limit" => $limit,
      "searchkey" => $searchkey,
      "status" => $status,
      "newsslug" => $newsslug
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

  public function load_special(){
    $path = ENV['api_path'];
    $api_name = 'news/load_news';
    $creds = ENV['credentials'];

    $client = new GuzzleHttp\Client(['verify' => FALSE]);
    $post = (isJsonPostContentType()) ? decodeJsonPost($this->security->xss_clean($this->input->raw_input_stream)) : $this->input->post();
    $slug = $post['slug'] ?? NULL;
    $id = $post['id'] ?? 'all';
    $start = $post['start'];
    $limit = $post['limit'];
    $searchkey = $post['searchkey'];
    $status = $post['status'] ?? 'all';
    $newsslug = $post['newsslug'] ?? 'all';

    $args = [
      "slug" => $slug,
      "id" => $id,
      "start" => $start,
      "limit" => $limit,
      "searchkey" => $searchkey,
      "status" => $status,
      "newsslug" => $newsslug
    ];

    $url = $path . $api_name;

    $request = $client->request(
      'POST',
      $url,
      array_merge($creds, ['form_params' => $args])
    );

    $response = $request->getBody()->getContents();

    header('Content-Type: application/x-json');
    echo $response;

  }

  public function load_announcements(){
    $path = ENV['api_path'];
    $api_name = 'news/load_news';
    $creds = ENV['credentials'];

    $client = new GuzzleHttp\Client(['verify' => FALSE]);
    $post = (isJsonPostContentType()) ? decodeJsonPost($this->security->xss_clean($this->input->raw_input_stream)) : $this->input->post();
    $slug = $post['slug'] ?? NULL;
    $id = $post['id'] ?? 'all';
    $start = $post['start'];
    $limit = $post['limit'];
    $searchkey = $post['searchkey'];
    $status = $post['status'] ?? 'all';
    $newsslug = $post['newsslug'] ?? 'all';

    $args = [
      "slug" => $slug,
      "id" => $id,
      "start" => $start,
      "limit" => $limit,
      "searchkey" => $searchkey,
      "status" => $status,
      "newsslug" => $newsslug
    ];

    $url = $path . $api_name;

    $request = $client->request(
      'POST',
      $url,
      array_merge($creds, ['form_params' => $args])
    );

    $response = $request->getBody()->getContents();

    header('Content-Type: application/x-json');
    echo $response;
  }
}
?>
