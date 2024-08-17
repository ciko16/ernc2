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

    <!-- Pagination -->
     <nav aria-label="Galeri pagination">
      <ul class="pagination justify-content-center">
        <?php if ($current_page > 1) :?>
          <li class="page-item">
            <a class="page-link" href="?page=<?= $current_page - 1; ?>" aria-label="Sebelumnya">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $current_page) ? 'active' : ''; ?>">
              <a class="page-link" href="?=<?= $i; ?>"><?= $i; ?></a>
            </li>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page + 1; ?>" aria-label="Selanjutnya">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
              <?php endif; ?>
      </ul>
     </nav>
  </div>
</section>