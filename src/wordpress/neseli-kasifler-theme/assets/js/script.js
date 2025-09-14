// Neşeli Kaşifler Theme JavaScript

document.addEventListener('DOMContentLoaded', function() {
    
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
        document.getElementById('weekendModal').style.display = 'block';
    }

    window.closeModal = function() {
        document.getElementById('weekendModal').style.display = 'none';
    }

    window.openEnrollmentModal = function() {
        document.getElementById('enrollmentModal').style.display = 'block';
    }

    window.closeEnrollmentModal = function() {
        document.getElementById('enrollmentModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const weekendModal = document.getElementById('weekendModal');
        const enrollmentModal = document.getElementById('enrollmentModal');
        if (event.target === weekendModal) {
            closeModal();
        }
        if (event.target === enrollmentModal) {
            closeEnrollmentModal();
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
                document.getElementById('workshopName').value = workshopNames[workshop];
                document.getElementById('registrationModal').classList.add('active');
            });
        });

        // Modal close functionality
        window.closeModal = function() {
            document.getElementById('registrationModal').classList.remove('active');
        }

        // Close modal on backdrop click
        document.getElementById('registrationModal').addEventListener('click', (e) => {
            if (e.target.id === 'registrationModal') {
                closeModal();
            }
        });

        // Form submission
        document.getElementById('workshopForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Kayıt başvurunuz alınmıştır. En kısa sürede sizinle iletişime geçeceğiz.');
            closeModal();
            this.reset();
        });
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
            // Remove active class from all tabs and contents
            document.querySelectorAll('.schedule-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.schedule-content').forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Show corresponding content
            const ageGroup = this.getAttribute('data-age');
            const targetContent = document.getElementById('schedule-' + ageGroup);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
    
    // =============================================
    // FOTO GALERİ PAGE FUNCTIONALITY
    // =============================================
    
    // Gallery filtering
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');
            
            // Toggle functionality
            if (btn.classList.contains('active') && filter !== 'all') {
                // If clicking active filter (not 'all'), return to 'all'
                filterBtns.forEach(b => b.classList.remove('active'));
                const allBtn = document.querySelector('[data-filter="all"]');
                if (allBtn) allBtn.classList.add('active');
                
                galleryItems.forEach(item => {
                    item.style.display = 'block';
                });
            } else {
                // Normal filtering
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

    // Lightbox functionality
    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const title = item.getAttribute('data-title');
            const desc = item.getAttribute('data-desc');
            const emoji = item.querySelector('.gallery-image span');
            
            if (title && desc && emoji) {
                const lightboxTitle = document.getElementById('lightbox-title');
                const lightboxDesc = document.getElementById('lightbox-description');
                const lightboxImage = document.getElementById('lightbox-image');
                const lightbox = document.getElementById('lightbox');
                
                if (lightboxTitle) lightboxTitle.textContent = title;
                if (lightboxDesc) lightboxDesc.textContent = desc;
                if (lightboxImage) lightboxImage.textContent = emoji.textContent;
                if (lightbox) lightbox.classList.add('active');
            }
        });
    });

    // Lightbox close functionality
    window.closeLightbox = function() {
        const lightbox = document.getElementById('lightbox');
        if (lightbox) {
            lightbox.classList.remove('active');
        }
    }

    // Close lightbox on backdrop click
    const lightbox = document.getElementById('lightbox');
    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') {
                closeLightbox();
            }
        });
    }
    
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

    // Form submission
    const submitBtn = document.getElementById('submit-registration');
    if (submitBtn) {
        submitBtn.addEventListener('click', (e) => {
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

    // Form submission
    const submitBtn = document.getElementById('submit-application');
    if (submitBtn) {
        submitBtn.addEventListener('click', (e) => {
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
    // Modal functions
    window.openModal = function() {
        document.getElementById('weekendModal').style.display = 'block';
    }

    window.closeModal = function() {
        document.getElementById('weekendModal').style.display = 'none';
    }

    window.openEnrollmentModal = function() {
        document.getElementById('enrollmentModal').style.display = 'block';
    }

    window.closeEnrollmentModal = function() {
        document.getElementById('enrollmentModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const weekendModal = document.getElementById('weekendModal');
        const enrollmentModal = document.getElementById('enrollmentModal');
        if (event.target === weekendModal) {
            closeModal();
        }
        if (event.target === enrollmentModal) {
            closeEnrollmentModal();
        }
    }
    
    });