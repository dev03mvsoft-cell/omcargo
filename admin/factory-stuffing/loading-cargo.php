<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .loading-hub {
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

    /* CLASSIC TABLE THEME */
    .classic-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #e2e8f0;
    }

    .classic-table th {
        background: #1e293b;
        padding: 12px 15px;
        font-size: 9px;
        font-weight: 950;
        color: #fff;
        /* Default for dark headers */
        text-transform: uppercase;
        text-align: left;
        border: 1px solid #334155;
        white-space: nowrap;
        letter-spacing: 0.5px;
    }

    .classic-table td {
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        font-size: 11px;
        font-weight: 700;
        color: #1e293b;
        background: #fff;
    }

    .classic-table tr:hover td {
        background: #f8fafc;
    }

    .form-input {
        width: 100%;
        border: 1px solid transparent;
        background: transparent;
        padding: 6px 10px;
        font-size: 11px;
        font-weight: 750;
        color: #1e293b;
        transition: all 0.2s;
    }

    .form-input:focus {
        background: #fff;
        border-color: #2563eb;
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .photo-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 6px 12px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        color: #64748b;
        font-size: 9px;
        font-weight: 850;
        text-transform: uppercase;
        cursor: pointer;
    }

    .photo-btn:hover {
        background: #e2e8f0;
        color: #1e293b;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 25px 40px;">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 5px;">
                <span style="padding: 4px 10px; background: #eff6ff; color: #2563eb; font-size: 9px; font-weight: 850; border-radius: 4px; text-transform: uppercase;">Stuffing Phase</span>
                <p style="font-size: 10px; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">STAGE 02 • LOADING CARGO INTO CONTAINER</p>
            </div>
            <h1 class="page-title" style="font-size: 22px; font-weight: 850; letter-spacing: -0.5px; margin: 0;">Cargo <span style="color: #2563eb;">Loading</span> Matrix</h1>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='job-create.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800; padding: 12px 25px; border-radius: 8px;">BACK</button>
            <button onclick="submitLoadingCargo()" class="btn" style="background: var(--primary); color: #fff; padding: 12px 35px; font-size: 11px; font-weight: 800; border-radius: 8px;">NEXT: CHECKLIST</button>
        </div>
    </header>

    <div class="loading-hub">
        <!-- Operational Stepper (6 Stages) -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. FACTORY ENTRY</div>
            <div class="m-step active">02. LOADING CARGO</div>
            <div class="m-step">03. CHECKLIST</div>
            <div class="m-step">04. GATE IN</div>
            <div class="m-step">05. BOOKING</div>
            <div class="m-step">06. ONBOARD</div>
        </div>

        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 4px; overflow: hidden;">
            <div style="padding: 15px 20px; background: #f8fafc; border-bottom: 2px solid #1e293b; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="font-size: 11px; font-weight: 900; color: #1e293b; text-transform: uppercase;">Stuffing Activity Registry</h4>
                <button onclick="addLoadingRow()" style="background: var(--primary); border: none; color: #fff; font-size: 9px; font-weight: 950; padding: 10px 20px; border-radius: 4px; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">+ ADD CONTAINER</button>
            </div>
            <div style="overflow-x: auto;">
                <table class="classic-table" style="min-width: 2800px; border-collapse: separate; border-spacing: 0;">
                    <thead>
                        <!-- TIER 1: LOGICAL GROUPING -->
                        <tr style="background: #f1f5f9; font-size: 9px; letter-spacing: 1px; color: #475569;">
                            <th colspan="3" style="border-bottom: 2px solid #1e293b; background: #1e293b; color: #fff; position: sticky; left: 0; z-index: 15; text-align: center;">GOODS INFORMATION</th>
                            <th colspan="3" style="border-bottom: 2px solid #ea580c; background: #fff7ed; color: #9a3412; text-align: center;">CONTAINER IDENTIFICATION</th>
                            <th colspan="5" style="border-bottom: 2px solid #2563eb; background: #eff6ff; color: #1e40af; text-align: center;">FLEET & TIMELINE</th>
                            <th colspan="1" style="border-bottom: 2px solid #059669; background: #ecfdf5; color: #065f46; text-align: center;">LOAD POINT</th>
                            <th colspan="3" style="border-bottom: 2px solid #0891b2; background: #ecfeff; color: #0e7490; text-align: center;">VGM WEIGHT DATA</th>
                            <th colspan="3" style="border-bottom: 2px solid #64748b; background: #f8fafc; color: #475569; text-align: center;">OPERATIONAL SEAL</th>
                        </tr>
                        <!-- TIER 2: INDIVIDUAL PARAMETERS -->
                        <tr style="background: #f8fafc; font-size: 9px;">
                            <th width="60" style="position: sticky; left: 0; z-index: 10; background: #1e293b; border-right: 2px solid #334155; color: #fff; text-align: center;">SR.</th>
                            <th width="350" style="color: #ffffffff;">Description of Goods</th>
                            <th width="140" style="color: #ffffffff;">HNS Code</th>
                            <th width="180" style="background: #fff7ed; color: #9a3412;">Container No.</th>
                            <th width="120" style="background: #fff7ed; color: #9a3412;">Size / Type</th>
                            <th width="140" style="background: #fff7ed; color: #9a3412;">Seal Number</th>
                            <th width="140" style="background: #eff6ff; color: #1e40af;">Truck Number</th>
                            <th width="140" style="background: #eff6ff; color: #1e40af;">Empty Pickup Date</th>
                            <th width="140" style="background: #eff6ff; color: #1e40af;">Pickup Location</th>
                            <th width="180" style="background: #eff6ff; color: #2563eb;">Factory In (Start)</th>
                            <th width="180" style="background: #eff6ff; color: #2563eb;">Factory Out (End)</th>
                            <th width="300" style="background: #ecfdf5; color: #065f46;">Loading Location</th>
                            <th width="120" style="background: #ecfeff; color: #0e7490;">Net (KGS)</th>
                            <th width="120" style="background: #ecfeff; color: #0e7490;">Tare (KGS)</th>
                            <th width="120" style="background: #ecfeff; color: #0e7490;">Gross (KGS)</th>
                            <th width="180" style="color: #1e293b;">Loading Photo</th>
                            <th width="140" style="color: #1e293b;">Operational Status</th>
                            <th width="50" style="background: #1e293b; color: #fff; border-bottom: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="loading-cargo-body">
                        <!-- Default Rows -->
                        <tr>
                            <td align="center" style="position: sticky; left: 0; z-index: 5; background: #fff; border-right: 2px solid #e2e8f0; font-weight: 850; color: #94a3b8;">01</td>
                            <td><input type="text" class="form-input" value="INDUSTRIAL SPARE PARTS"></td>
                            <td><input type="text" class="form-input" placeholder="HSN"></td>
                            <td style="background: #fff7ed;"><input type="text" class="form-input" value="HLCUBO125018" style="text-transform: uppercase; font-weight: 900; color: #ea580c;"></td>
                            <td style="background: #fff7ed;">
                                <select class="form-input" style="font-weight: 800;">
                                    <option>20' GP</option>
                                    <option selected>40' HC</option>
                                </select>
                            </td>
                            <td style="background: #fff7ed;"><input type="text" class="form-input" placeholder="SEAL NO"></td>
                            <td style="background: #eff6ff;"><input type="text" class="form-input" placeholder="PLATE NO"></td>
                            <td style="background: #eff6ff;"><input type="date" class="form-input"></td>
                            <td style="background: #eff6ff;"><input type="text" class="form-input" value="DEPOT 1"></td>
                            <td style="background: #eff6ff;"><input type="datetime-local" class="form-input" value="<?php echo date('Y-m-d\TH:i'); ?>"></td>
                            <td style="background: #eff6ff;"><input type="datetime-local" class="form-input" value="<?php echo date('Y-m-d\TH:i', strtotime('+2 hours')); ?>"></td>
                            <td style="background: #ecfdf4;"><input type="text" class="form-input" value="SOHAR FREEZONE, OMAN"></td>
                            <td style="background: #ecfeff;"><input type="number" class="form-input" value="12400"></td>
                            <td style="background: #ecfeff;"><input type="number" class="form-input" value="3800"></td>
                            <td style="background: #ecfeff;"><input type="number" class="form-input" value="16200"></td>
                            <td>
                                <div class="photo-btn" onclick="this.querySelector('input').click()">
                                    <i class="fa-solid fa-camera"></i>
                                    <span>UPLOAD ASSETS</span>
                                    <input type="file" hidden>
                                </div>
                            </td>
                            <td>
                                <select class="form-input" style="color: #059669; font-weight: 900;">
                                    <option>ACTIVE</option>
                                    <option selected>LOCKED</option>
                                </select>
                            </td>
                            <td align="center"><i class="fa-solid fa-trash-can" style="color: #cbd5e1; cursor: pointer;"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 3. Overall Loading Summary -->
        </div>

        <!-- 4. Cargo Manifest Breakdown (Detailed Packing List) -->
        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 4px; overflow: hidden; margin-top: 30px;">
            <div style="padding: 15px 20px; background: #1e293b; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="font-size: 11px; font-weight: 900; color: #fff; text-transform: uppercase; margin: 0;">Cargo Manifest Breakdown</h4>
                    <p style="font-size: 8px; color: #94a3b8; font-weight: 600; text-transform: uppercase;">Detailed Itemized Packing List per Container</p>
                </div>
                <button onclick="addItemRow()" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff; font-size: 8px; font-weight: 950; padding: 6px 15px; border-radius: 4px; cursor: pointer;">+ ADD ITEM LINE</button>
            </div>
            <div style="overflow-x: auto;">
                <table class="classic-table" style="min-width: 1400px; border-top: none;">
                    <thead>
                        <tr style="background: #f8fafc;">
                            <th width="60" style="text-align: center; background: #334155;">SR.</th>
                            <th width="250">Container Reference</th>
                            <th>Description of Goods (Itemized)</th>
                            <th width="150">HSN Code</th>
                            <th width="120">Pkgs / Units</th>
                            <th width="120">Weight (KGS)</th>
                            <th width="250">Item Remarks</th>
                            <th width="50" style="background: #334155;"></th>
                        </tr>
                    </thead>
                    <tbody id="packing-list-body">
                        <tr>
                            <td align="center" style="font-weight: 850; color: #94a3b8;">01</td>
                            <td>
                                <select class="form-input" style="background: #fcfdfe; font-weight: 800; border-bottom: 1px dashed #cbd5e1;">
                                    <option>HLCUBO125018</option>
                                    <option>TCLU4512809</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-input" placeholder="Specific Item Name..."></td>
                            <td><input type="text" class="form-input" placeholder="HSN-XXXX"></td>
                            <td><input type="number" class="form-input" placeholder="Qty"></td>
                            <td><input type="number" class="form-input" placeholder="KGS"></td>
                            <td><input type="text" class="form-input" placeholder="..."></td>
                            <td align="center"><i class="fa-solid fa-circle-xmark" style="color: #cbd5e1;"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 5. Overall Loading Summary -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
            <div style="background: #fff; padding: 25px; border-radius: 4px; border: 1px solid #e2e8f0; border-top: 3px solid #64748b;">
                <p style="font-size: 9px; font-weight: 850; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px;">Planned Units</p>
                <h3 style="font-size: 26px; font-weight: 950; color: #1e293b; margin-top: 5px;">04 <span style="font-size: 11px; color: #94a3b8; font-weight: 700;">CONT.</span></h3>
            </div>
            <div style="background: #fff; padding: 25px; border-radius: 4px; border: 1px solid #e2e8f0; border-top: 3px solid #059669;">
                <p style="font-size: 9px; font-weight: 850; color: #059669; text-transform: uppercase; letter-spacing: 0.5px;">Stuffing Verified</p>
                <h3 style="font-size: 26px; font-weight: 950; color: #059669; margin-top: 5px;">01 <span style="font-size: 11px; color: #94a3b8; font-weight: 700;">UNIT</span></h3>
            </div>
            <div style="background: #fff; padding: 25px; border-radius: 4px; border: 1px solid #e2e8f0; border-top: 3px solid #ea580c;">
                <p style="font-size: 9px; font-weight: 850; color: #ea580c; text-transform: uppercase; letter-spacing: 0.5px;">Pending Load</p>
                <h3 style="font-size: 26px; font-weight: 950; color: #ea580c; margin-top: 5px;">03 <span style="font-size: 11px; color: #94a3b8; font-weight: 700;">UNITS</span></h3>
            </div>
        </div>
    </div>
</main>

<script>
    let rowCount = 1;

    function addLoadingRow() {
        rowCount++;
        const tbody = document.getElementById('loading-cargo-body');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td align="center" style="position: sticky; left: 0; z-index: 5; background: #fff; border-right: 2px solid #e2e8f0; font-weight: 850; color: #94a3b8;">${rowCount.toString().padStart(2, '0')}</td>
            <td><input type="text" class="form-input" placeholder="..."></td>
            <td><input type="text" class="form-input" placeholder="..."></td>
            <td style="background: #fff7ed;"><input type="text" class="form-input" placeholder="UNIT NO" style="text-transform: uppercase; font-weight: 900; color: #ea580c;"></td>
            <td style="background: #fff7ed;">
                <select class="form-input" style="font-weight: 800;">
                    <option>20' GP</option>
                    <option>40' HC</option>
                </select>
            </td>
            <td style="background: #fff7ed;"><input type="text" class="form-input" placeholder="SEAL"></td>
            <td style="background: #eff6ff;"><input type="text" class="form-input" placeholder="PLATE"></td>
            <td style="background: #eff6ff;"><input type="date" class="form-input"></td>
            <td style="background: #eff6ff;"><input type="text" class="form-input" placeholder="..."></td>
            <td style="background: #eff6ff;"><input type="datetime-local" class="form-input"></td>
            <td style="background: #eff6ff;"><input type="datetime-local" class="form-input"></td>
            <td style="background: #ecfdf4;"><input type="text" class="form-input" placeholder="..."></td>
            <td style="background: #ecfeff;"><input type="number" class="form-input"></td>
            <td style="background: #ecfeff;"><input type="number" class="form-input"></td>
            <td style="background: #ecfeff;"><input type="number" class="form-input"></td>
            <td>
                <div class="photo-btn" onclick="this.querySelector('input').click()">
                    <i class="fa-solid fa-camera"></i>
                    <span>UPLOAD ASSETS</span>
                    <input type="file" hidden>
                </div>
            </td>
            <td>
                <select class="form-input" style="color: #2563eb; font-weight: 900;">
                    <option>ACTIVE</option>
                </select>
            </td>
            <td align="center"><i class="fa-solid fa-trash-can" style="color: #fca5a5; cursor: pointer;" onclick="this.closest('tr').remove()"></i></td>
        `;
        tbody.appendChild(tr);
    }

    function submitLoadingCargo() {
        Swal.fire({
            title: 'Stuffing Recorded',
            text: 'Cargo loading details have been captured. Moving to Stage 03: Checklist Upload.',
            icon: 'success',
            confirmButtonColor: '#000',
            confirmButtonText: 'Proceed to Checklist'
        }).then(() => {
            window.location.href = 'checklist.php';
        });
    }
    function addItemRow() {
        const tbody = document.getElementById('packing-list-body');
        const count = tbody.querySelectorAll('tr').length + 1;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td align="center" style="font-weight: 850; color: #94a3b8;">${count.toString().padStart(2, '0')}</td>
            <td>
                <select class="form-input" style="background: #fcfdfe; font-weight: 800; border-bottom: 1px dashed #cbd5e1;">
                    <option>SELECT CONTAINER</option>
                </select>
            </td>
            <td><input type="text" class="form-input" placeholder="Item details..."></td>
            <td><input type="text" class="form-input" placeholder="HSN..."></td>
            <td><input type="number" class="form-input"></td>
            <td><input type="number" class="form-input"></td>
            <td><input type="text" class="form-input"></td>
            <td align="center"><i class="fa-solid fa-circle-xmark" style="color: #fca5a5; cursor: pointer;" onclick="this.closest('tr').remove()"></i></td>
        `;
        tbody.appendChild(tr);
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>