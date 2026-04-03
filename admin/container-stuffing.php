<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .stuffing-hub {
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
    }

    .simple-table th {
        padding: 10px 12px;
        background: #f8fafc;
        font-size: 9px;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        white-space: nowrap;
    }

    .simple-table td {
        padding: 8px 10px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .input-simple {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 6px 8px;
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
        font-size: 11px;
        font-weight: 900;
        color: #1e293b;
        text-transform: uppercase;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .s-label {
        font-size: 9px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        margin-bottom: 5px;
        display: block;
    }

    .static-value {
        font-size: 12px;
        font-weight: 900;
        color: #1e293b;
        display: block;
        padding: 6px 0;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">CFS Stuffing & Gate-In</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 04: CARGO LOADING AUDIT</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='booking-status.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitStuffing()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">FINALIZE LOADING</button>
        </div>
    </header>

    <div class="stuffing-hub">
        <!-- 1. Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. CARTING</div>
            <div class="m-step completed">02. CHECKLIST</div>
            <div class="m-step completed">03. BOOKING</div>
            <div class="m-step completed">04. LINE PROCESS</div>
            <div class="m-step active">05. GATE IN</div>
            <div class="m-step">06. ONBOARD</div>
        </div>

        <!-- 2. Shipping & Booking Overview (Static from Booking Stage) -->
        <div class="section-title">Shipping & Booking Overview</div>
        <div style="background: #fcfdfe; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 40px; display: grid; grid-template-columns: repeat(6, 1fr); gap: 15px;">
            <div>
                <label class="s-label">Total Containers</label>
                <div class="static-value" id="disp-total-cntr">5 CONTAINERS</div>
            </div>
            <div>
                <label class="s-label">Shipping Line</label>
                <div class="static-value">MAERSK LINE</div>
            </div>
            <div>
                <label class="s-label">Booking Ref No.</label>
                <div class="static-value">BK-7724937</div>
            </div>
            <div>
                <label class="s-label">Vessel Name</label>
                <div class="static-value">OSAKA EXPRESS</div>
            </div>
            <div>
                <label class="s-label">Paid By</label>
                <select class="input-simple" style="font-weight: 700;">
                    <option value="party">PARTY ARC</option>
                    <option value="self">SELF</option>
                </select>
            </div>
            <div>
                <label class="s-label">Total Amount</label>
                <input type="number" class="input-simple" value="4200.00" style="font-weight: 800;">
            </div>
        </div>

        <!-- 3. Dynamic Stuffing Table -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="section-title" style="margin-bottom: 0;">
                <i class="fa-solid fa-boxes-packing"></i> Cargo Stuffing Registry
            </div>
            <button onclick="addStuffingRow()" class="btn" style="background:#fff; border: 1px solid #2563eb; color: #2563eb; font-size: 10px; font-weight: 800; padding: 8px 15px;">+ ADD LOAD ROW</button>
        </div>

        <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px; background: #fff; margin-bottom: 40px;">
            <table class="simple-table" style="min-width: 1400px; margin-bottom: 0;">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th width="150">Container No</th>
                        <th width="100">Size</th>
                        <th width="120">Seal No</th>
                        <th width="140">Lift Date</th>
                        <th width="160">Lift Location</th>
                        <th width="120">Truck No</th>
                        <th width="140">Mov. Date</th>
                        <th width="80">Bags/Qty</th>
                        <th width="100">Gross Wt</th>
                        <th width="100">Net Wt</th>
                        <th width="100">Tare Wt</th>
                        <th width="120">Accessories (Name / ₹)</th>
                        <th width="150">Fumigation (Agent / Date)</th>
                        <th>Remarks</th>
                        <th width="50">Delete</th>
                    </tr>
                </thead>
                <tbody id="stuffing-registry">
                    <!-- Rows auto-generated in JS based on Total Containers -->
                </tbody>
            </table>
        </div>

        <!-- 4. Final Cargo Tally Dashboard -->
        <div class="section-title">Final Cargo Tally Summary</div>
        <div style="background: #f8fafc; padding: 25px; border-radius: 8px; border: 1px solid #e2e8f0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px;">
            <div>
                <label style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Total Bags / Quantity</label>
                <div style="font-size: 20px; font-weight: 900; color: #1e293b; margin-top: 5px;" id="total-qty">0 PKGS</div>
            </div>
            <div>
                <label style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Total Net Weight</label>
                <div style="font-size: 20px; font-weight: 900; color: #1e293b; margin-top: 5px;" id="total-net">0.00 KG</div>
            </div>
            <div>
                <label style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Total Gross Weight</label>
                <div style="font-size: 20px; font-weight: 900; color: #059669; margin-top: 5px;" id="total-gross">0.00 KG</div>
            </div>
            <div>
                <label style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Average Yield</label>
                <div style="font-size: 20px; font-weight: 900; color: #2563eb; margin-top: 5px;">98.2% Accuracy</div>
            </div>
        </div>

    </div>
</main>

<script>
    let stuffingCount = 0;
    const totalContainersAllotted = 5; // Static from Booking Stage

    function addStuffingRow(initial = false) {
        stuffingCount++;
        const tbody = document.getElementById('stuffing-registry');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td style="font-size: 10px; font-weight: 800; color: #94a3b8;">${stuffingCount}</td>
            <td><input type="text" class="input-simple" placeholder="CNTR-001" style="font-weight: 800; text-transform: uppercase;"></td>
            <td>
                <select class="input-simple">
                    <option>20ft</option>
                    <option>40ft</option>
                    <option>40ft HC</option>
                </select>
            </td>
            <td><input type="text" class="input-simple" placeholder="SL-001"></td>
            <td><input type="date" class="input-simple" value="<?php echo date('Y-m-d'); ?>"></td>
            <td><input type="text" class="input-simple" placeholder="Location"></td>
            <td><input type="text" class="input-simple" placeholder="TRK-001"></td>
            <td><input type="date" class="input-simple" value="<?php echo date('Y-m-d'); ?>"></td>
            <td><input type="number" class="qty-field input-simple" value="0" oninput="updateTally()"></td>
            <td><input type="number" class="gross-field input-simple" value="0.00" oninput="updateTally()"></td>
            <td><input type="number" class="net-field input-simple" value="0.00" oninput="updateTally()"></td>
            <td><input type="number" class="input-simple" value="0.00"></td>
            <td>
                <input type="text" class="input-simple" placeholder="Name" style="border-bottom: none; border-radius: 4px 4px 0 0; font-size: 9px;">
                <input type="number" class="input-simple" placeholder="₹ ₹ ₹" style="border-radius: 0 0 4px 4px; font-size: 9px;">
            </td>
            <td>
                <input type="text" class="input-simple" placeholder="AGENT" style="border-bottom: none; border-radius: 4px 4px 0 0; font-size: 9px;">
                <input type="date" class="input-simple" style="border-radius: 0 0 4px 4px; font-size: 9px;">
            </td>
            <td><input type="text" class="input-simple" placeholder="..."></td>
            <td align="center"><i class="fa-solid fa-trash-can" style="color: #ef4444; cursor: pointer; font-size: 13px;" onclick="this.closest('tr').remove(); updateTally();"></i></td>
        `;
        tbody.appendChild(tr);
    }

    function updateTally() {
        let totalQty = 0;
        let totalNet = 0;
        let totalGross = 0;

        document.querySelectorAll('.qty-field').forEach(f => totalQty += (parseInt(f.value) || 0));
        document.querySelectorAll('.net-field').forEach(f => totalNet += (parseFloat(f.value) || 0));
        document.querySelectorAll('.gross-field').forEach(f => totalGross += (parseFloat(f.value) || 0));

        document.getElementById('total-qty').innerText = totalQty + ' PKGS';
        document.getElementById('total-net').innerText = totalNet.toLocaleString(undefined, {
            minimumFractionDigits: 2
        }) + ' KG';
        document.getElementById('total-gross').innerText = totalGross.toLocaleString(undefined, {
            minimumFractionDigits: 2
        }) + ' KG';
    }

    function submitStuffing() {
        Swal.fire({
            title: 'Stuffing Finalized',
            text: 'Cargo Loading List locked. Moving to Stage 05: Gate In.',
            icon: 'success',
            confirmButtonColor: '#2563eb'
        }).then(() => {
            window.location.href = 'gate-in.php';
        });
    }

    window.onload = function() {
        // Auto-generate rows based on static total allotted
        for (let i = 0; i < totalContainersAllotted; i++) {
            addStuffingRow(true);
        }
    };
</script>

<?php include 'includes/footer.php'; ?>