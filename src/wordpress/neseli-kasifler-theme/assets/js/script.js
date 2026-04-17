// Neşeli Kaşifler Theme JavaScript

document.addEventListener('DOMContentLoaded', function() {
    
    // Sticky Header on Scroll
    const header = document.querySelector('.header');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Hero Slider Functionality
    if (document.querySelector('.hero-slider')) {
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const totalSlides = slides.length;

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            if (n >= totalSlides) currentSlide = 0;
            if (n < 0) currentSlide = totalSlides - 1;

            if (slides[currentSlide]) slides[currentSlide].classList.add('active');
            if (dots[currentSlide]) dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide--;
            showSlide(currentSlide);
        }

        // Auto-play slider (7 seconds)
        setInterval(nextSlide, 7000);

        // Manual navigation
        const nextBtn = document.querySelector('.slider-next');
        const prevBtn = document.querySelector('.slider-prev');
        
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    }
    
    // Mobile menu toggle
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('mobile-active');
        });
    }

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Modal functions
    window.openModal = function() {
        const modal = document.getElementById('weekendModal');
        if (modal) { modal.style.display = 'flex'; document.body.style.overflow = 'hidden'; }
    }

    window.closeModal = function() {
        const modal = document.getElementById('weekendModal');
        if (modal) { modal.style.display = 'none'; document.body.style.overflow = 'auto'; }
    }

    window.openEnrollmentModal = function() {
        const modal = document.getElementById('enrollmentModal');
        if (modal) { modal.style.display = 'flex'; document.body.style.overflow = 'hidden'; }
    }

    window.closeEnrollmentModal = function() {
        const modal = document.getElementById('enrollmentModal');
        if (modal) { modal.style.display = 'none'; document.body.style.overflow = 'auto'; }
    }

    window.openOyunModal = function() {
        const modal = document.getElementById('oyunModal');
        if (modal) { modal.style.display = 'flex'; document.body.style.overflow = 'hidden'; }
    }

    window.closeOyunModal = function() {
        const modal = document.getElementById('oyunModal');
        if (modal) { modal.style.display = 'none'; document.body.style.overflow = 'auto'; }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const weekendModal = document.getElementById('weekendModal');
        const enrollmentModal = document.getElementById('enrollmentModal');
        const oyunModal = document.getElementById('oyunModal');
        if (event.target === weekendModal) {
            closeModal();
        }
        if (event.target === enrollmentModal) {
            closeEnrollmentModal();
        }
        if (event.target === oyunModal) {
            closeOyunModal();
        }
    }
    
    // FAQ Toggle (if exists)
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const faqItem = question.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        });
    });

    // Form Submission (if exists)
    const forms = document.querySelectorAll('form:not(.wpcf7-form)');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Teşekkürler! Mesajınız alınmıştır. En kısa sürede size dönüş yapacağız.');
        });
    });

    // =============================================
    // EV OKULU ANKARA PAGE FUNCTIONALITY
    // =============================================

    // Workshop registration modal functionality
    if (document.querySelector('.register-workshop-btn')) {
        const workshopNames = {
            'sanat': 'Sanat ve Yaratıcılık Atölyesi',
            'doga': 'Doğa ve Bilim Atölyesi', 
            'hikaye': 'Hikaye ve Drama Atölyesi',
            'matematik': 'Matematik ve Oyun Atölyesi'
        };

        // Add event listeners to workshop registration buttons
        document.querySelectorAll('.register-workshop-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const workshop = this.getAttribute('data-workshop');
                const workshopNameInput = document.getElementById('workshopName');
                const modal = document.getElementById('registrationModal');
                
                if (workshopNameInput) workshopNameInput.value = workshopNames[workshop];
                if (modal) modal.classList.add('active');
            });
        });

        // Modal close functionality for workshop
        const workshopModal = document.getElementById('registrationModal');
        if (workshopModal) {
            workshopModal.addEventListener('click', (e) => {
                if (e.target.id === 'registrationModal') {
                    workshopModal.classList.remove('active');
                }
            });
        }

        // Form submission
        const workshopForm = document.getElementById('workshopForm');
        if (workshopForm) {
            workshopForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Kayıt başvurunuz alınmıştır. En kısa sürede sizinle iletişime geçeceğiz.');
                const modal = document.getElementById('registrationModal');
                if (modal) modal.classList.remove('active');
                this.reset();
            });
        }
    }
    
    // =============================================
    // EĞİTİM PROGRAMLARI PAGE FUNCTIONALITY
    // =============================================
    
    // Age group cards - scroll to schedule and show content when clicked
    document.querySelectorAll('.age-group-card').forEach(card => {
        card.addEventListener('click', function() {
            const scheduleSection = document.getElementById('scheduleSection');
            if (scheduleSection) {
                // Show first schedule content if none are visible
                if (!document.querySelector('.schedule-content.active')) {
                    const firstSchedule = document.getElementById('schedule-3');
                    const firstTab = document.querySelector('.schedule-tab[data-age="3"]');
                    if (firstSchedule) firstSchedule.classList.add('active');
                    if (firstTab) firstTab.classList.add('active');
                }
                scheduleSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Schedule tabs functionality
    document.querySelectorAll('.schedule-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const age = this.getAttribute('data-age');
            
            // Remove active from all tabs and contents
            document.querySelectorAll('.schedule-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.schedule-content').forEach(c => c.classList.remove('active'));
            
            // Activate clicked tab and corresponding content
            this.classList.add('active');
            const content = document.getElementById('schedule-' + age);
            if (content) content.classList.add('active');
        });
    });

    // =============================================
    // GALERİ PAGE - Filtreleme + Lightbox
    // =============================================

    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    // Galeri filtreleme
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');
            
            // Toggle: aktif filtreye tekrar tıklanırsa "Tümü"ne dön
            if (btn.classList.contains('active') && filter !== 'all') {
                filterBtns.forEach(b => b.classList.remove('active'));
                const allBtn = document.querySelector('[data-filter="all"]');
                if (allBtn) allBtn.classList.add('active');
                
                galleryItems.forEach(item => {
                    item.style.display = 'block';
                });
            } else {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                galleryItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        });
    });

    // Lightbox - Fotoğraf ve Video destekli
    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const title     = item.getAttribute('data-title');
            const desc      = item.getAttribute('data-desc');
            const mediaType = item.getAttribute('data-type');
            const imageUrl  = item.getAttribute('data-image');
            const videoUrl  = item.getAttribute('data-video');
            const videoLink = item.getAttribute('data-video-link');
            const orientation = item.getAttribute('data-orientation');

            const lightbox      = document.getElementById('lightbox');
            const lightboxMedia = document.getElementById('lightbox-media');
            const lightboxTitle = document.getElementById('lightbox-title');
            const lightboxDesc  = document.getElementById('lightbox-description');

            if (!lightbox || !lightboxMedia) return;

            // Medya alanını temizle
            lightboxMedia.innerHTML = '';
            lightboxMedia.classList.remove('has-video', 'has-video-vertical', 'has-image', 'is-portrait');

            if (mediaType === 'video' && videoUrl) {
                // YouTube embed
                const iframe = document.createElement('iframe');
                iframe.src = videoUrl + '?autoplay=1&rel=0';
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allowfullscreen', 'true');
                iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                iframe.className = 'lightbox-video';
                lightboxMedia.appendChild(iframe);
                lightboxMedia.classList.remove('has-image');
                // Dikey (Shorts) vs yatay video
                if (orientation === 'vertical') {
                    lightboxMedia.classList.add('has-video-vertical');
                    lightboxMedia.classList.remove('has-video');
                } else {
                    lightboxMedia.classList.add('has-video');
                    lightboxMedia.classList.remove('has-video-vertical');
                }
            } else if (mediaType === 'video' && videoLink) {
                // YouTube olmayan video linki - yeni sekmede aç butonu
                const linkDiv = document.createElement('div');
                linkDiv.className = 'lightbox-video-link';
                linkDiv.innerHTML = '<a href="' + videoLink + '" target="_blank" rel="noopener noreferrer">' +
                    '<i class="fas fa-external-link-alt"></i> Videoyu Aç</a>';
                lightboxMedia.appendChild(linkDiv);
                lightboxMedia.classList.remove('has-video', 'has-image');
            } else if (imageUrl) {
                // Fotoğraf - yüklendikten sonra yön algıla
                const img = document.createElement('img');
                img.alt = title || '';
                img.className = 'lightbox-img';
                img.onload = function() {
                    if (img.naturalHeight > img.naturalWidth) {
                        lightboxMedia.classList.add('is-portrait');
                    } else {
                        lightboxMedia.classList.remove('is-portrait');
                    }
                };
                img.src = imageUrl;
                lightboxMedia.appendChild(img);
                lightboxMedia.classList.add('has-image');
                lightboxMedia.classList.remove('has-video', 'has-video-vertical');
            } else {
                // Fallback - görsel yoksa placeholder
                lightboxMedia.innerHTML = '<div class="lightbox-placeholder"><i class="fas fa-image"></i></div>';
                lightboxMedia.classList.remove('has-video', 'has-image');
            }

            if (lightboxTitle) lightboxTitle.textContent = title || '';
            if (lightboxDesc) lightboxDesc.textContent = desc || '';

            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    // Lightbox kapat
    window.closeLightbox = function() {
        const lightbox = document.getElementById('lightbox');
        const lightboxMedia = document.getElementById('lightbox-media');
        if (lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
            // Video oynatmayı durdur
            if (lightboxMedia) {
                const iframe = lightboxMedia.querySelector('iframe');
                if (iframe) iframe.src = '';
                lightboxMedia.innerHTML = '';
            }
        }
    }

    // Lightbox arkaplanına tıklayınca kapat
    const lightbox = document.getElementById('lightbox');
    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') {
                closeLightbox();
            }
        });
    }

    // ESC tuşuyla lightbox kapat
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const lb = document.getElementById('lightbox');
            if (lb && lb.classList.contains('active')) {
                closeLightbox();
            }
        }
    });
    
    // =============================================
    // KAYIT PAGE FUNCTIONALITY  
    // =============================================
    
    // Age group selection
    document.querySelectorAll('.age-group-item').forEach(item => {
        item.addEventListener('click', () => {
            // Remove selected class from all items
            document.querySelectorAll('.age-group-item').forEach(el => el.classList.remove('selected'));
            
            // Add selected class to clicked item
            item.classList.add('selected');
            
            // Check the radio button
            const radio = item.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }
        });
    });

    // Registration form submission
    const submitRegBtn = document.getElementById('submit-registration');
    if (submitRegBtn) {
        submitRegBtn.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Basic form validation
            const requiredFields = document.querySelectorAll('input[required], select[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'var(--secondary-red)';
                    isValid = false;
                } else {
                    field.style.borderColor = 'var(--light-gray)';
                }
            });
            
            // Check terms checkbox
            const termsCheckbox = document.getElementById('terms');
            if (termsCheckbox && !termsCheckbox.checked) {
                alert('Lütfen kişisel verilerin işlenmesi onayını verin.');
                return;
            }
            
            // Check if age group is selected
            const selectedAgeGroup = document.querySelector('input[name="age-group"]:checked');
            if (!selectedAgeGroup) {
                alert('Lütfen yaş grubu seçimi yapın.');
                return;
            }
            
            if (isValid) {
                alert('Teşekkürler! Başvurunuz alınmıştır. 24 saat içinde size dönüş yapacağız.');
            } else {
                alert('Lütfen zorunlu alanları doldurun.');
            }
        });
    }
    
    // =============================================
    // İŞ BAŞVURUSU PAGE FUNCTIONALITY  
    // =============================================
    
    // Job position selection
    document.querySelectorAll('.job-card').forEach(card => {
        card.addEventListener('click', () => {
            // Remove selected class from all cards
            document.querySelectorAll('.job-card').forEach(c => c.classList.remove('selected'));
            
            // Add selected class to clicked card
            card.classList.add('selected');
            
            // Update position select dropdown
            const position = card.getAttribute('data-position');
            const positionSelect = document.getElementById('position');
            if (positionSelect) {
                positionSelect.value = position;
            }
        });
    });

    // File upload label update
    const cvInput = document.getElementById('cv');
    if (cvInput) {
        cvInput.addEventListener('change', function() {
            const label = this.nextElementSibling;
            const fileName = this.files[0]?.name;
            if (fileName && label) {
                label.innerHTML = `<i class="fas fa-check"></i> ${fileName}`;
            }
        });
    }

    // Job application form submission
    const submitAppBtn = document.getElementById('submit-application');
    if (submitAppBtn) {
        submitAppBtn.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Basic form validation
            const requiredFields = document.querySelectorAll('input[required], select[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'var(--secondary-red)';
                    isValid = false;
                } else {
                    field.style.borderColor = 'var(--light-gray)';
                }
            });
            
            // Check terms checkbox
            const termsCheckbox = document.getElementById('terms');
            if (termsCheckbox && !termsCheckbox.checked) {
                alert('Lütfen kişisel verilerin işlenmesi onayını verin.');
                return;
            }
            
            // Check if position is selected
            const positionSelect = document.getElementById('position');
            if (positionSelect && !positionSelect.value) {
                alert('Lütfen başvurmak istediğiniz pozisyonu seçin.');
                return;
            }
            
            if (isValid) {
                alert('Teşekkürler! Başvurunuz alınmıştır. En kısa sürede size dönüş yapacağız.');
            } else {
                alert('Lütfen zorunlu alanları doldurun.');
            }
        });
    }

    // Ön Kayıt modalı - sadece anasayfada ve oturum başına 1 kez
    if (document.body.classList.contains('home') && !sessionStorage.getItem('enrollmentShown')) {
        openEnrollmentModal();
        sessionStorage.setItem('enrollmentShown', 'true');
    }
    
});

