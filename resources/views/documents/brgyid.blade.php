<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Barangay ID</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Request.css') }}" rel="stylesheet">
    <style>
        .popup-content {
            max-width: 400px;
            margin: 0 auto;
        }

        .close {
            border: none;
            outline: none;
            background: none;
            padding: 0;
            color: red;
        }

        .error {
            border: 1px solid red;
        }

        .file-input-wrapper {
          position: relative;
          display: inline-block;
          cursor: pointer;
        }

        .file-input-wrapper input[type="file"] {
          position: absolute;
          top: 0;
          left: 0;
          opacity: 0;
          width: 100%;
          height: 100%;
          cursor: pointer;
        }

        .no-file-chosen {
          cursor: pointer;
          width: 100%;
          margin: 0;
          padding: 0.75rem;
          border-radius: 10px;
          border: 0;
          background-color: #FFFFFF;
          color: #1A2244;
          font-size: 16px;
        }

        .file-input-wrapper {
          position: relative;
          display: inline-block;
        }

        .file-label {
          display: flex;
          align-items: center;
          cursor: pointer;
        }

        .no-file-chosen {
          margin-right: 8px;
        }

        .file-checkmark {
          display: none;
        }

        .alert-error {
          display: none;
        }
            
    </style>
</head>

<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
        @include('user.parts.nav')
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <div class="container-fluid" id="intro-container">
                        <span id="intro">Request Documents</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-b">
                        <div class="col-lg-4 col-md-4 col-sm-12 ms-auto" style="padding: 20px;">
                            <div class="container-fluid" id="input">
                                <div class="select" onchange="change(event.target.value)">
                                    <select id="type">
                                        <option disabled selected>Select Document Type</option>
                                        <option value="#">Brgy-ID</option>
                                        <option value="BrgyClearance.html">Brgy-Clearance</option>
                                        <option value="Indigency.html">Indigency</option>
                                    </select>
                                    <div class="select_arrow">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="spacer">
                    <div class="row container-fluid" style="min-height: 80vh; padding: 0; margin: 0; padding-top: 5%;" id="content-container-a-1">

                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </symbol>
                      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                      </symbol>
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>

                    @if (session('success'))
                      <div class="alert alert-success d-flex align-items-center" style="width: 50%; margin-left: 2rem;" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div class="alert alert-success">{{ session('success') }}</div>
                      </div>
                    @endif

                    @if (session('info'))
                    <div class="alert alert-primary d-flex align-items-center" style="width: 50%; margin-left: 2rem;" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                      <div>{{ session('info') }}</div>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger d-flex align-items-center" style="width: 50%; margin-left: 2rem;" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>{{ session('error') }}</div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('documents.submit', ['form' => $form]) }}" enctype="multipart/form-data">
                     @csrf
                          <div class="col">
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <span id="category-label">Mother's Information</span>
                                  <hr id="spacer-2">
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="m-firstname" placeholder="First Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="m-middlename" placeholder="Middle Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="m-lastname" placeholder="Last Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="m-contact" class="contact_number" placeholder="Contact No." required>
                                      <div class="invalid-feedback">
                                          Contact number should start with "09"
                                      </div>
                                  </div>
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <span id="category-label">Father's Information</span>
                                  <hr id="spacer-2">
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="f-firstname" placeholder="First Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="f-middlename" placeholder="Middle Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="f-lastname" placeholder="Last Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="f-contact" class="contact_number" placeholder="Contact No." required>
                                      <div class="invalid-feedback">
                                          Contact number should start with "09"
                                      </div>
                                  </div>
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <span id="category-label">Emergency Contact Person's Details</span>
                                  <hr id="spacer-2">
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="cp_firstname" placeholder="First Name" required>
                                  </div>
                                  <div class="col-lg-2 col-md-2 col-sm-12 my-2">
                                      <input type="text" name="cp_middlename" placeholder="Middle Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="cp_lastname" placeholder="Last Name" required>
                                  </div>
                                  <div class="col-lg-2 col-md-2 col-sm-12 my-2">
                                      <input type="text" name="cp_relationship" placeholder="Relationship" required>
                                  </div>
                                  <div class="col-lg-2 col-md-2 col-sm-12 my-2">
                                      <input type="text" class="contact_number" name="cp_contact" placeholder="Contact No." required>
                                      <div class="invalid-feedback">
                                          Contact number should start with "09"
                                      </div>
                                  </div>
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px;">
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="cp_housenum" placeholder="House No." required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="cp_street" placeholder="Street Name" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="cp_brgy" placeholder="Barangay" required>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                      <input type="text" name="cp_city" placeholder="City" required>
                                  </div>
                                  
                              </div>
                              <div style="height: fit-content; padding: 10px;">
                              <div class="file-input-wrapper">
                                <input type="file" name="photo" id="file-input" accept="image/*" required>
                                <label for="file-input" class="file-label">
                                  <span class="no-file-chosen">Upload ID</span>

                                  <span class="file-checkmark">
                                    <div class="alert alert-success">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                      ID Successfuly Uploaded
                                    </div>
                                  </span>

                                  <span class="alert-error">
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      <div>Invalid file format. Only image files are allowed.</div>
                                    </div>
                                  </span>
                                </label>
                              </div>
                              <div class="row" style="height: fit-content; padding: 10px; margin-top: 20px;">
                                  <div class="col-lg-4 col-md-4 col-sm-12 ms-auto" style="text-align: end;">
                                      <button type="button" id="show-btn">Show Accepted ID's</button>
                                      <button type="reset" id="reset-btn">Reset</button>
                                      <button type="submit" id="submit-btn">Submit</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="page-footer">
            <div class="container-fluid" id="footer-footer">
                <div class="container" id="bottom">
                    <p>Copyright &copy; 2022</p>
                </div>
            </div>
        </footer>
    </div>


    <div class="modal fade" id="ids-modal" tabindex="-1" role="dialog" aria-labelledby="ids-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ids-modal-label">Accepted IDs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Passport</li>
                        <li>Driver's License</li>
                        <li>Professional Regulation Commission (PRC) ID</li>
                        <li>National Bureau of Investigation (NBI) Clearance</li>
                        <li>Postal ID</li>
                        <li>Voter's ID</li>
                        <li>Social Security System (SSS) Card</li>
                        <li>Government Service Insurance System (GSIS) ID</li>
                        <li>Tax Identification Number (TIN) Card</li>
                        <li>Philhealth ID</li>
                        <li>Senior Citizen ID</li>
                        <li>Overseas Workers Welfare Administration (OWWA) ID</li>
                        <li>Home Development Mutual Fund (HDMF) ID</li>
                        <li>Alien Certificate of Registration (ACR) / Immigrant Certificate of Registration (ICR)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
      
    <script src="{{ asset('storage/js/Request.js') }}"></script>
    <script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
    <script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#show-btn').click(function() {
                $('#ids-modal').modal('show');
            });

            $('.close').click(function() {
                $('#ids-modal').modal('hide');
            });

            $('.contact_number').on('input', function() {
                var inputValue = $(this).val();
                // remove any non-digit characters
                var cleanValue = inputValue.replace(/\D/g, '');
                // limit the input to 11 digits
                var restrictedValue = cleanValue.slice(0, 11);
                $(this).val(restrictedValue);
            });

            $('.contact_number').on('change', function() {
                var inputValue = $(this).val();
                var isValid = inputValue.startsWith('09');
                $(this).toggleClass('error', !isValid);
                $(this).next('.invalid-feedback').toggle(!isValid);
                if (!inputValue.startsWith('09')) {
                    $(this).addClass('error');
         
                } else {
                    $(this).removeClass('error');
                }
            });

            $('input[type="text"]').on('input', function() {
                var inputValue = $(this).val();
                var capitalizedValue = capitalizeEachWord(inputValue);
                $(this).val(capitalizedValue);
            });

            function capitalizeEachWord(str) {
                return str.replace(/\b\w/g, function(txt) {
                    return txt.toUpperCase();
                });
            }

            $('#file-input').change(function() {
              var file = this.files[0];
              var fileCheckmark = $('.file-checkmark');
              var noFileChosen = $('.no-file-chosen');
              var alertError = $('.alert-error');

                if(file){
                  noFileChosen.css('display', 'none');
                } 

                if (file.type.match('image/*')) 
                {
                  alertError.css('display', 'none');
                  return fileCheckmark.css('display', 'inline-block');
                } 
                
                fileCheckmark.css('display', 'none');
                return alertError.css('display', 'inline-block');
                  
          });

        });
    </script>
</body>

</html>
