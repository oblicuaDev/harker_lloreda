<?php 
  include 'includes/head.php';
?>
<main>
  <div class="container-m">
    <h1><?=$sdk->palabras[$lang][47]?></h1>
    <p><?=$sdk->palabras[$lang][48]?></p>
    <form action="<?=$lang?>/seleccionar-metodo-pago" id="data-form" method="POST">
      <span class="form-item">
        <input
          type="text"
          name="vads_cust_first_name"
          id="vads_cust_first_name"
          
          required
        />
        <label class="label-effect" for="vads_cust_first_name"><?=$sdk->palabras[$lang][50]?></label>
      </span>
      <span class="form-item">
        <input
          type="tel"
          name="vads_cust_id"
          id="vads_cust_id"
          
          pattern="[0-9]+"
          required
          oninput="validarInputNumerico(this);"
        />
        <label class="label-effect" for="vads_cust_id"
          ><?=$sdk->palabras[$lang][51]?></label
        >
      </span>
      <span class="form-item">
        <input
          type="tel"
          name="vads_cust_cell_phone"
          id="vads_cust_cell_phone"
          
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
          name="vads_cust_address_number"
          id="vads_cust_address_number"
          
          required
        />
        <label class="label-effect" for="vads_cust_address_number"
          ><?=$sdk->palabras[$lang][54]?></label
        >
      </span>
      <span class="form-item-1">
      <select name="select" id="description"  onchange="changeValuePrice(this)">
          <option value="" disabled selected><?=$sdk->palabras[$lang][57]?></option>
          <?php $conceptos =$sdk->getConceptosDePago(); foreach ($conceptos as $concepto) { ?>
              <option value="<?= $concepto->rowID ?>" data-price="<?= $concepto->price_oconcept ?>"><?= $concepto->name_oconcept ?></option>
              <?php } ?>
              <option value="otro">Otro</option>
      </select>
      </span>
      <span class="form-item">
        <input
          type="hidden"
          name="concept"
          id="concept"
        />
        <label class="label-effect" for="concept"></label>
      </span>
      <span class="form-item">
        <input
          type="tel"
          name="price"
          id="price"
          
          readonly
        />
        <label class="label-effect" for="amount"><?=$sdk->palabras[$lang][55]?></label>
      </span>

      <label class="cyberpunk-checkbox-label" for="politics">
        <input type="checkbox" class="cyberpunk-checkbox" id="politics" name="politics" />
        <small>
        <?php
          // Definir una expresión regular para encontrar texto entre corchetes
          $patron = '/\[(.*?)\]/';
          // Reemplazar texto entre corchetes con el mismo texto dentro de una etiqueta <a>
          $texto_modificado = preg_replace($patron, '<a href="'.$lang.'/politicas-de-tratamiento-de-datos" target="_blank">$1</a>', $sdk->palabras[$lang][49]);
          echo $texto_modificado;
          ?>
        </small>
      </label>
      <input type="hidden" name="priceNoFormatted" id="priceNoFormatted">
      <button type="submit" id="open"><?=$sdk->palabras[$lang][56]?></button>
    </form>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
