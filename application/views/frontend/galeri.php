<section class="py-5 border-bottom" id="features">
  <div class="container px-5 my-5">
    <div class="row">
      <?php foreach($galeri as $index => $item): ?>
        <?php if ($index % 3 == 0): ?>
          <div class="card-deck mb-4">
        <?php endif; ?>

        <div class="card">
          <a href="<?= base_url('assets/img/galeri/') . $item['gambar']; ?>" data-lightbox="gambar-set" data-title="Gambar <?= $item['judul']; ?>">
            <img src="<?= base_url('assets/img/galeri/') . $item['gambar']; ?>" class="card-img-top" alt="<?php echo $item['judul']; ?>">
          </a>
          <div class="card-body" style="background-color: #fca01780;">
            <h5 class="card-title"><?php echo $item['judul']; ?></h5>
            <p class="card-text"><?php echo $item['deskripsi']; ?></p>
          </div>
        </div>

        <?php if (($index + 1) % 3 == 0 || ($index + 1) == count($galeri)): ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>