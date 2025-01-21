@php
    $settings = settings();
@endphp

<nav class="side-bar">
    <div class="side-bar-logo">
        <a href="javascript:void(0)">
            <img src="{{ asset($settings->icon ?? '') }}" alt="MAANEWS icon" class="brand-image img-circle elevation-3">
        </a>
    </div>

    <div class="side-bar-manu">
        <ul>

            @can('dashboard-read')
            <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="active">

                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/dashboard.svg') }}">
                    </span>

                    {{ __('Dashboard') }}
                </a>
            </li>
            @endcan

            @canany(['users-read'])
                <li
                class="dropdown {{ Request::routeIs('admin.user','admin.user.create','admin.user.edit','admin.subscriber') ? 'active' : '' }}">
                <a href="#">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/staff.svg') }}">
                    </span>
                    {{ __('User Manage') }}
                </a>
                <ul>
                    @can('users-read')
                    <li>
                        <a href="{{ route('admin.user') }}" class="{{ Request::routeIs('admin.user','admin.user.create','admin.user.edit') ? 'active' : '' }}">
                            {{ __('User List') }}
                        </a>
                    </li>
                    @endcan

                    @can('users-read')
                    <li>
                        <a href="{{ route('admin.subscriber') }}" class="{{ Request::routeIs('admin.subscriber') ? 'active' : '' }}">
                        {{ __('Subscriber List') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany(['categories-read', 'sub-categories-read', 'news-read'])
                <li
                class="dropdown {{ Request::routeIs('admin.news.category') || Request::routeIs('admin.news.subcategory') || Request::routeIs('admin.news.speciality') || Request::routeIs('admin.news') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') ? 'active' : '' }}">
                <a href="#"
                    class="{{ Request::routeIs('admin.news.category') || Request::routeIs('admin.news.subcategory') || Request::routeIs('admin.news.speciality') || Request::routeIs('admin.news') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/news.svg') }}">
                    </span>
                        {{ __('News Manage') }}
                </a>
                <ul>
                    @can('categories-read')
                    <li>
                        <a href="{{ route('admin.news.category') }}" class="{{ Request::routeIs('admin.news.category') ? 'active' : '' }}">
                            {{ __('News Category') }}
                        </a>
                    </li>
                    @endcan
                    @can('sub-categories-read')
                    <li>
                        <a href="{{ route('admin.news.subcategory') }}" class="{{ Request::routeIs('admin.news.subcategory') ? 'active' : '' }}">
                            {{ __('News Sub-Category') }}
                        </a>
                    </li>
                    @endcan
                    @can('specialities-read')
                    <li>
                        <a href="{{ route('admin.news.speciality') }}" class="{{ Request::routeIs('admin.news.speciality') ? 'active' : '' }}">
                            {{ __('News Speciality') }}
                        </a>
                    </li>
                    @endcan
                    @can('news-read')
                    <li>
                        <a href="{{ route('admin.news') }}" class="{{ Request::routeIs('admin.news') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') ? 'active' : '' }}">
                            {{ __('All News') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @canany(['photos-read', 'videos-read'])
                <li
                class="dropdown {{ Request::routeIs('admin.photogalleries.index') || Request::routeIs('admin.photogalleries.edit') || Request::routeIs('admin.videogallery') || Request::routeIs('admin.videogallery.create') || Request::routeIs('admin.videogallery.edit') ? 'active' : '' }}">
                <a href="#"
                    class="{{ Request::routeIs('admin.photo-gallaries.index') || Request::routeIs('admin.photo-gallaries.edit') || Request::routeIs('admin.videogallery') || Request::routeIs('admin.videogallery.create') || Request::routeIs('admin.videogallery.edit') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/media.svg') }}">
                    </span>
                        {{ __('Media') }}
                </a>
                <ul>
                    @can('photos-read')
                    <li>
                        <a href="{{ route('admin.photogalleries.index') }}" class="{{ Request::routeIs('admin.photogalleries.index') ? 'active' : '' }}">
                            {{ __('Photo Gallery') }}
                        </a>
                    </li>
                    @endcan
                    @can('videos-read')
                    <li>
                        <a href="{{ route('admin.videogallery') }}" class="{{ Request::routeIs('admin.videogallery') || Request::routeIs('admin.videogallery.create') || Request::routeIs('admin.videogallery.edit') ? 'active' : '' }}">
                            {{ __('Video Gallery') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany(['blogs-read', 'blog-categories-read', 'blog-sub-categories-read'])
                <li
                class="dropdown {{ Request::routeIs('admin.blog.category') || Request::routeIs('admin.blog.subcategory') || Request::routeIs('admin.blog') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') ? 'active' : '' }}">
                <a href="#"
                    class="{{ Request::routeIs('admin.blog.category') || Request::routeIs('admin.blog.subcategory') || Request::routeIs('admin.blog') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/blog.svg') }}">
                    </span>
                        {{ __('Blog Manage') }}
                </a>
                <ul>
                    @can('blog-categories-read')
                    <li>
                        <a href="{{ route('admin.blog.category') }}" class="{{ Request::routeIs('admin.blog.category') ? 'active' : '' }}">
                            {{ __('Blog Category') }}
                        </a>
                    </li>
                    @endcan
                    @can('blog-sub-categories-read')
                    <li>
                        <a href="{{ route('admin.blog.subcategory') }}" class="{{ Request::routeIs('admin.blog.subcategory') ? 'active' : '' }}">
                            {{ __('Blog Sub-Category') }}
                        </a>
                    </li>
                    @endcan
                    @can('blogs-read')
                    <li>
                        <a href="{{ route('admin.blog') }}" class="{{ Request::routeIs('admin.blog') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') ? 'active' : '' }}">
                            {{ __('Blog List') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- @canany(['repoters-read'])
            <li
                class="dropdown {{ Request::routeIs('admin.reporter') || Request::routeIs('admin.reporter.create') || Request::routeIs('admin.reporter.edit') ? 'active' : '' }}">
                <a href="#"
                    class="{{ Request::routeIs('admin.reporter') || Request::routeIs('admin.reporter.create') || Request::routeIs('admin.reporter.edit') ? 'active' : '' }}">

                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/news-report.svg') }}">
                    </span>
                        {{ __('News Reporters') }}
                </a>
                <ul>
                    @can('repoters-read')
                    <li>
                        <a href="{{ route('admin.reporter') }}" class="{{ Request::routeIs('admin.reporter') || Request::routeIs('admin.reporter.create') || Request::routeIs('admin.reporter.edit') ? 'active' : '' }}">
                            {{ __('All Reporters') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany --}}
            @can('contact-read')
            <li class="dropdown {{ Request::routeIs('admin.contact') ? 'active' : '' }}">
                <a href="#" class="{{ Request::routeIs('admin.contact') ? 'active' : '' }}">

                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/contact.svg') }}">
                    </span>
                        {{ __('Contact Manage') }}
                </a>
                <ul>
                    @can('contact-read')
                    <li>
                        <a href="{{ route('admin.contact') }}" class="{{ Request::routeIs('admin.contact') ? 'active' : '' }}">
                            {{ __('Contact Info') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan


            @canany(['manage-pages-read'])
            <li class="dropdown {{ Request::routeIs('admin.website-settings.index', 'admin.header.index','admin.header.create','admin.header.edit', 'admin.footer.index','admin.footer.create','admin.footer.edit', 'admin.seo.index', 'admin.social.index','admin.seo.index') ? 'active' : '' }}">
                <a href="#" class="{{ Request::routeIs('admin.website-settings.index') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/cms.svg') }}">
                    </span>
                    {{ __('CMS Manage') }}
                </a>
                <ul>
                    {{-- @can('headers-read')
                    <li>
                        <a href="{{ route('admin.header.index') }}" class="{{ Request::routeIs('admin.header.index') ? 'active' : '' }}">
                            {{ __('Header') }}
                        </a>
                    </li>
                    @endcan
                    @can('footers-read')
                    <li>
                        <a href="{{ route('admin.footer.index') }}" class="{{ Request::routeIs('admin.footer.index','admin.footer.create','admin.footer.edit') ? 'active' : '' }}">
                            {{ __('Footer') }}
                        </a>
                    </li>
                    @endcan --}}
                    @can('manage-pages-read')
                    <li>
                        <a href="{{ route('admin.website-settings.index') }}" class="{{ Request::routeIs('admin.website-settings.index') ? 'active' : '' }}">
                            {{ __('Manage Page') }}
                        </a>
                    </li>
                    @endcan
                    @can('seo-read')
                    <li>
                        <a href="{{ route('admin.seo.index') }}" class="{{ Request::routeIs('admin.seo.index', 'admin.seo.create', 'admin.seo.edit') ? 'active' : '' }}">
                            {{ __('SEO Report') }}
                        </a>
                    </li>
                    @endcan
                    @canany(['socials-read'])
                    <li>
                        <a href="{{ route('admin.social.index') }}" class="{{ Request::routeIs('admin.social.index') ? 'active' : '' }}">
                            {{ __('Social Share') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany('ads-read')
            <li class="dropdown {{ Request::routeIs('admin.ads.index') ? 'active' : '' }}">
                <a href="#" class="{{ Request::routeIs('admin.ads.index') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/ads.svg') }}">
                    </span>
                    {{ __('Ads Manage') }}
                </a>
                <ul>
                    @can('ads-read')
                    <li>
                        <a href="{{ route('admin.ads.index') }}"
                            class="{{ Request::routeIs('admin.ads.index') ? 'active' : '' }}">
                            {{ __('Ads Settings') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany(['roles-read', 'permissions-read'])
            <li class="dropdown {{ Request::routeIs('admin.roles.index', 'admin.roles.create', 'admin.roles.edit', 'admin.permissions.index') ? 'active' : '' }}">
                <a href="#">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/role.svg') }}">
                    </span>
                    {{__('Roles & Permissions')}}
                </a>
                <ul>
                    @can('roles-read')
                    <li>
                        <a class="{{ Request::routeIs('admin.roles.index', 'admin.roles.create', 'admin.roles.edit') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                            {{__('Roles')}}
                        </a>
                    </li>
                    @endcan

                    @can('permissions-read')
                    <li>
                        <a class="{{ Request::routeIs('admin.permissions.index') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
                            {{ __('Permissions') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany(['settings-read', 'notifications-read', 'site-settings-read', 'company-settings-read','login-pages-read'])
            <li class="dropdown {{ Request::routeIs('admin.settings.index', 'admin.company.index', 'admin.theme.index', 'admin.theme.color', 'admin.notifications.index', 'admin.system-settings.index', 'admin.settings.index','admin.settings.localization','admin.login-pages.index') ? 'active' : '' }}">
                <a href="#"
                    class="{{ Request::routeIs('admin.settings.index', 'admin.company.index', 'admin.theme.index', 'admin.theme.color', 'admin.notifications.index', 'admin.system-settings.index', 'admin.settings.index','admin.settings.localization') ? 'active' : '' }}">

                    <span class="sidebar-icon">
                        <img src="{{ asset('assets/sidebar-icon/setting.svg') }}">
                    </span>

                     {{ __('Settings') }}
                </a>
                <ul>
                    @can('site-settings-read')
                    <li>
                        <a href="{{ route('admin.settings.index') }}"
                            class="{{ Request::routeIs('admin.settings.index') ? 'active' : '' }}">
                           {{ __('Site Settings') }}
                        </a>
                    </li>
                    @endcan

                    @can('company-settings-read')
                    <li>
                        <a href="{{ route('admin.company.index') }}"
                            class="{{ Request::routeIs('admin.company.index') ? 'active' : '' }}">
                           {{ __('Company Info') }}
                        </a>
                    </li>
                    @endcan
                    {{-- <li>
                        <a href="{{ route('admin.theme.index') }}"
                            class="{{ Request::routeIs('admin.theme.index') ? 'active' : '' }}">
                           {{ __('Theme Settings') }}
                        </a>
                    </li> --}}
                    <li class="new-added">
                        <a href="{{ route('admin.theme.color') }}"
                            class="{{ Request::routeIs('admin.theme.color') ? 'active' : '' }}">
                            {{ __('Theme Color') }}
                        </a>

                    </li>
                    @can('notifications-read')
                    <li>
                        <a class="{{ Request::routeIs('admin.notifications.index') ? 'active' : '' }}" href="{{ route('admin.notifications.index') }}">
                            {{ __('Notifications') }}
                        </a>
                    </li>
                    @endcan
                    @can('settings-read')
                    <li>
                        <a class="{{ Request::routeIs('admin.system-settings.index') ? 'active' : '' }}" href="{{ route('admin.system-settings.index') }}">{{__('System Settings')}}</a>
                    </li>
                    @endcan

                    @can('login-pages-read')
                    <li>
                        <a class="{{ Request::routeIs('admin.login-pages.index') ? 'active' : '' }}" href="{{ route('admin.login-pages.index') }}">{{ __('Login Page Settings') }}</a>
                    </li>
                    @endcan

                </ul>
             </li>
            @endcanany
        </ul>
    </div>
</nav>
