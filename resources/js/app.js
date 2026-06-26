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
        // Trik Kloning: Menggandakan elemen secara otomatis melalui JS
        // Kita kloning 3 kali agar sangat panjang dan aman untuk layar monitor Ultra-Wide
        const clone1 = group1.cloneNode(true);
        const clone2 = group1.cloneNode(true);
        const clone3 = group1.cloneNode(true);

        // Hapus ID pada hasil kloning agar HTML tetap valid (ID tidak boleh ganda)
        clone1.removeAttribute("id");
        clone2.removeAttribute("id");
        clone3.removeAttribute("id");

        // Masukkan hasil kloning ke dalam container di sebelah Grup 1
        marqueeInner.appendChild(clone1);
        marqueeInner.appendChild(clone2);
        marqueeInner.appendChild(clone3);

        let currentX = 0;
        let isPaused = false;

        // Atur Kecepatan Pergeseran (Bisa disesuaikan, 0.8 adalah standar halus)
        const speed = 0.8;

        function animate() {
            if (!isPaused) {
                currentX -= speed;

                // Ambil lebar pasti dari 1 grup logo (ditambah gap-20 yaitu 80px)
                const groupWidth = group1.offsetWidth + 80;

                // Reset posisi ke 0 tanpa jeda jika grup 1 sudah tergeser penuh
                if (Math.abs(currentX) >= groupWidth) {
                    currentX = 0;
                }

                // Eksekusi pergeseran menggunakan hardware GPU
                marqueeInner.style.transform = `translate3d(${currentX}px, 0, 0)`;
            }

            // Loop tanpa henti mengikuti refresh rate monitor
            requestAnimationFrame(animate);
        }

        // Fitur Pause saat kursor mouse menyorot logo
        marqueeInner.addEventListener("mouseenter", () => (isPaused = true));
        marqueeInner.addEventListener("mouseleave", () => (isPaused = false));

        // Jalankan animasi
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
