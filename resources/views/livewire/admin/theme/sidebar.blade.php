<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box text-center">
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark" wire:navigate>
            <span class="logo-lg"><img src="{{ url('assets/backend/images/logo-dark.png') }}" alt="" height="26"></span>
        </a>
        <a href="{{ route('admin.dashboard') }}" class="logo logo-light" wire:navigate>
            <span class="logo-lg"><img src="{{ url('assets/backend/images/logo-light.png') }}" alt="" height="26"></span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span>Overview</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-grid-fill"></i> <span>Dashboard</span>
                    </a>
                </li>

                <!-- CATEGORY 1: IDENTITY -->
                <li class="menu-title"><span>Identity</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.website.hero-banner.index') }}" class="nav-link menu-link {{ Route::is('admin.website.hero-banner.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-window-fullscreen"></i> <span>Hero Banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.website.about.index') }}" class="nav-link menu-link {{ Route::is('admin.website.about.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-person-badge"></i> <span>About Me</span>
                    </a>
                </li>

                <!-- CATEGORY 2: PROFESSIONAL PROFILE (RESUME) -->
                <li class="menu-title"><span>Professional Profile</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.website.skill.index') || Route::is('admin.website.education.index') || Route::is('admin.website.experience.index') || Route::is('admin.website.experience-section.index') ? 'active' : 'collapsed' }}" href="#resumeManage" data-bs-toggle="collapse" role="button">
                        <i class="bi bi-file-earmark-person"></i> <span>Resume / CV</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('admin.website.skill.index') || Route::is('admin.website.education.index') || Route::is('admin.website.experience.index') || Route::is('admin.website.experience-section.index') ? 'show' : '' }}" id="resumeManage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.website.experience-section.index') }}" class="nav-link {{ Route::is('admin.website.experience-section.index') ? 'active' : '' }}" wire:navigate>Section Header</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.skill.index') }}" class="nav-link {{ Route::is('admin.website.skill.index') ? 'active' : '' }}" wire:navigate>My Skills</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.education.index') }}" class="nav-link {{ Route::is('admin.website.education.index') ? 'active' : '' }}" wire:navigate>Education History</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.website.experience.index') }}" class="nav-link {{ Route::is('admin.website.experience.index') ? 'active' : '' }}" wire:navigate>Work Experience</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- CATEGORY 3: WORK -->
                <li class="menu-title"><span>Work & Portfolio</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.projects.*') ? 'active' : 'collapsed' }}" href="#projectManage" data-bs-toggle="collapse" role="button">
                        <i class="bi bi-briefcase-fill"></i> <span>Portfolio</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('admin.projects.*') ? 'show' : '' }}" id="projectManage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.projects.portfolio-header.index') }}" class="nav-link {{ Route::is('admin.projects.portfolio-header.index') ? 'active' : '' }}" wire:navigate>Section Header</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.projects.technology.index') }}" class="nav-link {{ Route::is('admin.projects.technology.index') ? 'active' : '' }}" wire:navigate>Technologies</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.projects.index') }}" class="nav-link {{ Route::is('admin.projects.index') ? 'active' : '' }}" wire:navigate>Project List</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- CATEGORY 4: BUSINESS -->
                <li class="menu-title"><span>Business</span></li>
                <!-- service section header -->
                <li class="nav-item">
                    <a href="{{ route('admin.website.service-section.index') }}" class="nav-link {{ Route::is('admin.website.service-section.index') ? 'active' : '' }}" wire:navigate>Service Header</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.website.service.index') }}" class="nav-link menu-link {{ Route::is('admin.website.service.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-gear-wide-connected"></i> <span>Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.website.pricing.index') }}" class="nav-link menu-link {{ Route::is('admin.website.pricing.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-tags-fill"></i> <span>Pricing Plans</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.website.partner.index') }}" class="nav-link menu-link {{ Route::is('admin.website.partner.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-people-fill"></i> <span>Partners / Clients</span>
                    </a>
                </li>

                <!-- CATEGORY 5: CONTENT -->
                <li class="menu-title"><span>Articles</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.posts.*') ? 'active' : 'collapsed' }}" href="#postManage" data-bs-toggle="collapse" role="button">
                        <i class="bi bi-journal-text"></i> <span>Blog Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('admin.posts.*') ? 'show' : '' }}" id="postManage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.blog-header.index') }}" class="nav-link {{ Route::is('admin.posts.blog-header.index') ? 'active' : '' }}" wire:navigate>Blog Header</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.category.index') }}" class="nav-link {{ Route::is('admin.posts.category.index') ? 'active' : '' }}" wire:navigate>Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ Route::is('admin.posts.index') ? 'active' : '' }}" wire:navigate>All Posts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- CATEGORY 6: REVIEWS -->
                <li class="menu-title"><span>Social Proof</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.testimonial.index') }}" class="nav-link menu-link {{ Route::is('admin.testimonial.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-chat-heart-fill"></i> <span>Testimonials</span>
                    </a>
                </li>

                <!-- CATEGORY 7: EXTRAS -->
                <li class="menu-title"><span>Site Stats</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.website.counter.index') }}" class="nav-link menu-link {{ Route::is('admin.website.counter.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-bar-chart-fill"></i> <span>Counters / Metrics</span>
                    </a>
                </li>

                <!-- CATEGORY 8: SETTINGS -->
                <li class="menu-title"><span>Settings</span></li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link menu-link {{ Route::is('admin.settings.index') ? 'active' : '' }}" wire:navigate>
                        <i class="bi bi-gear-fill"></i> <span>Site Settings</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>