<?php
/**
 * Template Name: Foto Galeri
 * Template for Photo Gallery page
 */

get_header(); ?>

    <!-- Page Header -->
    <section class="page-header gallery-header">
        <div class="container">
            <h1 class="page-title">FOTO GALERİ</h1>
            <p class="page-subtitle">Çocuklarımızın neşeli anları</p>
        </div>
    </section>

    <!-- Gallery Filters -->
    <section class="container">
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">Tümü</button>
            <button class="filter-btn" data-filter="etkinlik">Etkinlikler</button>
            <button class="filter-btn" data-filter="oyun">Oyun Zamanı</button>
            <button class="filter-btn" data-filter="sanat">Sanat</button>
            <button class="filter-btn" data-filter="yemek">Yemek Zamanı</button>
            <button class="filter-btn" data-filter="bahce">Bahçe</button>
            <button class="filter-btn" data-filter="binicilik">Binicilik</button>
            <button class="filter-btn" data-filter="orman">Orman Sınıfı</button>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="container">
        <div class="gallery-grid">
            <div class="gallery-item" data-category="etkinlik" data-title="Bilim Deneyleri" data-desc="Küçük bilim insanlarımız keşfediyor">
                <div class="gallery-image">
                    <span>🔬</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Etkinlik</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Bilim Deneyleri</h3>
                    <p class="gallery-description">Küçük bilim insanlarımız keşfediyor</p>
                </div>
            </div>

            <div class="gallery-item" data-category="sanat" data-title="Boyama Atölyesi" data-desc="Rengarenk sanat eserleri">
                <div class="gallery-image">
                    <span>🎨</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Sanat</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Boyama Atölyesi</h3>
                    <p class="gallery-description">Rengarenk sanat eserleri</p>
                </div>
            </div>

            <div class="gallery-item" data-category="oyun" data-title="Blok Oyunları" data-desc="Yaratıcılık ve problem çözme">
                <div class="gallery-image">
                    <span>🧩</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Oyun</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Blok Oyunları</h3>
                    <p class="gallery-description">Yaratıcılık ve problem çözme</p>
                </div>
            </div>

            <div class="gallery-item" data-category="yemek" data-title="Kahvaltı Saati" data-desc="Sağlıklı beslenme alışkanlıkları">
                <div class="gallery-image">
                    <span>🍎</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Yemek</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Kahvaltı Saati</h3>
                    <p class="gallery-description">Sağlıklı beslenme alışkanlıkları</p>
                </div>
            </div>

            <div class="gallery-item" data-category="bahce" data-title="Bahçe Aktiviteleri" data-desc="Doğayla iç içe oyunlar">
                <div class="gallery-image">
                    <span>🌳</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Bahçe</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Bahçe Aktiviteleri</h3>
                    <p class="gallery-description">Doğayla iç içe oyunlar</p>
                </div>
            </div>

            <div class="gallery-item" data-category="etkinlik" data-title="Müzik Saati" data-desc="Ritim ve melodi keşfi">
                <div class="gallery-image">
                    <span>🎵</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Etkinlik</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Müzik Saati</h3>
                    <p class="gallery-description">Ritim ve melodi keşfi</p>
                </div>
            </div>

            <div class="gallery-item" data-category="sanat" data-title="El İşleri" data-desc="Motor beceriler gelişimi">
                <div class="gallery-image">
                    <span>✂️</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Sanat</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">El İşleri</h3>
                    <p class="gallery-description">Motor beceriler gelişimi</p>
                </div>
            </div>

            <div class="gallery-item" data-category="oyun" data-title="Dramatik Oyun" data-desc="Hayal gücü ve rol yapma">
                <div class="gallery-image">
                    <span>🎭</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Oyun</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Dramatik Oyun</h3>
                    <p class="gallery-description">Hayal gücü ve rol yapma</p>
                </div>
            </div>

            <div class="gallery-item" data-category="etkinlik" data-title="Kitap Okuma" data-desc="Dil gelişimi ve hayal gücü">
                <div class="gallery-image">
                    <span>📚</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Etkinlik</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Kitap Okuma</h3>
                    <p class="gallery-description">Dil gelişimi ve hayal gücü</p>
                </div>
            </div>

            <div class="gallery-item" data-category="binicilik" data-title="At Binicilik Dersleri" data-desc="Güvenli ortamda at binme deneyimi">
                <div class="gallery-image">
                    <span>🐎</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Binicilik</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">At Binicilik Dersleri</h3>
                    <p class="gallery-description">Güvenli ortamda at binme deneyimi</p>
                </div>
            </div>

            <div class="gallery-item" data-category="binicilik" data-title="At Bakımı" data-desc="Hayvan sevgisi ve sorumluluk">
                <div class="gallery-image">
                    <span>🥕</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Binicilik</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">At Bakımı</h3>
                    <p class="gallery-description">Hayvan sevgisi ve sorumluluk</p>
                </div>
            </div>

            <div class="gallery-item" data-category="orman" data-title="Doğa Yürüyüşü" data-desc="Orman keşif macerası">
                <div class="gallery-image">
                    <span>🌲</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Orman Sınıfı</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Doğa Yürüyüşü</h3>
                    <p class="gallery-description">Orman keşif macerası</p>
                </div>
            </div>

            <div class="gallery-item" data-category="orman" data-title="Böcek Gözlemi" data-desc="Doğal yaşamı tanıma">
                <div class="gallery-image">
                    <span>🐛</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Orman Sınıfı</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Böcek Gözlemi</h3>
                    <p class="gallery-description">Doğal yaşamı tanıma</p>
                </div>
            </div>

            <div class="gallery-item" data-category="orman" data-title="Ağaç Evler" data-desc="Doğada yaratıcı oyunlar">
                <div class="gallery-image">
                    <span>🏡</span>
                    <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
                <div class="gallery-category">Orman Sınıfı</div>
                <div class="gallery-info">
                    <h3 class="gallery-title">Ağaç Evler</h3>
                    <p class="gallery-description">Doğada yaratıcı oyunlar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="container">
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Mutlu Çocuk</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Güzel Anı</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Etkinlik</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Yıllık Deneyim</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
            <div class="lightbox-image" id="lightbox-image"></div>
            <h3 id="lightbox-title"></h3>
            <p id="lightbox-description"></p>
        </div>
    </div>

<?php get_footer(); ?>