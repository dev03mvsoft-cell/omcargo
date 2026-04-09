<?php
$path_prefix = "../../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 13px; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">FACTORY FLOW STAGE 03: FACTORY ARRIVAL</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 600; margin: 0; color: #01172a;">Arrival at Customer Facility</h1>
            <p style="font-size: 14px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-FAC-24-902 | CLIENT: RAYSUT CEMENT CO.</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button type="submit" form="fac-arrival-fac-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step completed">01. PORT ARRIVAL</div>
            <div class="m-step completed">02. GATE OUT</div>
            <div class="m-step active">03. FACTORY IN</div>
            <div class="m-step">04. DE-STUFFING</div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">

        <form id="fac-arrival-fac-form" action="factory-destuffing.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-building-circle-check"></i> Container Arrival & Seal Verification</h3>
                    <button type="button" onclick="addContainerRow()" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD CONTAINER</button>
                </div>

                <div class="card" style="padding: 25px; overflow-x: auto;">
                    <table class="classic-table" id="arrival-container-table">
                        <thead>
                            <tr>
                                <th>Container ID</th>
                                <th>Truck / Trailer</th>
                                <th>Seal No</th>
                                <th>Arrival Time</th>
                                <th>Seal Status</th>
                                <th>Remarks</th>
                                <th>Gross Weight</th>
                                <th style="text-align: center;">Evidence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <div style="font-weight: 500; font-size: 14px; color: var(--primary); text-align: center;">MAEU4430910</div>
                                </td>
                                <td style="border: 2px solid #000;">
                                    <div style="font-weight: 500; font-size: 14px; color: #1e293b; text-align: center;">OM-TR-4550</div>
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="MSK-90041-A" class="data-input" style="font-weight: 400; background: transparent;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="datetime-local" class="data-input" style="font-weight: 400; font-size: 11px; background: transparent;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <select class="data-input" style="font-weight: 400; background: transparent;">
                                        <option>INTACT</option>
                                        <option>BROKEN</option>
                                    </select>
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Entry remarks..." class="data-input" style="font-weight: 400; background: transparent;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <div style="font-weight: 500; font-size: 14px; color: #1e293b; text-align: center;">45200 <span style="font-size: 9px; color: #94a3b8;">KGS</span></div>
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <i class="fa-solid fa-camera" style="color: var(--primary); cursor: pointer; font-size: 14px;"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-camera"></i> Arrival Evidence & Documentation</h3>
                    <button type="button" onclick="addEvidenceRow()" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD NEW DOC</button>
                </div>
                
                <div class="card" style="padding: 25px; overflow-x: auto;">
                    <table class="classic-table" id="arrival-evidence-table">
                        <thead>
                            <tr>
                                <th>Evidence Name</th>
                                <th width="400">Upload Remark / Notes</th>
                                <th width="150" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="Container Seal Photo" class="data-input" style="font-weight: 500; color: var(--primary);">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Enter condition remarks..." class="data-input">
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" onclick="this.nextElementSibling.click()" style="background: #f0f9ff; color: #0369a1; border: 1.5px dashed #bae6fd; padding: 5px 12px; border-radius: 6px; font-size: 10px; font-weight: 700; cursor: pointer;">
                                        <i class="fa-solid fa-cloud-arrow-up"></i> UPLOAD
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="Gate-In Slip" class="data-input" style="font-weight: 500; color: var(--primary);">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Enter slip reference..." class="data-input">
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 5px 12px; border-radius: 6px; font-size: 10px; font-weight: 700; cursor: pointer;">
                                        <i class="fa-solid fa-paperclip"></i> ATTACH
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group" style="margin-top: 25px;">
                    <label class="form-label">Gate-In Condition Remarks</label>
                    <textarea name="remarks_gatein" rows="2" class="form-input" placeholder="General observations on container arrival condition..." style="height: 80px; font-weight: 400;"></textarea>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; border-radius: 10px;">START DE-STUFFING <i class="fa-solid fa-box-open" style="margin-left: 10px;"></i></button>
            </div>
        </form>
    </div>
</main>

<script>
function addEvidenceRow() {
    const tbody = document.querySelector('#arrival-evidence-table tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="Enter doc name..." class="data-input" style="font-weight: 500; color: var(--primary);">
        </td>
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="Enter upload remark..." class="data-input">
        </td>
        <td align="center" style="border: 2px solid #000;">
            <button type="button" onclick="this.nextElementSibling.click()" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 5px 12px; border-radius: 6px; font-size: 10px; font-weight: 700; cursor: pointer;">
                <i class="fa-solid fa-paperclip"></i> ATTACH
            </button>
            <input type="file" hidden>
        </td>
    `;
    tbody.appendChild(newRow);
}

function addContainerRow() {
    const tbody = document.querySelector('#arrival-container-table tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="NEW-CONT-ID" class="data-input" style="font-weight: 500; color: var(--primary);">
        </td>
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="TRUCK-NO" class="data-input">
        </td>
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="SEAL-NO" class="data-input">
        </td>
        <td style="border: 2px solid #000;">
            <input type="datetime-local" class="data-input" style="font-weight: 400; font-size: 11px;">
        </td>
        <td style="border: 2px solid #000;">
            <select class="data-input" style="font-weight: 400;">
                <option>INTACT</option>
                <option>BROKEN</option>
            </select>
        </td>
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="Remarks..." class="data-input">
        </td>
        <td style="border: 2px solid #000;">
            <div style="display: flex; align-items: center; gap: 4px;">
                <input type="number" placeholder="45000" class="data-input" style="width: 80px;">
                <span style="font-size: 10px; font-weight: 800; color: #94a3b8;">KGS</span>
            </div>
        </td>
        <td align="center" style="border: 2px solid #000;">
            <i class="fa-solid fa-camera" style="color: var(--primary); cursor: pointer; font-size: 14px;"></i>
        </td>
    `;
    tbody.appendChild(newRow);
}
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>