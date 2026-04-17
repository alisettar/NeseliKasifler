<?php
/**
 * Neşeli Kaşifler Anaokulu Theme Functions
 */

// Theme support
function neseli_kasifler_theme_setup() {
    // Theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    // Menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'neseli-kasifler' ),
    ) );
}
add_action( 'after_setup_theme', 'neseli_kasifler_theme_setup' );

// Enqueue styles and scripts
function neseli_kasifler_scripts() {
    // Google Fonts preconnect (performans için)
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com">' . "\n";
    
    // Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap', array(), null );
    
    // Main CSS - filemtime ile cache busting (dosya değişince versiyon otomatik değişir)
    $css_file = get_template_directory() . '/assets/css/main-style.css';
    $css_ver  = file_exists( $css_file ) ? filemtime( $css_file ) : '1.0.0';
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main-style.css', array('font-awesome', 'google-fonts'), $css_ver );
    
    // Sticky Bar CSS - main-style'dan sonra yüklenir (kolay override)
    $sticky_file = get_template_directory() . '/assets/css/sticky-bar.css';
    $sticky_ver  = file_exists( $sticky_file ) ? filemtime( $sticky_file ) : '1.0.0';
    wp_enqueue_style( 'sticky-bar-style', get_template_directory_uri() . '/assets/css/sticky-bar.css', array('main-style'), $sticky_ver );
    
    // JavaScript - filemtime ile cache busting
    $js_file = get_template_directory() . '/assets/js/script.js';
    $js_ver  = file_exists( $js_file ) ? filemtime( $js_file ) : '1.0.0';
    wp_enqueue_script( 'neseli-kasifler-script', get_template_directory_uri() . '/assets/js/script.js', array(), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'neseli_kasifler_scripts' );

// Geliştirme ortamında browser cache'i devre dışı bırak
function neseli_kasifler_disable_cache() {
    if ( defined('WP_DEBUG') && WP_DEBUG ) {
        header( 'Cache-Control: no-cache, no-store, must-revalidate' );
        header( 'Pragma: no-cache' );
        header( 'Expires: 0' );
    }
}
add_action( 'send_headers', 'neseli_kasifler_disable_cache' );

// Custom Nav Walker for active states
class Neseli_Kasifler_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Add active class for current page
        if ( in_array('current-menu-item', $classes) || in_array('current_page_item', $classes) ) {
            $classes[] = 'active';
        }
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $output .= $indent . '<li' . $class_names .'>';
        
        $attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
        
        // Check if current page matches menu item
        $current_url = home_url( $_SERVER['REQUEST_URI'] );
        $menu_url = $item->url;
        $active_class = ( $current_url == $menu_url || in_array('current-menu-item', $classes) ) ? ' active' : '';
        
        $output .= '<a' . $attributes . ' class="' . $active_class . '">';
        $output .= apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '</a>';
    }
}

// =====================================================================
// GALERİ - Custom Post Type
// =====================================================================

function neseli_kasifler_register_galeri_cpt() {
    $labels = array(
        'name'               => 'Galeri',
        'singular_name'      => 'Galeri Öğesi',
        'menu_name'          => 'Galeri',
        'add_new'            => 'Yeni Ekle',
        'add_new_item'       => 'Yeni Galeri Öğesi Ekle',
        'edit_item'          => 'Galeri Öğesini Düzenle',
        'new_item'           => 'Yeni Galeri Öğesi',
        'view_item'          => 'Galeri Öğesini Görüntüle',
        'search_items'       => 'Galeri Ara',
        'not_found'          => 'Galeri öğesi bulunamadı',
        'not_found_in_trash' => 'Çöp kutusunda galeri öğesi bulunamadı',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
        'has_archive'        => false,
        'rewrite'            => array( 'slug' => 'galeri-item' ),
    );

    register_post_type( 'galeri', $args );
}
add_action( 'init', 'neseli_kasifler_register_galeri_cpt' );

// =====================================================================
// GALERİ - Custom Taxonomy (Kategoriler)
// =====================================================================

