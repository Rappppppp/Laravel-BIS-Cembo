<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('storage/css/Login.css') }}" rel="stylesheet">
</head>
@php
$nationals = array('Afghan','Albanian','Algerian','American','Andorran','Angolan','Antiguans','Argentinean','Armenian','Australian','Austrian','Azerbaijani','Bahamian','Bahraini','Bangladeshi','Barbadian','Barbudans','Batswana','Belarusian','Belgian','Belizean','Beninese','Bhutanese','Bolivian','Bosnian','Brazilian','British','Bruneian','Bulgarian','Burkinabe','Burmese','Burundian','Cambodian','Cameroonian','Canadian','Cape Verdean','Central African','Chadian','Chilean','Chinese','Colombian','Comoran','Congolese','Costa Rican','Croatian','Cuban','Cypriot','Czech','Danish','Djibouti','Dominican','Dutch','East Timorese','Ecuadorean','Egyptian','Emirian','Equatorial Guinean','Eritrean','Estonian','Ethiopian','Fijian','Filipino','Finnish','French','Gabonese','Gambian','Georgian','German','Ghanaian','Greek','Grenadian','Guatemalan','Guinea-Bissauan','Guinean','Guyanese','Haitian','Herzegovinian','Honduran','Hungarian','I-Kiribati','Icelander','Indian','Indonesian','Iranian','Iraqi','Irish','Israeli','Italian','Ivorian','Jamaican','Japanese','Jordanian','Kazakhstani','Kenyan','Kittian and Nevisian','Kuwaiti','Kyrgyz','Laotian','Latvian','Lebanese','Liberian','Libyan','Liechtensteiner','Lithuanian','Luxembourger','Macedonian','Malagasy','Malawian','Malaysian','Maldivan','Malian','Maltese','Marshallese','Mauritanian','Mauritian','Mexican','Micronesian','Moldovan','Monacan','Mongolian','Moroccan','Mosotho','Motswana','Mozambican','Namibian','Nauruan','Nepali','New Zealander','Nicaraguan','Nigerian','Nigerien','North Korean','Northern Irish','Norwegian','Omani','Pakistani','Palauan','Panamanian','Papua New Guinean','Paraguayan','Peruvian','Polish','Portuguese','Qatari','Romanian','Russian','Rwandan','Saint Lucian','Salvadoran','Samoan','San Marinese','Sao Tomean','Saudi','Scottish','Senegalese','Serbian','Seychellois','Sierra Leonean','Singaporean','Slovakian','Slovenian','Solomon Islander','Somali','South African','South Korean','Spanish','Sri Lankan','Sudanese','Surinamer','Swazi','Swedish','Swiss','Syrian','Taiwanese','Tajik','Tanzanian','Thai','Togolese','Tongan','Trinidadian/Tobagonian','Tunisian','Turkish','Tuvaluan','Ugandan','Ukrainian','Uruguayan','Uzbekistani','Venezuelan','Vietnamese','Welsh','Yemenite','Zambian','Zimbabwean');
@endphp
<body>
	<div class="wrapper"> <!-- Fixes Footer to Bottom -->
		<!-- Nav -->
		<header>

		</header>
		<!-- Content -->
		<main>
			<div class="parallax-bg-img" style="background-image: url(' {{ asset('storage/res/img/bg/BG.png') }} ');" id="content-container">
				<div class="container-fluid" id="register-form-container-0">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<form method="POST" action="{{ route('register') }}">
						@csrf
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<input type="text" name="first_name" placeholder="First Name" required>
								</div>
								<div class="row" id="field">
									<input type="text" name="middle_name" placeholder="Middle Name" required>
								</div>
								<div class="row" id="field">
									<input type="text" name="last_name" placeholder="Last Name" required>
								</div>
								<div class="row" id="field">
									<input type="text" name="email" placeholder="Email Address" required>
								</div>
								<div class="row" id="field">
									<div class="col-6" style="padding-right: 8px;">
										<input type="password" name ="password" placeholder="Password" required autocomplete="new-password">
									</div>
									<div class="col-6" style="padding-left: 8px;">
										<input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn"><a href="/login" style="text-decoration: none;color: black;">Login</a></button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(1)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-1" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<input type="date" name="date_of_birth" placeholder="Date of Birth" required>
								</div>
								<div class="row" id="field">
									<input type="text" name="place_of_birth" placeholder="Place of Birth" required>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Gender</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="gender" required>
														<option disabled selected>Select</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
														<option value="Gay">Gay</option>
														<option value="Lesbian">Lesbian</option>
														<option value="Others">Others</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Civil Status</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="civil_status">
														<option disabled selected>Select</option>
														<option value="Single">Single</option>
														<option value="Married">Married</option>
														<option value="Widowed">Widowed</option>
														<option value="Live-in">Live-in</option>
														<option value="Separated">Separated</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(0)">Back</button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(2)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-2" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Nationality</span>
											</div>
											<div class="col">
												
												<div class="select">
													<select name="nationality">
														@foreach ($nationals as $national)
															<option value="{{ $national }}" @if ($national === 'Filipino') selected @endif>{{ $national }}</option>
														@endforeach
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Religion</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="religion">
														<option disabled selected>Select</option>
														<option value="Roman Catholic">Roman Catholic</option>
														<option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
														<option value="Muslim">Muslim</option>
														<option value="Born Again">Born Again</option>
														<option value="Seventh Day Adventist">Seventh Day Adventist
														</option>
														<option value="Saksi ni Jehovah">Saksi ni Jehovah</option>
														<option value="Mormons">Mormons</option>
														<option value="Buddhist">Buddhist</option>
														<option value="Others">Others</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Education</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="educational_attainment">
														<option disabled selected>Select</option>
														<option>Elementary</option>
														<option>High School</option>
														<option>College</option>
														<option>Master's / Doctorate Degree</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<input type="text" name="occupation" placeholder="Occupation">
								</div>
								<!-- <div class="row" id="field">
									<div class="col-6" style="padding-right: 8px;">
										<input type="text" placeholder="Income">
									</div>
									<div class="col-6" style="padding-left: 8px;">
										<input type="text" placeholder="Expenses">
									</div>
								</div> -->
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(1)">Back</button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(3)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-3" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<input type="text" name="contact_number" placeholder="Contact Number">
								</div>
								<div class="row" id="field">
									<div class="col-6" style="padding-right: 8px;">
										<input type="text" name="house_number" placeholder="House no.">
									</div>
									<div class="col-6" style="padding-left: 8px;">
										<input type="text" name="street_name" placeholder="Street Name">
									</div>
								</div>
								<div class="row" id="field">
									<input type="text" value="Cembo" disabled>
								</div>
								<div class="row" id="field">
									<input type="text" value="Makati City" disabled>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(2)">Back</button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(4)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-4" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<input type="text" name="prov_house_number" placeholder="Provincial House no.">
								</div>
								<div class="row" id="field">
									<input type="text" name="prov_street_name" placeholder="Provincial Street name">
								</div>
								<div class="row" id="field">
									<input type="text" name="prov_barangay_name" placeholder="Provincial Barangay name">
								</div>
								<div class="row" id="field">
									<input type="text" name="prov_city_name" placeholder="Provincial City name">
								</div>
								<div class="row" id="field">
									<input type="text" name="province_name" placeholder="Province name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(3)">Back</button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(5)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-5" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<div class="coontainer-fluid" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Voter?</span>
											</div>
											<div class="col">
												<div class="row control-group">
													<div class="col p-0">
														<label class="control control-radio">
															<span style="color: gray;">Yes</span>
															<input type="radio" name="is_voter" value='1'/>
															<div class="control_indicator"></div>
														</label>
													</div>
													<div class="col p-0">
														<label class="control control-radio">
															<span style="color: gray;">No</span>
															<input type="radio"  name="is_voter" value='0' checked="checked" />
															<div class="control_indicator"></div>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Head?</span>
											</div>
											<div class="col">
												<div class="row control-group">
													<div class="col">
														<label class="control control-radio">
															<span style="color: gray;">Yes</span>
															<input type="radio" name="is_head" value='1' />
															<div class="control_indicator"></div>
														</label>
													</div>
													<div class="col">
														<label class="control control-radio">
															<span style="color: gray;">No</span>
															<input type="radio"  name="is_head" value='0' checked="checked" />
															<div class="control_indicator"></div>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Relationship</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="relationship">
														<option disabled selected>Select</option>
														<option value="Self">Self</option>
														<option value="Spouse/Husband">Spouse/Husband</option>
														<option value="Parent ">Parent</option>
														<option value="Sibling ">Sibling</option>
														<option value="Other ">Other</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Social Sector</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="social_sector">
														<option disabled selected>Select</option>
														<option value="NA">NA</option>
														<option value="Education">Education</option>
														<option value="Health">Health</option>
														<option value="Social Welfare">Social Welfare</option>
														<option value="Sports">Sports</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="field">
									<div class="col" id="input">
										<div class="row" style="padding-left: 0.8rem;">
											<div class="col">
												<span style="color: gray;">Vaccine</span>
											</div>
											<div class="col">
												<div class="select">
													<select name="vaccine">
														<option disabled selected>Select</option>
														<option value="Single Dose">Single Dose</option>
														<option value="Fully Vaccinated">Fully Vaccinated</option>
														<option value="Vaccine Exempt">Vaccine Exempt</option>
														<option value="Unvaccinated ">Unvaccinated</option>
													</select>
													<div class="select_arrow">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(4)">Back</button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(6)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-6" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<div class="col-6" style="padding-right: 8px;">
										<input type="number" name="years_makati" placeholder="Years in Makati">
									</div>
									<div class="col-6" style="padding-left: 8px;">
										<input type="number" name="years_cembo" placeholder="Years in Cembo">
									</div>
								</div>
								<div class="row" id="field">
									<input type="number" name="years_current" placeholder="Years in current Address">
								</div>
								<div class="row" id="field">
									<input type="number" name="num_household" placeholder="Number of Household Members">
								</div>
								<div class="row" id="field">
									<input type="number" name="num_fam_household" placeholder="Number of Families in the Household">
								</div>
								<div class="row" id="field">
									<input type="number" name="num_fam_members" placeholder="Number of Family Members in Household">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(5)">Back</button>
								</div>
								<div class="col">
									<button type="button" id="next-btn" onclick="next(7)">Next</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" id="register-form-container-7" style="display: none;">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/logo.png') }}" id="logo">
						</div>
						<div class="row" id="register-field-container">
							<div class="col">
								<div class="row" id="field">
									<div class="container-fluid" id="check-boxes-container">
										<div class="control-group">
											<label>Check All that Applies:</label>
											<hr style="height:4px; background-color: black">
											<label class="control control-checkbox">
												<span>Yellow Card</span>
												<input type="checkbox" name="yellow" value="1" />
												<div class="control_indicator"></div>
											</label>
											<hr>
											<label class="control control-checkbox">
												<span>Blue Card</span>
												<input type="checkbox" name="blue" value="1" />
												<div class="control_indicator"></div>
											</label>
											<hr>
											<label class="control control-checkbox">
												<span>White Card</span>
												<input type="checkbox" name="white" value="1" />
												<div class="control_indicator"></div>
											</label>
											<hr>
											<label class="control control-checkbox">
												<span>Makatizen Card</span>
												<input type="checkbox" name="makatizen" value="1" />
												<div class="control_indicator"></div>
											</label>
											<hr>
											<label class="control control-checkbox">
												<span>Philhealth Card</span>
												<input type="checkbox" name="philhealth" value="1" />
												<div class="control_indicator"></div>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="button" id="back-btn" onclick="back(6)">Back</button>
								</div>
								<div class="col">
									<button type="submit" id="submit-btn">Submit</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<!-- Footer -->
		<footer class="page-footer">

		</footer>
	</div>
	<script src="{{ asset('storage/js/Login.js') }}"></script>
	<script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>