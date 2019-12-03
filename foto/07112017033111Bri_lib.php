<?php

/**
 * @package Pulsa Online w38s.com
 * @version 3.5.2
 * @author Achunk JealousMan (0818118061 / achunk17@gmail.com)
 * @link http://w38s.com
 * @link http://isipulsa.co
 * @link http://facebook.com/achunks
 * @link http://your.my.id
 * @link http://sellfy.com/achunk17
 * @copyright 2015 - 2016
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Bri_lib
{
    protected $ch;
    protected $user_agen =
        'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36';
    protected $csrf;
    protected $cookie;
    protected $logged_id = false;
    public $error_code = null;

    public function __construct()
    {
        if (defined('APPPATH'))
            $this->cookie = APPPATH . 'cache/bank_bri-cookie.txt';
        else
            $this->cookie = dirname(__file__) . '/bank_bri-cookie.txt';

        $this->ch = curl_init();
        //curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->cookie);
        //curl_setopt($this->ch, CURLOPT_COOKIEFILE, $this->cookie);
        curl_setopt($this->ch, CURLOPT_USERAGENT, $this->user_agen);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_SSLVERSION, 4);
    }

    // Pre login
    public function captcha()
    {
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->cookie);
        curl_setopt($this->ch, CURLOPT_URL, "https://ib.bri.co.id/ib-bri/login/captcha");
        $data = curl_exec($this->ch);
        $base64_img = 'data:image/png;base64,' . base64_encode($data);
        return $base64_img;
    }

    public function login($username, $password, $captcha)
    {
        if ($this->logged_id)
            return true;

        curl_setopt($this->ch, CURLOPT_COOKIEFILE, $this->cookie);
        curl_setopt($this->ch, CURLOPT_URL, 'https://ib.bri.co.id/ib-bri/Login.html');
        $result = curl_exec($this->ch);
        //file_put_contents(dirname(__file__) . '/bri-1.html', $result);
        preg_match('/name\=\"csrf_token_newib\" value\=\"([a-z0-9]{32})\"/', $result, $matches);
        if (!$matches)
            return false;

        $this->csrf = $matches[1];

        $params = array(
            'csrf_token_newib=' . $this->csrf,
            'j_password=' . $password,
            'j_username=' . $username,
            'j_plain_username=' . $username,
            'preventAutoPass=',
            'j_plain_password=',
            'j_code=' . $captcha,
            'j_language=in_ID',
            );
        curl_setopt($this->ch, CURLOPT_URL, 'https://ib.bri.co.id/ib-bri/Homepage.html');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://ib.bri.co.id/ib-bri/Login.html');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, implode('&', $params));
        $result = curl_exec($this->ch);
        //file_put_contents(dirname(__file__) . '/bri-2.html', $result);
        if (stripos($result, 'Kode Validasi Tidak Cocok') !== false) {
            $this->error_code = 'captcha';
            return false;
        } elseif (stripos($result, 'MyAccount.html') === false) {
            $this->error_code = 'login';
            return false;
        }
        $this->logged_id = true;
        return true;
    }

    public function get_balance($no_rek)
    {
        if (!$this->logged_id)
            return 0;

        curl_setopt($this->ch, CURLOPT_URL,
            'https://ib.bri.co.id/ib-bri/BalanceInquiry.html');
        curl_setopt($this->ch, CURLOPT_REFERER,
            'https://ib.bri.co.id/ib-bri/MyAccount.html');
        $result = curl_exec($this->ch);
        //file_put_contents(dirname(__file__) . '/bri-3.html', $result);
        $x_saldo = explode('<td valign="top">' . $no_rek . '&nbsp;</td>', $result);
        $x_saldo = explode('<td valign="top" style="text-align: right">', $x_saldo[1]);
        $x_saldo = explode('&nbsp;</td></tr>', $x_saldo[1]);
        $x_saldo = (int)str_replace('.', '', $x_saldo[0]);
        return $x_saldo;
    }

    public function get_transactions($no_rek, $from_date = null, $to_date = null)
    {
        if (!$this->logged_id)
            return array();

        $time = time() + (3600 * 7);
        if (!$from_date || !$to_date) {
            $from_date = date('d-m-Y', $time - (3600 * (24 * 2)));
            $to_date = date('d-m-Y', $time);
        }
        $from = explode('-', $from_date);
        $to = explode('-', $to_date);
        $params = array(
            'csrf_token_newib=' . $this->csrf,
            'FROM_DATE=' . $from[2] . '-' . $from[1] . '-' . $from[0],
            'TO_DATE=' . $to[2] . '-' . $to[1] . '-' . $to[0],
            'download=',
            'ACCOUNT_NO=' . $no_rek,
            'VIEW_TYPE=2',
            'DDAY1=' . $from[0],
            'DMON1=' . $from[1],
            'DYEAR1=' . $from[2],
            'DDAY2=' . $to[0],
            'DMON2=' . $to[1],
            'DYEAR2=' . $to[2],
            'MONTH=' . $to[1],
            'YEAR=' . $to[2],
            'submitButton=Tampilkan',
            );
        curl_setopt($this->ch, CURLOPT_URL, 'https://ib.bri.co.id/ib-bri/Br11600d.html');
        curl_setopt($this->ch, CURLOPT_REFERER,
            'https://ib.bri.co.id/ib-bri/AccountStatement.html');
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, implode('&', $params));
        curl_setopt($this->ch, CURLOPT_POST, 1);
        $result = curl_exec($this->ch);
        //file_put_contents(dirname(__file__) . '/bri-4.html', $result);
        $transactions = array();

        $x_history = explode('<td class="fieldText">Saldo Awal</td>', $result);
        $x_history = explode('<td class="fieldText">Total Mutasi</td>', $x_history[1]);
        $x_history = $x_history[0];
        $tr = explode('<tr>', $x_history);
        for ($i = 1; $i < (count($tr) - 1); $i++) {
            $trx = strip_tags(str_replace('</td>', '</td>##td##', $tr[$i]));
            $trx = array_map('trim', explode('##td##', $trx));
            $tgl = explode('/', $trx[0]);
            $transactions[] = array(
                'tanggal' => '20' . $tgl[2] . '/' . $tgl[1] . '/' . $tgl[0], // YYYY/MM/DD
                'keterangan' => $trx[1],
                'debet' => (int)str_replace('.', '', $trx[2]),
                'kredit' => (int)str_replace('.', '', $trx[3]),
                );
        }
        return $transactions;
    }

    protected function fix_angka($string)
    {
        $string = strtok(str_replace(',', '', $string), '.');
        return $string;
    }

    public function logout()
    {
        if (!$this->logged_id)
            return false;

        curl_setopt($this->ch, CURLOPT_URL, 'https://ib.bri.co.id/ib-bri/Logout.html');
        curl_setopt($this->ch, CURLOPT_REFERER,
            'https://ib.bri.co.id/ib-bri/Homepage.html');
        $result = curl_exec($this->ch);
        //file_put_contents(dirname(__file__) . '/bri-5.html', $result);
        curl_close($this->ch);
        //@unlink($this->cookie);
        return true;
    }
}
