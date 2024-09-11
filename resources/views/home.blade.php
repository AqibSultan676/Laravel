<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone Selection Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
         body {
            background-color: #7a0443;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            padding: 15px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: 700;
        }

        .form-check-label {
            font-size: 16px;
            color: #555;
        }

        .zone-section,
        .facility-section {
            display: none;
            margin-top: 25px;
        }

        .item-section {
            display: none;
            margin-top: 25px;
        }

        .zone-section h4,
        .item-section h4 {
            margin-bottom: 20px;
            color: #444;
            font-weight: 600;
        }

        .form-container .btn {
            color:white
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 50px;
        }

        .form-container .btn:hover {
            background-color: #b90695;
            border-color: #260021;
        }

        /* Radio Buttons Styles */
        .form-check-input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            background-color: #7a0443;
        }

        /* Styling the item section */
        .item-section .row {
            margin-bottom: 15px;
        }

        .item-section .col-lg-4 {
            font-weight: 600;
            font-size: 16px;
            color: #555;
        }

        .item-section .form-check-label {
            font-size: 15px;
            color: #666;
        }

        .item-section .form-check-inline {
            margin-right: 20px;
        }

        .item-section .details {
            margin-top: 15px;
        }
        .btn-primary{

        }



        /* Handling responsiveness */
        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            .zone-section,
            .facility-section,
            .item-section {
                margin-top: 20px;
            }

            .item-section .col-lg-4 {
                margin-bottom: 10px;
            }
        }



    </style>
</head>

