<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoinGeckoApi {

    protected $ci;
    protected $base_url = 'https://api.coingecko.com/api/v3/';

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('curl');
    }

    // Get current price for a list of coin ids in specified currency
    public function get_prices(array $coin_ids, $currency = 'usd')
    {
        $ids = implode(',', $coin_ids);
        $url = $this->base_url . 'simple/price?ids=' . urlencode($ids) . '&vs_currencies=' . urlencode($currency);

        $response = $this->ci->curl->simple_get($url);
        if ($response === FALSE) {
            return FALSE;
        }

        $data = json_decode($response, true);
        return $data;
    }

    // Get coin list from CoinGecko
    public function get_coin_list()
    {
        $url = $this->base_url . 'coins/list';
        $response = $this->ci->curl->simple_get($url);
        if ($response === FALSE) {
            return FALSE;
        }
        $data = json_decode($response, true);
        return $data;
    }
}
