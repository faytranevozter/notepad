<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handler extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->restricted_file = array('php');
	}

	function index() {
		$this->error404();
	}

	function error404() {
		$this->lang->load('page', $this->config->item('language'));
		set_status_header(404);
		$send['title'] = $this->lang->line('not_found');
		$send['message'] = $this->lang->line('not_found_message');
		$send['link'] = isset($_SERVER['HTTP_REFERER']) ? '<a href="'.$_SERVER['HTTP_REFERER'].'">'.$this->lang->line('previous_page').'</a>' : '<a href="'.base_url().'">'.$this->lang->line('main_page').'</a>';
		$this->load->view('404', $send);
	}

	function theme()
	{
		$this->load->helper('file');
		$theme_path = VIEWPATH;
		$theme = 'default';

		$url = $this->uri->uri_string();
		$urlexp = explode("/", $url);
		if ($urlexp[1] != $theme) {
			$this->error404();
		} else {
			$url = str_replace($urlexp[0].'/'.$theme, '', $url);

			$file = $theme_path.$theme.$url;

			if (file_exists($file) AND !is_dir($file)) {
				$info = pathinfo($file);

				if (! in_array($info['extension'], $this->restricted_file)) {

					$mime = get_mime_by_extension($file);
					header("Content-type: $mime");
					echo file_get_contents($file);

				} else {
					$this->error404();
				}

			} else {
				$this->error404();
			}
		}
	}

	function sitemap()
	{
		$this->load->helper('xml');
		header("Content-Type: text/xml;charset=iso-8859-1");

		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';

		$data[0]['loc'] = base_url();
		$data[0]['priority'] = '1.0';

		$photos = show_post();
		foreach ($photos as $key => $photo) {
			$extras = json_decode($photo['extra'], TRUE);
			$imgdir = $extras['imgdir'];
			$img['image:loc'] = '<image:loc>'.base_url($imgdir.'l_'.$photo['gambar']).'</image:loc>';
			$img['image:caption'] = '<image:caption>'.$photo['alt'].'</image:caption>';
			$datastore['image:image'] = implode("", $img);
			$datastore['loc'] = base_url('photos/detail/'.$photo['id_photos']);
			$datastore['lastmod'] = $photo['tanggal'];
			$data[] = $datastore;
		}

		foreach ($data as $site => $map) {
			$xml .= '<url>';
			if (is_array($map)) {
				foreach($map as $tag => $val) {
					$xml .= "<{$tag}>{$val}</{$tag}>";
				}
			} else {
				$xml .= '<loc>'.xml_convert($map).'</loc>';
			}
			$xml .= '</url>';
		}

		$xml .= '</urlset>';
		echo $xml;
	}

}
