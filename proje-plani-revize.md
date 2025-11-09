# Neşeli Kaşifler - WordPress Anaokulu Teması
## 📋 REVIZE EDİLMİŞ PROJE PLANI v2

**Proje Adı:** Neşeli Kaşifler - WordPress Anaokulu Teması  
**Revizyon Tarihi:** 9 Kasım 2025  
**Mevcut Durum:** Faz 2 - CSS/Script Sorunları Tespiti

---

## 🎯 STRATEJİ DEĞİŞİKLİĞİ

**HTML Klasörü:** Sadece referans amaçlı - **DOKUNULMAYACAK**  
**WordPress Klasörü:** Tüm geliştirmeler burada yapılacak

HTML mockup'ı zaten tamamlandı ve WordPress template oluşturma referansı olarak kullanıldı. 
Artık sadece WordPress teması üzerinde çalışacağız.

---

## 🚨 TESPİT EDİLEN SORUNLAR

### **CSS Sorunları:**
- ❌ WordPress'te iki ayrı CSS dosyası (style.css ve complete-style.css)
- ❌ functions.php'de yanlış dosya enqueue ediliyor (style.css - eksik)
- ❌ complete-style.css tam ama kullanılmıyor
- ❌ HTML referans tasarımı ile WordPress görünümü uyuşmuyor

### **Script Durumu:**
- ✅ script.js tam ve doğru
- ✅ Tüm sayfa fonksiyoneliteleri mevcut

---

## 🔧 YENİ PROJE ADIMLARI

### **ADIM 1: CSS Birleştirme ve Düzenleme** 🔥
**Süre:** 1-2 saat

**1.1 - HTML'den CSS Çıkarma (Referans)**
- [ ] `src/html/index.html` içindeki `<style>` bloğunu analiz et
- [ ] Tüm CSS kurallarını not al (yaklaşık 1000+ satır)
- [ ] WordPress uyumsuz kısımları tespit et

**1.2 - Master CSS Oluşturma**
- [ ] `assets/css/main-style.css` oluştur
- [ ] HTML'deki CSS'i düzenli sırayla aktar:
  - Base resets
  - CSS variables
  - Typography
  - Header & Navigation
  - Hero & Sections
  - Components (buttons, cards, modals)
  - Footer
  - Animations
  - Responsive Media Queries
  - WordPress Overrides
- [ ] Eski dosyaları sil: `style.css` ve `complete-style.css`

**1.3 - functions.php Güncelleme**
- [ ] CSS enqueue'u güncelle (`main-style.css`)
- [ ] Sıralama kontrolü (Font Awesome → Google Fonts → Main CSS)

---

### **ADIM 2: Test ve Doğrulama** 📱
**Süre:** 30-45 dakika

**2.1 - Görsel Test**
- [ ] Ana sayfa (front-page.php)
- [ ] Header (logo, menü, mobil menü)
- [ ] Hero section (slider, animasyonlar)
- [ ] Action buttons
- [ ] Footer
- [ ] Tüm alt sayfalar

**2.2 - Responsive Test**
- [ ] Desktop (1920px, 1366px, 1024px)
- [ ] Tablet (768px, 834px)
- [ ] Mobile (375px, 414px)

**2.3 - Teknik Test**
- [ ] Browser Console (hata kontrolü)
- [ ] CSS yüklenme sırası
- [ ] Font yüklenmesi
- [ ] İkon görünümü

---

### **ADIM 3: Sayfa Detay Kontrolü** 📄
**Süre:** 1-2 saat

- [ ] Hakkımızda (page-hakkimizda.php)
- [ ] Programlar (page-programlar.php)
- [ ] Galeri (page-galeri.php)
- [ ] İletişim (page-iletisim.php)
- [ ] Kayıt (page-kayit.php)
- [ ] İş Başvurusu (page-is-basvurusu.php)
- [ ] Ev Okulu Ankara (page-ev-okulu-ankara.php)

Her sayfada:
- Görünüm kontrolü
- Animasyonlar
- Formlar
- Modal'lar
- Responsive

---

### **ADIM 4: JavaScript Kontrol** ⚙️
**Süre:** 30 dakika

- [ ] Slider çalışıyor mu?
- [ ] Modal'lar açılıyor mu?
- [ ] Form validasyonları çalışıyor mu?
- [ ] Gallery lightbox çalışıyor mu?
- [ ] Mobil menü çalışıyor mu?
- [ ] Console'da JS hatası var mı?

---

### **ADIM 5: WordPress Özelleştirme** 🎨
**Süre:** 2-3 saat

**5.1 - Customizer Ayarları**
- [ ] Logo yükleme seçeneği
- [ ] Site başlığı ve tagline
- [ ] Hero section başlık/alt başlık
- [ ] Renk paleti özelleştirme
- [ ] Footer metni düzenleme

**5.2 - Widget Alanları**
- [ ] Footer widget alanları
- [ ] Sidebar (gerekirse)

**5.3 - Menü Sistemi**
- [ ] Primary menü konumu
- [ ] Menü öğelerini test et
- [ ] Active state kontrolü

---

### **FAZ 3: İçerik Yönetimi** 📋 [İLERİDE]
**Süre:** 2-3 gün

- [ ] ACF/Custom Fields entegrasyonu
- [ ] Blog/haber sistemi
- [ ] İletişim formu (Contact Form 7)
- [ ] Galeri yönetimi
- [ ] SEO optimizasyonu
- [ ] Performans optimizasyonu
- [ ] Güvenlik kontrolü

---

## 📊 DURUM TAKİBİ

### **Tamamlanan:**
✅ HTML mockup (referans)  
✅ WordPress tema yapısı  
✅ Template dosyaları  
✅ script.js  

### **Şu An:**
🔄 ADIM 1: CSS Birleştirme

### **Sonra:**
⏳ ADIM 2: Test  
⏳ ADIM 3: Sayfa kontrolü  
⏳ ADIM 4: JS kontrol  
⏳ ADIM 5: WP özelleştirme  
⏳ FAZ 3: İçerik yönetimi  

---

## 🎯 BAŞARI KRİTERLERİ

### **ADIM 1-4 Tamamlanma:**
- WordPress sitesi HTML referansı ile aynı görünüyor
- Tüm sayfalar doğru yükleniyor
- Responsive tasarım çalışıyor
- Console'da hata yok

### **Proje Tamamlanma (FAZ 3):**
- Admin panel'den içerik düzenlenebiliyor
- SEO optimize
- Hızlı yükleniyor (PageSpeed > 80)
- Cross-browser uyumlu

---

## 📁 DOSYA YAPISI

```
neseli-kasifler-theme/
├── assets/
│   ├── css/
│   │   └── main-style.css     ← YENİ (birleştirilmiş CSS)
│   ├── js/
│   │   └── script.js          ✅ Hazır
│   └── img/
│       └── logo.png
├── *.php (template dosyaları) ✅ Hazır
├── functions.php              ← Güncellenecek
├── style.css                  ← WordPress gereksinimi (info only)
└── screenshot.png
```

---

## 📝 NOTLAR

**9 Kasım 2025 - v2:**
- Plan güncellendi
- HTML düzenleme kaldırıldı (sadece referans)
- WordPress'e odaklanıldı
- Adımlar netleştirildi
- Her adımda onay alınacak

---

*Adım adım ilerleme planı - Her adımda onay gerekli*
