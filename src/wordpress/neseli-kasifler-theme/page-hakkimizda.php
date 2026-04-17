<?php
/**
 * Template Name: Hakkımızda Page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Neşeli Kaşifler Anaokulu Hakkında</h1>
        <p class="page-subtitle">Çocuklarınızın keşif yolculuğundaki rehberi</p>
        <?php neseli_kasifler_breadcrumb(); ?>
    </div>
</section>

<!-- About Content -->
<section class="container">
    <div class="content-section">
        <h2 class="section-title">Okulumuz Hakkında</h2>
        <div class="section-content">
            <p>Neşeli Kaşifler Anaokulu olarak 2020 yılında kurulduğumuzdan bu yana, çocuklarımızın keşfetme, öğrenme ve
                büyüme yolculuğunda yanlarında olmanın gururunu yaşıyoruz. Ankara Yenimahalle'de hizmet veren okulumuz,
                her çocuğun eşsiz potansiyelini ortaya çıkarmayı hedefleyen bir eğitim anlayışı benimser.</p>

            <p>Modern eğitim yöntemleriyle geleneksel değerleri harmanlayan yaklaşımımızda, çocuklarımız oyun temelli
                öğrenme ortamlarında hem eğlenir hem öğrenir. Deneyimli öğretmen kadromuz ve güvenli fiziki ortamımızla,
                ailelerin gönül rahatlığıyla tercih edebileceği bir eğitim kurumu olmayı sürdürüyoruz.</p>

            <p>Eğitim programlarımızda <a href="<?php echo esc_url(get_page_by_path('egitim-programlari') ? get_permalink(get_page_by_path('egitim-programlari')) : home_url('/egitim-programlari/')); ?>">Multibem Erken Çocukluk Eğitim Modeli</a>'ni uygulayarak çocuklarımızın keşif, merak ve araştırma duygusunu ön plana çıkarıyoruz. Orman sınıfı keşifleri, bilim deneyleri, kodlama atölyeleri, İngilizce ve Arapça dil programları, değerler eğitimi ile çocuklarımız hem akademik hem kişisel olarak gelişir. Okulumuzda ayrıca dil ve konuşma terapisti ile psikolog desteği sunulmaktadır.</p>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="mission-vision">
        <div class="mv-card">
            <h3><i class="fas fa-bullseye"></i> MİSYONUMUZ</h3>
            <p>Her çocuğun doğasındaki merak duygusunu destekleyerek, onları keşfetmeye, soru sormaya ve yaratıcı
                çözümler üretmeye teşvik eden, sevgi dolu bir öğrenme ortamı sunmak.</p>
        </div>
        <div class="mv-card">
            <h3><i class="fas fa-eye"></i> VİZYONUMUZ</h3>
            <p>Geleceğin özgüvenli, yaratıcı ve mutlu bireylerini yetiştiren, Türkiye'nin örnek anaokulu olmak ve
                uluslararası standartlarda eğitim hizmeti vermek.</p>
        </div>
    </div>

    <!-- Our Values -->
    <div class="content-section">
        <h2 class="section-title">Değerlerimiz</h2>
        <div class="section-content">
            <p><strong>Keşfetme:</strong> Çocuklarımızın doğal merakını destekler, her soruya değer veririz.</p>
            <p><strong>Sevgi:</strong> Her çocuğa eşit sevgi ve saygı gösterir, güvenli bir ortam yaratırız.</p>
            <p><strong>Yaratıcılık:</strong> Her çocuğun benzersiz yeteneklerini keşfetmesine yardımcı oluruz.</p>
            <p><strong>İşbirliği:</strong> Paylaşmayı, birlikte çalışmayı ve empatiyi öğretiriz.</p>
            <p><strong>Güvenlik:</strong> Fiziki ve duygusal güvenliği her zaman önceliğimizdir.</p>
        </div>
    </div>

    <!-- Team -->
    <div class="content-section" id="egitmen-kadromuz">
        <h2 class="section-title">Eğitmen Kadromuz</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="team-avatar">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="team-name">Merve Orak</div>
                <div class="team-role">Kurucu Müdür & Değerler Eğitimi Öğretmeni</div>
                <p>Değerler eğitimi ve okul öncesi pedagoji alanında uzman</p>
            </div>
            <div class="team-member">
                <div class="team-avatar">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="team-name">Esma Ayşe Kalender</div>
                <div class="team-role">Sınıf Öğretmeni</div>
                <p>Çocuk gelişimi ve öğretim yöntemleri konusunda uzman</p>
            </div>
            <div class="team-member">
                <div class="team-avatar">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="team-name">Rabia Nur Aydoğan</div>
                <div class="team-role">Sınıf Öğretmeni</div>
                <p>Yaratıcı öğrenme ve oyun temelli eğitim uzmanı</p>
            </div>
            <div class="team-member">
                <div class="team-avatar">
                    <i class="fas fa-comment-medical"></i>
                </div>
                <div class="team-name">Betül Batar</div>
                <div class="team-role">Dil ve Konuşma Terapisti</div>
                <p>Çocuklarda dil ve konuşma gelişimi alanında uzman</p>
            </div>
            <div class="team-member">
                <div class="team-avatar">
                    <i class="fas fa-language"></i>
                </div>
                <div class="team-name">Rabia Mermer</div>
                <div class="team-role">Yabancı Dil Öğretmeni</div>
                <p>Erken yaş İngilizce eğitimi ve dil gelişimi uzmanı</p>
            </div>
            <div class="team-member">
                <div class="team-avatar">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="team-name">Ayşegül Mavili</div>
                <div class="team-role">Psikolog</div>
                <p>Çocuk psikolojisi ve gelişimsel danışmanlık alanında uzman</p>
            </div>
        </div>
    </div>
</section>

<!-- Daha Fazla Bilgi -->
<section class="container">
    <div class="content-section" style="text-align: center; padding: 2rem 0;">
        <h2 class="section-title">Daha Fazla Bilgi</h2>
        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-top: 1rem;">
            <?php
            $programlar_pg = get_page_by_path('egitim-programlari');
            $galeri_pg = get_page_by_path('foto-galeri');
            $kayit_pg = get_page_by_path('kayit');
            $iletisim_pg = get_page_by_path('iletisim');
            ?>
            <a href="<?php echo esc_url($programlar_pg ? get_permalink($programlar_pg) : home_url('/egitim-programlari/')); ?>" style="background: var(--blue-accent); color: white; padding: 10px 22px; border-radius: 25px; text-decoration: none; font-weight: 700;">Eğitim Programlarımız</a>
            <a href="<?php echo esc_url($galeri_pg ? get_permalink($galeri_pg) : home_url('/foto-galeri/')); ?>" style="background: var(--primary-yellow); color: var(--dark-text); padding: 10px 22px; border-radius: 25px; text-decoration: none; font-weight: 700;">Foto Galeri</a>
            <a href="<?php echo esc_url($kayit_pg ? get_permalink($kayit_pg) : home_url('/kayit/')); ?>" style="background: var(--secondary-red); color: white; padding: 10px 22px; border-radius: 25px; text-decoration: none; font-weight: 700;">Kayıt Başvurusu</a>
            <a href="<?php echo esc_url($iletisim_pg ? get_permalink($iletisim_pg) : home_url('/iletisim/')); ?>" style="background: var(--purple-accent); color: white; padding: 10px 22px; border-radius: 25px; text-decoration: none; font-weight: 700;">İletişim</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>