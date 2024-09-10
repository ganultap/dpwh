<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dp text-white">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item Details</h5>
                    
                    <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill"></i></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding item data -->
                    <!-- Modify this form based on the fields in your database table -->

                        
                    <form action="ItemController.php" method="POST">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " id="equipment_type" name="equipment_type" required>
                                        <option value="" selected disabled>Choose Equipment Type</option>
                                        <option value="Biometric">Biometric</option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="IP Phone">IP Phone</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Network Attached Storage (NAS)">Network Attached Storage (NAS)
                                        </option>
                                        <option value="Network Switch">Network Switch</option>
                                        <option value="Others">Others</option>
                                        <option value="PABX">PABX</option>
                                        <option value="Plotter">Plotter</option>
                                        <option value="Printer - MFP">Printer - MFP</option>
                                        <option value="Printer - MFP Wide Format">Printer - MFP Wide Format</option>
                                        <option value="Printer - Single Function">Printer - Single Function</option>
                                        <option value="Projector">Projector</option>
                                        <option value="Router">Router</option>
                                        <option value="Scanner">Scanner</option>
                                        <option value="Server">Server</option>
                                        <option value="Smartphone">Smartphone</option>
                                        <option value="Tablet">Tablet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " id="acquisition_type" name="acquisition_type" required>
                                        <option value="" selected disabled>Choose Acquisition Type</option>
                                        <option value="Procured">Procured</option>
                                        <option value="Turned over by contractor">Turned over by contractor</option>
                                        <option value="Turned over by DPWH Central Office">Turned over by DPWH Central
                                            Office</option>
                                        <option value="NONE">NONE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select" id="section" name="section" required>
                                        <option value="" selected disabled>Select Section</option>
                                        <option value="ODE">Office of the District Engineer</option>
                                        <option value="OADE">Office of the Assistant District Engineer</option>
                                        <option value="HRAS">Human Resource and Administrative Section</option>
                                        <option value="BAC">Bids and Awards Committee</option>
                                        <option value="COA">Commission on Audit</option>
                                        <option value="MS">Maintenance Section</option>
                                        <option value="CS">Construction Section</option>
                                        <option value="RMU">Records Management Unit</option>
                                        <option value="SPU">Supply and Property Unit</option>
                                        <option value="PDS">Planning and Design Section</option>
                                        <option value="PS">Procurement Staff</option>
                                        <option value="QAS">Quality Assurance Section</option>
                                        <option value="FS">Finance Section</option>
                                        <option value="LADP">LADP</option>
                                        <option value="ICTS">Information Communications Technology Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " name="processor" id="processor" required>
                                        <option value="" selected disabled>Select Processor</option>
                                        <optgroup label="Computer Processors">
                                            <!-- Intel Core Series -->
                                            <option value="Intel Core i9-11900K">Intel Core i9-11900K</option>
                                            <option value="Intel Core i7-11700K">Intel Core i7-11700K</option>
                                            <option value="Intel Core i5-11600K">Intel Core i5-11600K</option>
                                            <option value="Intel Core i3-10100">Intel Core i3-10100</option>
                                            <!-- AMD Ryzen Series -->
                                            <option value="AMD Ryzen 9 5950X">AMD Ryzen 9 5950X</option>
                                            <option value="AMD Ryzen 7 5800X">AMD Ryzen 7 5800X</option>
                                            <option value="AMD Ryzen 5 5600X">AMD Ryzen 5 5600X</option>
                                            <!-- Intel Xeon Series -->
                                            <option value="Intel Xeon W-3175X">Intel Xeon W-3175X</option>
                                            <option value="Intel Xeon E-2288G">Intel Xeon E-2288G</option>
                                            <option value="Intel Xeon Scalable Platinum 9282">Intel Xeon Scalable
                                                Platinum 9282
                                            </option>
                                            <!-- AMD EPYC Series -->
                                            <option value="AMD EPYC 7763">AMD EPYC 7763</option>
                                            <option value="AMD EPYC 7713">AMD EPYC 7713</option>
                                            <option value="AMD EPYC 75F3">AMD EPYC 75F3</option>
                                        </optgroup>
                                        <optgroup label="Older Computer Processors">
                                            <!-- Intel Core Series -->
                                            <option value="Intel Core i7-7700K">Intel Core i7-7700K</option>
                                            <option value="Intel Core i5-7600K">Intel Core i5-7600K</option>
                                            <option value="Intel Core i3-7100">Intel Core i3-7100</option>
                                            <option value="Intel Pentium">Intel Pentium</option>
                                            <option value="Intel Pentium II">Intel Pentium II</option>
                                            <option value="Intel Pentium IV">Intel Pentium IV</option>
                                            <option value="Intel Core 2 Quad Q6600">Intel Core 2 Quad Q6600</option>
                                            <option value="Intel Dual Core">Intel Dual Core</option>
                                            <option value="Intel Core 2 Duo">Intel Core 2 Duo</option>
                                            <option value="Intel Core Duo">Intel Core Duo</option>
                                            <!-- AMD Ryzen Series -->
                                            <option value="AMD Ryzen 7 2700X">AMD Ryzen 7 2700X</option>
                                            <option value="AMD Ryzen 5 2600X">AMD Ryzen 5 2600X</option>
                                            <option value="AMD Ryzen 3 2200G">AMD Ryzen 3 2200G</option>
                                            <!-- Intel Xeon Series -->
                                            <option value="Intel Xeon E3-1230 V6">Intel Xeon E3-1230 V6</option>
                                            <option value="Intel Xeon E5-2680 v2">Intel Xeon E5-2680 v2</option>
                                            <!-- Others -->
                                            <option value="AMD">AMD</option>
                                            <option value="AMD FX-8350">AMD FX-8350</option>
                                            
                                        </optgroup>
                                        <optgroup label="Smartphone Processors">
                                            <!-- Apple A Series -->
                                            <option value="Apple A15 Bionic">Apple A15 Bionic</option>
                                            <option value="Apple A14 Bionic">Apple A14 Bionic</option>
                                            <option value="Apple A13 Bionic">Apple A13 Bionic</option>
                                            <!-- Qualcomm Snapdragon Series -->
                                            <option value="Qualcomm Snapdragon 888">Qualcomm Snapdragon 888</option>
                                            <option value="Qualcomm Snapdragon 865">Qualcomm Snapdragon 865</option>
                                            <option value="Qualcomm Snapdragon 855">Qualcomm Snapdragon 855</option>
                                            <!-- Samsung Exynos Series -->
                                            <option value="Samsung Exynos 2200">Samsung Exynos 2200</option>
                                            <option value="Samsung Exynos 2100">Samsung Exynos 2100</option>
                                            <option value="Samsung Exynos 990">Samsung Exynos 990</option>
                                            <!-- Huawei Kirin Series -->
                                            <option value="Huawei Kirin 9000">Huawei Kirin 9000</option>
                                            <option value="Huawei Kirin 990">Huawei Kirin 990</option>
                                            <option value="Huawei Kirin 980">Huawei Kirin 980</option>
                                            <option value="NONE">NONE</option>
                                        </optgroup>
                                    </select>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " id="ram" name="ram" required>
                                        <option value="" selected disabled>Select RAM</option>
                                        <option value="1GB">1GB</option>
                                        <option value="2GB">2GB</option>
                                        <option value="3GB">3GB</option>
                                        <option value="4GB">4GB</option>
                                        <option value="6GB">6GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="16GB">16GB</option>
                                        <option value="32GB">32GB</option>
                                        <option value="64GB">64GB</option>
                                        <option value="NONE">NONE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " name="disk_size" id="disk_size" required>
                                        <option value="" selected disabled>Select Hard Disk Size</option>
                                        <option value="1 GB">1 GB</option>
                                        <option value="2 GB">2 GB</option>
                                        <option value="4 GB">4 GB</option>
                                        <option value="8 GB">8 GB</option>
                                        <option value="16 GB">16 GB</option>
                                        <option value="20 GB">20 GB</option>
                                        <option value="32 GB">32 GB</option>
                                        <option value="40 GB">40 GB</option>
                                        <option value="64 GB">64 GB</option>
                                        <option value="80 GB">80 GB</option>
                                        <option value="128 GB">128 GB</option>
                                        <option value="160 GB">160 GB</option>
                                        <option value="256 GB">256 GB</option>
                                        <option value="320 GB">320 GB</option>
                                        <option value="512 GB">512 GB</option>
                                        <option value="750 GB">750 GB</option>
                                        <option value="1 TB">1 TB</option>
                                        <option value="2 TB">2 TB</option>
                                        <option value="4 TB">4 TB</option>
                                        <option value="8 TB">8 TB</option>
                                        <option value="16 TB">16 TB</option>
                                        <option value="NONE">NONE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " id="licensed_os" name="licensed_os" required>
                                        <option value="" selected disabled>Select Licensed OS</option>
                                        <option value="Windows 95">Windows 95</option>
                                        <option value="Windows 98">Windows 98</option>
                                        <option value="Windows ME">Windows ME (Millennium Edition)</option>
                                        <option value="Windows 2000 Professional">Windows 2000 Professional</option>
                                        <option value="Windows XP Home Edition">Windows XP Home Edition</option>
                                        <option value="Windows XP Professional">Windows XP Professional</option>
                                        <option value="Windows Vista Home Basic">Windows Vista Home Basic</option>
                                        <option value="Windows Vista Home Premium">Windows Vista Home Premium</option>
                                        <option value="Windows Vista Business">Windows Vista Business</option>
                                        <option value="Windows Vista Enterprise">Windows Vista Enterprise</option>
                                        <option value="Windows Vista Ultimate">Windows Vista Ultimate</option>
                                        <option value="Windows 7 Starter">Windows 7 Starter</option>
                                        <option value="Windows 7 Home Basic">Windows 7 Home Basic</option>
                                        <option value="Windows 7 Home Premium">Windows 7 Home Premium</option>
                                        <option value="Windows 7 Professional">Windows 7 Professional</option>
                                        <option value="Windows 7 Enterprise">Windows 7 Enterprise</option>
                                        <option value="Windows 7 Ultimate">Windows 7 Ultimate</option>
                                        <option value="Windows 8">Windows 8</option>
                                        <option value="Windows 8 Single Language">Windows 8 Single Language</option>
                                        <option value="Windows 8 Single Language">Windows 8.1 Single Language</option>
                                        <option value="Windows 8">Windows 8 Pro</option>
                                        <option value="Windows 8.1">Windows 8.1 Pro</option>
                                        <option value="Windows 10 Home">Windows 10 Home</option>
                                        <option value="Windows 10 Pro">Windows 10 Pro</option>
                                        <option value="Windows 10 Pro Education">Windows 10 Pro Education</option>
                                        <option value="Windows 10 Pro for Workstations">Windows 10 Pro for Workstations
                                        </option>
                                        <option value="Windows 10 Enterprise">Windows 10 Enterprise</option>
                                        <option value="Windows 10 Education">Windows 10 Education</option>
                                        <option value="Windows 11 Home">Windows 11 Home</option>
                                        <option value="Windows 11 Pro">Windows 11 Pro</option>
                                        <option value="Windows 11 Enterprise">Windows 11 Enterprise</option>
                                        <option value="NONE">NONE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " id="licensed_mso" name="licensed_mso" required>
                                        <option value="" selected disabled>Select Licensed Microsoft Office</option>
                                        <option value="Microsoft Office 97 Standard Edition">Microsoft Office 97 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2000 Standard Edition">Microsoft Office 2000 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2000 Professional Edition">Microsoft Office 2000
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2000 Small Business Edition">Microsoft Office
                                            2000 -
                                            Small Business Edition</option>
                                        <option value="Microsoft Office XP Standard Edition">Microsoft Office XP -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office XP Professional Edition">Microsoft Office XP -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2003 Standard Edition">Microsoft Office 2003 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2003 Professional Edition">Microsoft Office 2003
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2003 Small Business Edition">Microsoft Office
                                            2003 -
                                            Small Business Edition</option>
                                        <option value="Microsoft Office 2003 Student and Teacher Edition">Microsoft
                                            Office 2003
                                            - Student and Teacher Edition</option>
                                        <option value="Microsoft Office 2003 Basic Edition">Microsoft Office 2003 -
                                            Basic
                                            Edition</option>
                                        <option value="Microsoft Office 2007 Standard Edition">Microsoft Office 2007 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2007 Home and Student Edition">Microsoft Office
                                            2007 -
                                            Home and Student Edition</option>
                                        <option value="Microsoft Office 2007 Small Business Edition">Microsoft Office
                                            2007 -
                                            Small Business Edition</option>
                                        <option value="Microsoft Office 2007 Professional Edition">Microsoft Office 2007
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2007 Ultimate Edition">Microsoft Office 2007 -
                                            Ultimate
                                            Edition</option>
                                        <option value="Microsoft Office 2007 Enterprise">Microsoft Office 2007 -
                                            Enterprise
                                            Edition</option>
                                        <option value="Microsoft Office 2010 Home and Student Edition">Microsoft Office
                                            2010 -
                                            Home and Student Edition</option>
                                        <option value="Microsoft Office 2010 Home and Business Edition">Microsoft Office
                                            2010 -
                                            Home and Business Edition</option>
                                        <option value="Microsoft Office 2010 Standard Edition">Microsoft Office 2010 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2010 Professional Edition">Microsoft Office 2010
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2010 Professional Plus Edition">Microsoft Office
                                            2010 -
                                            Professional Plus Edition</option>
                                        <option value="Microsoft Office 2013 Home and Student Edition">Microsoft Office
                                            2013 -
                                            Home and Student Edition</option>
                                        <option value="Microsoft Office 2013 Home and Business Edition">Microsoft Office
                                            2013 -
                                            Home and Business Edition</option>
                                        <option value="Microsoft Office 2013 Standard Edition">Microsoft Office 2013 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2013 Professional Edition">Microsoft Office 2013
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2013 Professional Plus Edition">Microsoft Office
                                            2013 -
                                            Professional Plus Edition</option>
                                        <option value="Microsoft Office 2016 Home and Student Edition">Microsoft Office
                                            2016 -
                                            Home and Student Edition</option>
                                        <option value="Microsoft Office 2016 Home and Business Edition">Microsoft Office
                                            2016 -
                                            Home and Business Edition</option>
                                        <option value="Microsoft Office 2016 Standard Edition">Microsoft Office 2016 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2016 Professional Edition">Microsoft Office 2016
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office 2016 Professional Plus Edition">Microsoft Office
                                            2016 -
                                            Professional Plus Edition</option>
                                        <option value="Microsoft Office 2019 Home and Student Edition">Microsoft Office
                                            2019 -
                                            Home and Student Edition</option>
                                        <option value="Microsoft Office 2019 Home and Business Edition">Microsoft Office
                                            2019 -
                                            Home and Business Edition</option>
                                        <option value="Microsoft Office 2019 Standard Edition">Microsoft Office 2019 -
                                            Standard
                                            Edition</option>
                                        <option value="Microsoft Office 2019 Professional Edition">Microsoft Office 2019
                                            -
                                            Professional Edition</option>
                                        <option value="Microsoft Office LTSC Standard 2021">Microsoft Office LTSC Standard 2021</option>
                                        <option value="Microsoft 365 Home">Microsoft 365 - Home</option>
                                        <option value="Microsoft 365 Personal">Microsoft 365 - Personal</option>
                                        <option value="Microsoft 365 Business">Microsoft 365 - Business</option>
                                        <option value="Microsoft 365 Enterprise">Microsoft 365 - Enterprise</option>
                                        <option value="NONE">NONE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <select class="form-control form-select " id="status" name="status" required>
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="For Repair">For Repair</option>
                                        <option value="Operational">Operational</option>
                                        <option value="Unserviceable">Unserviceable</option>
                                        <option value="For Disposal">For Disposal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 form-floating">
                            <textarea class="form-control" id="other_installed_software" name="other_installed_software"
                                placeholder="List down other software installed separated by comma ','"
                                required></textarea>
                            <label for="other_installed_software">List down other software installed separated by comma ','</label>
                        </div>
                        <div class="row">

                            <div class="col-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="are_par_ics" name="are_par_ics" placeholder="Enter ARE / PAR / ICS No." required>
                                    <label for="are_par_ics">Enter ARE / PAR / ICS No.</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="serial_no" name="serial_no"
                                        placeholder="Enter Serial No." required>
                                        <label for="serial_no">Enter Serial No.</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="inventory_item_no"
                                        name="inventory_item_no" placeholder="Enter Inventory Item No." required>
                                        <label for="inventory_item_no">Enter Inventory Item No.</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
                                    <label for="description">Enter Description</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model" required>
                                    <label for="model">Enter Model</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand" required>
                                    <label for="brand">Enter Brand</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">        
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <input type="number" class="form-control" id="unit_cost" name="unit_cost" placeholder="Enter Unit Cost" min="0" step="0.01" required>
                                    <label for="unit_cost">Enter Unit Cost</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="end_user" name="end_user" placeholder="Enter End User" required>
                                    <label for="end_user">Enter End User</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required>
                                    <label for="designation">Enter Designation</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="asset_owner" name="asset_owner" placeholder="Enter Asset Owner" required>
                                    <label for="asset_owner">Enter Asset Owner</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_received" class="form-label">Date Received</label>
                                    <input type="date" class="form-control" id="date_received" name="date_received" pattern="\d{4}-\d{2}-\d{2}" placeholder="Select Date Received" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="acquisition_date" class="form-label">Acquisition Date</label>
                                    <input type="date" class="form-control" id="acquisition_date" name="acquisition_date" pattern="\d{4}-\d{2}-\d{2}" placeholder="Select Acquisition Date" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="received_from" name="received_from" placeholder="Received From:" required>
                                    <label for="received_from">Received From:</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter Supplier (if applicable)" required>
                                    <label for="supplier">Enter Supplier</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="computer_name" name="computer_name" placeholder="Computer Name or IP Address" required>
                                    <label for="computer_name">Computer Name or IP</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 form-floating">
                                    <textarea type="text" class="form-control" id="remarks" name="remarks"
                                        placeholder="Enter Remarks" required></textarea>
                                        <label for="remarks">Enter Remarks</label>
                                </div>
                            </div>
                        </div>

                        <!-- Add other input fields similarly -->
                        <!-- Repeat for each input field -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>