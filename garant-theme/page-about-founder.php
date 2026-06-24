<?php
$tpl = get_template_directory_uri();
add_action( 'wp_head', function() use ( $tpl ) {
    echo '<style>
.hero--founder .hero__bg { background-image:url("' . esc_url( $tpl ) . '/pictures/aboutfounder1.png"); }
.hero--founder .hero__content { padding:160px 0 80px 80px; max-width:680px; }
.journey-section { padding:88px 0; }
.journey-grid { display:grid; grid-template-columns:1fr 420px; gap:64px; align-items:start; }
.journey-heading { font-size:1.6rem; font-weight:800; margin-bottom:8px; }
.journey-list { margin-top:32px; }
.journey-item { display:flex; gap:16px; padding:18px 0; border-bottom:1px solid #e2e8f0; }
.journey-item:first-child { padding-top:0; }
.journey-item:last-child  { border-bottom:none; }
.journey-item__icon { width:38px; height:38px; flex-shrink:0; background:var(--blue2); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.journey-item__text { font-size:0.87rem; color:var(--muted); padding-top:8px; line-height:1.6; }
.founder-photo { border-radius:8px; overflow:hidden; aspect-ratio:3/4; background:linear-gradient(135deg,#0b1c35,#1a4bdb33); margin-bottom:20px; }
.founder-photo img { width:100%; height:100%; object-fit:cover; object-position:top; }
.built-on-trust { background:var(--navy); border-radius:8px; padding:28px 24px; color:#fff; display:flex; gap:14px; align-items:flex-start; }
.built-on-trust__q { font-size:2rem; font-weight:900; color:var(--blue2); line-height:1; flex-shrink:0; }
.built-on-trust__text { font-size:1.1rem; font-weight:700; line-height:1.4; }
.vessels-section { padding:72px 0; background:#112240; }
.vessels-section h2 { color:#fff; text-align:center; margin-bottom:12px; }
.vessels-section .accent-line { margin:0 auto 48px; }
.vessel-grid { display:grid; grid-template-columns:repeat(6,1fr); gap:16px; }
.vessel-card { text-align:center; }
.vessel-card__img { aspect-ratio:4/3; border-radius:6px; overflow:hidden; background:rgba(255,255,255,0.06); margin-bottom:12px; }
.vessel-card__img img { width:100%; height:100%; object-fit:cover; }
.vessel-card__icon { width:32px; height:32px; margin:0 auto 6px; background:rgba(37,99,235,0.25); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.vessel-card__label { font-size:0.72rem; font-weight:600; color:rgba(255,255,255,0.85); }
@media(max-width:900px) {
  .hero--founder .hero__content { padding:120px 24px 60px 24px; }
  .journey-grid { grid-template-columns:1fr; }
  .vessel-grid  { grid-template-columns:repeat(2,1fr); }
}
@media(max-width:1024px) { .vessel-grid { grid-template-columns:repeat(3,1fr); } }
</style>';
}, 20 );
get_header();
?>

<!-- HERO -->
<section class="hero hero--founder">
  <div class="hero__bg"></div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <p class="hero__label">About Founder</p>
    <h1 class="hero__title">Driven by Experience.<br>Guided by Purpose.</h1>
    <p class="hero__sub">A personal journey at sea shaped the foundation of our company and continues to guide our mission every day.</p>
    <div class="hero__line"></div>
  </div>
</section>

<!-- JOURNEY -->
<section class="journey-section">
  <div class="container">
    <div class="journey-grid">

      <!-- LEFT -->
      <div>
        <h2 class="journey-heading">My Journey. My Mission.</h2>
        <div class="accent-line"></div>
        <div class="journey-list">
          <div class="journey-item">
            <div class="journey-item__icon"><span class="ms">anchor</span></div>
            <div class="journey-item__text">Founder of company with team background to work on such type vessel: Offshore Dredger, General Cargo, Heavy Lift vessel, Container ship, Vehicle carrier, and tanker segment (LPG/LNG).</div>
          </div>
          <div class="journey-item">
            <div class="journey-item__icon"><span class="ms">water</span></div>
            <div class="journey-item__text">My seaway is unpredictable way of choice, which under words of happiness.</div>
          </div>
          <div class="journey-item">
            <div class="journey-item__icon"><span class="ms">trending_up</span></div>
            <div class="journey-item__text">My real case was from Engine cadet till seniority rank with all step stones and changes.</div>
          </div>
          <div class="journey-item">
            <div class="journey-item__icon"><span class="ms">group</span></div>
            <div class="journey-item__text">My approach is to support everyone who call me and insure change of risk for every one who ready for them.</div>
          </div>
          <div class="journey-item">
            <div class="journey-item__icon"><span class="ms">explore</span></div>
            <div class="journey-item__text">Ability is nothing without opportunity. My opportunity to tell you about my life mission which out routine and high expectation while your ability to make a choice.</div>
          </div>
          <div class="journey-item">
            <div class="journey-item__icon"><span class="ms">star</span></div>
            <div class="journey-item__text">Life it is a result of our choice in it...</div>
          </div>
        </div>
      </div>

      <!-- RIGHT -->
      <div>
        <div class="founder-photo">
          <img src="<?php echo esc_url( $tpl ); ?>/pictures/aboutfounder2.png" alt="Founder" />
        </div>
        <div class="built-on-trust">
          <div class="built-on-trust__q">"</div>
          <div class="built-on-trust__text">Built on trust. Driven by experience. Committed to your success at sea.</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- VESSELS -->
<section class="vessels-section">
  <div class="container">
    <h2>Vessel Experience</h2>
    <div class="accent-line"></div>
    <div class="vessel-grid">
      <div class="vessel-card">
        <div class="vessel-card__img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/vessel1.png" alt="Vessel 1" /></div>
        <div class="vessel-card__icon"><span class="ms">anchor</span></div>
        <div class="vessel-card__label">Offshore Dredger</div>
      </div>
      <div class="vessel-card">
        <div class="vessel-card__img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/vessel2.png" alt="Vessel 2" /></div>
        <div class="vessel-card__icon"><span class="ms">inventory_2</span></div>
        <div class="vessel-card__label">General Cargo</div>
      </div>
      <div class="vessel-card">
        <div class="vessel-card__img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/vessel3.png" alt="Vessel 3" /></div>
        <div class="vessel-card__icon"><span class="ms">construction</span></div>
        <div class="vessel-card__label">Heavy Lift</div>
      </div>
      <div class="vessel-card">
        <div class="vessel-card__img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/vessel4.png" alt="Vessel 4" /></div>
        <div class="vessel-card__icon"><span class="ms">deployed_code</span></div>
        <div class="vessel-card__label">Container Ship</div>
      </div>
      <div class="vessel-card">
        <div class="vessel-card__img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/vessel5.png" alt="Vessel 5" /></div>
        <div class="vessel-card__icon"><span class="ms">directions_car</span></div>
        <div class="vessel-card__label">Vehicle Carrier</div>
      </div>
      <div class="vessel-card">
        <div class="vessel-card__img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/vessel6.png" alt="Vessel 6" /></div>
        <div class="vessel-card__icon"><span class="ms">local_fire_department</span></div>
        <div class="vessel-card__label">LPG / LNG Tanker</div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
