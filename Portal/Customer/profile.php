<?php
session_start();

$_SESSION["fullName"]= "Oganla Michael";
$_SESSION["job"]= "Tenant";
$_SESSION["about"]="I love to Code";
$_SESSION["company"]="Entak";
$_SESSION["address"]="Lagos";
$_SESSION["phone"]="09080234555";
$_SESSION["email"]="ogeeboss@gmail.com";
$_SESSION["country"]="Nigeria";

print <<<HERE
<div class="row">
  <div class="col-xl-4">

    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <img src="/Entak/Portal/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <h2 class="text-success"> {$_SESSION["fullName"]} </h2>
        <h3 class="text-success"> {$_SESSION["job"]} </h3>
        <div class="social-links mt-2">
          <a href="#" class="twitter"><i class="bi bi-twitter text-primary"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook text-primary"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-whatsapp text-success"></i></a>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-8">

    <div class="card">
      <div class="card-body pt-3">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs ">

          <li class="nav-item">
            <button class="nav-link active h5 fw-light" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
          </li>

          <li class="nav-item">
            <button class="nav-link h5 fw-light" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
          </li>

          <li class="nav-item">
            <button class="nav-link h5 fw-light" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
          </li>

          <li class="nav-item">
            <button class="nav-link h5 fw-light" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
          </li>

        </ul>
        <div class="tab-content pt-2 ps-3">

          <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title display-6">About</h5>
            <p class="small fst-italic"> {$_SESSION["about"]}</p>

            <h5 class="card-title display-6">Profile Details</h5>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Full Name</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["fullName"]}</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Company</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["company"]} </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Job</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["job"]} </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Country</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["country"]} </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Address</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["address"]} </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Phone</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["phone"]} </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label text-secondary h5">Email</div>
              <div class="col-lg-9 col-md-8 h5 fw-light"> {$_SESSION["email"]} </div>
            </div>

          </div>

          <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
            <!-- Profile Edit Form -->
            <form id="editProfileForm" action="/Entak/Portal/Forms/editProfile.php" method="post">
              <div class="row mb-3">
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                <div class="col-md-8 col-lg-9">
                  <img src="/Entak/Portal/assets/img/profile-img.jpg" alt="Profile">
                  <div class="pt-2">
                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                <div class="col-md-8 col-lg-9">
                  <input name="fullName" type="text" class="form-control" id="fullName" value="Oganla Michael">
                </div>
              </div>

              <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="about" class="form-control" id="about" style="height: 100px"> I love coding</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                <div class="col-md-8 col-lg-9">
                  <input name="company" type="text" class="form-control" id="company" value="EntakEnergy">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                <div class="col-md-8 col-lg-9">
                  <input name="job" type="text" class="form-control" id="Job"
                   value= "{$_SESSION["job"]}" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                <div class="col-md-8 col-lg-9">
                  <input name="country" type="text" class="form-control"
                   id="Country" value= "{$_SESSION["country"]}" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                <div class="col-md-8 col-lg-9">
                  <input name="address" type="text" class="form-control" id="Address"
                  value="A108 Adam Street, Lagos State, Nigeria">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                <div class="col-md-8 col-lg-9">
                  <input name="phone" type="text" class="form-control" id="Phone"
                   value="(+234) 9080234555">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="email" class="form-control" id="Email"
                  value="oganlamichael51@gmail.com">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                <div class="col-md-8 col-lg-9">
                  <input name="twitter" type="text" class="form-control"
                  id="Twitter" value="https://twitter.com/#">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                <div class="col-md-8 col-lg-9">
                  <input name="facebook" type="text" class="form-control"
                  id="Facebook" value="https://facebook.com/#">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                <div class="col-md-8 col-lg-9">
                  <input name="instagram" type="text" class="form-control"
                   id="Instagram" value="https://instagram.com/#">
                </div>
              </div>

              <div class="row mb-3">
                <label for="whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                <div class="col-md-8 col-lg-9">
                  <input name="whatsapp" type="text" class="form-control"
                  id="whatsapp" value="https://whatsapp.com/#">
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form><!-- End Profile Edit Form -->
          </div>

          <div class="tab-pane fade pt-3" id="profile-settings">
            <!-- Settings Form -->
            <form id="editSettingsForm" action="/Entak/Portal/Forms/editSettings.php" method="post">
              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                <div class="col-md-8 col-lg-9">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="changesMade" checked>
                    <label class="form-check-label" for="changesMade">
                      Changes made to your account
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newProducts" checked>
                    <label class="form-check-label" for="newProducts">
                      Information on new products and services
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="proOffers">
                    <label class="form-check-label" for="proOffers">
                      Marketing and promo offers
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                    <label class="form-check-label" for="securityNotify">
                      Security alerts
                    </label>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>

            </form>
            <!-- End settings Form -->
          </div>

          <div class="tab-pane fade pt-3" id="profile-change-password">
            <!-- Change Password Form -->
            <form id="editPasswordForm" action="/Entak/Portal/Forms/editPassword.php" method="post">
            <div class="row mb-3">
              <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
              <div class="col-md-8 col-lg-9">
                <input name="password" type="password" class="form-control" id="currentPassword">
              </div>
            </div>

            <div class="row mb-3">
              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
              <div class="col-md-8 col-lg-9">
                <input name="newpassword" type="password" class="form-control" id="newPassword">
              </div>
            </div>

            <div class="row mb-3">
              <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
              <div class="col-md-8 col-lg-9">
                <input name="renewpassword" type="password" class="form-control" id="renewPassword">
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
            </form><!-- End settings Form -->
          </div>

        </div><!-- End Bordered Tabs -->

      </div>
    </div>

  </div>
</div>
HERE;
 ?>
