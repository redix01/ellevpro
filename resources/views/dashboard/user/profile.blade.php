@extends('dashboard.layout.app')
@section('content')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
          <h6 class="fw-semibold mb-0">View Profile</h6>

        </div>

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                    <img src="{{ asset('img2/banner.jpg') }}" alt="" class="w-100 object-fit-cover">
                    <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="{{ asset('storage/'.$user->avatar ?? 'assets/images/user.png') }}" alt="" class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                            <h6 class="mb-0 mt-16">{{ $user->name ?? '' }}</h6>
                            <span class="text-secondary-light mb-16">{{ $user->email ?? '' }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Personal Info</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Full Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->name ?? '' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->email ?? '' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Phone Number</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->phone ?? 'Not Set' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Telegram</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->telegram ?? 'Not Set' }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body p-24">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab" aria-controls="pills-edit-profile" aria-selected="true">
                                Edit Profile
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24" id="pills-change-passwork-tab" data-bs-toggle="pill" data-bs-target="#pills-change-passwork" type="button" role="tab" aria-controls="pills-change-passwork" aria-selected="false" tabindex="-1">
                                Change Password
                              </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <!-- Upload Image Start -->

                                <!-- Upload Image End -->
                                <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name <span class="text-danger-600">*</span></label>
                                                <input type="text" name="name" value="{{ old('name', $user->name) ?? ''  }}" class="form-control radius-8" id="name" placeholder="Enter Full Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                                <input type="email" name="email" value="{{ old('email', $user->email) ?? ''  }}" class="form-control radius-8" id="email" placeholder="Enter email address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone</label>
                                                <input type="text" name="phone" value="{{ old('phone', $user->phone) ?? ''  }}" class="form-control radius-8" id="number" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Telegram</label>
                                                <input type="text" name="telegram" value="{{ old('telegram', $user->telegram) ?? ''  }}" class="form-control radius-8" id="number" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Profile Picture</label>
                                                <input type="file" name="avatar"  class="form-control" id="number" placeholder="Enter phone number">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-change-passwork" role="tabpanel" aria-labelledby="pills-change-passwork-tab" tabindex="0">
                                <form action="{{ route('user.updatePassword') }}" method="POST">
                                    @csrf
                                     <div class="row">
                                    <div class="col-12">
                                        <div class="mb-20">
                                            <label for="your-password" class="form-label fw-semibold text-primary-light text-sm mb-8">Current Password <span class="text-danger-600">*</span></label>
                                            <div class="position-relative">
                                                <input type="password" name="current_password" class="form-control radius-8" id="your-password" placeholder="Current Password*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-20">
                                            <label for="your-password" class="form-label fw-semibold text-primary-light text-sm mb-8">New Password <span class="text-danger-600">*</span></label>
                                            <div class="position-relative">
                                                <input type="password" name="new_password" class="form-control radius-8" id="your-password" placeholder="Enter New Password*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-20">
                                        <label for="confirm-password" class="form-label fw-semibold text-primary-light text-sm mb-8">Confirmed New Password <span class="text-danger-600">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" name="new_password_confirmation" class="form-control radius-8" id="confirm-password" placeholder="Confirm Password*">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
