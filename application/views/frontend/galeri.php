<section class="py-5 border-bottom" id="features">
  <div class="container px-5 my-5">
    <table id="galeriTable" class="display">
      <thead style="display:none;">
        <tr>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($galeri as $item): ?>
          <tr>
            <td>
              <div class="card">
                <a href="<?= base_url('assets/img/galeri/') . $item['gambar']; ?>" data-lightbox="gambar-set" data-title="Gambar <?= $item['judul']; ?>">
                  <img src="<?= base_url('assets/img/galeri/') . $item['gambar']; ?>" class="card-img-top" alt="<?php echo $item['judul']; ?>">
                </a>
                <div class="card-body" style="background-color: #fca01780;">
                  <h5 class="card-title"><?php echo $item['judul']; ?></h5>
                  <p class="card-text"><?php echo $item['deskripsi']; ?></p>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
