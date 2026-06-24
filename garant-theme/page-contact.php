<?php
$tpl = get_template_directory_uri();
add_action( 'wp_head', function() use ( $tpl ) {
    echo '<style>
.hero--contact .hero__bg { background-image:url("' . esc_url( $tpl ) . '/pictures/contactus1.png"); }
.hero--contact .hero__content { padding:160px 0 80px 80px; max-width:680px; }
.contact-section { padding:88px 0; }
.contact-grid { display:grid; grid-template-columns:340px 1fr; gap:56px; align-items:start; }
.contact-vessels-note { margin-top:24px; background:#f8faff; border:1px solid #dbeafe; border-radius:8px; padding:20px; display:flex; gap:14px; align-items:flex-start; }
.contact-vessels-note__icon { width:44px; height:44px; flex-shrink:0; background:rgba(37,99,235,0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.contact-vessels-note strong { font-size:0.9rem; }
.contact-vessels-note p { font-size:0.8rem; color:var(--muted); margin-top:4px; }
.contact-form-panel { background:#fff; border:1px solid #e2e8f0; border-radius:10px; padding:40px 36px; }
.contact-form-panel h3 { font-size:1.4rem; margin-bottom:8px; }
.contact-form-panel > p { font-size:0.85rem; color:var(--muted); margin-bottom:28px; }
.contact-form-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.contact-form-grid .full { grid-column:1/-1; }
.contact-form-grid label { display:block; font-size:0.78rem; font-weight:600; color:var(--text); margin-bottom:6px; }
.contact-form-grid input, .contact-form-grid textarea { width:100%; border:1px solid #d1d5db; border-radius:6px; padding:10px 14px; font-family:inherit; font-size:0.87rem; color:var(--text); background:#fff; transition:border-color .2s; }
.contact-form-grid input:focus, .contact-form-grid textarea:focus { outline:none; border-color:var(--blue2); }
.contact-form-grid input::placeholder, .contact-form-grid textarea::placeholder { color:#9ca3af; }
.contact-form-grid textarea { resize:vertical; min-height:120px; }
.btn-send { width:100%; background:var(--blue2); color:#fff; border:none; border-radius:6px; padding:14px; font-size:0.87rem; font-weight:700; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; transition:background .2s; font-family:inherit; }
.btn-send:hover { background:#1d53c8; }
.contact-form-note { font-size:0.72rem; color:#9ca3af; text-align:center; margin-top:10px; display:flex; align-items:center; justify-content:center; gap:6px; }
.response-band { background:var(--navy); padding:48px 0; color:#fff; }
.response-band__inner { display:grid; grid-template-columns:1fr 1fr; gap:48px; align-items:center; }
.response-band__left { display:flex; align-items:center; gap:20px; }
.response-band__icon { width:64px; height:64px; flex-shrink:0; background:var(--blue2); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.response-band__title { font-size:1.4rem; font-weight:700; }
.response-band__right { font-size:0.9rem; color:rgba(255,255,255,0.72); }
.contact-detail__link { color:inherit; text-decoration:none; transition:color .2s; }
.contact-detail__link:hover { color:var(--blue2); }
@media(max-width:900px) {
  .hero--contact .hero__content { padding:120px 24px 60px 24px; }
  .contact-grid { grid-template-columns:1fr; }
  .contact-form-grid { grid-template-columns:1fr; }
  .response-band__inner { grid-template-columns:1fr; }
}
</style>';
}, 20 );
get_header();
?>

<!-- HERO -->
<section class="hero hero--contact">
  <div class="hero__bg"></div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <p class="hero__label">Contact Us</p>
    <h1 class="hero__title">Let's Build Strong<br>Partnerships.</h1>
    <p class="hero__sub">We are here to support you with reliable crewing solutions and professional service. Get in touch with our team.</p>
    <div class="hero__line"></div>
  </div>
</section>

<!-- CONTACT SECTION -->
<section class="contact-section">
  <div class="container">
    <div class="contact-grid">

      <!-- LEFT -->
      <div>
        <h2>Get in Touch</h2>
        <div class="accent-line"></div>
        <p style="margin-top:16px;color:var(--muted);font-size:0.9rem;line-height:1.6;">Whether you are a seafarer looking for opportunities or a company seeking reliable crew, our team is ready to assist you.</p>

        <div style="margin-top:32px;">
          <div class="contact-detail">
            <div class="contact-detail__icon"><span class="ms">mail</span></div>
            <div>
              <div class="contact-detail__label">Email</div>
              <a href="mailto:info@garantmarinegroup.com" class="contact-detail__value contact-detail__link">info@garantmarinegroup.com</a>
            </div>
          </div>
          <div class="contact-detail">
            <div class="contact-detail__icon"><span class="ms">phone</span></div>
            <div>
              <div class="contact-detail__label">Phone / WhatsApp</div>
              <a href="https://wa.me/message/TAAPY7XJJZE2J1" target="_blank" rel="noopener" class="contact-detail__value contact-detail__link">+359 888 285 528</a>
            </div>
          </div>
          <div class="contact-detail">
            <div class="contact-detail__icon"><span class="ms">location_on</span></div>
            <div>
              <div class="contact-detail__label">Address</div>
              <a href="https://maps.google.com/?q=Varna,Bulgaria" target="_blank" rel="noopener" class="contact-detail__value contact-detail__link">Varna, Bulgaria</a>
            </div>
          </div>
          <div class="contact-detail">
            <div class="contact-detail__icon"><span class="ms">send</span></div>
            <div>
              <div class="contact-detail__label">Telegram</div>
              <a href="https://t.me/Garan_Marine_Group_LLC" target="_blank" rel="noopener" class="contact-detail__value contact-detail__link">@garantmarinegroup</a>
            </div>
          </div>
          <div class="contact-detail">
            <div class="contact-detail__icon"><span class="ms">work</span></div>
            <div>
              <div class="contact-detail__label">LinkedIn</div>
              <a href="https://www.linkedin.com/in/garant-marine-group-5961413b5" target="_blank" rel="noopener" class="contact-detail__value contact-detail__link">Garant Marine Group LLC</a>
            </div>
          </div>
        </div>

        <div class="contact-vessels-note">
          <div class="contact-vessels-note__icon"><span class="ms">directions_boat</span></div>
          <div>
            <strong>We are ready to support all types of vessels, not only tankers.</strong>
            <p>From bulk carriers, container ships, offshore vessels to specialized fleets — we are here for you.</p>
          </div>
        </div>
      </div>

      <!-- RIGHT: Form -->
      <div class="contact-form-panel">
        <h3>Send Us a Message</h3>
        <p>Fill in the form below and our team will get back to you as soon as possible.</p>
        <?php garant_form_messages(); ?>
        <form class="contact-form-grid" method="post" action="<?php echo esc_url( get_permalink() ); ?>" data-garant-form>
          <?php garant_nonce( 'contact' ); ?>
          <div>
            <label for="ct-name">Your Name *</label>
            <input type="text" id="ct-name" name="name" placeholder="Enter your full name" required />
          </div>
          <div>
            <label for="ct-email">Email Address *</label>
            <input type="email" id="ct-email" name="email" placeholder="Enter your email" required />
          </div>
          <div>
            <label for="ct-phone">Phone / WhatsApp *</label>
            <input type="tel" id="ct-phone" name="phone" placeholder="Enter your phone number" required />
          </div>
          <div>
            <label for="ct-subject">Subject *</label>
            <input type="text" id="ct-subject" name="subject" placeholder="Enter subject" required />
          </div>
          <div class="full">
            <label for="ct-msg">Message *</label>
            <textarea id="ct-msg" name="message" rows="6" placeholder="Tell us more about your request..." required></textarea>
          </div>
          <div class="full">
            <button type="submit" class="btn-send">
              <span class="ms" style="font-size:16px;">send</span> Send Message
            </button>
          </div>
        </form>
        <p class="contact-form-note">
          <span class="ms" style="font-size:12px;">lock</span>
          Your data is safe with us and will only be used for communication purposes.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- RESPONSE BAND -->
<section class="response-band">
  <div class="container">
    <div class="response-band__inner">
      <div class="response-band__left">
        <div class="response-band__icon">
          <span class="ms" style="color:#fff;font-size:32px;">phone</span>
        </div>
        <div class="response-band__title">We Value Your Time.<br>We Respond Quickly.</div>
      </div>
      <div class="response-band__right">
        Our team is available 24/7 to answer your inquiries and provide the best solutions for your crewing needs.
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
