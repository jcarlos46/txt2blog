<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Michelf\Markdown;

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $md5 = array('e2','fe','55','33','cb',);

        $titles = array();
        foreach($md5 as $k => $id) {
            $article = $this->api_model->get($id);
            $data['articles'][$k]['content'] = Markdown::defaultTransform($article['content']);
            $data['articles'][$k]['md5'] = $article['md5'];
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