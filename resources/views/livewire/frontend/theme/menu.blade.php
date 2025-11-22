<ul class="tmp-mainmenu">
    <li>
        <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}" wire:navigate>Home</a>
    </li>
    <li>
        <a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}" wire:navigate>About</a>
    </li>
    <li>
        <a href="{{ route('service') }}" class="{{ Route::is('service') ? 'active' : '' }}" wire:navigate>Services</a>
    </li>
    <li>
        <a href="{{ route('project') }}" class="{{ Route::is('project') ? 'active' : '' }}" wire:navigate>Project</a>
    </li>
    <li>
        <a href="{{ route('blog') }}" class="{{ Route::is('blog') ? 'active' : '' }}" wire:navigate>Blog </a>
    </li>
    <li>
        <a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'active' : '' }}" wire:navigate>Contact</a>
    </li>
</ul>