<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZoneFacility;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ZoneFacilityController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'zone' => 'required|string',
            'central_zone_facility' => 'nullable|string',
            'south_zone_facility' => 'nullable|string',
            'north_zone_facility' => 'nullable|string',
            'west_zone_facility' => 'nullable|string',
            'items.*' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'workstation_desk_condition' => 'required|string',
            'workstation_desk_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'workstation_desk_info' => 'nullable|string',
            'workstation_cpu_condition' => 'required|string',
            'workstation_cpu_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'workstation_cpu_info' => 'nullable|string',

            'desk_monitor_condition' => 'required|string',
            'desk_monitor_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'desk_monitor_info' => 'nullable|string',

            'wall_monitor_condition' => 'required|string',
            'wall_monitor_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'wall_monitor_info' => 'nullable|string',


            'keyboard_condition' => 'required|string',
            'keyboard_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keyboard_info' => 'nullable|string',

            'Mouse_condition' => 'required|string',
            'Mouse_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Mouse_info' => 'nullable|string',


            'Joystick_condition' => 'required|string',
            'Joystick_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Joystick_info' => 'nullable|string',

            'Wireless_Radio_condition' => 'required|string',
            'Wireless_Radio_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Wireless_Radio_info' => 'nullable|string',
            'Radio_Multiple_Charger/Adapter_condition' => 'required|string',
            'Radio_Multiple_Charger/Adapter_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Radio_Multiple_Charger/Adapter_info' => 'nullable|string',


            'Extra_Radio_Batteries_condition' => 'required|string',
            'Extra_Radio_Batteries_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Extra_Radio_Batteries_info' => 'nullable|string',
            'Flashlight_With_Cable_Charger_condition' => 'required|string',
            'Flashlight_With_Cable_Charger_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Flashlight_With_Cable_Charger_info' => 'nullable|string',

            'Chairs_condition' => 'required|string',
            'Chairs_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Chairs_info' => 'nullable|string',


            'Water_Dispenser_condition' => 'required|string',
            'Water_Dispenser_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Water_Dispenser_info' => 'nullable|string',

            'Bulletin_Board_condition' => 'required|string',
            'Bulletin_Board_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Bulletin_Board_info' => 'nullable|string',

            'White_Board_condition' => 'required|string',
            'White_Board_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'White_Board_info' => 'nullable|string',

            'Cabinets_condition' => 'required|string',
            'Cabinets_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Cabinets_info' => 'nullable|string',

            'Landline/Cisco_condition' => 'required|string',
            'Landline/Cisco_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Landline/Cisco_info' => 'nullable|string',

            'Access_Card-Control_Room_condition' => 'required|string',
            'Access_Card-Control_Room_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Access_Card-Control_Room_info' => 'nullable|string',

            'AC_Temperature_Maintained_Below_23_Degrees_Control_Room_condition' => 'required|string',
            'AC_Temperature_Maintained_Below_23_Degrees_Control_Room_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'AC_Temperature_Maintained_Below_23_Degrees_Control_Room_info' => 'nullable|string',

            'Access_Card_Server_Room_condition' => 'required|string',
            'Access_Card_Server_Room_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Access_Card_Server_Room_info' => 'nullable|string',

            'AC_Temperature_Maintained_Below_23_Degrees_Server_Room_condition' => 'required|string',
            'AC_Temperature_Maintained_Below_23_Degrees_Server_Room_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'AC_Temperature_Maintained_Below_23_Degrees_Server_Room_info' => 'nullable|string',

            'Lighting_Regulator_Control_condition' => 'required|string',
            'Lighting_Regulator_Control_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Lighting_Regulator_Control_info' => 'nullable|string',

            'Temperature_Reader_condition' => 'required|string',
            'Temperature_Reader_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Temperature_Reader_info' => 'nullable|string',

            'AC_Remotes_condition' => 'required|string',
            'AC_Remotes_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'AC_Remotes_info' => 'nullable|string',

            'Fire_Extinguishers_condition' => 'required|string',
            'Fire_Extinguishers_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Fire_Extinguishers_info' => 'nullable|string',

            'MCP_if_inside_condition' => 'required|string',
            'MCP_if_inside_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'MCP_if_inside_info' => 'nullable|string',

            'Electrical_Sockets_condition' => 'required|string',
            'Electrical_Sockets_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Electrical_Sockets_info' => 'nullable|string',


            'Visitor_Log_Sheet_condition' => 'required|string',
            'Visitor_Log_Sheet_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Visitor_Log_Sheet_info' => 'nullable|string',


            'CCTV_Camera_Playback_Log_condition' => 'required|string',
            'CCTV_Camera_Playback_Log_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'CCTV_Camera_Playback_Log_info' => 'nullable|string',

            'CCTV_Technical_Register_condition' => 'required|string',
            'CCTV_Technical_Register_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'CCTV_Technical_Register_info' => 'nullable|string',

            'Daily_Occurrence_Book_condition' => 'required|string',
            'Daily_Occurrence_Book_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Daily_Occurrence_Book_info' => 'nullable|string',

            'Incident_Register_Logbook_condition' => 'required|string',
            'Incident_Register_Logbook_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Incident_Register_Logbook_info' => 'nullable|string',


            'Security_Facility_Management_condition' => 'required|string',
            'Security_Facility_Management_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Security_Facility_Management_info' => 'nullable|string',

            'Security_Quality_Team_condition' => 'required|string',
            'Security_Quality_Team_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Security_Quality_Team_info' => 'nullable|string',

            'CCTV_Technical_Team_condition' => 'required|string',
            'CCTV_Technical_Team_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'CCTV_Technical_Team_info' => 'nullable|string',

            'Video_Analytic_Team_condition' => 'required|string',
            'Video_Analytic_Team_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Video_Analytic_Team_info' => 'nullable|string',

            'Maintenance_Issue_and_Logistic_Request_condition' => 'required|string',
            'Maintenance_Issue_and_Logistic_Request_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Maintenance_Issue_and_Logistic_Request_info' => 'nullable|string',

            'Radio_Call_Sign_condition' => 'required|string',
            'Radio_Call_Sign_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Radio_Call_Sign_info' => 'nullable|string',


            'HMC_Mission_Vision_and_Values_condition' => 'required|string',
            'HMC_Mission_Vision_and_Values_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'HMC_Mission_Vision_and_Values_info' => 'nullable|string',

            'HMC_Police_and_SOPs_condition' => 'required|string',
            'HMC_Police_and_SOPs_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'HMC_Police_and_SOPs_info' => 'nullable|string',

            '09_of_2011_condition' => 'required|string',
            '09_of_2011_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            '09_of_2011_info' => 'nullable|string',


            'Incident_Person_Description_condition' => 'required|string',
            'Incident_Person_Description_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Incident_Person_Description_info' => 'nullable|string',

            'Facility_Emergency_Codes_condition' => 'required|string',
            'Facility_Emergency_Codes_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Facility_Emergency_Codes_info' => 'nullable|string',

            'Mobile_Phone_Use_Pledge_condition' => 'required|string',
            'Mobile_Phone_Use_Pledge_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Mobile_Phone_Use_Pledge_info' => 'nullable|string',

            'Non_Disclosure_Agreement_condition' => 'required|string',
            'Non_Disclosure_Agreement_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Non_Disclosure_Agreement_info' => 'nullable|string',

            'Male_and_Female_Uniform_Dress_Code_condition' => 'required|string',
            'Male_and_Female_Uniform_Dress_Code_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Male_and_Female_Uniform_Dress_Code_info' => 'nullable|string',

            'Uniform_and_Grooming_Catalog_condition' => 'required|string',
            'Uniform_and_Grooming_Catalog_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'Uniform_and_Grooming_Catalog_info' => 'nullable|string',

            'White_board_Marker_condition' => 'required|string',
            'White_board_Marker_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'White_board_Marker_info' => 'nullable|string',

            'White_Board_Cleaner_condition' => 'required|string',
            'White_Board_Cleaner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'White_Board_Cleaner_info' => 'nullable|string',

            'White_Board_Eraser_condition' => 'required|string',
            'White_Board_Eraser_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'White_Board_Eraser_info' => 'nullable|string',



                       // Add validation rules for other items as needed
        ]);

        // Collect data from the request
        $zone = $request->input('zone');
        $facilityName = $request->input("{$zone}_zone_facility"); // Retrieve facility based on selected zone
        $user_id = $request->input('user_id');

        // Collect all items and their details
        $items = $request->input('items', []);
        foreach ($items as $item) {
            $condition = $request->input("{$item}_condition");
            $imageUrl = null; // Default value for image URL
            $info = $request->input("{$item}_info", null); // Optional comments

            Log::info("Processing item: $item");

            if ($condition === 'No' && $request->hasFile("{$item}_image")) {
                $image = $request->file("{$item}_image");
                if ($image->isValid()) {
                    $imagePath = $image->store('public/images');
                    $imageUrl = Storage::url($imagePath);
                    Log::info("Image stored at: $imageUrl");
                } else {
                    Log::error("Invalid image file for: $item");
                }
            } else {
                Log::info("No image uploaded for: $item");

            }

            // Store the data in the database
            ZoneFacility::create([
                'zone' => $zone,
                'facility_name' => $facilityName,
                'item_name' => $item,
                'condition' => $condition,
                'image' => $imageUrl,
                'comments' => $info,
                'user_id' => $user_id

            ]);
        }

        return redirect()->back()->with('success', 'Facilities information has been submitted successfully!');
    }
}
