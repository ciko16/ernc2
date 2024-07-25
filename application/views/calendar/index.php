<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="<?= base_url('template/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/css/boostrap.min.css.map') ?>">
    <link rel="stylesheet" href="<?= base_url('template/css/boostrap.min') ?>">
    <link rel="stylesheet" href="<?= base_url('template/css/owl.carousel.min') ?>">
    <link rel="stylesheet" href="<?= base_url('template/fonts/icomoon/style.css') ?>">

    <link href='template/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='/template/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
</head>
<body>
    <div class="container">
        <div class="calendar">
            <div class="header">
                <h2>Jadwal Peminjaman Lab ERNC<sup>2</sup></h2>
                <a href="<?= site_url('calendar/add_event') ?>">Tambahkan Data Peminjaman</a>
            </div>
            <div class="body">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>deskripsi</th>
                            <th>Mulai Peminjaman</th>
                            <th>Batas Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kalender as $kal): ?>
                            <tr>
                                <td><?= $kal['title'] ?></td>
                                <td><?= $kal['deskripsi'] ?></td>
                                <td><?= $kal['start_date'] ?></td>
                                <td><?= $kal['end_date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: <?= json_encode($events) ?>
            });
        });
    </script>

    <script src="<? base_url('template/js/boostrap.min'); ?>"></script>
    <script src="<? base_url('template/js/jquery-3.3.1.min'); ?>"></script>
    <script src="<? base_url('template/js/owl.carousel.min'); ?>"></script>
    <script src="<? base_url('template/js/popper.min'); ?>"></script>
    <script src="<? base_url('template/js/main.js'); ?>"></script>
    <script src="<? base_url('template/fullcalendar/packages/core/main.js'); ?>"></script>
    <script src="<? base_url('template/fullcalendar/packages/interaction/main.js'); ?>"></script>
    <script src="<? base_url('template/fullcalendar/packages/daygrid/main.js'); ?>"></script>
    <script src="<? base_url('template/fullcalendar/packages/timegrid/main.js'); ?>"></script>
    <script src="<? base_url('template/fullcalendar/packages/list/main.js'); ?>"></script>
</body>
</html>
