<a href="#" class="floating-action-button" id="cameraButton">
    <i class="fas fa-camera"></i>
</a>



<nav class="bottom-nav">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-2 text-center">
                <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}" data-name="home">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
            <div class="col-2 text-center">
                <a href="#" class="nav-link" data-name="calendar">
                    <i class="fas fa-calendar"></i>
                    <span>Calendar</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
            <div class="col-2 text-center">
                <!-- Empty space for the floating action button -->
            </div>
            <div class="col-2 text-center">
                <a href="#" class="nav-link" data-name="docs">
                    <i class="fas fa-file-alt"></i>
                    <span>Docs</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
            <div class="col-2 text-center">
                <a href="#" class="nav-link" data-name="profile">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
        </div>
    </div>
</nav>
