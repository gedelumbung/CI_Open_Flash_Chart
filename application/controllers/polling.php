<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polling extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->database();
		$this->load->library('graph');
		$this->load->model('poll_model');
	}

	function index()
	{
		$data['soal'] = $this->poll_model->tampil_soal();
		foreach($data['soal']->result() as $d)
		{
			$id_soal = $d->id;
			$data['soal'] = $d->soal;
		}
		$data['jawaban'] = $this->poll_model->tampil_jawaban($id_soal);
		foreach($data['jawaban']->result() as $j)
		{
			$jwb[] = $j->jawaban;
			$jum[] = $j->counter;
		}
		$this->graph->set_data( $jum );
		$this->graph->set_data( $jum );
		$this->graph->title("Presentase Polling",'{font-size: 18px; color: #800000}');
		$this->graph->bar_glass( 55, '#FF9900', '#C31812', 'Tingkat Perbandingan Polling', 11  );
		$this->graph->line_hollow( 3, 5, '#79B900', 'Grafik Polling', 11 ); 
		$this->graph->set_x_labels( $jwb );
		$this->graph->set_tool_tip( '#x_label# : #val#');
		$this->graph->set_x_label_style( 10, '0×000000', 0 );
		$this->graph->set_y_max( 50 );
		$this->graph->width=800;
		$this->graph->height=400;
		$this->graph->y_label_steps( 10 );
		$this->graph->bg_colour='#ffffff';
		$this->graph->set_x_legend( 'Pilihan', 14, '#736AFF' );
		$this->graph->set_y_legend( 'Statistik', 14, '#736AFF' );
		$this->graph->set_output_type("js");
		$this->load->view('depan',$data);
	}
	function simpan()
	{
		$id=$this->input->post('jwb');
		$this->poll_model->simpan_poll($id);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/polling'>";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */