<?php
$tpl = get_template_directory_uri();
add_action( 'wp_head', function() use ( $tpl ) {
    echo '<style>
.hero--clients .hero__bg { background-image:url("' . esc_url( $tpl ) . '/pictures/forclients1.png"); }
.hero--clients .hero__content { padding:160px 0 80px 80px; max-width:680px; }
.clients-main { display:grid; grid-template-columns:1fr 440px; gap:56px; align-items:start; padding:80px 0; }
.expect-heading { font-size:1.8rem; font-weight:700; margin-bottom:8px; }
.expect-cards { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; margin:40px 0 48px; }
.expect-card { text-align:center; }
.expect-card__icon { width:52px; height:52px; background:rgba(37,99,235,0.1); border-radius:50%; margin:0 auto 12px; display:flex; align-items:center; justify-content:center; }
.expect-card__title { font-size:0.85rem; font-weight:700; margin-bottom:6px; }
.expect-card__text  { font-size:0.75rem; color:var(--muted); line-height:1.5; }
.vessels-banner { background:#f8faff; border:1px solid #dbeafe; border-radius:10px; padding:28px; display:flex; gap:20px; align-items:flex-start; }
.vessels-banner__icon { width:52px; height:52px; flex-shrink:0; background:rgba(37,99,235,0.08); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.vessels-banner__title { font-size:1rem; font-weight:700; margin-bottom:6px; }
.vessels-banner__text  { font-size:0.83rem; color:var(--muted); }
@media(max-width:900px) {
  .hero--clients .hero__content { padding:120px 24px 60px 24px; }
  .clients-main { grid-template-columns:1fr; }
  .expect-cards { grid-template-columns:repeat(2,1fr); }
}
</style>';
}, 20 );
get_header();
?>

<!-- HERO -->
<section class="hero hero--clients">
  <div class="hero__bg"></div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <p class="hero__label">For Clients</p>
    <h1 class="hero__title">Your Fleet.<br>Our Commitment.</h1>
    <p class="hero__sub">Reliable crewing solutions tailored to your operations, wherever you sail.</p>
    <div class="hero__line"></div>
  </div>
</section>

<!-- MAIN -->
<section>
  <div class="container">
    <div class="clients-main">

      <!-- LEFT -->
      <div>
        <h2 class="expect-heading">What Do You Expect from Us?</h2>
        <div class="accent-line"></div>
        <div class="expect-cards">
          <div class="expect-card"><div class="expect-card__icon"><span class="ms">group</span></div><div class="expect-card__title">Crew Recruitment</div><div class="expect-card__text">Sourcing qualified seafarers matched to your vessel type and operational requirements.</div></div>
          <div class="expect-card"><div class="expect-card__icon"><span class="ms">list_alt</span></div><div class="expect-card__title">Full Crew Management</div><div class="expect-card__text">End-to-end management of your crew rotation, contracts and compliance documentation.</div></div>
          <div class="expect-card"><div class="expect-card__icon"><span class="ms">how_to_reg</span></div><div class="expect-card__title">Officers Recruitment</div><div class="expect-card__text">Experienced deck and engine officers vetted for international standards and vessel suitability.</div></div>
          <div class="expect-card"><div class="expect-card__icon"><span class="ms">person</span></div><div class="expect-card__title">Ratings Recruitment</div><div class="expect-card__text">Competent ratings selected across all vessel segments to complete your crew complement.</div></div>
          <div class="expect-card"><div class="expect-card__icon"><span class="ms">directions_boat</span></div><div class="expect-card__title">Tanker Crew Supply</div><div class="expect-card__text">Specialists in LNG, LPG, Oil and Chemical tanker crew supply for demanding tanker operations.</div></div>
          <div class="expect-card"><div class="expect-card__icon"><span class="ms">description</span></div><div class="expect-card__title">Documentation Support</div><div class="expect-card__text">Full assistance with crew documents, certificates, flag state requirements and pre-joining paperwork.</div></div>
        </div>
        <div class="vessels-banner">
          <div class="vessels-banner__icon"><span class="ms">anchor</span></div>
          <div>
            <div class="vessels-banner__title">We work with all types of vessels, not only tankers.</div>
            <div class="vessels-banner__text">From bulk carriers, container ships, offshore vessels to specialized fleets — we are ready to support your crewing needs.</div>
          </div>
        </div>
      </div>

      <!-- RIGHT: Form -->
      <div class="form-panel">
        <div class="form-panel__title">Let's Work Together</div>
        <p class="form-panel__sub">Tell us about your requirements and our team will get in touch with you.</p>
        <?php garant_form_messages(); ?>
        <form class="form-grid" method="post" action="<?php echo esc_url( get_permalink() ); ?>" data-garant-form>
          <?php garant_nonce( 'clients' ); ?>
          <div class="form-group">
            <label for="cl-company">Company Name *</label>
            <input type="text" id="cl-company" name="company" placeholder="Enter company name" required />
          </div>
          <div class="form-group">
            <label for="cl-contact">Contact Person *</label>
            <input type="text" id="cl-contact" name="contact" placeholder="Enter your name" required />
          </div>
          <div class="form-group">
            <label for="cl-email">Email Address *</label>
            <input type="email" id="cl-email" name="email" placeholder="Enter your email" required />
          </div>
          <div class="form-group">
            <label for="cl-phone">Phone Number *</label>
            <input type="tel" id="cl-phone" name="phone" placeholder="Enter your phone number" required />
          </div>
          <div class="form-group">
            <label for="cl-vessel">Vessel Type / Fleet</label>
            <input type="text" id="cl-vessel" name="vessel" placeholder="e.g. Tankers, Bulk Carriers, Offshore" />
          </div>
          <div class="form-group">
            <label for="cl-country">Country *</label>
            <select id="cl-country" name="country" required>
              <option value="" disabled selected>Select your country</option>
              <option>Bulgaria</option><option>Greece</option><option>Cyprus</option>
              <option>Norway</option><option>Singapore</option><option>Other</option>
            </select>
          </div>
          <div class="form-group full">
            <label for="cl-msg">Message / Requirements</label>
            <textarea id="cl-msg" name="message" rows="4" placeholder="Tell us more about your fleet and crewing needs..."></textarea>
          </div>
          <div class="form-group full">
            <button type="submit" class="btn--blue-solid"><span class="ms">send</span> Send Request</button>
          </div>
        </form>
        <p class="form-note"><span class="ms">lock</span> Your data is safe with us and will only be used for business purposes.</p>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
