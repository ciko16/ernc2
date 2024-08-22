<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kalender Peminjaman Lab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href=<?= base_url('application/views/jadwalkalender/style.css')?>>
    <link rel="icon" href="<?= base_url('assets/img/tes.png')?>" type="image/x-icon">
    <style>
       table {
    border: 15px solid #92c83c;
    border-collapse: collapse;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
}
td {
    width: 50px;
    height: 50px;
    text-align: center;
    border: 1px solid #e2e0e0;
    font-size: 18px;
    font-weight: bold;
}
th {
    height: 50px;
    padding-bottom: 8px;
    background: #92c83c;
    font-size: 20px;
}
.prev_sign a, .next_sign a {
    color: white;
    text-decoration: none;
}
tr.week_name {
    font-size: 16px;
    font-weight: 400;
    color: red;
    width: 10px;
    background-color: #efe8e8;
}
.highlight {
    background-color: #92c83c;
    color: white;
    padding: 1rem;
    border-radius: 0.25rem;
    border: 1px solid #dee2e6;
    margin-bottom: 1rem;
    /* height: 27px;
    padding-top: 13px;
    padding-bottom: 7px; */
}
.calender .days td {
    width: 80px;
    height: 80px;
}
.calender .hightlight {
    font-weight: 600;
}
.calender .days td:hover {
    background-color: #DEF;
}
.calender .filled {
    background-color: red;
    color: white;
}
/* Kalender dengan data booking kosong (warna oranye) */
.calender .filled-no-booking {
    background-color: orange;
    color: white;
}

/* Pastikan tampilan diatur dengan baik */
.calender .day_num {
    display: block;
    text-align: center;
    line-height: 80px; /* Sesuaikan dengan tinggi td */
    width: 100%;
    height: 100%;
}
.calender .empty {
    background-color: green;
    color: white;
}
/* Warna oranye untuk tanggal yang tidak memiliki data booking */

.card {
            max-width: 600px;
            margin: auto;
        }
        .card-body {
            padding: 1rem;
        }
        .calendar-isi {
            font-weight: bold; /* Atur teks 'isi' menjadi tebal */
        }
        .calendar-booking {
             font-weight: normal; /* Atur teks 'booking' menjadi normal */
        }
    </style>
</head>
</head>

<body>
<div class="container px-3 my-3">
<div class="card">
  <div class="card-body">
    <h5 class="card-title text-center">Kalender Lab ERNC<sup>2</sup></h5>
    <?php echo $kalender; ?>
    <a>Klik 'Detail' untuk menampilkan detail data dari tanggal</a>
  </div>
</div>
</div>
<!-- untuk menampilkan pop-up -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Kalender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Tanggal:</strong> <span id="modalTanggal"></span></p>
        <p><strong>Isi:</strong> <span id="modalIsi"></span></p>
        <p><strong>Booking:</strong> <span id="modalBooking"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>