/* Summer School Modal */
function openSummerModal() {
    var modal = document.getElementById('summerModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeSummerModal() {
    var modal = document.getElementById('summerModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

/* Close summer/oyun modal on outside click */
window.addEventListener('click', function(event) {
    var summerModal = document.getElementById('summerModal');
    var oyunModal = document.getElementById('oyunModal');
    if (event.target === summerModal) {
        closeSummerModal();
    }
    if (event.target === oyunModal) {
        closeOyunModal();
    }
});

/* CF7 Radio kartları — seçili durumu yönetir */
document.addEventListener('change', function(e) {
    if (e.target.type === 'radio' && e.target.closest('.age-radio-group')) {
        var items = e.target.closest('.wpcf7-radio').querySelectorAll('.wpcf7-list-item');
        items.forEach(function(item) { item.classList.remove('selected'); });
        var parentItem = e.target.closest('.wpcf7-list-item');
        if (parentItem) parentItem.classList.add('selected');
    }
});

/* Sayfa yüklendiğinde varsayılan seçili radio'yu işaretle */
document.addEventListener('DOMContentLoaded', function() {
    var checkedRadio = document.querySelector('.age-radio-group input[type="radio"]:checked');
    if (checkedRadio) {
        var parentItem = checkedRadio.closest('.wpcf7-list-item');
        if (parentItem) parentItem.classList.add('selected');
    }
});
