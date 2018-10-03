<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class News extends MX_Controller {

  private $template_name;

	public function __construct()
	{
		parent::__construct();
    $this->template_name = ENV['default_template'];
	}

  public function index(){
    $data = [];

    $this->template->build_template (
      'News and Updates', //Page Title
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
      $this->template_name // template page
    );
  }

  public function load_news($params = [], $ajax = TRUE){
    $response = [
      'response' => FALSE
    ];

    try {
      if (!empty($params)) {
        $post = $params;
      } else {
        $post = (isJsonPostContentType()) ? decodeJsonPost($this->security->xss_clean($this->input->raw_input_stream)) : $this->input->post();
      }

      if (empty($post)) {
        throw new Exception('Invalid parameter(s)');
      }

      $path = ENV['api_path'];
      $api_name = 'news/load_news';
      $creds = ENV['credentials'];
      $client = new GuzzleHttp\Client(['verify' => FALSE]);

      $slug = $post['slug'] ?? NULL;
      $id = $post['id'] ?? 'all';
      $start = $post['start'] ?? 0;
      $limit = $post['limit'] ?? 0;
      $searchkey = $post['searchkey'] ?? '';
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
    } catch (Exception $e) {
      $response['message'] = $e->getMessage();
    }

    if ($ajax) {
      header( 'Content-Type: application/x-json' );
  		echo $response;
    }
    return json_decode($response, true);
  }

  public function details($type_slug = NULL, $slug = NULL) {
    try {
      if (empty($type_slug) || empty($slug)) {
        throw new Exception('Invalid parameter(s).');
      }

      $args = [
        "slug" => $type_slug,
        "start" => 0,
        "limit" => 1,
        "status" => 'published',
        "newsslug" => $slug
      ];

      $result = $this->load_news($args, FALSE);

      if (!$result['response']) {
        throw new Exception($result['message']);
      }

      $result = $this->template->build_template (
        'News and Updates', //Page Title
        array( // Views
          array(
            'view' => 'news/details',
            'data' => [
              'details' => $result['data']['records']
            ]
          )
        ),
        array( // JavaScript Files

        ),
        array( // CSS Files

        ),
        array( // Meta Tags

        ),
        $this->template_name // template page
      );

      debug($result);
    } catch (Exception $e) {
      show_404();
    }
  }
}
?>
