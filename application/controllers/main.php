<?php
class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$session=$this->session->userdata('username');
		if(!$session){
			redirect('/login','location');
		}
	}
	
	/**
	 * SOSRP安全平台主页面
	 * @return [type] [description]
	 */
	function index(){
		$data['username']=$this->session->userdata('username');
		$this->load->view('main',$data);
	} 

	/**
	 * 登出
	 * @return [type] [description]
	 */
	function logout()
	{
		$this->session->unset_userdata('username');
		redirect('/login','location');
	}

	/**
	 * 展现SOSRP平台内页body统计
	 * @return [type] [description]
	 */
	function body()
	{
		$this->load->view('body');
	}

	/**
	 * 展现安全扫描页
	 * @return [type] [description]
	 */
	function scan()
	{
		$this->load->view('scan');
	}

	/**
	 * 资产数据页面
	 * @return [type] [description]
	 */
	function asset()
	{
		$this->load->view('asset/assets.view.php');
	}

	/**
	 * 用户页面
	 * @return [type] [description]
	 */
	function user()
	{
		$this->load->view('user/users.view.php');
	}

}