function neseli_kasifler_register_galeri_taxonomy() {
    $labels = array(
        'name'              => 'Galeri Kategorileri',
        'singular_name'     => 'Galeri Kategorisi',
        'search_items'      => 'Kategori Ara',
        'all_items'         => 'Tüm Kategoriler',
        'edit_item'         => 'Kategoriyi Düzenle',
        'update_item'       => 'Kategoriyi Güncelle',
        'add_new_item'      => 'Yeni Kategori Ekle',
        'new_item_name'     => 'Yeni Kategori Adı',
        'menu_name'         => 'Kategoriler',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'galeri-kategori' ),
    );

    register_taxonomy( 'galeri_kategori', array( 'galeri' ), $args );
}
add_action( 'init', 'neseli_kasifler_register_galeri_taxonomy' );

// Varsayılan kategorileri oluştur (tema aktive edildiğinde)
function neseli_kasifler_create_default_galeri_terms() {
    $default_terms = array(
        'etkinlik'  => 'Etkinlikler',
        'oyun'      => 'Oyun Zamanı',
        'sanat'     => 'Sanat',
        'yemek'     => 'Yemek Zamanı',
        'bahce'     => 'Bahçe',
        'binicilik' => 'Binicilik',
        'orman'     => 'Orman Sınıfı',
    );

    foreach ( $default_terms as $slug => $name ) {
        if ( ! term_exists( $slug, 'galeri_kategori' ) ) {
            wp_insert_term( $name, 'galeri_kategori', array( 'slug' => $slug ) );
        }
    }
}
add_action( 'after_switch_theme', 'neseli_kasifler_create_default_galeri_terms' );
// İlk kurulumda da çalıştır
add_action( 'init', function() {
    if ( get_option( 'neseli_galeri_terms_created' ) !== 'yes' ) {
        neseli_kasifler_create_default_galeri_terms();
        update_option( 'neseli_galeri_terms_created', 'yes' );
    }
}, 20 );

// =====================================================================
// GALERİ - Meta Boxes (Medya Tipi + Video URL)
// =====================================================================

