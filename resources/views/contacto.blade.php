@extends('layouts.base')
@section('titulo','Contacto')
@section('cuerpo')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Contacto</h2>
        <p>escribenos, estamos para resolver cualquier duda.</p>
      </div>

      <div class="row gx-lg-0 gy-4">
        <div class="col-lg-4">
          <div class="info-container d-flex flex-column align-items-center justify-content-center">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Dirección:</h4>
                <p>Jr. Amazonas #120 - Chachapoyas</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Correo:</h4>
                <p>soporte@idexperujapon.edu.pe</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p>041-750047</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-clock flex-shrink-0"></i>
              <div>
                <h4>Horario de Atencion:</h4>
                <p>Lu-Sab: 9AM - 17PM</p>
              </div>
            </div><!-- End Info Item -->
          </div>

        </div>

        <div class="col-lg-8">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="7" placeholder="Mensage" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Cargango</div>
              <div class="error-message">Error</div>
              <div class="sent-message">Tu mensage fue enviado, Gracias!</div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensage</button></div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection