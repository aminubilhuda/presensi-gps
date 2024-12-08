<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
{{-- webcam --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Base Js File -->
<script src="{{ asset('templates/assets_k/js/base.js') }}"></script>

{{-- ionicons --}}
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    // Fungsi untuk mengubah tab yang aktif
    function switchTab(tabName) {
            // Menyembunyikan semua konten tab
            const allTabs = document.querySelectorAll('.tab-content');
            allTabs.forEach(tab => tab.classList.add('hidden'));

            // Menampilkan tab yang dipilih
            const selectedTab = document.getElementById(tabName);
            selectedTab.classList.remove('hidden');

            // Menonaktifkan semua tombol tab
            const allTabButtons = document.querySelectorAll('.tab-btn');
            allTabButtons.forEach(button => {
                button.classList.remove('tab-btn-active');  // Menghapus kelas aktif
                button.classList.add('tab-btn-inactive');  // Menambahkan kelas tidak aktif
            });

            // Menambahkan kelas aktif pada tombol yang dipilih
            const activeButton = document.getElementById(`${tabName}-tab`);
            activeButton.classList.add('tab-btn-active');  // Menambahkan border biru pada tab aktif
            activeButton.classList.remove('tab-btn-inactive');  // Menghapus kelas tidak aktif
        }

        // Menginisialisasi dengan tab 'leaderboard' yang aktif
        switchTab('data-absen');


        // Fungsi untuk mengatur tab yang aktif pada navigasi bawah
        function setActiveTab(tabId) {
            const tabs = ['dashboard', 'calendar', 'camera', 'docs', 'settings'];

            // Menghapus kelas 'active-nav-btn' dari semua link
            tabs.forEach(tab => {
                document.getElementById(tab + '-link').classList.remove('active-nav-btn');
                document.getElementById(tab + '-link').classList.add('inactive-nav-btn');
            });

            // Menambahkan kelas 'active-nav-btn' pada link yang dipilih
            document.getElementById(tabId + '-link').classList.add('active-nav-btn');
            document.getElementById(tabId + '-link').classList.remove('inactive-nav-btn');
        }

        // Menginisialisasi dengan tab 'home' yang aktif
        setActiveTab('home');

</script>

<script>
 function previewImage(event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      
      reader.onload = function() {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = reader.result;
        imagePreview.classList.remove('hidden'); // Show the image
      };
      
      if (file) {
        reader.readAsDataURL(file);
      }
    }
  </script>
@stack('myscrip')