function neseli_kasifler_galeri_meta_boxes() {
    add_meta_box(
        'galeri_media_settings',
        'Medya Ayarları',
        'neseli_kasifler_galeri_meta_box_html',
        'galeri',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'neseli_kasifler_galeri_meta_boxes' );

function neseli_kasifler_galeri_meta_box_html( $post ) {
    wp_nonce_field( 'galeri_meta_nonce_action', 'galeri_meta_nonce' );

    $media_type = get_post_meta( $post->ID, '_galeri_media_type', true ) ?: 'foto';
    $video_url  = get_post_meta( $post->ID, '_galeri_video_url', true );
    $orientation = get_post_meta( $post->ID, '_galeri_video_orientation', true ) ?: 'auto';
    $sira       = get_post_meta( $post->ID, '_galeri_sira', true ) ?: 0;
    ?>
    <style>
        .galeri-meta-row { margin-bottom: 15px; }
        .galeri-meta-row label { display: block; font-weight: 600; margin-bottom: 5px; }
        .galeri-meta-row input[type="text"],
        .galeri-meta-row input[type="number"] { width: 100%; padding: 8px; }
        .galeri-meta-row .description { color: #666; font-style: italic; margin-top: 4px; }
        .galeri-radio-group label { display: inline-block; margin-right: 20px; font-weight: normal; }
    </style>

    <div class="galeri-meta-row">
        <label>Medya Tipi:</label>
        <div class="galeri-radio-group">
            <label>
                <input type="radio" name="galeri_media_type" value="foto" <?php checked( $media_type, 'foto' ); ?>>
                📷 Fotoğraf
            </label>
            <label>
                <input type="radio" name="galeri_media_type" value="video" <?php checked( $media_type, 'video' ); ?>>
                🎬 Video
            </label>
        </div>
        <p class="description">Fotoğraf: Öne çıkan görseli kullanır. Video: Aşağıdaki URL'yi kullanır.</p>
    </div>

    <div class="galeri-meta-row" id="video-url-row" style="<?php echo ($media_type !== 'video') ? 'display:none;' : ''; ?>">
        <label for="galeri_video_url">Video URL:</label>
        <input type="text" id="galeri_video_url" name="galeri_video_url" 
               value="<?php echo esc_attr( $video_url ); ?>" 
               placeholder="https://www.youtube.com/watch?v=... veya https://youtu.be/...">
        <p class="description">YouTube, Instagram Reels veya diğer video linkleri. YouTube embed otomatik çalışır.</p>
    </div>

    <div class="galeri-meta-row" id="video-orientation-row" style="<?php echo ($media_type !== 'video') ? 'display:none;' : ''; ?>">
        <label>Video Yönü:</label>
        <div class="galeri-radio-group">
            <label>
                <input type="radio" name="galeri_video_orientation" value="auto" <?php checked( $orientation, 'auto' ); ?>>
                🔄 Otomatik (Shorts URL'si algılanır)
            </label>
            <label>
                <input type="radio" name="galeri_video_orientation" value="horizontal" <?php checked( $orientation, 'horizontal' ); ?>>
                ↔️ Yatay (16:9)
            </label>
            <label>
                <input type="radio" name="galeri_video_orientation" value="vertical" <?php checked( $orientation, 'vertical' ); ?>>
                ↕️ Dikey (9:16 / Shorts / Reels)
            </label>
        </div>
    </div>

    <div class="galeri-meta-row">
        <label for="galeri_sira">Sıralama (küçük = önce):</label>
        <input type="number" id="galeri_sira" name="galeri_sira" 
               value="<?php echo esc_attr( $sira ); ?>" min="0" step="1">
    </div>

    <script>
    jQuery(function($) {
        $('input[name="galeri_media_type"]').on('change', function() {
            if ($(this).val() === 'video') {
                $('#video-url-row, #video-orientation-row').slideDown();
            } else {
                $('#video-url-row, #video-orientation-row').slideUp();
            }
        });
    });
    </script>
    <?php
}

function neseli_kasifler_save_galeri_meta( $post_id ) {
    // Nonce check
    if ( ! isset( $_POST['galeri_meta_nonce'] ) || 
         ! wp_verify_nonce( $_POST['galeri_meta_nonce'], 'galeri_meta_nonce_action' ) ) {
        return;
    }
    // Auto-save check
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    // Permission check
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['galeri_media_type'] ) ) {
        update_post_meta( $post_id, '_galeri_media_type', sanitize_text_field( $_POST['galeri_media_type'] ) );
    }
    if ( isset( $_POST['galeri_video_url'] ) ) {
        update_post_meta( $post_id, '_galeri_video_url', esc_url_raw( $_POST['galeri_video_url'] ) );
    }
    if ( isset( $_POST['galeri_video_orientation'] ) ) {
        update_post_meta( $post_id, '_galeri_video_orientation', sanitize_text_field( $_POST['galeri_video_orientation'] ) );
    }
    if ( isset( $_POST['galeri_sira'] ) ) {
        update_post_meta( $post_id, '_galeri_sira', intval( $_POST['galeri_sira'] ) );
    }
}
add_action( 'save_post_galeri', 'neseli_kasifler_save_galeri_meta' );

// =====================================================================
// GALERİ - Helper: YouTube URL'den embed URL'ye çevir
// =====================================================================

function neseli_kasifler_get_youtube_embed_url( $url ) {
    $video_id = '';
    
    // youtube.com/watch?v=ID
    if ( preg_match( '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    }
    // youtu.be/ID
    elseif ( preg_match( '/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    }
    // youtube.com/embed/ID
    elseif ( preg_match( '/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    }
    // youtube.com/shorts/ID
    elseif ( preg_match( '/youtube\.com\/shorts\/([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    }

    if ( $video_id ) {
        return 'https://www.youtube.com/embed/' . $video_id;
    }

    return false;
}

function neseli_kasifler_get_youtube_thumb( $url ) {
    $video_id = '';
    
    if ( preg_match( '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    } elseif ( preg_match( '/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    } elseif ( preg_match( '/youtube\.com\/shorts\/([a-zA-Z0-9_-]+)/', $url, $matches ) ) {
        $video_id = $matches[1];
    }

    if ( $video_id ) {
        return 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
    }

    return false;
}

// =====================================================================
// GALERİ - Admin listesinde thumbnail göster
// =====================================================================

function neseli_kasifler_galeri_admin_columns( $columns ) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['galeri_thumb'] = 'Görsel';
    $new_columns['title'] = $columns['title'];
    $new_columns['taxonomy-galeri_kategori'] = 'Kategori';
    $new_columns['galeri_type'] = 'Tip';
    $new_columns['galeri_sira'] = 'Sıra';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter( 'manage_galeri_posts_columns', 'neseli_kasifler_galeri_admin_columns' );

function neseli_kasifler_galeri_admin_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'galeri_thumb':
            if ( has_post_thumbnail( $post_id ) ) {
                echo get_the_post_thumbnail( $post_id, array(60, 60), array('style' => 'border-radius:8px;') );
            } else {
                echo '<span style="color:#999;">—</span>';
            }
            break;
        case 'galeri_type':
            $type = get_post_meta( $post_id, '_galeri_media_type', true );
            echo ( $type === 'video' ) ? '🎬 Video' : '📷 Foto';
            break;
        case 'galeri_sira':
            echo intval( get_post_meta( $post_id, '_galeri_sira', true ) );
            break;
    }
}
add_action( 'manage_galeri_posts_custom_column', 'neseli_kasifler_galeri_admin_column_content', 10, 2 );

// =====================================================================
// SEO - Schema Markup (JSON-LD) + Meta Description + Breadcrumb
// =====================================================================

/**
 * LocalBusiness Schema - Tüm sayfalarda
 */
function neseli_kasifler_schema_localbusiness() {
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ChildCare",
        "name": "Neşeli Kaşifler Anaokulu",
        "alternateName": "Özel Neşeli Kaşifler Anaokulu",
        "url": "<?php echo esc_url( home_url('/') ); ?>",
        "logo": "<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png",
        "image": "<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png",
        "description": "Ankara Yenimahalle'de 2-6 yaş çocuklar için değerler odaklı okul öncesi eğitim. Multibem eğitim modeli, orman sınıfı, kodlama ve çok dilli eğitim programları.",
        "telephone": "+905514975313",
        "email": "info@neselikasifler.com",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Kuzey Yıldızı Mah. 4081. Cad. 16/C",
            "addressLocality": "Yenimahalle",
            "addressRegion": "Ankara",
            "postalCode": "06370",
            "addressCountry": "TR"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 40.032508,
            "longitude": 32.780453
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
            "opens": "07:00",
            "closes": "18:00"
        },
        "sameAs": [
            "https://www.instagram.com/neselikasifler",
            "https://youtube.com/@neselikasifleranaokulu",
            "https://www.facebook.com/profile.php?id=61576517904469",
            "https://www.linkedin.com/in/%C3%B6zel-ne%C5%9Feli-ka%C5%9Fifler-anaokulu-0635a73b9"
        ],
        "priceRange": "₺₺",
        "areaServed": {
            "@type": "City",
            "name": "Ankara"
        }
    }
    </script>
    <?php
}
add_action( 'wp_head', 'neseli_kasifler_schema_localbusiness', 5 );

/**
 * FAQPage Schema - İletişim sayfasında SSS için
 */
function neseli_kasifler_schema_faq() {
    if ( ! is_page( 'iletisim' ) ) return;
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "Kayıt için hangi belgeler gerekli?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Çocuğunuzun nüfus cüzdanı, 4 adet vesikalık fotoğraf ve velilerin kimlik fotokopileri gerekmektedir. Ayrıca varsa sağlık raporu ve aşı kartı da kayıt sırasında istenmektedir."
                }
            },
            {
                "@type": "Question",
                "name": "Yaş grupları nasıl belirleniyor?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "2-3 yaş grubu Minik Kaşifler, 3-4 yaş grubu Küçük Kaşifler, 4-6 yaş grubu Büyük Kaşifler sınıflarımıza yerleştirilir. Her yaş grubuna özel Multibem eğitim modeline dayalı programlar uygulanmaktadır."
                }
            },
            {
                "@type": "Question",
                "name": "Yemek servisi var mı?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Evet, kahvaltı, öğle yemeği ve ikindi arasında sağlıklı menüler sunulmaktadır. Özel diyet ihtiyaçları karşılanır."
                }
            },
            {
                "@type": "Question",
                "name": "Okulu ziyaret edebilir miyim?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Tabii ki! Önceden randevu alarak okulumuzu ziyaret edebilir, öğretmenlerimizle tanışabilirsiniz."
                }
            },
            {
                "@type": "Question",
                "name": "Servis hizmeti sunuyor musunuz?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Şu anda düzenli servis hizmetimiz bulunmamaktadır. Ancak talep yoğunluğuna göre değerlendirme yapabiliyoruz. Okulumuz Kuzey Yıldızı Mahallesi'nde, ulaşımı kolay bir konumdadır."
                }
            }
        ]
    }
    </script>
    <?php
}
add_action( 'wp_head', 'neseli_kasifler_schema_faq', 6 );

