# Garant Marine Group — WordPress Setup Guide

## Stack
- WordPress (latest)
- Hosting: SiteGround / Hostinger (PHP 8.2+, MySQL 8)
- CDN + SSL: Cloudflare (free plan)
- Spam protection: reCAPTCHA v3 (Google)
- Backups: UpdraftPlus → Google Drive
- SEO: Rank Math
- Security: Wordfence

---

## Step 1 — Buy Domain
Buy **GarantMarineGroup.com** on Namecheap or GoDaddy (~$12/year).

---

## Step 2 — Setup Cloudflare
1. Register at cloudflare.com → Add domain
2. Change nameservers at your domain registrar to Cloudflare's nameservers
3. Enable **SSL/TLS → Full (Strict)**
4. Enable **"Always Use HTTPS"**
5. Enable **"Auto Minify"** → HTML, CSS, JS
6. Enable **"Brotli"** compression

---

## Step 3 — Install WordPress on Hosting
1. Create hosting account (SiteGround recommended)
2. Point domain to hosting via Cloudflare DNS A-record
3. Install WordPress via hosting control panel (1-click installer)
4. Set Admin Email to: **info@garantmarinegroup.com**

---

## Step 4 — Install Theme
1. Go to WP Admin → Appearance → Themes → Add New → Upload Theme
2. Upload `garant-theme.zip` (zip the `garant-theme/` folder)
3. Activate theme

---

## Step 5 — Copy Images to Theme
Copy all files from the `pictures/` folder to:
`wp-content/themes/garant-theme/pictures/`

---

## Step 6 — Create Pages (IMPORTANT — exact slugs required)
Go to WP Admin → Pages → Add New. Create these pages with exact slugs:

| Page Title       | Slug            | Template              |
|------------------|-----------------|-----------------------|
| Home             | (front page)    | front-page.php (auto) |
| For Seafarers    | for-seafarers   | auto (page-for-seafarers.php) |
| For Clients      | for-clients     | auto                  |
| About Us         | about-us        | auto                  |
| About Founder    | about-founder   | auto                  |
| Contact          | contact         | auto                  |
| Privacy Policy   | privacy-policy  | auto                  |
| Terms of Use     | terms-of-use    | auto                  |
| GDPR Policy      | gdpr-policy     | auto                  |
| Cookie Policy    | cookie-policy   | auto                  |

Then go to **Settings → Reading** → Set "Homepage" to the Home page.

---

## Step 7 — reCAPTCHA v3 Setup
1. Go to https://www.google.com/recaptcha/admin
2. Register your domain → Select **reCAPTCHA v3**
3. Get **Site Key** and **Secret Key**
4. Add to `wp-config.php` (before `/* That's all */`):
```php
define('RECAPTCHA_SITE_KEY',   'YOUR_SITE_KEY_HERE');
define('RECAPTCHA_SECRET_KEY', 'YOUR_SECRET_KEY_HERE');
```

---

## Step 8 — Install Plugins

### UpdraftPlus (Weekly Backups)
1. Install **UpdraftPlus** from WP plugins
2. Settings → UpdraftPlus → Settings tab
3. Set schedule: **Weekly** for files, **Weekly** for database
4. Remote storage: **Google Drive** → Connect your Google account
5. Save settings → Run backup now (test)

### Rank Math (SEO)
1. Install **Rank Math SEO**
2. Run setup wizard → Connect Google Search Console
3. Sitemap: enable XML sitemap → submit to Google Search Console
4. The theme already adds Open Graph + JSON-LD structured data

### Wordfence (Security)
1. Install **Wordfence Security**
2. Run initial scan
3. Enable firewall (basic mode is fine for start)
4. Enable login security (2FA recommended for admin)

---

## Step 9 — Email (SMTP)
WordPress default mail often goes to spam. Install **WP Mail SMTP**:
1. Install plugin
2. Connect to your email provider (Gmail, Outlook, or hosting SMTP)
3. Test sending from the plugin settings

Admin email for form submissions: `info@garantmarinegroup.com`

---

## Step 10 — Cloudflare Firewall Rules (Spam Protection)
In Cloudflare dashboard → Security → WAF:
- Block requests with suspicious User-Agent strings
- Rate limit form POST requests to 5/minute per IP

---

## Permalinks
Set WP Admin → Settings → Permalinks to **"Post name"** (`/%postname%/`)

---

## After Launch Checklist
- [ ] SSL certificate active (HTTPS green lock)
- [ ] All pages accessible with correct slugs
- [ ] Contact form sends email
- [ ] Seafarers form sends email + CV upload works
- [ ] Google Search Console connected
- [ ] Sitemap submitted to Google
- [ ] UpdraftPlus backup completed
- [ ] Wordfence scan clean
- [ ] reCAPTCHA v3 active on forms
- [ ] Cloudflare active (orange cloud icon)
