
<nav class="fixed bottom-0 left-0 right-0 bg-gradient-to-r from-indigo-600 to-purple-600 p-4 flex justify-between shadow-xl-custom rounded-tl-3xl rounded-tr-3xl z-50">
    <a id="home-link" href="/dashboard" class="flex flex-col {{request()->path() == 'dashboard' ? 'active-nav-btn' : ''}} items-center text-white inactive-nav-btn">
        <span class="material-icons text-2xl">home</span>
        <span class="text-xs mt-1">Home</span>
    </a>
    <a id="calendar-link" href="/calender" class="flex flex-col {{request()->path() == 'calender' ? 'active-nav-btn' : ''}} items-center text-white inactive-nav-btn">
        <span class="material-icons text-2xl">
            history
            </span>
        <span class="text-xs mt-1">History</span>
    </a>
    <a id="camera-link" href="/presensi/create" class="flex flex-col {{request()->path() == 'presensi/create' ? 'active-nav-btn' : ''}} items-center text-white inactive-nav-btn">
        <span class="material-icons text-2xl">camera_alt</span>
        <span class="text-xs mt-1">Camera</span>
    </a>
    <a id="docs-link" href="/dashboard#" class="flex flex-col {{request()->path() == 'dashboard#' ? 'active-nav-btn' : ''}} items-center text-white inactive-nav-btn">
        <span class="material-icons text-2xl">description</span>
        <span class="text-xs mt-1">Izin</span>
    </a>
    <a id="settings-link" href="/editprofile" class="flex flex-col items-center text-white inactive-nav-btn">
        <span class="material-icons text-2xl">people</span>
        <span class="text-xs mt-1">Profile</span>
    </a>
</nav>
