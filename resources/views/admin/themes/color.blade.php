@extends('layouts.master')

@section('title')
    {{ __('Theme Color') }}
@endsection

@section('main_content')
    <div class="erp-table-section min-vh-100">
        <div class="container-fluid">
            <div class="color-grid">
                <label class="color-items {{ optional($settings)->theme_color == 'theme-violet' ? 'active' : '' }}" id="color-violet" data-id="color-violet" data-color="theme-violet"
                    data-colortext="Violet">
                    <input type="radio" name="radio" class="d-none" @if (optional($settings)->theme_color == 'theme-violet') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box violet"></span>
                        <span class="color-name">{{ __('Violet') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-brown' ? 'active' : '' }}" id="color-brown" data-id="color-brown" data-color="theme-brown"
                    data-colortext="Brown">
                    <input type="radio" name="radio" class="d-none" @if ($settings->theme_color == 'theme-brown') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box brown"></span>
                        <span class="color-name">{{ __('Brown') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-blue' ? 'active' : '' }}" id="color-blue" data-id="color-blue" data-color="theme-blue"
                    data-colortext="Blue">
                    <input type="radio" name="radio" class="d-none" @if ($settings->theme_color == 'theme-blue') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box blue"></span>
                        <span class="color-name">{{ __('Blue') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-magenta' ? 'active' : '' }}" id="color-magenta" data-id="color-magenta" data-color="theme-magenta"
                    data-colortext="Magenta">
                    <input type="radio" name="radio" class="d-none" @if ($settings->theme_color == 'theme-magenta') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box magenta"></span>
                        <span class="color-name">{{ __('magenta') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-green' ? 'active' : '' }}" id="color-green" data-id="color-green" data-color="theme-green"
                    data-colortext="Green">
                    <input type="radio" name="radio" class="d-none"@if ($settings->theme_color == 'theme-green') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box green"></span>
                        <span class="color-name">{{ __('green') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-orange' ? 'active' : '' }}" id="color-orange" data-id="color-orange" data-color="theme-orange"
                    data-colortext=Orange">
                    <input type="radio" name="radio" class="d-none"@if ($settings->theme_color == 'theme-orange') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box orange"></span>
                        <span class="color-name">{{ __('orange') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-pink' ? 'active' : '' }}" id="color-pink" data-id="color-pink" data-color="theme-pink"
                    data-colortext="Pink">
                    <input type="radio" name="radio" class="d-none"@if ($settings->theme_color == 'theme-pink') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box pink"></span>
                        <span class="color-name">{{ __('pink') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-dark' ? 'active' : '' }}" id="color-dark" data-id="color-dark" data-color="theme-dark"
                    data-colortext="Dark">
                    <input type="radio" name="radio" class="d-none"@if ($settings->theme_color == 'theme-dark') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box dark"></span>
                        <span class="color-name">{{ __('Dark') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-red' ? 'active' : '' }}" id="color-red" data-id="color-red" data-color="theme-red" data-colortext="Red">
                    <input type="radio" name="radio" class="d-none" @if ($settings->theme_color == 'theme-red') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box red"></span>
                        <span class="color-name">{{ __('Red') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-maroon' ? 'active' : '' }}" id="color-maroon" data-id="color-maroon" data-color="theme-maroon"
                    data-colortext="Maroon">
                    <input type="radio" name="radio" class="d-none"@if ($settings->theme_color == 'theme-maroon') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box maroon"></span>
                        <span class="color-name">{{ __('Maroon') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-white' ? 'active' : '' }}" id="color-black-white" data-id="color-black-white" data-color="black-white"
                    data-colortext="Black & White">
                    <input type="radio" name="radio" class="d-none"
                        @if ($settings->theme_color == 'black-white') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box black-white"></span>
                        <span class="color-name">{{ __('Black & White') }}</span>
                    </div>
                </label>
                <label class="color-items {{ optional($settings)->theme_color == 'theme-rose' ? 'active' : '' }}" id="color-rose" data-id="color-rose" data-color="theme-rose"
                    data-colortext="Rose">
                    <input type="radio" name="radio" class="d-none" @if ($settings->theme_color == 'theme-rose') checked @endif>
                    <div class="colorbox-wrp">
                        <span class="color-box rose"></span>
                        <span class="color-name">{{ __('Rose') }}</span>
                    </div>
                </label>
            </div>
        </div>
    </div>
@endsection
