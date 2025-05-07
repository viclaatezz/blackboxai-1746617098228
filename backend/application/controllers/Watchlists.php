<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Watchlists extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Watchlist_model');
        $this->load->model('Portfolio_model');
        $this->load->model('Coin_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    // List all watchlists
    public function index()
    {
        $data['watchlists'] = $this->Watchlist_model->get_watchlists();
        $this->load->view('watchlists/index', $data);
    }

    // Show form to create new watchlist
    public function create()
    {
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $data['coins'] = $this->Coin_model->get_coins();
        $this->load->view('watchlists/create', $data);
    }

    // Save new watchlist
    public function store()
    {
        $this->form_validation->set_rules('portfolio_id', 'Portfolio', 'required');
        $this->form_validation->set_rules('coin_id', 'Coin', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->create();
        }
        else
        {
            $this->Watchlist_model->set_watchlist();
            redirect('watchlists');
        }
    }

    // Show form to edit watchlist
    public function edit($id)
    {
        $data['watchlist'] = $this->Watchlist_model->get_watchlist($id);
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $data['coins'] = $this->Coin_model->get_coins();

        if (empty($data['watchlist']))
        {
            show_404();
        }

        $this->load->view('watchlists/edit', $data);
    }

    // Update watchlist
    public function update($id)
    {
        $this->form_validation->set_rules('portfolio_id', 'Portfolio', 'required');
        $this->form_validation->set_rules('coin_id', 'Coin', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->edit($id);
        }
        else
        {
            $this->Watchlist_model->update_watchlist($id);
            redirect('watchlists');
        }
    }

    // Delete watchlist
    public function delete($id)
    {
        $this->Watchlist_model->delete_watchlist($id);
        redirect('watchlists');
    }
}
