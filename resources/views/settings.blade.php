@extends('layouts.app')

@section('content')
    <div class="m-2">
        <h4>Settings</h4>
        <p>Manage your account settings and Preferences</p>
    </div>

    <div class="container-fluid py-4">

        <!-- Tabs -->
        <ul class="nav profile-tabs mb-4" id="profileTab" role="tablist">

            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile">
                    <i class="bi bi-person"></i> Profile
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#security">
                    <i class="bi bi-shield-lock"></i> Security
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#preferences">
                    <i class="bi bi-sliders"></i> Preferences
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#notifications">
                    <i class="bi bi-bell"></i> Notifications
                </button>
            </li>

        </ul>


        <div class="tab-content">

            <!-- Profile Tab -->

            <div class="tab-pane fade show active" id="profile">

                <div class="glass-card">

                    <h4 class="section-title">Profile Information</h4>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-lg-3 text-center">

                                <div class="profile-wrapper">

                                    <img src="{{ $data->profile_img ? asset($data->profile_img) : asset('images/default-user.png') }}"
                                        id="previewImage" class="profile-image">

                                    <label class="upload-btn">
                                        <i class="bi bi-camera"></i>

                                        <input type="file" id="profileImage" hidden name="profile_img">
                                    </label>

                                </div>

                            </div>

                            <div class="col-lg-9">

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                            class="form-control dark-input">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}"
                                            class="form-control dark-input">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="mobile_num" value="{{ $data->mobile_num }}"
                                            class="form-control dark-input">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" class="form-control dark-input"
                                            value="{{ $data->dob }}">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control dark-input">{{ $data->address }}</textarea>
                                    </div>

                                </div>

                                <button class="btn btn-green">
                                    Update Profile
                                </button>

                            </div>

                        </div>
                    </form>

                </div>

            </div>


            <!-- Security Tab -->
            <div class="tab-pane fade" id="security">

                <div class="glass-card">

                    <h4 class="section-title">
                        Change Password
                    </h4>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <input type="password" placeholder="Current Password" class="form-control dark-input">
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="password" placeholder="New Password" class="form-control dark-input">
                        </div>

                    </div>

                    <button class="btn btn-green">
                        Update Password
                    </button>

                </div>

            </div>


            <!-- Preferences -->
            <div class="tab-pane fade" id="preferences">

                <div class="glass-card">

                    <h4 class="section-title">
                        Preferences
                    </h4>

                    <select class="form-select dark-input mb-3">
                        <option>English</option>
                        <option>Hindi</option>
                    </select>

                    <button class="btn btn-green">
                        Save Preferences
                    </button>

                </div>

            </div>


            <!-- Notifications -->
            <div class="tab-pane fade" id="notifications">

                <div class="glass-card">

                    <h4 class="section-title">
                        Notifications
                    </h4>
                    <p>Manage your notification prefences</p>

                    <div class="form-check form-switch">

                        <input class="form-check-input" type="checkbox" checked>

                        <label class="form-check-label">
                            Email Notification
                        </label>

                    </div>
                    <div class="form-check form-switch">

                        <input class="form-check-input" type="checkbox" checked>
                        <div class="mt-2 border-shadow">

                            <label class="form-check-label">
                                Email Notification
                            </label>
                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>





    <script>
        document
            .getElementById('profileImage')
            .addEventListener('change', function(e) {

                const file = e.target.files[0];

                if (file) {

                    document.getElementById('previewImage')
                        .src = URL.createObjectURL(file);

                }

            });
    </script>
@endsection