/**
 * EducationalOrganization Schema - Programlar sayfasında
 */
function neseli_kasifler_schema_education() {
    if ( ! is_page( 'egitim-programlari' ) ) return;
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "Neşeli Kaşifler Anaokulu",
        "url": "<?php echo esc_url( home_url('/') ); ?>",
        "description": "Ankara Yenimahalle'de 2-6 yaş arası çocuklar için Multibem eğitim modeli ile okul öncesi eğitim programları.",
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Eğitim Programları",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "EducationalOccupationalProgram",
                        "name": "Minik Kaşifler Programı (2-3 Yaş)",
                        "description": "Sosyalleşmenin ilk adımları, temel beceriler ve sevgi dolu ortamda güven duygusunun gelişimi."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "EducationalOccupationalProgram",
                        "name": "Küçük Kaşifler Programı (3-4 Yaş)",
                        "description": "Yaratıcılık ve hayal gücünün doruk noktası. Sanat, müzik ve keşif etkinlikleriyle dolu günler."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "EducationalOccupationalProgram",
                        "name": "Büyük Kaşifler Programı (4-6 Yaş)",
                        "description": "Okula hazırlık dönemi. Akademik beceriler, problem çözme ve bağımsızlık kazanma odaklı program."
                    }
                }
            ]
        }
    }
    </script>
    <?php
}
add_action( 'wp_head', 'neseli_kasifler_schema_education', 6 );

