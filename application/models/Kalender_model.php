<?php

class Kalender_model extends CI_Model {
    public $prefs;
	public function __construct()
	{
		//parent::Model();
		$this->prefs = array(
        'start_day'    => 'sunday',
        'month_type'   => 'long',
        'day_type'     => 'short',
        'show_next_prev' => TRUE,
        'next_prev_url'   => base_url().'home/kalender/'
		);
        $this->prefs['template'] = '
        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calender">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
            <div class="day_num filled"><a href="{day_url}">{day}</a></div>
            <div class="content">{content}</div>
        {/cal_cell_content}
        {cal_cell_content_today}
            <div class="day_num highlight filled"><a href="{day_url}">{day}</a></div>
            <div class="content">{content}</div>
        {/cal_cell_content_today}

        {cal_cell_no_content}
            <div class="day_num empty">{day}</div>
        {/cal_cell_no_content}
        {cal_cell_no_content_today}
            <div class="day_num highlight empty">{day}</div>
        {/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cell_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
        ';
    }

    public function getcalendar($year, $month)
    {
        $this->load->library('calendar', $this->prefs); // load calendar library
        $data = $this->get_calender_data($year,$month);
        return $this->calendar->generate($year, $month, $data);
    }
    
    public function get_calender_data($year, $month)
{
    $query = $this->db
        ->select('tanggal, isi, booking')
        ->from('kalenderbaru')
        ->like('tanggal', "$year-$month", 'after')
        ->get();

    if ($query === FALSE) {
        // Handle query error here
        return array();
    }

    $cal_data = array();
    foreach ($query->result() as $row) {
        $calendar_date = date("j", strtotime($row->tanggal)); // Ambil tanggal hari saja
        $day_url = base_url("kalender/detail/" . $row->tanggal); // buat URL ke halaman detail
        // Gabungkan tanggal dengan HTML yang mengandung link
        $cal_data[(int)$calendar_date] = '<a href="' . $day_url . '">'
                                        . '<div class="day_num">' . $calendar_date . '</div>'
                                        . '</a>'
                                        . '<div class="calendar-isi">' . $row->isi . '</div>'
                                        . '<div class="calendar-booking">' . $row->booking . '</div>';
    }

    return $cal_data;
}

    public function add_calender_data($data, $tanggal)
    {
        $formatted_date = date("Y-m-d", strtotime(str_replace('-', '/', $tanggal)));
        $this->db->insert('kalenderbaru', array(
            'tanggal' => $formatted_date,
            'isi' => $data,
            'booking' => $data
        ));
    }
    public function get_detail($tanggal) {
        $query = $this->db
        ->select('tanggal, isi, booking')
        ->from('kalenderbaru')
        ->where('tanggal', $tanggal)
        ->get();

        return $query->row();
    }
}
?>