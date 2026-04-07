<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

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
        margin-bottom: 30px;
        border: 1px solid #e2e8f0;
    }

    .simple-table th {
        padding: 12px 15px;
        background: #f8fafc;
        font-size: 10px;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 2px solid #e2e8f0;
    }

    .simple-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        font-size: 11px;
        font-weight: 600;
    }

    .input-simple {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 8px 10px;
        font-size: 11px;
        font-weight: 700;
        color: #1e293b;
        background: #fff;
    }

    .input-simple:focus {
        border-color: var(--primary);
        outline: none;
    }

    .section-title {
        font-size: 12px;
        font-weight: 950;
        color: #1e293b;
        text-transform: uppercase;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .s-label {
        font-size: 9px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        margin-bottom: 5px;
        display: block;
    }

    .blue-pill {
        background: #eff6ff;
        color: #2563eb;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 9px;
        font-weight: 800;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 950;">Factory Booking Hub</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 03: LIVE CARRIER SYNC | COMPREHENSIVE BOOKING STATUS</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitBooking()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800; background: var(--primary);">SAVE & FINALIZE BOOKING</button>
        </div>
    </header>

    <div class="booking-hub">
        <!-- 1. Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. JOB CREATE</div>
            <div class="m-step completed">02. CHECKLIST</div>
            <div class="m-step active">03. BOOKING</div>
            <div class="m-step">04. GATE IN</div>
            <div class="m-step">05. ONBOARD</div>
        </div>

        <!-- 2. Magic Scanning Zone -->
        <div style="background: #eff6ff; border: 2px dashed #2563eb; padding: 25px; border-radius: 8px; margin-bottom: 40px; text-align: center;">
            <i class="fa-solid fa-cloud-arrow-up" style="font-size: 24px; color: #2563eb; margin-bottom: 10px;"></i>
            <h4 style="font-size: 12px; font-weight: 900; color: #1e3a8a;">UPLOAD BOOKING CONFIRMATION PDF</h4>
            <p style="font-size: 9px; color: #2563eb; font-weight: 700;">AI WILL SCAN THE PDF TO AUTOMATICALLY POPULATE ROUTING & CONTAINER TABLES</p>
        </div>

        <!-- 3. Booking Header Summary -->
        <div class="section-title">Booking Identification Summary</div>
        <div style="background: #f8fafc; padding: 10px; border-radius: 8px; margin-bottom: 40px; border: 1px solid #e2e8f0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 50px;">
            <div>
                <label class="s-label">Carrier Reference</label>
                <input type="text" id="booking-ref" class="input-simple" value="37724937" style="font-weight: 800; color: var(--primary);">
            </div>
            <div>
                <label class="s-label">Booking Date</label>
                <input type="text" class="input-simple" value="11-Jan-2025" style="font-weight: 800;">
            </div>
            <div>
                <label class="s-label">BL / SWB No(s)</label>
                <input type="text" id="bl-no" class="input-simple" value="HLCUBO125018" style="font-weight: 800;">
            </div>
            <div>
                <label class="s-label">Vessel Schedule</label>
                <input type="text" id="vessel-disp" class="input-simple" readonly style="background: #f1f5f9; font-weight: 800;">
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

        <!-- 5. Transport Requirement -->
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

        <!-- 6. Vessel & Routing Schedule -->
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
                            <input type="text" class="input-simple" value="Voy. No: 5303W" style="font-size: 10px;">
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

        <!-- 7. Deadlines & Actions -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="section-title" style="margin-bottom: 0;">
                <i class="fa-solid fa-clock-rotate-left"></i> Deadlines & Actions
                <span class="blue-pill">LIVE STATUS</span>
            </div>
            <button onclick="addDeadlineRow()" class="btn" style="background:#fff; border: 1px solid #2563eb; color: #2563eb; font-size: 10px; font-weight: 800; padding: 8px 15px;">+ ADD DEADLINE</button>
        </div>
        <table class="simple-table" style="margin-bottom: 40px; border: 1px solid #e2e8f0;">
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
            </tbody>
        </table>

        <!-- 8. Strategic Booking & Lifecycle Matrix (THE LEDGER) -->
        <div class="section-title">
            <i class="fa-solid fa-satellite-dish" style="color: var(--primary);"></i> Strategic Booking & Lifecycle Matrix
        </div>

        <div style="overflow-x: auto; border: 1px solid #000; border-radius: 4px; background: #fff; margin-bottom: 30px;">
            <table style="width: 100%; border-collapse: collapse; min-width: 1800px; font-size: 10px;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 2px solid #000;">
                        <th width="40" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: center;">SR</th>
                        <th width="250" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: left;">DESCRIPTION OF GOODS</th>
                        <th width="150" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: left;">CONTAINER NUMBER</th>
                        <th width="80" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: center;">SIZE</th>
                        <th width="120" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: left;">SEAL NUMBER</th>
                        <th width="120" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: left;">TRUCK NUMBER</th>
                        <th width="100" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: center;">NET WT</th>
                        <th width="100" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: center;">TARE WT</th>
                        <th width="100" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: center;">GROSS WT</th>
                        <th width="150" style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: center;">BOOKING STATUS</th>
                        <th style="padding: 10px; text-align: left;">REMARK / LOGISTICS NOTE</th>
                    </tr>
                </thead>
                <tbody id="tracking-body">
                    <!-- Items populated from session -->
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rawData = localStorage.getItem('currentFactoryJob');
        if (!rawData) {
            Swal.fire('Session Expired', 'Job metadata not found.', 'warning').then(() => {
                window.location.href = 'job-create.php';
            });
            return;
        }

        const job = JSON.parse(rawData);

        // Header Sync
        document.getElementById('vessel-disp').value = `${job.vesselName || 'TBD'} / ${job.voyageNo || 'TBD'}`;
        if (job.bookingNo && job.bookingNo !== 'TBD') {
            document.getElementById('booking-ref').value = job.bookingNo;
        }

        // Tracking Table Hydration
        const tbody = document.getElementById('tracking-body');
        if (job.items && job.items.length > 0) {
            job.items.forEach((item, idx) => {
                const row = `
                <tr style="border-bottom: 1px solid #cbd5e1;">
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 800; color: #94a3b8;">${(idx+1).toString().padStart(2, '0')}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 600;">${item.desc || 'N/A'}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 900; color: #2563eb;">${item.container || 'PENDING'}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 700;">${item.size || 'N/A'}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1;">${item.seal || 'TBD'}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 700;">${item.truck || 'TBD'}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1;">${item.net ? parseFloat(item.net).toLocaleString() : '0'}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; color: #94a3b8;">${item.tare ? parseFloat(item.tare).toLocaleString() : (parseFloat(item.gross) - parseFloat(item.net)).toLocaleString()}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 800; color: #000;">${item.gross ? parseFloat(item.gross).toLocaleString() : '0'}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1;">
                        <select class="input-simple" style="padding: 4px; border:none; background: #ecfdf5; color: #059669; font-weight: 800; border-radius: 4px;">
                            <option value="confirmed">CONFIRMED</option>
                            <option value="pending">PENDING</option>
                        </select>
                    </td>
                    <td style="padding: 10px;">
                        <input type="text" class="input-simple" placeholder="ADD Remark..." style="border:none; background: transparent; padding: 0;">
                    </td>
                </tr>`;
                tbody.insertAdjacentHTML('beforeend', row);
            });
        } else {
            tbody.innerHTML = '<tr><td colspan="11" align="center" style="padding: 30px; color: #94a3b8; font-weight: 800;">NO CONTAINER RECORDS DETECTED</td></tr>';
        }
    });

    function toggleTransport(show) {
        const details = document.getElementById('transport-details');
        details.style.display = show ? 'grid' : 'none';
    }

    function addRoutingRow() {
        const tbody = document.getElementById('routing-registry');
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td><input type="text" class="input-simple" placeholder="PORT/CITY"></td>
        <td><input type="text" class="input-simple" placeholder="PORT/CITY"></td>
        <td><input type="text" class="input-simple" placeholder="VESSEL/ROTATION"></td>
        <td><input type="date" class="input-simple"></td>
        <td><input type="date" class="input-simple"></td>
        <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
    `;
        tbody.appendChild(tr);
    }

    function addDeadlineRow() {
        const tbody = document.getElementById('deadline-registry');
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td><input type="text" class="input-simple" placeholder="TYPE"></td>
        <td><input type="text" class="input-simple" placeholder="LOCATION"></td>
        <td><input type="datetime-local" class="input-simple"></td>
        <td><input type="text" class="input-simple" placeholder="ACTION"></td>
        <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove()"></i></td>
    `;
        tbody.appendChild(tr);
    }

    function submitBooking() {
        Swal.fire({
            title: 'Booking Synchronized!',
            text: 'All routing and container metadata has been locked. Moving to Gate-in Verification.',
            icon: 'success',
            confirmButtonColor: '#000',
            confirmButtonText: 'Proceed to Terminal'
        }).then(() => {
            window.location.href = 'gate-in.php';
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>