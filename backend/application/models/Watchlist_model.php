<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Watchlist_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_watchlists($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('watchlists.*, portfolios.name as portfolio_name, coins.symbol as coin_symbol');
            $this->db->from('watchlists');
            $this->db->join('portfolios', 'watchlists.portfolio_id = portfolios.id');
            $this->db->join('coins', 'watchlists.coin_id = coins.id');
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('watchlists.*, portfolios.name as portfolio_name, coins.symbol as coin_symbol');
        $this->db->from('watchlists');
        $this->db->join('portfolios', 'watchlists.portfolio_id = portfolios.id');
        $this->db->join('coins', 'watchlists.coin_id = coins.id');
        $this->db->where('watchlists.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function set_watchlist()
    {
        $data = array(
            'portfolio_id' => $this->input->post('portfolio_id'),
            'coin_id' => $this->input->post('coin_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('watchlists', $data);
    }

    public function update_watchlist($id)
    {
        $data = array(
            'portfolio_id' => $this->input->post('portfolio_id'),
            'coin_id' => $this->input->post('coin_id'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        return $this->db->update('watchlists', $data);
    }

    public function delete_watchlist($id)
    {
        return $this->db->delete('watchlists', array('id' => $id));
    }
}
