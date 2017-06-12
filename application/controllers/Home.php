<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Michelf\Markdown;

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
    }

    public function index()
    {
        $md5 = array(
            'e2be34a99c0675fc98cecdabb677e590',
            'fe1a1047150d4d3ecd1a451b83bb61ec',
            '554728d2a683db78d3854c74c941fa4e',
            '331503f8f2e87fe2f37ed0b49b65e4ee',
            'cb12e9c25dc42fdc27bde63c93bed752',
        );

        $titles = array();
        foreach($md5 as $k => $id) {
            $article = $this->api_model->get($id);
            $title = explode("\n\r", $article['content']); 
            $titles[$k]['title'] = str_replace("# ", "", trim($title[0]));
            $titles[$k]['create_at'] = $article['create_at'];
            $titles[$k]['md5'] = $id;
        }

        $data['titles'] = $titles;
        $this->load->view('header');
        $this->load->view('home', $data);
    }

    public function article($md5)
    {
        $article = $this->api_model->get($md5);
        $data['article'] = Markdown::defaultTransform($article['content']);

        $this->load->view('header');
        $this->load->view('article', $data);
    }
}