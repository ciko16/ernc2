<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Event</title>
    <link rel="stylesheet" href="<?= base_url('assets/colorlib-calendar/css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="calendar">
            <div class="header">
                <h2>Tambahkan Data Peminjaman Lab</h2>
                <a href="<?= site_url('calendar') ?>">Back to Calendar</a>
            </div>
            <div class="body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('calendar/add_event'); ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Mulai Peminjaman</label>
                        <input type="date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Batas Peminjaman</label>
                        <input type="date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
