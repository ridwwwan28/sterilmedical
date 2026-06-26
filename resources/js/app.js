// Fungsi script navbar agar muncul background ketika di scroll
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
        // Jika di-scroll lebih dari 50px dari atas
        if (window.scrollY > 50) {
            // Hapus background transparan
            navbar.classList.remove("lg:bg-transparent");
            // Tambahkan bg-white dengan opacity 80% (bg-white/80)
            // Ditambah backdrop-blur-md dan shadow-sm agar tampilannya lebih rapi (opsional)
            navbar.classList.add(
                "lg:bg-white/80",
                "lg:backdrop-blur-md",
                "lg:shadow-sm",
            );
        } else {
            // Kembalikan ke posisi awal saat ada di paling atas
            navbar.classList.add("lg:bg-transparent");
            navbar.classList.remove(
                "lg:bg-white/80",
                "lg:backdrop-blur-md",
                "lg:shadow-sm",
            );
        }
    });
});

// Muncul menu hamburger
document.addEventListener("DOMContentLoaded", function () {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    if (hamburgerBtn && mobileMenu) {
        hamburgerBtn.addEventListener("click", function () {
            // Melakukan toggle (buka-tutup) kelas 'hidden' pada menu mobile
            mobileMenu.classList.toggle("hidden");
        });

        // Opsional: Menutup menu otomatis jika user melakukan klik di luar area menu
        document.addEventListener("click", function (event) {
            const isClickInside =
                hamburgerBtn.contains(event.target) ||
                mobileMenu.contains(event.target);
            if (!isClickInside) {
                mobileMenu.classList.add("hidden");
            }
        });
    }
});

// Fungsi scroll brand story
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("timelineContainer");
    const slideLeft = document.getElementById("slideLeft");
    const slideRight = document.getElementById("slideRight");

    // Jarak geser setiap klik tombol
    const scrollAmount = 320;

    if (slideLeft && slideRight && container) {
        // Fungsi untuk mengatur kapan tombol muncul/hilang
        function handleButtonVisibility() {
            // Sembunyikan tombol kiri jika posisi scroll ada di 0 (paling kiri)
            if (container.scrollLeft <= 0) {
                slideLeft.style.display = "none";
            } else {
                slideLeft.style.display = "flex"; // Gunakan flex karena awalnya class tombol pakai flex
            }

            // Sembunyikan tombol kanan jika sudah mentok kanan
            // Math.ceil() digunakan untuk membulatkan desimal agar akurat di semua browser
            if (
                Math.ceil(container.scrollLeft + container.clientWidth) >=
                container.scrollWidth - 1
            ) {
                slideRight.style.display = "none";
            } else {
                slideRight.style.display = "flex";
            }
        }

        // 1. Jalankan fungsi pengecekan pertama kali saat halaman baru dimuat
        // Ini akan langsung menyembunyikan tombol kiri di awal
        handleButtonVisibility();

        // 2. Jalankan fungsi setiap kali kotak di-scroll (baik pakai tombol atau di-swipe jari)
        container.addEventListener("scroll", function () {
            handleButtonVisibility();
        });

        // 3. Fungsi klik tombol geser
        slideLeft.addEventListener("click", function () {
            container.scrollBy({
                left: -scrollAmount,
                behavior: "smooth",
            });
        });

        slideRight.addEventListener("click", function () {
            container.scrollBy({
                left: scrollAmount,
                behavior: "smooth",
            });
        });
    }
});

//Slide Brand Kerjasama di menu Quality
document.addEventListener("DOMContentLoaded", function () {
    const marqueeInner = document.getElementById("marqueeInner");
    const group1 = document.getElementById("group1");

    if (marqueeInner && group1) {
        let currentX = 0;
        let isPaused = false;

        // Atur Kecepatan Pergeseran (Semakin besar angkanya, semakin cepat jalannya)
        // Nilai 0.75 - 1.0 biasanya sangat ideal dan pas di mata
        const speed = 0.8;

        function animate() {
            if (!isPaused) {
                // Kurangi posisi X secara konstan agar bergeser ke kiri
                currentX -= speed;

                // Ambil lebar pasti dari 1 grup logo (termasuk gap-nya jika ada)
                const groupWidth = group1.offsetWidth + 80; // 80px berasal dari gap-20 Tailwind

                // Jika Grup 1 sudah bergeser keluar layar seutuhnya, reset posisi ke 0 tanpa jeda
                if (Math.abs(currentX) >= groupWidth) {
                    currentX = 0;
                }

                // Eksekusi pergeseran menggunakan translate3d agar dibantu hardware GPU
                marqueeInner.style.transform = `translate3d(${currentX}px, 0, 0)`;
            }

            // Panggil fungsi secara rekursif mengikuti sistem refresh rate browser
            requestAnimationFrame(animate);
        }

        // Fitur Pause saat mouse diarahkan ke area logo (hover)
        marqueeInner.addEventListener("mouseenter", () => (isPaused = true));
        marqueeInner.addEventListener("mouseleave", () => (isPaused = false));

        // Jalankan animasi pertama kali
        requestAnimationFrame(animate);
    }
});

// Fungsi Filter select produk
document.addEventListener("DOMContentLoaded", function () {
    const categoryFilter = document.getElementById("categoryFilter");
    // Mengambil semua elemen yang memiliki class 'product-item'
    const productItems = document.querySelectorAll(".product-item");

    if (categoryFilter && productItems.length > 0) {
        function applyFilter() {
            const selectedCategory = categoryFilter.value.toLowerCase();

            productItems.forEach((item) => {
                const itemCategory = item
                    .getAttribute("data-category")
                    .toLowerCase();
                if (
                    selectedCategory === "all" ||
                    itemCategory === selectedCategory
                ) {
                    item.classList.remove("hidden");
                } else {
                    item.classList.add("hidden");
                }
            });
        }

        // CEK PARAMETER URL
        const urlParams = new URLSearchParams(window.location.search);
        const categoryFromUrl = urlParams.get("category");

        if (categoryFromUrl) {
            // Cari <option> yang value-nya cocok dengan tulisan di URL
            const options = Array.from(categoryFilter.options);
            const matchingOption = options.find(
                (opt) =>
                    opt.value.toLowerCase() === categoryFromUrl.toLowerCase(),
            );

            if (matchingOption) {
                // Ubah tampilan Dropdown select agar sesuai
                categoryFilter.value = matchingOption.value;
            }
        }

        // Jalankan filter setelah kategori di klik dari home
        applyFilter();

        // Jalankan filter jika user mengganti kategori secara manual lewat Dropdown
        categoryFilter.addEventListener("change", applyFilter);
    }
});
