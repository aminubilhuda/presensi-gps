<footer>

    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t flex justify-between items-center px-6 py-2 mb-[-5px]">
        <a id="home-link" href="/dashboard" class="flex flex-col items-center gap-1 text-gray-600 {{request()->path() == 'dashboard' ? 'active-nav-btn' : ''}} inactive-nav-btn">
            <span class="material-icons text-2xl">home</span>
            <span class="text-xs">Home</span>
        </a>
        <a id="calendar-link" href="/history" class="flex flex-col items-center gap-1 text-gray-600 {{request()->path() == 'history' ? 'active-nav-btn' : ''}} inactive-nav-btn">
            <span class="material-icons text-2xl">history</span>
            <span class="text-xs">History</span>
        </a>
        <a id="camera-link" href="/presensi/create" class="flex flex-col items-center gap-1 bg-[#2196f3] rounded-full h-14 w-14 -mt-4 {{request()->path() == 'presensi/create' ? 'active-nav-btn-camera' : ''}} inactive-nav-btn">
            <span class="material-icons text-2xl mt-3">camera_alt</span>
        </a>
        <a id="docs-link" href="/dashboard#" class="flex flex-col items-center gap-1 text-gray-600 {{request()->path() == 'dashboard#' ? 'active-nav-btn' : ''}} inactive-nav-btn">
            <span class="material-icons text-2xl">description</span>
            <span class="text-xs">Docs</span>
        </a>
        <a id="settings-link" href="/setting" class="flex flex-col items-center gap-1 text-gray-600 {{request()->path() == 'setting' ? 'active-nav-btn' : ''}} inactive-nav-btn">
            <span class="material-icons text-2xl">settings</span>
            <span class="text-xs">Setting</span>
        </a>
    </nav>
    
</footer>