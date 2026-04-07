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
            <button type="button" class="btn" onclick="window.location.href='../../work-assignment.php'" style="background: #f1f5f9; color: #64748b; font-size: 14px; font-weight: 500; border: none; cursor: pointer;">ACTIVE TASKS</button>
            <button type="submit" form="fac-arrival-fac-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- Tab-Style Progress Bar - Below Header -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 10px 40px;">
        <div style="display: flex; justify-content: center; gap: 60px;">
            <!-- Stage 1 -->
            <div style="padding-bottom: 15px; color: #10b981; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                <i class="fa-solid fa-circle-check"></i> 01. PORT ARRIVAL
            </div>
            <!-- Stage 2 -->
            <div style="padding-bottom: 15px; color: #10b981; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                <i class="fa-solid fa-circle-check"></i> 02. PORT OUT
            </div>
            <!-- Stage 3: Active -->
            <div style="padding-bottom: 15px; border-bottom: 4px solid var(--primary); color: var(--primary); font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                03. FACTORY IN
            </div>
            <!-- Stage 4 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                04. DE-STUFFING
            </div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">

        <form id="fac-arrival-fac-form" action="factory-destuffing.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-building-circle-check"></i> Container Arrival & Seal Verification</h3>
                    <button type="button" onclick="addContainerRow()" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD CONTAINER</button>
                </div>

                <div class="card" style="border: 1px solid var(--border); border-radius: 12px; overflow: hidden; background: #fff;">
                    <table class="table" id="arrival-container-table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8fafc; border-bottom: 1px solid var(--border); text-align: left;">
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Container ID</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Truck / Trailer</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Seal No</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Arrival Time</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Seal Status</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Remarks</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Gross Weight</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase; text-align: center;">Evidence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 16px;">
                                    <div style="font-weight: 500; font-size: 14px; color: var(--primary);">MAEU4430910</div>
                                </td>
                                <td style="padding: 18px 16px;">
                                    <div style="font-weight: 500; font-size: 14px; color: #1e293b;">OM-TR-4550</div>
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="MSK-90041-A" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="datetime-local" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <select class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
                                        <option>INTACT</option>
                                        <option>BROKEN</option>
                                    </select>
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" placeholder="Entry remarks..." class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <div style="font-weight: 500; font-size: 14px; color: #1e293b;">45200 <span style="font-size: 9px; color: #94a3b8;">KGS</span></div>
                                </td>
                                <td style="padding: 18px 16px; text-align: center;">
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
                
                <div class="card" style="border: 1px solid var(--border); border-radius: 12px; overflow: hidden; background: #fff;">
                    <table class="table" id="arrival-evidence-table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8fafc; border-bottom: 1px solid var(--border); text-align: left;">
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Evidence Name</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Upload Remark / Notes</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px 16px;">
                                    <input type="text" value="Container Seal Photo" class="form-input" style="font-weight: 500; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff; color: var(--primary);">
                                </td>
                                <td style="padding: 15px 16px;">
                                    <input type="text" placeholder="Enter condition remarks..." class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
                                </td>
                                <td style="padding: 15px 16px; text-align: center;">
                                    <button type="button" onclick="this.nextElementSibling.click()" style="background: var(--primary-light); color: var(--primary); border: 1.5px dashed var(--primary); padding: 5px 12px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer;">
                                        <i class="fa-solid fa-cloud-arrow-up"></i> UPLOAD
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px 16px;">
                                    <input type="text" value="Gate-In Slip" class="form-input" style="font-weight: 500; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff; color: var(--primary);">
                                </td>
                                <td style="padding: 15px 16px;">
                                    <input type="text" placeholder="Enter slip reference..." class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
                                </td>
                                <td style="padding: 15px 16px; text-align: center;">
                                    <button type="button" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 5px 12px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer;">
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
    newRow.style.borderBottom = '1px solid var(--border)';
    newRow.innerHTML = `
        <td style="padding: 15px 16px;">
            <input type="text" placeholder="Enter doc name..." class="form-input" style="font-weight: 500; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff; color: var(--primary);">
        </td>
        <td style="padding: 15px 16px;">
            <input type="text" placeholder="Enter upload remark..." class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
        </td>
        <td style="padding: 15px 16px; text-align: center;">
            <button type="button" onclick="this.nextElementSibling.click()" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 5px 12px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer;">
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
    newRow.style.borderBottom = '1px solid var(--border)';
    newRow.innerHTML = `
        <td style="padding: 18px 16px;">
            <input type="text" placeholder="NEW-CONT-ID" class="form-input" style="font-weight: 500; font-size: 14px; color: var(--primary); border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
        </td>
        <td style="padding: 18px 16px;">
            <input type="text" placeholder="TRUCK-NO" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
        </td>
        <td style="padding: 18px 16px;">
            <input type="text" placeholder="SEAL-NO" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 10px 14px; border: 1px solid var(--border); border-radius: 6px; background: #fff;">
        </td>
        <td style="padding: 18px 16px;">
            <input type="datetime-local" class="form-input" style="font-weight: 400; font-size: 11px; border: none; padding: 0; background: transparent;">
        </td>
        <td style="padding: 18px 16px;">
            <select class="form-input" style="font-weight: 400; font-size: 11px; border: none; padding: 0; background: transparent;">
                <option>INTACT</option>
                <option>BROKEN</option>
            </select>
        </td>
        <td style="padding: 18px 16px;">
            <input type="text" placeholder="Remarks..." class="form-input" style="font-weight: 400; font-size: 14px; border: 1px solid var(--border); padding: 10px 14px; border-radius: 6px; background: #fff;">
        </td>
        <td style="padding: 18px 16px;">
            <div style="display: flex; align-items: center; gap: 4px;">
                <input type="number" placeholder="45000" class="form-input" style="font-weight: 500; font-size: 14px; border: 1px solid var(--border); padding: 10px 14px; border-radius: 6px; background: #fff; width: 80px;">
                <span style="font-size: 13px; color: #94a3b8;">KGS</span>
            </div>
        </td>
        <td style="padding: 18px 16px; text-align: center;">
            <i class="fa-solid fa-camera" style="color: var(--primary); cursor: pointer; font-size: 14px;"></i>
        </td>
    `;
    tbody.appendChild(newRow);
}
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>