<?php 
  include 'includes/head.php';
?>
<main>
  <div class="container-f">
    <h1><?=$sdk->palabras[$lang][63]?></h1>
    <p><?=$sdk->palabras[$lang][64]?></p>
    <form action="" id="data-form">
      <span class="form-item">
        <input
          type="text"
          name="vads_cust_first_name"
          id="vads_cust_first_name"
          autocomplete="off"
          required
        />
        <label class="label-effect" for="vads_cust_first_name"><?=$sdk->palabras[$lang][50]?></label>
      </span>
      <span class="form-item">
        <input
          type="tel"
          name="vads_cust_cell_phone"
          id="vads_cust_cell_phone"
          autocomplete="off"
          pattern="[0-9]+"
          required
          oninput="validarInputNumerico(this);"
        />
        <label class="label-effect" for="vads_cust_cell_phone"><?=$sdk->palabras[$lang][52]?></label>
      </span>
      <span class="form-item">
        <input
          type="email"
          name="vads_cust_email"
          id="vads_cust_email"
          autocomplete="off"
          value=""
          required
        />
        <label class="label-effect" for="vads_cust_email"
          ><?=$sdk->palabras[$lang][53]?></label
        >
      </span>
      <span class="form-item">
        <input
          type="text"
          name="vads_cust_message"
          id="vads_cust_message"
          autocomplete="off"
          required
        />
        <label class="label-effect" for="vads_cust_message">Mensaje</label>
      </span>

      <label class="cyberpunk-checkbox-label">
        <input type="checkbox" class="cyberpunk-checkbox" />
        <small>
        <?=html_entity_decode($sdk->palabras[$lang][65])?>
        </small>
      </label>
      <button type="submit" class="btn primary-3"><?=$sdk->palabras[$lang][56]?></button>
    </form>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
