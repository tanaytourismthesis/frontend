<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Hca extends MX_Controller {

  private $page_template;
	public function __construct()
	{
		parent::__construct();
		$this->page_template = ENV['default_template'];
	}

  public function index(){
    $data = [];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'hca/hca',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/hca.js"
      ),
      array( // CSS Files
        "assets/css/history.css"
      ),
      array( // Meta Tags

      ),
      $this->page_template // template page
    );
  }

  public function details($tag = NULL, $slug = NULL) {
    try {
      if (empty($tag) || empty($slug)) {
        throw new Exception('Invalid parameter(s).');
      }

      $result = modules::run('pages/details', 'hca', $tag, $slug);

      if (!$result['response']) {
        throw new Exception($result['message']);
      }

      $result = $this->template->build_template (
        'History, Culture and Arts', //Page Title
        array( // Views
          array(
            'view' => 'hca/details',
            'data' => [
              'details' => $result['data']['records'][0]
            ]
          )
        ),
        array( // JavaScript Files

        ),
        array( // CSS Files

        ),
        array( // Meta Tags

        ),
        $this->page_template // template page
      );
    } catch (Exception $e) {
      show_404();
    }
  }

  public function allpages($slug = NULL) {
  if($slug == 'history'){
    $pagetitle = 'ALL HISTORY';
  }
  if($slug == 'culture'){
    $pagetitle = 'ALL CULTURE';
  }
  if($slug == 'arts'){
    $pagetitle = 'ALL ARTS';
  }

  $data = [
    'slug' => $slug,
    'pagetitle' => $pagetitle
  ];

  $template = ENV['default_template'];

  $this->template->build_template (
      'History, Culture and Arts', //Page Title
      array( // Views
        array(
          'view' => 'hca/allhca',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/allhca.js"
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
