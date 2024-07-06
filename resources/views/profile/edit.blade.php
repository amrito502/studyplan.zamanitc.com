@extends('master')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="pt-4 card-body profile-card d-flex flex-column align-items-center">

                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name }}</h2>
                        <p class="mt-2"><b>Email</b> : <span>{{ $user->email }}</span></p>
                        <div class="mt-3 social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="pt-3 card-body">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                            </li>
                        </ul>
                        <div class="pt-2 tab-content">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>
                            </div>

                            <div class="pt-3 tab-pane fade profile-edit" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <section>
                                    <header>
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Profile Information') }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __("Update your account's profile information and email address.") }}
                                        </p>
                                    </header>

                                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                        @csrf
                                    </form>

                                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('patch')

                                        <div>
                                            <x-input-label class="col-md-4 col-lg-3 col-form-label" for="name" :value="__('Name')" />
                                            <x-text-input id="name" name="name" type="text" class="mt-1 form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>

                                        <div>
                                            <x-input-label class="col-md-4 col-lg-3 col-form-label" for="email" :value="__('Email')" />
                                            <x-text-input id="email" name="email" type="email" class="mt-1 form-control" :value="old('email', $user->email)" required autocomplete="username" />
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                <div>
                                                    <p class="mt-2 text-sm text-gray-800">
                                                        {{ __('Your email address is unverified.') }}

                                                        <button form="send-verification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>
                                                    </p>

                                                    @if (session('status') === 'verification-link-sent')
                                                        <p class="mt-2 text-sm font-medium text-green-600">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <x-primary-button class="mt-4" style="background: green; color: #fff;">{{ __('Save') }}</x-primary-button>

                                            @if (session('status') === 'profile-updated')
                                                <p
                                                    x-data="{ show: true }"
                                                    x-show="show"
                                                    x-transition
                                                    x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-sm text-gray-600"
                                                >{{ __('Saved.') }}</p>
                                            @endif
                                        </div>
                                    </form>
                                </section>

                                <!-- End Profile Edit Form -->
                            </div>

                            <div class="pt-3 tab-pane fade" id="profile-change-password">
                                <!-- Change Password Form -->
                                <section>
                                    <header>
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Update Password') }}
                                        </h2>
                                    </header>

                                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('put')

                                        <div>
                                            <x-input-label class="col-md-4 col-lg-3 col-form-label"
                                                for="update_password_current_password" :value="__('Current Password')" />
                                            <x-text-input id="update_password_current_password" name="current_password"
                                                type="password" class="form-control" autocomplete="current-password" />
                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label class="col-md-4 col-lg-3 col-form-label"
                                                for="update_password_password" :value="__('New Password')" />
                                            <x-text-input id="update_password_password" name="password" type="password"
                                                class="form-control" autocomplete="new-password" />
                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                        </div>

                                        <div>
                                            <x-input-label class="col-md-4 col-lg-3 col-form-label"
                                                for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                            <x-text-input id="update_password_password_confirmation"
                                                name="password_confirmation" type="password" class="form-control"
                                                autocomplete="new-password" />
                                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <div class="flex items-center gap-4 mt-4 col-md-4 col-lg-3 col-form-label">
                                            <x-primary-button
                                                style="background: green; color: #fff;">{{ __('Save') }}</x-primary-button>

                                            @if (session('status') === 'password-updated')
                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                    x-init="setTimeout(() => show = false, 2000)" class="">{{ __('Saved.') }}</p>
                                            @endif
                                        </div>
                                    </form>
                                </section>
                            </div>

                            <div class="pt-3 tab-pane fade" id="profile-settings">
                                <!-- Settings Form -->
                                <section class="space-y-6">
                                    <header>
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Delete Account') }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                        </p>
                                    </header>

                                   <a href="{{ route('profile.destroy',$user->id) }}" class="btn btn-danger">{{ __('Delete Account') }}</a>
                                </section>

                                <!-- End settings Form -->
                              </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
