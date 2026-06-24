<?php
$tpl = get_template_directory_uri();
add_action( 'wp_head', function() use ( $tpl ) {
    echo '<style>
.hero--about .hero__bg { background-image:url("' . esc_url( $tpl ) . '/pictures/aboutus1.png"); }
.hero--about .hero__content { padding:160px 0 80px 80px; max-width:680px; }
.our-story { padding:88px 0; }
.our-story__header { text-align:center; margin-bottom:72px; }
.our-story__header h2 { margin-bottom:12px; }
.our-story__header p { color:var(--muted); max-width:480px; margin:0 auto; }
.story-row { display:grid; grid-template-columns:1fr 40px 1fr; gap:32px; align-items:center; }
.story-row__dot { width:16px; height:16px; background:var(--blue2); border-radius:50%; margin:0 auto; position:relative; z-index:2; }
.story-row__line { width:2px; height:64px; background:#dbeafe; margin:0 auto; }
.story-img { border-radius:8px; overflow:hidden; aspect-ratio:4/3; }
.story-img img { width:100%; height:100%; object-fit:cover; }
.story-text__icon { width:52px; height:52px; background:var(--blue2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:16px; }
.story-text__title { font-size:1.2rem; font-weight:700; margin-bottom:12px; }
.story-text__body { font-size:0.87rem; color:var(--muted); line-height:1.75; }
.story-text__body p + p { margin-top:10px; }
@media(max-width:900px) {
  .hero--about .hero__content { padding:120px 24px 60px 24px; }
  .story-row { grid-template-columns:1fr; }
  .story-row__dot, .story-row__line { display:none; }
}
</style>';
}, 20 );
get_header();
?>

<!-- HERO -->
<section class="hero hero--about">
  <div class="hero__bg"></div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <p class="hero__label">About Us</p>
    <h1 class="hero__title">Building More<br>Than Crewing</h1>
    <p class="hero__sub">We build long-term partnerships and reliable maritime solutions that create value for seafarers, shipowners and the entire maritime industry.</p>
    <div class="hero__line"></div>
  </div>
</section>

<!-- OUR STORY -->
<section class="our-story">
  <div class="container">
    <div class="our-story__header">
      <h2>Our Story</h2>
      <div class="accent-line accent-line--center"></div>
      <p style="margin-top:16px;">A journey built on experience, trust and the belief that every great maritime venture starts with people.</p>
    </div>

    <div class="story-row" style="margin-bottom:32px;">
      <div class="story-img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/aboutus2.png" alt="How it started" /></div>
      <div><div class="story-row__dot"></div></div>
      <div class="story-text">
        <div class="story-text__icon"><span class="ms">layers</span></div>
        <div class="story-text__title">How It Started</div>
        <div class="story-text__body">
          <p>Garant Marine Group started with a simple idea — to create a transparent connection between qualified seafarers and reliable shipowners.</p>
          <p>We began with people, documentation and professional support because every vessel depends on the crew behind it.</p>
          <p>Every assignment, every contract and every partnership became another step forward.</p>
        </div>
      </div>
    </div>

    <div class="story-row__line" style="margin:0 auto 32px;"></div>

    <div class="story-row" style="margin-bottom:32px;">
      <div class="story-text">
        <div class="story-text__icon"><span class="ms">group</span></div>
        <div class="story-text__title">Our Responsibility</div>
        <div class="story-text__body">
          <p>Our responsibility goes beyond paperwork and consulting.</p>
          <p>We help build reliable operational connections between seafarers, managers and vessel owners.</p>
          <p>Our goal is to contribute to a sustainable maritime ecosystem where professionalism, trust and long-term cooperation create value for everyone involved.</p>
        </div>
      </div>
      <div><div class="story-row__dot"></div></div>
      <div class="story-img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/aboutus3.png" alt="Our responsibility" /></div>
    </div>

    <div class="story-row__line" style="margin:0 auto 32px;"></div>

    <div class="story-row">
      <div class="story-img"><img src="<?php echo esc_url( $tpl ); ?>/pictures/aboutus4.png" alt="Looking forward" /></div>
      <div><div class="story-row__dot"></div></div>
      <div class="story-text">
        <div class="story-text__icon"><span class="ms">schedule</span></div>
        <div class="story-text__title">Looking Forward</div>
        <div class="story-text__body">
          <p>Everything starts small. Today's effort becomes tomorrow's partnership.</p>
          <p>Our long-term vision is to grow alongside our clients and partners, supporting not only crewing operations but contributing to wider maritime projects and vessel management opportunities in the future.</p>
          <p>We believe growth should be earned through performance, not promises.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- QUOTE BAND -->
<section class="quote-band">
  <div class="container">
    <div class="quote-band__inner">
      <div class="quote-band__left">
        <div class="quote-band__icon">"</div>
        <div class="quote-band__text">We Move Out of the Spotlight,<br>Yet Behind Every Success Story.</div>
      </div>
      <div class="quote-band__right">Our approach is simple: move beyond the shadow, while being the strength behind every operation. Quietly supporting. Consistently delivering.</div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
