<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="/img/haisstis.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-[#F5F7FA]">
    @include('header')

    <!-- Welcome -->
    <div class="relative overflow-hidden h-[450px]">
        <img src="/img/homebg.png" alt="Background" class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 flex items-center px-4 text-white">
            <span class="text-[#343C6A] text-[50px] font-bold absolute left-[125px]">SALAM HANGAT<br>SEDULUR
                64C!</span>
            <img src="/img/haisstis.png" alt="Logo" class="absolute right-[125px] w-[200px] h-[200px]">
        </div>
    </div>

    <!-- Quote -->
    <div class="text-center text-[#343C6A] text-[20px] font-semibold mt-5 mb-2 mx-[100px]">
        Once a brother, always a brother, no matter the distance, no matter the difference, and no matter the issue.
    </div>
    <div class="text-center text-[#343C6A] text-[15px] mb-5">
        - Byron Pulsifer -
    </div>

    <!-- Gallery -->
    <div class="bg-[#343C6A] w-full py-5 flex items-center justify-center">
        <!-- Right Arrow -->
        <button id="right-arrow" class="text-white mx-4">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 1.414L9.414 10l4.293 4.293a1 1 0 01-1.414 1.414l-5-5a1 1 0 010-1.414l5-5z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <!-- Photos -->
        <div id="photo-container" class="flex space-x-4">
            <img src="/img/gedungdrone.jpeg" alt="Photo 1"
                class="w-[200px] h-[150px] object-cover rounded-lg cursor-pointer">
            <img src="/img/perpus.jpeg" alt="Photo 2"
                class="w-[200px] h-[150px] object-cover rounded-lg cursor-pointer">
            <img src="/img/maskam.jpeg" alt="Photo 3"
                class="w-[200px] h-[150px] object-cover rounded-lg cursor-pointer">
            <img src="/img/pohonkantin.jpeg" alt="Photo 2"
                class="w-[200px] h-[150px] object-cover rounded-lg cursor-pointer">
            <img src="/img/bicorner.jpeg" alt="Photo 3"
                class="w-[200px] h-[150px] object-cover rounded-lg cursor-pointer">
        </div>

        <!-- Left Arrow -->
        <button id="left-arrow" class="text-white mx-4">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.707 14.707a1 1 0 01-1.414-1.414L10.586 10 6.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

    <!-- Modal -->
    <div id="image-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden">
        <img id="modal-image" class="w-auto h-[75vh]">
    </div>

    @include('berita')
    @include('footer')
    
    <script>
        const photos = [
            '/img/gedungdrone.jpeg',
            '/img/perpus.jpeg',
            '/img/maskam.jpeg',
            '/img/pohonkantin.jpeg',
            '/img/bicorner.jpeg',
            '/img/gedung1.jpg',
            '/img/pohondepan.jpeg'
        ];

        let startIndex = 0;

        const photoContainer = document.getElementById('photo-container');
        const imageModal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');

        function updatePhotos() {
            photoContainer.innerHTML = '';
            for (let i = 0; i < 5; i++) {
                const img = document.createElement('img');
                img.src = photos[(startIndex + i) % photos.length];
                img.alt = `Photo ${(startIndex + i) % photos.length + 1}`;
                img.className = 'w-[200px] h-[150px] object-cover rounded-lg cursor-pointer';
                img.addEventListener('click', () => {
                    displayImage(img.src);
                });
                photoContainer.appendChild(img);
            }
        }

        document.getElementById('right-arrow').addEventListener('click', () => {
            startIndex = (startIndex - 1 + photos.length) % photos.length;
            updatePhotos();
        });

        document.getElementById('left-arrow').addEventListener('click', () => {
            startIndex = (startIndex + 1) % photos.length;
            updatePhotos();
        });

        function displayImage(src) {
            modalImage.src = src;
            imageModal.classList.remove('hidden');
        }

        imageModal.addEventListener('click', (e) => {
            if (e.target === imageModal) {
                imageModal.classList.add('hidden');
            }
        });

        updatePhotos();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
