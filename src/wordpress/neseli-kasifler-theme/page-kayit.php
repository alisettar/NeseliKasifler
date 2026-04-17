<?php
/**
 * Template Name: Kayıt
 * Template for Registration page
 */

get_header(); ?>

    <!-- Page Header -->
    <section class="page-header registration-header">
        <div class="container">
            <h1 class="page-title">Anaokulu Kayıt Başvurusu</h1>
            <p class="page-subtitle">Çocuğunuz için en doğru tercih</p>
            <?php neseli_kasifler_breadcrumb(); ?>
        </div>
    </section>

    <!-- Neden Neşeli Kaşifler -->
    <?php
    $programlar_page = get_page_by_path('egitim-programlari');
    $hakkimizda_page = get_page_by_path('hakkimizda');
    ?>
    <section class="container">
        <div class="content-section">
            <h2 class="section-title">Neden Neşeli Kaşifler?</h2>
            <div class="section-content" style="max-width: 900px; margin: 0 auto;">
                <p>2020 yılından bu yana Ankara Yenimahalle'de hizmet veren okulumuzda <a href="<?php echo esc_url($programlar_page ? get_permalink($programlar_page) : home_url('/egitim-programlari/')); ?>">Multibem Erken Çocukluk Eğitim Modeli</a> uygulanmaktadır. Orman sınıfı, kodlama, İngilizce-Arapça eğitimi, değerler eğitimi ve sanat atölyeleri ile çocuklarınız çok yönlü gelişir. <a href="<?php echo esc_url($hakkimizda_page ? get_permalink($hakkimizda_page) : home_url('/hakkimizda/')); ?>">Deneyimli öğretmen kadromuz</a>, dil ve konuşma terapisti ile psikolog desteğimiz, çocuğunuzun her alanda desteklenmesini sağlar.</p>
                <p>2026-2027 eğitim yılı kayıtları devam etmektedir. %10 kardeş indirimi uygulanmaktadır.</p>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="container">
        <div class="steps-section">
            <h2 class="section-title">Kayıt Süreci</h2>
            <div class="steps-grid">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Online Başvuru</h3>
                    <p>Aşağıdaki formu doldurun</p>
                </div>
                <div class="step-item">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Belge Teslimi</h3>
                    <p>Gerekli belgeleri getirin</p>
                </div>
                <div class="step-item">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Okul Ziyareti</h3>
                    <p>Okulumuzu gezin ve tanışın</p>
                </div>
                <div class="step-item">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Kayıt Tamamla</h3>
                    <p>Kaydınızı onaylayın</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="container">
        <div class="registration-section">
            <!-- Child Information Form -->
            <div class="form-section">
                <h2 class="section-title">Çocuk Bilgileri</h2>
                <form id="registration-form-child">
                    <div class="form-group">
                        <label for="child-name">Çocuğun Ad Soyad *</label>
                        <input type="text" id="child-name" name="child-name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="birth-date">Doğum Tarihi *</label>
                            <input type="date" id="birth-date" name="birth-date" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Cinsiyet *</label>
                            <select id="gender" name="gender" required>
                                <option value="">Seçiniz</option>
                                <option value="erkek">Erkek</option>
                                <option value="kiz">Kız</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="health-info">Sağlık Durumu / Özel Gereksinimler</label>
                        <textarea id="health-info" name="health-info" placeholder="Alerjiler, kronik hastalıklar, ilaç kullanımı vb."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="emergency-contact">Acil Durum İletişim</label>
                        <input type="tel" id="emergency-contact" name="emergency-contact" placeholder="Acil durum telefon numarası">
                    </div>
                </form>
            </div>

            <!-- Parent Information -->
            <div class="form-section">
                <h2 class="section-title">Veli Bilgileri</h2>
                <form id="registration-form-parent">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="parent-name">Anne/Baba Ad Soyad *</label>
                            <input type="text" id="parent-name" name="parent-name" required>
                        </div>
                        <div class="form-group">
                            <label for="parent-phone">Telefon *</label>
                            <input type="tel" id="parent-phone" name="parent-phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parent-email">E-posta *</label>
                        <input type="email" id="parent-email" name="parent-email" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Adres</label>
                        <textarea id="address" name="address" placeholder="Ev adresiniz"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="work-info">Meslek / İş Yeri</label>
                        <input type="text" id="work-info" name="work-info">
                    </div>

                    <div class="form-group">
                        <label for="start-date">Başlama Tarihi</label>
                        <input type="date" id="start-date" name="start-date">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Age Groups Selection -->
    <section class="container">
        <div class="age-groups-selection">
            <h2 class="section-title">Yaş Grubu Seçimi</h2>
            
            <div class="age-group-item" data-group="minik">
                <input type="radio" name="age-group" value="minik" id="minik">
                <div class="age-icon">👶</div>
                <div class="age-info">
                    <h4>Minik Kaşifler (2-3 Yaş)</h4>
                    <p>Temel beceriler, sosyal uyum ve oyun odaklı etkinlikler</p>
                </div>
            </div>

            <div class="age-group-item" data-group="buyuk">
                <input type="radio" name="age-group" value="buyuk" id="buyuk">
                <div class="age-icon">👦</div>
                <div class="age-info">
                    <h4>Büyük Kaşifler (4-6 Yaş)</h4>
                    <p>Okul öncesi hazırlık, matematik ve okuma yazma temelleri</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Information -->
    <section class="container">
        <div class="info-cards">
            <div class="info-card">
                <i class="fas fa-file-alt"></i>
                <h3>Gerekli Belgeler</h3>
                <p>Nüfus cüzdanı, 4 adet vesikalık fotoğraf ve veli kimlik fotokopileri</p>
            </div>
            <div class="info-card">
                <i class="fas fa-calendar-check"></i>
                <h3>Kayıt Tarihleri</h3>
                <p>Yıl boyunca kayıt kabul edilmektedir. Kontenjan durumu için iletişime geçin</p>
            </div>
            <div class="info-card">
                <i class="fas fa-hand-holding-heart"></i>
                <h3>Uyum Süreci</h3>
                <p>Çocuğunuzun okula alışması için özel uyum programı uyguluyoruz</p>
            </div>
        </div>
    </section>

    <!-- Final Form Section -->
    <section class="container">
        <div class="form-section">
            <div class="form-group">
                <label for="message">Ek Bilgiler / Sorularınız</label>
                <textarea id="message" name="message" placeholder="Çocuğunuz hakkında bilmemizi istediğiniz özel durumlar, sorularınız..."></textarea>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Kişisel verilerin işlenmesi konusunda bilgilendirildim ve onaylıyorum</label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="marketing" name="marketing">
                <label for="marketing">Okul etkinlikleri ve güncellemeleri hakkında bilgilendirilmek istiyorum</label>
            </div>

            <button type="submit" class="submit-btn" id="submit-registration">
                <i class="fas fa-paper-plane"></i> Başvuruyu Gönder
            </button>
        </div>
    </section>

<?php get_footer(); ?>
