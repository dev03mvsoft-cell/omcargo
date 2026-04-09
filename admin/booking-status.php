<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .booking-hub {
        padding: 40px;
        background: #fff;
    }

    /* Minimalist Stepper */
    .minimal-stepper {
        display: flex;
        gap: 40px;
        margin-bottom: 50px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .m-step {
        font-size: 11px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 15px;
    }

    .m-step.completed {
        color: #059669;
    }

    .m-step.active {
        color: var(--primary);
    }

    .m-step.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--primary);
    }

    /* Modern Simple Table */
    .simple-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    .simple-table th {
        padding: 12px 15px;
        background: #f8fafc;
        font-size: 10px;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .simple-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .input-simple {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 8px 10px;
        font-size: 11px;
        font-weight: 600;
        color: #1e293b;
        background: #fff;
    }

    .input-simple:focus {
        border-color: var(--primary);
        outline: none;
    }

    .section-title {
        font-size: 12px;
        font-weight: 900;
        color: #1e293b;
        text-transform: uppercase;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .blue-pill {
        background: #eff6ff;
        color: #2563eb;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 9px;
        font-weight: 800;
    }

    .container-unit {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        background: #fcfdfe;
        position: relative;
    }

    .remove-unit {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #ef4444;
        cursor: pointer;
        font-size: 14px;
    }

    .s-label {
        font-size: 9px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        margin-bottom: 5px;
        display: block;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Booking Confirmation</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 03: LIVE BOOKING</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='custom-checklist.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitBooking()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">SAVE</button>
        </div>
    </header>

    <div class="booking-hub">
        <!-- 1. Magic Scanning Zone -->


        <!-- 2. Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. CARTING</div>
            <div class="m-step completed">02. CHECKLIST</div>
            <div class="m-step active">03. BOOKING</div>
            <div class="m-step">04. LINING</div>
            <div class="m-step">05. GATE IN</div>
            <div class="m-step">06. ONBOARD</div>
        </div>

        <div style="background: #eff6ff; border: 2px dashed #2563eb; padding: 25px; border-radius: 8px; margin-bottom: 40px; text-align: center;">
            <i class="fa-solid fa-cloud-arrow-up" style="font-size: 24px; color: #2563eb; margin-bottom: 10px;"></i>
            <h4 style="font-size: 12px; font-weight: 900; color: #1e3a8a;">UPLOAD BOOKING PDF</h4>
            <p style="font-size: 9px; color: #2563eb; font-weight: 700;">FILES WILL BE SCANNED TO AUTOMATICALLY POPULATE ALL TABLES</p>
        </div>

        <!-- 3. Booking Header Summary -->
        <div class="section-title">Booking Identification Summary</div>
        <div style="background: #f8fafc; padding: 10px; border-radius: 8px; margin-bottom: 40px; border: 1px solid #e2e8f0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 50px;">
            <div>
                <label class="s-label">Carrier Reference</label>
                <input type="text" class="input-simple" value="37724937" style="font-weight: 800;">
            </div>
            <div>
                <label class="s-label">Booking Date</label>
                <input type="text" class="input-simple" value="11-Jan-2025" style="font-weight: 800;">
            </div>
            <div>
                <label class="s-label">BL / SWB No(s)</label>
                <input type="text" class="input-simple" value="HLCUBO1250188161" style="font-weight: 800;">
            </div>
            <div>
                <label class="s-label">Quotation No</label>
                <input type="text" class="input-simple" value="Q2411IZM01628" style="font-weight: 800;">
            </div>
        </div>

        <!-- 4. Locations & Addresses -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 50px; margin-bottom: 40px;">
            <div>
                <div class="section-title" style="font-size: 10px;"><i class="fa-solid fa-truck-pickup"></i> Export Empty Pick-up</div>
                <textarea class="input-simple" style="height: 100px; font-weight: 700; font-size: 10px; line-height: 1.6;">TRANSWORLD TERMINALS
OFFICE NO.1, 1ST FLOOR, GANDHIDHAM, GUJARAT 370201</textarea>
            </div>
            <div>
                <div class="section-title" style="font-size: 10px;"><i class="fa-solid fa-anchor"></i> Export Delivery Address</div>
                <textarea class="input-simple" style="height: 100px; font-weight: 700; font-size: 10px; line-height: 1.6;">ADANI PORTS AND SPECIAL ECONOMIC ZO
APSEZ-CT2, MUNDRA, GUJARAT 370421</textarea>
            </div>
            <div>
                <div class="section-title" style="font-size: 10px;"><i class="fa-solid fa-location-dot"></i> Import Pick-up Address</div>
                <textarea class="input-simple" style="height: 100px; font-weight: 700; font-size: 10px; line-height: 1.6;">CP RAIL VAUGHAN
6830 RUTHERFORD ROAD, ONTARIO LOJ 1C0</textarea>
            </div>
        </div>
        <!-- 4.5 Transport Requirement (Conditional) -->
        <div style="background: #f8fafc; border-left: 4px solid #2563eb; padding: 25px; border-radius: 0 8px 8px 0; margin-bottom: 40px;">
            <div style="display: flex; gap: 30px; align-items: center;">
                <div style="font-size: 11px; font-weight: 900; color: #1e293b; text-transform: uppercase;">Is Local Transport Required?</div>
                <div style="display: flex; gap: 20px;">
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 700; cursor: pointer;">
                        <input type="radio" name="need_transport" value="yes" onclick="toggleTransport(true)"> YES
                    </label>
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 700; cursor: pointer;">
                        <input type="radio" name="need_transport" value="no" onclick="toggleTransport(false)" checked> NO
                    </label>
                </div>
            </div>

            <div id="transport-details" style="display: none; margin-top: 25px; padding-top: 20px; border-top: 1px solid #e2e8f0; grid-template-columns: repeat(4, 1fr); gap: 20px;">
                <div>
                    <label class="s-label">Transport Company Name</label>
                    <input type="text" class="input-simple" placeholder="E.G. OMAN CARGO LOGISTICS">
                </div>
                <div>
                    <label class="s-label">Trucks Required</label>
                    <input type="number" class="input-simple" placeholder="QTY" min="1">
                </div>
                <div>
                    <label class="s-label">Transport Invoice No.</label>
                    <input type="text" class="input-simple" placeholder="E.G. TR/24/001">
                </div>
                <div>
                    <label class="s-label">Upload Invoice</label>
                    <div style="display: flex; align-items: center; gap: 10px; padding: 5px; border: 1px solid #e2e8f0; border-radius: 4px; background: #fff;">
                        <label style="cursor: pointer; color: #3b82f6; font-size: 14px; margin-left: 10px;">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <input type="file" hidden>
                        </label>
                        <span style="font-size: 9px; color: #94a3b8; font-weight: 800;">ATTACH PDF</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Vessel & Routing Schedule -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="section-title" style="margin-bottom: 0;"><i class="fa-solid fa-ship"></i> Vessel & Routing Schedule</div>
            <button onclick="addRoutingRow()" class="btn" style="background:#fff; border: 1px solid #2563eb; color: #2563eb; font-size: 10px; font-weight: 800; padding: 8px 15px;">+ ADD ROUTING LEG</button>
        </div>
        <table class="simple-table" style="margin-bottom: 40px; border: 1px solid #e2e8f0;">
            <thead>
                <tr style="background: #f8fafc;">
                    <th width="200">From</th>
                    <th width="200">To</th>
                    <th width="320">By (Vessel Intelligence)</th>
                    <th width="150">ETD Date/Time</th>
                    <th width="150">ETA Date/Time</th>
                    <th width="50">Action</th>
                </tr>
            </thead>
            <tbody id="routing-registry">
                <tr>
                    <td>
                        <input type="text" class="input-simple" value="MUNDRA" style="font-weight: 800; border-bottom: none; border-radius: 4px 4px 0 0;">
                        <input type="text" class="input-simple" value="MUNDRA PORT & S.E.Z." style="font-size: 10px; border-bottom: none; border-radius: 0;">
                        <input type="text" class="input-simple" value="(INMUN)" style="font-size: 10px; border-radius: 0 0 4px 4px;">
                    </td>
                    <td>
                        <input type="text" class="input-simple" value="TANGER MED" style="font-weight: 800; border-bottom: none; border-radius: 4px 4px 0 0;">
                        <input type="text" class="input-simple" value="TANGER MED TC3" style="font-size: 10px; border-bottom: none; border-radius: 0;">
                        <input type="text" class="input-simple" value="(MAPTM)" style="font-size: 10px; border-radius: 0 0 4px 4px;">
                    </td>
                    <td>
                        <div style="display: grid; gap: 2px;">
                            <input type="text" class="input-simple" value="Vessel: OSAKA EXPRESS" style="font-weight: 800;">
                            <input type="text" class="input-simple" value="DP Voyage: 648309" style="font-size: 10px;">
                            <input type="text" class="input-simple" value="Voy. No: 5303W" style="font-size: 10px;">
                            <input type="text" class="input-simple" value="IMO No: 9320697" style="font-size: 10px;">
                            <input type="text" class="input-simple" value="Call Sign: 5LLI9" style="font-size: 10px;">
                            <input type="text" class="input-simple" value="Flag: LIBERIA" style="font-size: 10px;">
                        </div>
                    </td>
                    <td>
                        <input type="date" class="input-simple" value="2025-01-30" style="margin-bottom: 5px;">
                        <input type="time" class="input-simple" value="13:00">
                    </td>
                    <td>
                        <input type="date" class="input-simple" value="2025-02-26" style="margin-bottom: 5px;">
                        <input type="time" class="input-simple" value="07:00">
                    </td>
                    <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
                </tr>
            </tbody>
        </table>

        <!-- 6. Deadlines & Actions -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="section-title" style="margin-bottom: 0;">
                <i class="fa-solid fa-clock-rotate-left"></i> Deadlines & Actions
                <span class="blue-pill">LIVE STATUS</span>
            </div>
            <button onclick="addDeadlineRow()" class="btn" style="background:#fff; border: 1px solid #2563eb; color: #2563eb; font-size: 10px; font-weight: 800; padding: 8px 15px;">+ ADD DEADLINE</button>
        </div>
        <table class="simple-table" style="margin-bottom: 40px;">
            <thead>
                <tr>
                    <th width="220">Deadline Type</th>
                    <th width="140">Location</th>
                    <th width="180">Date / Time</th>
                    <th>Required Action</th>
                    <th width="50">Action</th>
                </tr>
            </thead>
            <tbody id="deadline-registry">
                <tr>
                    <td><input type="text" class="input-simple" value="Shipping instruction closing" style="font-weight: 700;"></td>
                    <td><input type="text" class="input-simple" value="MUNDRA (INMUN)"></td>
                    <td><input type="datetime-local" class="input-simple" value="2025-01-27T14:00"></td>
                    <td><input type="text" class="input-simple" value="Provide your final BL/SWB instructions"></td>
                    <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
                </tr>
                <tr>
                    <td><input type="text" class="input-simple" value="VGM cut-off" style="font-weight: 700;"></td>
                    <td><input type="text" class="input-simple" value="MUNDRA (INMUN)"></td>
                    <td><input type="datetime-local" class="input-simple" value="2025-01-28T16:00"></td>
                    <td><input type="text" class="input-simple" value="Provide verified VGM data"></td>
                    <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
                </tr>
            </tbody>
        </table>

        <!-- 7. Container & Cargo Details Wrapper -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="section-title" style="margin-bottom: 0;">
                <i class="fa-solid fa-box-open"></i> Container & Cargo Details
            </div>
            <div style="display: flex; gap: 10px; align-items: center;">
                <input type="number" id="units-to-add" min="1" max="100" class="input-simple" style="width: 50px;" placeholder="QTY">
                <button onclick="smartAddUnits()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">+ ADD CONTAINER</button>
            </div>
        </div>

        <div id="container-wrapper">
            <!-- Container Units will be injected here -->
        </div>

    </div>
</main>

<script>
    let containerCount = 0;

    function renderContainerBlock(index) {
        return `
            <div class="container-unit" id="unit-${index}">
                <i class="fa-solid fa-trash-can remove-unit" onclick="removeUnit(${index})"></i>
                <div style="font-size: 10px; font-weight: 900; color: #2563eb; margin-bottom: 15px; border-bottom: 1px solid #eff6ff; padding-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                    <span style="background: #2563eb; color: #fff; padding: 2px 8px; border-radius: 30px;">UNIT ${index}</span> 
                    CONTAINER IDENTITY & CARGO METADATA
                </div>
                <table class="simple-table">
                    <thead>
                        <tr>
                            <th width="80">Type</th>
                            <th width="150">Container No.</th>
                            <th width="50">SOW</th>
                            <th width="150">Pick up Date</th>
                            <th width="200">Pick up Depot</th>
                            <th width="80">Upload</th>
                            <th>Add. Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="input-simple" value="22GP" style="font-weight: 800;"></td>
                            <td><input type="text" class="input-simple" placeholder="ENTER NO." style="font-weight: 800; text-transform: uppercase;"></td>
                            <td><input type="text" class="input-simple" value="N" style="text-align: center;"></td>
                            <td><input type="date" class="input-simple" value="2025-01-24"></td>
                            <td><input type="text" class="input-simple" value="TRANSWORLD TERMINALS"></td>
                            <td align="center">
                                <label style="cursor: pointer; color: #3b82f6; font-size: 14px;">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    <input type="file" hidden>
                                </label>
                            </td>
                            <td><input type="text" class="input-simple" value="-"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="simple-table" style="border: 1px solid #e2e8f0; margin-bottom: 0;">
                    <tr>
                        <td width="200" style="background: #f8fafc; font-weight: 800; font-size: 10px; color: #475569; text-transform: uppercase;">Detailed Type</td>
                        <td><input type="text" class="input-simple" value="20' X 8' X 8'6&quot; GENERAL PURPOSE CONT."></td>
                    </tr>
                    <tr>
                        <td width="200" style="background: #f8fafc; font-weight: 800; font-size: 10px; color: #475569; text-transform: uppercase;">Commodity Info</td>
                        <td><input type="text" class="input-simple" value="NATURAL STONE PEBBLE MOSAIC | HS Code: 68 02 00 | Gross Weight: 25000.0 KGM"></td>
                    </tr>
                </table>
            </div>
        `;
    }

    function toggleTransport(show) {
        const details = document.getElementById('transport-details');
        details.style.display = show ? 'grid' : 'none';
    }

    function addRoutingRow() {
        const tbody = document.getElementById('routing-registry');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <input type="text" class="input-simple" placeholder="PORT" style="font-weight: 800; border-bottom: none; border-radius: 4px 4px 0 0;">
                <input type="text" class="input-simple" placeholder="TERMINAL" style="font-size: 10px; border-bottom: none; border-radius: 0;">
                <input type="text" class="input-simple" placeholder="CODE" style="font-size: 10px; border-radius: 0 0 4px 4px;">
            </td>
            <td>
                <input type="text" class="input-simple" placeholder="PORT" style="font-weight: 800; border-bottom: none; border-radius: 4px 4px 0 0;">
                <input type="text" class="input-simple" placeholder="TERMINAL" style="font-size: 10px; border-bottom: none; border-radius: 0;">
                <input type="text" class="input-simple" placeholder="CODE" style="font-size: 10px; border-radius: 0 0 4px 4px;">
            </td>
            <td>
                <div style="display: grid; gap: 2px;">
                    <input type="text" class="input-simple" placeholder="VESSEL NAME" style="font-weight: 800;">
                    <input type="text" class="input-simple" placeholder="DP VOYAGE" style="font-size: 10px;">
                    <input type="text" class="input-simple" placeholder="VOY. NO" style="font-size: 10px;">
                    <input type="text" class="input-simple" placeholder="IMO NO" style="font-size: 10px;">
                    <input type="text" class="input-simple" placeholder="CALL SIGN" style="font-size: 10px;">
                    <input type="text" class="input-simple" placeholder="FLAG" style="font-size: 10px;">
                </div>
            </td>
            <td>
                <input type="date" class="input-simple" style="margin-bottom: 5px;">
                <input type="time" class="input-simple">
            </td>
            <td>
                <input type="date" class="input-simple" style="margin-bottom: 5px;">
                <input type="time" class="input-simple">
            </td>
            <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
        `;
        tbody.appendChild(tr);
    }

    function addDeadlineRow() {
        const tbody = document.getElementById('deadline-registry');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" class="input-simple" placeholder="E.G. HAZARDOUS CUT-OFF" style="font-weight: 700;"></td>
            <td><input type="text" class="input-simple" placeholder="LOCATION"></td>
            <td><input type="datetime-local" class="input-simple"></td>
            <td><input type="text" class="input-simple" placeholder="REQUIRED ACTION"></td>
            <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
        `;
        tbody.appendChild(tr);
    }

    function addContainerUnit() {
        containerCount++;
        const wrapper = document.getElementById('container-wrapper');
        const div = document.createElement('div');
        div.innerHTML = renderContainerBlock(containerCount);
        wrapper.appendChild(div.firstElementChild);
    }

    function smartAddUnits() {
        const qtyInput = document.getElementById('units-to-add');
        const qty = parseInt(qtyInput.value) || 1; // Default to 1 if empty/NaN

        for (let i = 0; i < qty; i++) {
            addContainerUnit();
        }
        qtyInput.value = ''; // Reset after use
    }

    function removeUnit(index) {
        document.getElementById(`unit-${index}`).remove();
    }

    function submitBooking() {
        if (containerCount === 0) {
            Swal.fire('Empty Booking', 'Please add at least one container unit before saving.', 'warning');
            return;
        }
        Swal.fire({
            title: 'Booking Saved',
            text: 'Shipment metadata has been locked. Moving to Stage 04: Line Process.',
            icon: 'success',
            confirmButtonColor: '#2563eb'
        }).then(() => {
            window.location.href = 'container-stuffing.php';
        });
    }

    // Initialize with 1 unit
    window.onload = function() {
        addContainerUnit();
    };
</script>

<?php include 'includes/footer.php'; ?>