/**
 * SEO Meta Description - Rank Math/Yoast yoksa fallback
 */
function neseli_kasifler_meta_description() {
    // Rank Math veya Yoast aktifse bu fonksiyon çalışmasın
    if ( defined( 'RANK_MATH_VERSION' ) || defined( 'WPSEO_VERSION' ) ) return;

    $desc = '';

    if ( is_front_page() ) {
        $desc = 'Ankara Yenimahalle Neşeli Kaşifler Anaokulu — 2-6 yaş çocuklar için değerler odaklı, Multibem eğitim modeli ile okul öncesi eğitim. Orman sınıfı, kodlama, İngilizce ve Arapça programları.';
    } elseif ( is_page( 'hakkimizda' ) ) {
        $desc = 'Neşeli Kaşifler Anaokulu hakkında — Misyonumuz, vizyonumuz, değerlerimiz ve deneyimli eğitmen kadromuz. 2020\'den beri Ankara Yenimahalle\'de hizmet veriyoruz.';
    } elseif ( is_page( 'egitim-programlari' ) ) {
        $desc = 'Neşeli Kaşifler eğitim programları — 2-3 yaş Minik Kaşifler, 3-4 yaş Küçük Kaşifler, 4-6 yaş Büyük Kaşifler. Multibem erken çocukluk eğitim modeli.';
    } elseif ( is_page( 'foto-galeri' ) ) {
        $desc = 'Neşeli Kaşifler Anaokulu foto galeri — Etkinlikler, sanat çalışmaları, oyun zamanları, bahçe aktiviteleri ve orman sınıfı fotoğrafları.';
    } elseif ( is_page( 'iletisim' ) ) {
        $desc = 'Neşeli Kaşifler Anaokulu iletişim — Adres: Kuzey Yıldızı Mah. 4081. Cad. 16/C Yenimahalle, Ankara. Tel: 0551 497 53 13.';
    } elseif ( is_page( 'kayit' ) ) {
        $desc = 'Neşeli Kaşifler Anaokulu kayıt formu — 2026-2027 eğitim yılı kayıtları açık. Online ön kayıt başvurusu yapın, kontenjan bilgisi alın.';
    } elseif ( is_page( 'is-basvurusu' ) ) {
        $desc = 'Neşeli Kaşifler Anaokulu iş başvurusu — Okul öncesi öğretmen, yardımcı öğretmen ve diğer açık pozisyonlar için başvuru yapın.';
    } elseif ( is_page( 'ev-okulu-ankara' ) ) {
        $desc = 'Ev Okulu Ankara — Evde eğitim topluluğu, aylık değerler eğitimi atölyeleri ve kaynak paylaşımı. Ankara\'da ev okulu aileleri için destek.';
    }

    if ( $desc ) {
        echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'neseli_kasifler_meta_description', 3 );

/**
 * Open Graph Meta Tags - Rank Math/Yoast yoksa fallback
 */
function neseli_kasifler_open_graph() {
    if ( defined( 'RANK_MATH_VERSION' ) || defined( 'WPSEO_VERSION' ) ) return;

    $title = wp_title( '|', false, 'right' ) . get_bloginfo( 'name' );
    $url   = ( is_ssl() ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $image = get_template_directory_uri() . '/assets/img/logo.png';
    ?>
    <meta property="og:locale" content="tr_TR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:site_name" content="Neşeli Kaşifler Anaokulu">
    <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
    <?php
}
add_action( 'wp_head', 'neseli_kasifler_open_graph', 4 );

/**
 * Twitter Card Meta Tags - Rank Math/Yoast yoksa fallback
 */
function neseli_kasifler_twitter_card() {
    if ( defined( 'RANK_MATH_VERSION' ) || defined( 'WPSEO_VERSION' ) ) return;

    $title = wp_title( '|', false, 'right' ) . get_bloginfo( 'name' );
    $image = get_template_directory_uri() . '/assets/img/logo.png';
    ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
    <?php
}
add_action( 'wp_head', 'neseli_kasifler_twitter_card', 4 );

/**
 * Breadcrumb fonksiyonu (SEO dostu)
 */
function neseli_kasifler_breadcrumb() {
    if ( is_front_page() ) return;
    
    echo '<nav class="breadcrumb" aria-label="Breadcrumb">';
    echo '<div class="container">';
    echo '<ol itemscope itemtype="https://schema.org/BreadcrumbList">';
    
    // Ana Sayfa
    echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
    echo '<a itemprop="item" href="' . esc_url( home_url('/') ) . '"><span itemprop="name">Ana Sayfa</span></a>';
    echo '<meta itemprop="position" content="1">';
    echo '</li>';
    
    // Mevcut sayfa
    if ( is_page() ) {
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . get_the_title() . '</span>';
        echo '<meta itemprop="position" content="2">';
        echo '</li>';
    }
    
    echo '</ol></div></nav>';
}

/**
 * Custom document title separator
 */
function neseli_kasifler_document_title_separator( $sep ) {
    return '|';
}
add_filter( 'document_title_separator', 'neseli_kasifler_document_title_separator' );

/**
 * Custom document title parts
 */
function neseli_kasifler_document_title_parts( $title ) {
    if ( is_front_page() ) {
        $title['title'] = 'Neşeli Kaşifler Anaokulu | Ankara Yenimahalle Anaokulu';
        unset( $title['tagline'] );
    }
    return $title;
}
add_filter( 'document_title_parts', 'neseli_kasifler_document_title_parts' );
