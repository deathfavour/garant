<?php
$tpl = get_template_directory_uri();
add_action( 'wp_head', function() use ( $tpl ) {
    echo '<style>
.hero--seafarers .hero__bg { background-image:url("' . esc_url( $tpl ) . '/pictures/forseafarers1.png"); }
.hero--seafarers .hero__content { padding:160px 0 80px 80px; max-width:680px; }
.seafarers-dark { background:#112240; color:#fff; }
.seafarers-main { display:grid; grid-template-columns:1fr 540px; gap:56px; align-items:start; padding:80px 0; }
.seafarers-dark .section-label { font-size:0.72rem; font-weight:700; letter-spacing:0.18em; text-transform:uppercase; color:rgba(255,255,255,0.5); margin-bottom:8px; }
.seafarers-dark h2 { color:#fff; }
.seafarers-dark .accent-line { background:#fff; }
.services-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:28px 32px; margin-top:40px; }
.service-card { display:flex; gap:16px; align-items:flex-start; }
.service-card__icon { width:44px; height:44px; flex-shrink:0; background:rgba(37,99,235,0.25); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.service-card__title { font-size:0.95rem; font-weight:700; margin-bottom:6px; color:#fff; }
.service-card__text  { font-size:0.8rem; color:rgba(255,255,255,0.6); line-height:1.6; }
.value-banner { margin-top:48px; color:#fff; }
.value-banner p { font-size:1.05rem; font-weight:700; line-height:1.6; }
.value-banner span { color:var(--blue2); }
.seafarers-dark .form-panel { background:#fff; border-radius:12px; padding:28px 32px; }
.seafarers-dark .form-panel__title { color:var(--navy); font-size:1.3rem; font-weight:800; text-transform:uppercase; letter-spacing:0.04em; }
.seafarers-dark .form-panel__sub   { color:var(--muted); font-size:0.85rem; margin-top:6px; margin-bottom:24px; }
.seafarers-dark .form-group label  { color:var(--navy); }
.seafarers-dark .form-group input, .seafarers-dark .form-group textarea, .seafarers-dark .form-group select { background:#f8faff; border-color:#dbeafe; color:var(--navy); }
.seafarers-dark .form-group input::placeholder, .seafarers-dark .form-group textarea::placeholder { color:#94a3b8; }
.seafarers-dark .form-note { color:var(--muted); }
.cv-upload span { color:var(--navy); }
@media(max-width:900px) {
  .hero--seafarers .hero__content { padding:120px 24px 60px 24px; }
  .seafarers-main { grid-template-columns:1fr; }
  .services-grid  { grid-template-columns:1fr; }
}
</style>';
}, 20 );
get_header();
?>

<!-- HERO -->
<section class="hero hero--seafarers">
  <div class="hero__bg"></div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <p class="hero__label">For Seafarers</p>
    <h1 class="hero__title">Your Career.<br>Our Commitment.</h1>
    <p class="hero__sub">We connect skilled seafarers with reputable shipowners and provide full support throughout your journey.</p>
    <div class="hero__btns">
      <a href="#apply" class="btn btn--primary"><span class="ms">assignment</span> Apply Now</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline"><span class="ms">chat</span> Consulting</a>
    </div>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="seafarers-dark">
  <div class="container">
    <div class="seafarers-main">

      <!-- LEFT: Services -->
      <div>
        <p class="section-label">Our Services for Seafarers</p>
        <h2>OUR SERVICES FOR SEAFARERS</h2>
        <div class="accent-line"></div>
        <div class="services-grid">
          <div class="service-card">
            <div class="service-card__icon"><span class="ms">work</span></div>
            <div>
              <div class="service-card__title">Employment Assistance</div>
              <div class="service-card__text">We connect you with reputable shipowners and help secure the right position matching your rank and experience.</div>
            </div>
          </div>
          <div class="service-card">
            <div class="service-card__icon"><span class="ms">trending_up</span></div>
            <div>
              <div class="service-card__title">Career Development</div>
              <div class="service-card__text">Guidance on advancing your maritime career — from training requirements to promotion pathways.</div>
            </div>
          </div>
          <div class="service-card">
            <div class="service-card__icon"><span class="ms">description</span></div>
            <div>
              <div class="service-card__title">CV Registration</div>
              <div class="service-card__text">Register your profile in our database to be considered for current and future vessel openings.</div>
            </div>
          </div>
          <div class="service-card">
            <div class="service-card__icon"><span class="ms">notifications</span></div>
            <div>
              <div class="service-card__title">Vacancy Updates &amp; Consulting</div>
              <div class="service-card__text">Stay informed about new openings and get personal consulting support throughout your application process.</div>
            </div>
          </div>
        </div>
        <div class="value-banner">
          <p>We value your ambition. We support your journey.<br><span>Let's build your future at sea.</span></p>
        </div>
      </div>

      <!-- RIGHT: Form -->
      <div id="apply" class="form-panel">
        <div class="form-panel__title">Apply for Position</div>
        <p class="form-panel__sub">Fill in the form below and our team will get in touch with you.</p>
        <?php garant_form_messages(); ?>
        <form class="form-grid" method="post"
              action="<?php echo esc_url( get_permalink() ); ?>"
              enctype="multipart/form-data" data-garant-form>
          <?php garant_nonce( 'seafarers' ); ?>
          <div class="form-group full">
            <label for="sf-name">Full Name *</label>
            <input type="text" id="sf-name" name="name" placeholder="Enter your full name" required />
          </div>
          <div class="form-group">
            <label for="sf-phone">Phone Number *</label>
            <input type="tel" id="sf-phone" name="phone" placeholder="Enter your phone number" required />
          </div>
          <div class="form-group">
            <label for="sf-rank">Rank / Position *</label>
            <input type="text" id="sf-rank" name="rank" placeholder="Enter your rank or position" required />
          </div>
          <div class="form-group">
            <label for="sf-email">Email Address *</label>
            <input type="email" id="sf-email" name="email" placeholder="Enter your email address" required />
          </div>
          <div class="form-group">
            <label for="sf-dob">Date of Birth</label>
            <input type="date" id="sf-dob" name="dob" />
          </div>
          <div class="form-group">
            <label for="sf-nationality">Nationality</label>
            <input type="text" id="sf-nationality" name="nationality" placeholder="Enter your nationality" />
          </div>
          <div class="form-group full">
            <label for="sf-info">Additional Information</label>
            <textarea id="sf-info" name="info" rows="3" placeholder="Tell us more about your experience, certificates, etc."></textarea>
          </div>
          <div class="form-group full">
            <label>Upload CV</label>
            <label for="sf-cv" class="cv-upload">
              <span class="ms">upload</span>
              <span id="sf-cv-label">Click to upload your CV</span>
              <small>.doc, .docx, .pdf — max 10 MB</small>
              <input type="file" id="sf-cv" name="cv" accept=".doc,.docx,.pdf" style="display:none" />
            </label>
          </div>
          <div class="form-group full">
            <button type="submit" class="btn--blue-solid">
              <span class="ms">send</span> Submit Application
            </button>
          </div>
        </form>
        <p class="form-note"><span class="ms">lock</span> Your data is safe with us and will only be used for recruitment purposes.</p>
      </div>

    </div>
  </div>
</section>

<script>
var cvInput = document.getElementById('sf-cv');
var cvLabel = document.getElementById('sf-cv-label');
var cvBox   = cvInput && cvInput.closest('.cv-upload');
if (cvInput) cvInput.addEventListener('change', function() {
  if (cvInput.files.length) { cvLabel.textContent = cvInput.files[0].name; cvBox.classList.add('has-file'); }
});
</script>

<?php get_footer(); ?>
