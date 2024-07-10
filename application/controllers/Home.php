<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('home/mainView');
        $this->load->view('header/footer');
        $this->load->view('header/htmlclose');
        // $this->load->view('home');
    }
    public function aboutME(){
        $this->load->view('header/header');
        $this->load->view('css/extraCSS');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('about/mainView');
        $this->load->view('header/footer');
        $this->load->view('js/extraJS');
        $this->load->view('header/htmlclose');
    }
    public function login(){
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('login/index');
        $this->load->view('header/footer');
        $this->load->view('header/htmlclose');
    }
}