<body>
    <div class="form-container">
        <h2>Select Your Zone</h2>
        @if(session('status'))
        <div class="alert alert-success mt-3">
            <p style="color:black;">{{ session('status') }}</p>
        </div>
    @endif
        <!-- Display Login Errors -->
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('zone.facilities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Zone Selection Radio Buttons -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="zone" id="centralZone" value="central">
                <label class="form-check-label" for="centralZone">Central Zone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="zone" id="southZone" value="south">
                <label class="form-check-label" for="southZone">South Zone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="zone" id="northZone" value="north">
                <label class="form-check-label" for="northZone">North Zone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="zone" id="westZone" value="west">
                <label class="form-check-label" for="westZone">West Zone</label>
            </div>

            <!-- Central Zone Section -->
            <div id="centralZoneSection" class="zone-section facility-section">
                <h4>Facility Name (Central Zone)</h4>
                <select class="form-select facility-select" name="central_zone_facility" aria-label="Central Zone Facilities">
                    <option selected>Select a facility</option>
                    <option value="WWRC, QRI, ACC Combined Control Room in CEP Building">WWRC, QRI, ACC Combined Control Room in CEP Building</option>
                    <option value="Women's Wellness And Research Center">Women's Wellness And Research Center</option>
                    <option value="Ambulatory Care Center">Ambulatory Care Center</option>
                    <option value="Qatar Rehabilitation Institute">Qatar Rehabilitation Institute</option>
                    <option value="Medical Care and Research Center">Medical Care and Research Center</option>
                    <option value="Carpark in HBKMC (Plot W)">Carpark in HBKMC (Plot W)</option>

                    <option value="ITQAN Clinical Simulation and Innovation Center">ITQAN Clinical Simulation and Innovation Center</option>
                    <option value="Bin Omran Physiotherapy Center">Bin Omran Physiotherapy Center</option>

                    <option value="Qatar Metabolic Institute B311">Qatar Metabolic Institute B311</option>
                    <option value="Enaya 312 Specialized Care Center Located in HBKMC">Enaya 312 Specialized Care Center Located in HBKMC</option>
                    <option value="HMC Building No. 326">HMC Building No. 326</option>

                    <option value="Blood Processing Center Building 327">Blood Processing Center Building 327</option>
                    <option value="Qatar National Blood Donation Center and Multistory Carpark(PLOT Q)">Qatar National Blood Donation Center and Multistory Carpark(PLOT Q)</option>
                    <option value="Communicable Disease Center">Communicable Disease Center</option>

                    <option value="HGH OPD Multistory Carpark">HGH OPD Multistory Carpark</option>
                    <option value="HGH Trauma and Emergency Department">HGH Trauma and Emergency Department</option>
                    <option value="Surgical Specialty Center">Surgical Specialty Center</option>

                    <option value="HGH Operating Theater and Multistory Carpark">HGH Operating Theater and Multistory Carpark</option>
                    <option value="Fahad Bin Jassim Kidney Center">Fahad Bin Jassim Kidney Center</option>

                    <option value="Bone and Joint Institute">Bone and Joint Institute</option>
                    <option value="Heart Hospital and NCCCR">Heart Hospital and NCCCR</option>
                    <option value="Ambulance Service Landmark Office Complex">Ambulance Service Landmark Office Complex</option>

                    <option value="Ambulance Service West Bay Hub">Ambulance Service West Bay Hub</option>

                    <!-- Add more options as needed -->
                </select>
            </div>

            <!-- South Zone Section -->
            <div id="southZoneSection" class="zone-section facility-section">
                <h4>Facility Name (South Zone)</h4>
                <select class="form-select facility-select" name="south_zone_facility" aria-label="South Zone Facilities">
                    <option selected>Select a facility</option>
                    <option value="Al Wakra Hospital">Al Wakra Hospital</option>
                    <option value="Hazm Mebaireek General Hospital">Hazm Mebaireek General Hospital</option>

                    <option value="Mesaieed General Hospital">Mesaieed General Hospital</option>
                    <option value="Central Distribution Warehouse located in GWC Logistic Village">Central Distribution Warehouse located in GWC Logistic Village</option>
                    <option value="Materials Management Store in Industrial Area (Salwa Store)">Materials Management Store in Industrial Area (Salwa Store)</option>
                    <option value="Mental Healthcare Center in Muather">Mental Healthcare Center in Muather</option>
                    <option value="HMC Mental Health Services Clinic - (Al Wakra Park Villa)">HMC Mental Health Services Clinic - (Al Wakra Park Villa)</option>

                    <option value="HMC Mental Health Services Clinic - (Al Wakra Beach Villa)">HMC Mental Health Services Clinic - (Al Wakra Beach Villa)</option>
                    <option value="Ambulance Service Abu Nakhla Hub">Ambulance Service Abu Nakhla Hub</option>
                    <option value="Ambulance Service Industrial Area Hub">Ambulance Service Industrial Area Hub</option>

                    <!-- Add more options as needed -->
                </select>
            </div>

            <!-- North Zone Section -->
            <div id="northZoneSection" class="zone-section facility-section">
                <h4>Facility Name (North Zone)</h4>
                <select class="form-select facility-select" name="north_zone_facility" aria-label="North Zone Facilities">
                    <option selected>Select a facility</option>
                    <option value="Aisha Bint Hamad Al-Attiyah Hospital (AAH)">Aisha Bint Hamad Al-Attiyah Hospital (AAH)</option>

                    <option value="Ras Laffan General Hospital">Ras Laffan General Hospital</option>
                    <option value="Umm Salal Recovery Centre (HMC ONLY)">Umm Salal Recovery Centre (HMC ONLY)</option>
                    <option value="Al Khor Physiotherapy Centre">Al Khor Physiotherapy Centre</option>

                    <option value="Ambulance Service Al Daayen Hub">Ambulance Service Al Daayen Hub</option>
                    <option value="Ambulance Service Al Khor Hub">Ambulance Service Al Khor Hub</option>


                </select>
            </div>

            <!-- West Zone Section -->
            <div id="westZoneSection" class="zone-section facility-section">
                <h4>Facility Name (West Zone)</h4>
                <select class="form-select facility-select" name="west_zone_facility" aria-label="West Zone Facilities">
                    <option selected>Select a facility</option>
                    <option value="The Cuban Hospital">The Cuban Hospital</option>
                </select>
            </div>

            <!-- Item Section -->
            <div id="itemSection" class="item-section  justify-content-center align-items-center">
                <h4>Items</h4>

                <!-- "Condition" Heading -->
                <div class="condition-heading">Condition</div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Workstation Desk</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="workstation_desk">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="workstation_desk_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="workstation_desk_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="workstation_desk_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="workstation_desk_image" class="form-control mt-2">
                            <textarea name="workstation_desk_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Workstation CPU</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="workstation_cpu">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="workstation_cpu_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="workstation_cpu_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="workstation_cpu_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="workstation_cpu_image" class="form-control mt-2">
                            <textarea name="workstation_cpu_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>



                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Desk Monitor</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="desk_monitor">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="desk_monitor_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="desk_monitor_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="desk_monitor_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="desk_monitor_image" class="form-control mt-2">
                            <textarea name="desk_monitor_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Wall Monitor</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="wall_monitor">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="wall_monitor_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="wall_monitor_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="wall_monitor_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="wall_monitor_image" class="form-control mt-2">
                            <textarea name="wall_monitor_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Keyboard</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="keyboard">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="keyboard_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="keyboard_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="keyboard_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="keyboard_image" class="form-control mt-2">
                            <textarea name="keyboard_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Mouse</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Mouse">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Mouse_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Mouse_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Mouse_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Mouse_image" class="form-control mt-2">
                            <textarea name="Mouse_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Joystick</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Joystick">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Joystick_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Joystick_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Joystick_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Joystick_image" class="form-control mt-2">
                            <textarea name="Joystick_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Wireless Radio</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Wireless_Radio">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Wireless_Radio_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Wireless_Radio_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Wireless_Radio_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Wireless_Radio_image" class="form-control mt-2">
                            <textarea name="Wireless_Radio_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Radio Multipal Charger/Adapter</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Radio_Multiple_Charger/Adapter">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Radio_Multiple_Charger/Adapter_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Radio_Multiple_Charger/Adapter_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Radio_Multiple_Charger/Adapter_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Radio_Multiple_Charger/Adapter_condition_image" class="form-control mt-2">
                            <textarea name="Radio_Multiple_Charger/Adapter_condition_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Extra Radio Batteries</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Extra_Radio_Batteries">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Extra_Radio_Batteries_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Extra_Radio_Batteries_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Extra_Radio_Batteries_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Extra_Radio_Batteries_condition_image" class="form-control mt-2">
                            <textarea name="Extra_Radio_Batteries_condition_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Flashlight With Cable Charger</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Flashlight_With_Cable_Charger">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Flashlight_With_Cable_Charger_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Flashlight_With_Cable_Charger_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Flashlight_With_Cable_Charger_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Flashlight_With_Cable_Charger_image" class="form-control mt-2">
                            <textarea name="Flashlight_With_Cable_Charger_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Chairs</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Chairs">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Chairs_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Chairs_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Chairs_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Chairs_image" class="form-control mt-2">
                            <textarea name="Chairs_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Water Dispenser</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Water_Dispenser">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Water_Dispenser_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Water_Dispenser_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Water_Dispenser_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Water_Dispenser_image" class="form-control mt-2">
                            <textarea name="Water_Dispenser_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Bulletin Board</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Bulletin_Board">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Bulletin_Board_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Bulletin_Board_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Bulletin_Board_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Bulletin_Board_image" class="form-control mt-2">
                            <textarea name="Bulletin_Board_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>White Board</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="White_Board">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="White_Board_image" class="form-control mt-2">
                            <textarea name="White_Board_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Cabinets</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Cabinets">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Cabinets_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Cabinets_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Cabinets_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Cabinets_image" class="form-control mt-2">
                            <textarea name="Cabinets_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Landline/Cisco</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Landline/Cisco">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Landline/Cisco_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Landline/Cisco_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Landline/Cisco_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Landline/Cisco_image" class="form-control mt-2">
                            <textarea name="Landline/Cisco_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Access-Cards Control Room</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Access_Card-Control_Room">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Access_Card-Control_Room_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Access_Card-Control_Room_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Access_Card-Control_Room_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Access_Card-Control_Room_image" class="form-control mt-2">
                            <textarea name="Access_Card-Control_Room_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Ac Temperature Maintained Below 23 Degress- Control Room</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="AC_Temperature_Maintained_Below_23_Degrees_Control_Room">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Temperature_Maintained_Below_23_Degrees_Control_Room_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Temperature_Maintained_Below_23_Degrees_Control_Room_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Temperature_Maintained_Below_23_Degrees_Control_Room_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="AC_Temperature_Maintained_Below_23_Degrees_Control_Room_image" class="form-control mt-2">
                            <textarea name="AC_Temperature_Maintained_Below_23_Degrees_Control_Room_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Access-Card Server Room</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Access_Card_Server_Room">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Access_Card_Server_Room_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Access_Card_Server_Room_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Access_Card_Server_Room_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Access_Card_Server_Room_image" class="form-control mt-2">
                            <textarea name="Access_Card_Server_Room_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>AC Temperature  Maintained Below 23 Degrees - Server Room</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="AC_Temperature_Maintained_Below_23_Degrees_Server_Room">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Temperature_Maintained_Below_23_Degrees_Server_Room_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Temperature_Maintained_Below_23_Degrees_Server_Room_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Temperature_Maintained_Below_23_Degrees_Server_Room_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="AC_Temperature_Maintained_Below_23_Degrees_Server_Room_image" class="form-control mt-2">
                            <textarea name="AC_Temperature_Maintained_Below_23_Degrees_Server_Room_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Lighting Regulator Control</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Lighting_Regulator_Control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Lighting_Regulator_Control_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Lighting_Regulator_Control_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Lighting_Regulator_Control_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Lighting_Regulator_Control_image" class="form-control mt-2">
                            <textarea name="Lighting_Regulator_Control_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Temperature Reader</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Temperature_Reader">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Temperature_Reader_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Temperature_Reader_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Temperature_Reader_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Temperature_Reader_image" class="form-control mt-2">
                            <textarea name="Temperature_Reader_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>AC Remotes</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="AC_Remotes">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Remotes_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Remotes_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="AC_Remotes_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="AC_Remotes_image" class="form-control mt-2">
                            <textarea name="AC_Remotes_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Fire Extinguishers</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Fire_Extinguishers">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Fire_Extinguishers_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Fire_Extinguishers_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Fire_Extinguishers_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Fire_Extinguishers_image" class="form-control mt-2">
                            <textarea name="Fire_Extinguishers_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>MCP if inside</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="MCP_if_inside">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="MCP_if_inside_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="MCP_if_inside_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="MCP_if_inside_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="MCP_if_inside_image" class="form-control mt-2">
                            <textarea name="MCP_if_inside_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Electrical Sockets</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Electrical_Sockets">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Electrical_Sockets_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Electrical_Sockets_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Electrical_Sockets_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Electrical_Sockets_image" class="form-control mt-2">
                            <textarea name="Electrical_Sockets_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Visitor Log Sheet</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Visitor_Log_Sheet">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Visitor_Log_Sheet_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Visitor_Log_Sheet_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Visitor_Log_Sheet_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Visitor_Log_Sheet_image" class="form-control mt-2">
                            <textarea name="Visitor_Log_Sheet_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>CCTV Camera Playback Log</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="CCTV_Camera_Playback_Log">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Camera_Playback_Log_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Camera_Playback_Log_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Camera_Playback_Log_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="CCTV_Camera_Playback_Log_image" class="form-control mt-2">
                            <textarea name="CCTV_Camera_Playback_Log_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>CCTV Technical Register</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="CCTV_Technical_Register">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Technical_Register_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Technical_Register_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Technical_Register_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="CCTV_Technical_Register_image" class="form-control mt-2">
                            <textarea name="CCTV_Technical_Register_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Daily Occurence Book</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Daily_Occurrence_Book">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Daily_Occurrence_Book_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Daily_Occurrence_Book_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Daily_Occurrence_Book_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Daily_Occurrence_Book_image" class="form-control mt-2">
                            <textarea name="Daily_Occurrence_Book_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Incident Register Logbook</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Incident_Register_Logbook">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Incident_Register_Logbook_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Incident_Register_Logbook_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Incident_Register_Logbook_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Incident_Register_Logbook_image" class="form-control mt-2">
                            <textarea name="Incident_Register_Logbook_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Security Facility Management</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Security_Facility_Management">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Security_Facility_Management_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Security_Facility_Management_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Security_Facility_Management_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Security_Facility_Management_image" class="form-control mt-2">
                            <textarea name="Security_Facility_Management_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>CCTV Corporate and Operation Team</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="CCTV_Corporate_and_Operation_Team">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Corporate_and_Operation_Team_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Corporate_and_Operation_Team_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Corporate_and_Operation_Team_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="CCTV_Corporate_and_Operation_Team_image" class="form-control mt-2">
                            <textarea name="CCTV_Corporate_and_Operation_Team_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Security Quality Team</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Security_Quality_Team">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Security_Quality_Team_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Security_Quality_Team_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Security_Quality_Team_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Security_Quality_Team_image" class="form-control mt-2">
                            <textarea name="Security_Quality_Team_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>CCTV Technical Team</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="CCTV_Technical_Team">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Technical_Team_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Technical_Team_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="CCTV_Technical_Team_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="CCTV_Technical_Team_image" class="form-control mt-2">
                            <textarea name="CCTV_Technical_Team_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Video Analytic Team</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Video_Analytic_Team">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Video_Analytic_Team_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Video_Analytic_Team_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Video_Analytic_Team_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Video_Analytic_Team_image" class="form-control mt-2">
                            <textarea name="Video_Analytic_Team_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Maintenance issue and Logistic Request</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Maintenance_Issue_and_Logistic_Request">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Maintenance_Issue_and_Logistic_Request_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Maintenance_Issue_and_Logistic_Request_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Maintenance_Issue_and_Logistic_Request_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Maintenance_Issue_and_Logistic_Request_image" class="form-control mt-2">
                            <textarea name="Maintenance_Issue_and_Logistic_Request_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Radio Call Sign</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Radio_Call_Sign">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Radio_Call_Sign_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Radio_Call_Sign_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Radio_Call_Sign_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Radio_Call_Sign_image" class="form-control mt-2">
                            <textarea name="Radio_Call_Sign_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>HMC Mission, Vision & Values</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="HMC_Mission_Vision_and_Values">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="HMC_Mission_Vision_and_Values_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="HMC_Mission_Vision_and_Values_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="HMC_Mission_Vision_and_Values_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="HMC_Mission_Vision_and_Values_image" class="form-control mt-2">
                            <textarea name="HMC_Mission_Vision_and_Values_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>HMC Policies and SOPs</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="HMC_Police_and_SOPs">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="HMC_Police_and_SOPs_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="HMC_Police_and_SOPs_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="HMC_Police_and_SOPs_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="HMC_Police_and_SOPs_image" class="form-control mt-2">
                            <textarea name="HMC_Police_and_SOPs_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>09 of 2011</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="09_of_2011">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="09_of_2011_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="09_of_2011_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="09_of_2011_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="09_of_2011_image" class="form-control mt-2">
                            <textarea name="09_of_2011_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>



                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Incident Person Description</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Incident_Person_Description">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Incident_Person_Description_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Incident_Person_Description_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Incident_Person_Description_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Incident_Person_Description_image" class="form-control mt-2">
                            <textarea name="Incident_Person_Description_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Facility Emergency Codes</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Facility_Emergency_Codes">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Facility_Emergency_Codes_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Facility_Emergency_Codes_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Facility_Emergency_Codes_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Facility_Emergency_Codes_image" class="form-control mt-2">
                            <textarea name="Facility_Emergency_Codes_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Mobile Phone use - Pledge</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Mobile_Phone_Use_Pledge">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Mobile_Phone_Use_Pledge_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Mobile_Phone_Use_Pledge_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Mobile_Phone_Use_Pledge_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Mobile_Phone_Use_Pledge_image" class="form-control mt-2">
                            <textarea name="Mobile_Phone_Use_Pledge_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Non-Disclosure Agreement</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Non_Disclosure_Agreement">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Non_Disclosure_Agreement_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Non_Disclosure_Agreement_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Non_Disclosure_Agreement_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Non_Disclosure_Agreement_image" class="form-control mt-2">
                            <textarea name="Non_Disclosure_Agreement_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Male/Female Uniform Dress Code<label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Male_and_Female_Uniform_Dress_Code">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Male_and_Female_Uniform_Dress_Code_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Male_and_Female_Uniform_Dress_Code_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Male_and_Female_Uniform_Dress_Code_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Male_and_Female_Uniform_Dress_Code_image" class="form-control mt-2">
                            <textarea name="Male_and_Female_Uniform_Dress_Code_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>Uniform and Grooming Catalog</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="Uniform_and_Grooming_Catalog">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Uniform_and_Grooming_Catalog_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Uniform_and_Grooming_Catalog_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="Uniform_and_Grooming_Catalog_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="Uniform_and_Grooming_Catalog_image" class="form-control mt-2">
                            <textarea name="Uniform_and_Grooming_Catalog_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>White Board Marker</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="White_board_Marker">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_board_Marker_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_board_Marker_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_board_Marker_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="White_board_Marker_image" class="form-control mt-2">
                            <textarea name="White_board_Marker_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>White Board Cleaner</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="White_Board_Cleaner">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_Cleaner_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_Cleaner_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_Cleaner_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="White_Board_Cleaner_image" class="form-control mt-2">
                            <textarea name="White_Board_Cleaner_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center my-3">
                    <div class="col-lg-4 mb-2 mb-md-0">
                        <label>White Board Eraser</label>
                    </div>
                    <div class="col-lg-8 d-flex flex-wrap gap-2">
                        <input type="hidden" name="items[]" value="White_Board_Eraser">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_Eraser_condition" value="Yes">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_Eraser_condition" value="No">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input item-condition" type="radio" name="White_Board_Eraser_condition" value="N/A">
                            <label class="form-check-label">N/A</label>
                        </div>
                        <div class="details" style="display: none;">
                            <input type="file" name="White_Board_Eraser_image" class="form-control mt-2">
                            <textarea name="White_Board_Eraser_info" class="form-control mt-2" placeholder="Enter comments (optional)"></textarea>
                        </div>
                    </div>
                </div>











                <!-- Repeat for other items -->

                <button type="submit" class="btn  mt-3 d-flex justify-content-center align-items-center" style="background-color: #7a0443; color:white;">Submit</button>
            </form>
        </div>

    <script>
        document.querySelectorAll('input[name="zone"]').forEach(radio => {
            radio.addEventListener('change', function () {
                document.querySelectorAll('.zone-section').forEach(section => {
                    section.style.display = 'none';
                });

                document.querySelectorAll('.facility-select').forEach(select => {
                    select.selectedIndex = 0;
                });

                let selectedZoneSection = document.getElementById(this.id + 'Section');
                selectedZoneSection.style.display = 'block';
            });
        });

        // Show the item section when a facility is selected
        document.querySelectorAll('.facility-select').forEach(select => {
            select.addEventListener('change', function () {
                if (this.value !== "Select a facility") {
                    document.getElementById('itemSection').style.display = 'block';
                }
            });
        });

        // Function to show/hide file upload and comments based on condition
        function toggleDetails(conditionClass, detailsClass) {
            const conditions = document.querySelectorAll(conditionClass);
            conditions.forEach(condition => {
                condition.addEventListener('change', function () {
                    const details = this.closest('.row').querySelectorAll(detailsClass);
                    if (this.value === 'No') {
                        details.forEach(detail => {
                            detail.style.display = 'block';
                        });
                    } else {
                        details.forEach(detail => {
                            detail.style.display = 'none';
                        });
                    }
                });
            });
        }

        // Call this function properly
        toggleDetails('.item-condition', '.details');
    </script>
</body>

</html>
