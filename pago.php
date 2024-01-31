<?php 
  include 'includes/head.php';
?>
<main>
  <div class="container-m">
    <h1>Diligencia tus<br />datos de pago</h1>
    <p>
      Si has solicitado una valoración, tienes una cita o deseas adquirir algún
      producto cosmético, puedes usar este formulario para hacer tu pago sin
      salir de casa. Diligencia tus datos y el valor que vayas a cancelar, serás
      redirigido a nuestra plataforma segura de pagos
    </p>
    <form action="" id="data-form">
      <span class="form-item">
        <input
          type="text"
          name="vads_cust_first_name"
          id="vads_cust_first_name"
          autocomplete="off"
          required
        />
        <label class="label-effect" for="vads_cust_first_name">Nombre</label>
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
        <label class="label-effect" for="vads_cust_id"
          >Número de cédula o identificación</label
        >
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
        <label class="label-effect" for="vads_cust_cell_phone">Teléfono</label>
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
          >Correo Electronico</label
        >
      </span>
      <span class="form-item">
        <input
          type="text"
          name="vads_cust_address_number"
          id="vads_cust_address_number"
          autocomplete="off"
          required
        />
        <label class="label-effect" for="vads_cust_address_number"
          >Dirección para facturación</label
        >
      </span>
      <span class="form-item-1">
        <select
          id="select"
          name="select"
          id="description"
          autocomplete="off"
          required
        >
          <option value="" disabled selected>Concepto de pago</option>
          <option value="opcion1">Pago de mi consulta</option>
          <option value="opcion2">Opción 2</option>
          <option value="opcion3">Opción 3</option>
          <label class="label-effect" for="description">Concepto</label>
        </select>
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
        <label class="label-effect" for="amount">Monto que pagarás</label>
      </span>

      <label class="cyberpunk-checkbox-label">
        <input type="checkbox" class="cyberpunk-checkbox" />
        <small>
          He leido y acepto las <a href="">políticas del sitio web</a>, autorizo
          el tratamiento de mis datos personales y el envío de información de
          interés, publicidad y promociones.
        </small>
      </label>

      <button type="button" id="open">Enviar</button>
    </form>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
