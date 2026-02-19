<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ url('assets/backend/images/logo-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ url('assets/backend/images/logo-dark.png') }}" alt="" height="26">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ url('assets/backend/images/logo-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ url('assets/backend/images/logo-light.png') }}" alt="" height="26">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

               

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.website.*') ? 'collapsed active' : '' }}" href="#websiteManage" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="bi bi-journal-medical"></i> <span data-key="t-webiste">Website</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('admin.website.*') ? 'show' : '' }}" id="websiteManage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.website.hero-banner.index') }}" class="nav-link {{ Route::is('admin.website.hero-banner.index') ? 'active' : '' }}" data-key="t-hero-banner" wire:navigate> Hero Banner </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.website.service-section.index') }}" class="nav-link {{ Route::is('admin.website.service-section.index') ? 'active' : '' }}" data-key="t-service-section" wire:navigate> Service Section </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.service.index') }}" class="nav-link {{ Route::is('admin.website.service.index') ? 'active' : '' }}" data-key="t-services" wire:navigate> Services </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.skill.index') }}" class="nav-link {{ Route::is('admin.website.skill.index') ? 'active' : '' }}" data-key="t-skills" wire:navigate> Skills </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.education.index') }}" class="nav-link {{ Route::is('admin.website.education.index') ? 'active' : '' }}" data-key="t-education" wire:navigate> Education </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.experience.index') }}" class="nav-link {{ Route::is('admin.website.experience.index') ? 'active' : '' }}" data-key="t-experience" wire:navigate> Experience </a>
                            </li>

                            <!-- Experience Section -->
                            <li class="nav-item">
                                <a href="{{ route('admin.website.experience-section.index') }}" class="nav-link {{ Route::is('admin.website.experience-section.index') ? 'active' : '' }}" data-key="t-experience-section" wire:navigate> Experience Section </a>
                            </li>

                            <!-- Partner Section -->
                            <li class="nav-item">
                                <a href="{{ route('admin.website.partner.index') }}" class="nav-link {{ Route::is('admin.website.partner.index') ? 'active' : '' }}" data-key="t-partner" wire:navigate> Partner </a>
                            </li>

                            <!-- about page -->
                            <li class="nav-item">
                                <a href="{{ route('admin.website.about.index') }}" class="nav-link {{ Route::is('admin.website.about.index') ? 'active' : '' }}" data-key="t-about" wire:navigate> About Page </a>
                            </li>

                            <!-- counter section -->
                            <li class="nav-item">
                                <a href="{{ route('admin.website.counter-section.index') }}" class="nav-link {{ Route::is('admin.website.counter-section.index') ? 'active' : '' }}" data-key="t-counter-section" wire:navigate> Counter Section </a>
                            </li>

                            <!-- counters management -->
                            <li class="nav-item">
                                <a href="{{ route('admin.website.counter.index') }}" class="nav-link {{ Route::is('admin.website.counter.*') ? 'active' : '' }}" data-key="t-counters" wire:navigate> Counters </a>
                            </li>

                            
                        </ul>
                    </div>
                </li>

                <!-- project management li group -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.projects.*') ? 'collapsed active' : '' }}" href="#projectManage" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="bi bi-briefcase"></i> <span data-key="t-projects">Projects</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('admin.projects.*') ? 'show' : '' }}" id="projectManage">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.projects.technology.index') }}" class="nav-link {{ Route::is('admin.projects.technology.*') ? 'active' : '' }}" data-key="t-technologies" wire:navigate> Technologies </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.projects.index') }}" class="nav-link {{ Route::is('admin.projects.*') ? 'active' : '' }}" data-key="t-projects" wire:navigate> Projects </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- post -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.posts.*') ? 'collapsed active' : '' }}" href="#postManage" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="bi bi-briefcase"></i> <span data-key="t-posts">Posts</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('admin.posts.*') ? 'show' : '' }}" id="postManage">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.category.index') }}" class="nav-link {{ Route::is('admin.posts.category.*') ? 'active' : '' }}" data-key="t-categories" wire:navigate> Categories </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ Route::is('admin.posts.*') ? 'active' : '' }}" data-key="t-posts" wire:navigate> Posts </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- pricing -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.pricing.*') ? 'active' : '' }}" href="{{ route('admin.pricing.index') }}" wire:navigate>
                        <i class="bi bi-currency-dollar"></i> <span data-key="t-pricing">Pricing</span>
                    </a>
                </li>

                <!-- testimonial -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.testimonial.*') ? 'active' : '' }}" href="{{ route('admin.testimonial.index') }}" wire:navigate>
                        <i class="bi bi-chat-quote"></i> <span data-key="t-testimonials">Testimonials</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>