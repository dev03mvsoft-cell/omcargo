<?php
$path_prefix = "../../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 13px; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">FACTORY FLOW STAGE 01: INBOUND ARRIVAL</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 600; margin: 0; color: #01172a;">Port Arrival & Discharging</h1>
            <p style="font-size: 14px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-FAC-24-902 | VESSEL: MSC VIRGO V.244</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button type="button" class="btn" onclick="window.location.href='../../work-assignment.php'" style="background: #f1f5f9; color: #64748b; font-size: 14px; font-weight: 500; border: none; cursor: pointer;">ACTIVE TASKS</button>
            <button type="submit" form="fac-arrival-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- Tab-Style Progress Bar - Below Header -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 10px 40px;">
        <div style="display: flex; justify-content: center; gap: 60px;">
            <!-- Stage 1: Active -->
            <div style="padding-bottom: 15px; border-bottom: 4px solid var(--primary); color: var(--primary); font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                01. PORT ARRIVAL
            </div>
            <!-- Stage 2 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                02. PORT OUT
            </div>
            <!-- Stage 3 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                03. FACTORY IN
            </div>
            <!-- Stage 4 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                04. DE-STUFFING
            </div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">
        
        <!-- Shipment Brief -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
            <div style="background: #fff; padding: 15px; border: 1px solid #f1f5f9; border-radius: 10px;">
                <span style="font-size: 9px; font-weight: 600; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 5px;">CONTAINER UNITS</span>
                <span style="font-size: 14px; font-weight: 900; color: #01172a;">10 x 40FT HIGH CUBE</span>
            </div>
            <div style="background: #fff; padding: 15px; border: 1px solid #f1f5f9; border-radius: 10px;">
                <span style="font-size: 9px; font-weight: 600; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 5px;">SHIP LINE</span>
                <span style="font-size: 14px; font-weight: 900; color: #01172a;">MAERSK LINE OMAN</span>
            </div>
        </div>

        <form id="fac-arrival-form" action="gate-out.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-ship"></i> Vessel Information & Discharging</h3>
                <div class="sub-field-grid" style="grid-template-columns: repeat(4, 1fr); gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">Vessel Name</label>
                        <input type="text" name="vessel_name" placeholder="E.g. MSC VIRGO..." class="form-input" style="font-weight: 400;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Voyage Number</label>
                        <input type="text" name="voyage_no" placeholder="V.24430S..." class="form-input" style="font-weight: 400;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">IGM Number</label>
                        <input type="text" name="igm_no" placeholder="IGM-MND-001..." class="form-input" style="font-weight: 400;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Vessel Arrival (ETA/ATA)</label>
                        <input type="date" name="arrival_date" class="form-input" style="font-weight: 400;">
                    </div>
                </div>
                <div class="sub-field-grid" style="grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 15px;">
                    <div class="form-group">
                        <label class="form-label">Port Discharge Terminal</label>
                        <input type="text" name="terminal" placeholder="Port Terminal / Berth..." class="form-input" style="font-weight: 400;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Yard / Grounding Location</label>
                        <input type="text" name="yard_loc" placeholder="Yard NO / Slot ID..." class="form-input" style="font-weight: 400;">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-boxes-stacked"></i> Container Manifest List</h3>
                    <button type="button" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD CONTAINER</button>
                </div>
                
                <div class="card" style="border: 1px solid var(--border); border-radius: 12px; overflow: hidden; background: #fff;">
                    <table class="table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8fafc; border-bottom: 1px solid var(--border); text-align: left;">
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">S.No</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Container No</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Type / Size</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Expected Seal</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Status</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 16px; font-size: 14px; font-weight: 500; color: var(--text-muted);">01</td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="MAEU4430910" class="form-input" style="font-weight: 500; font-size: 14px; color: var(--primary); padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <select class="form-input" style="font-weight: 400; font-size: 14px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px;">
                                        <option>40FT HIGH CUBE</option>
                                        <option>20FT STANDARD</option>
                                    </select>
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="MSK-90041" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 0; background: transparent;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <span style="font-size: 9px; font-weight: 600; color: #10b981; background: #f0fdf4; padding: 4px 10px; border-radius: 4px; border: 1px solid #bbf7d0;">DISCHARGED</span>
                                </td>
                                <td style="padding: 18px 16px; text-align: center;">
                                    <button type="button" style="background: transparent; border: none; cursor: pointer;">
                                        <i class="fa-solid fa-trash-can" style="color: #ef4444; font-size: 14px;"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-file-contract"></i> Arrival Documentation</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                    <div class="form-group">
                        <label class="form-label">Arrival Notice (AN)</label>
                        <div style="border: 2px dashed #f1f5f9; border-radius: 12px; padding: 25px; text-align: center; background: #f8fafc; cursor: pointer;">
                            <i class="fa-solid fa-upload" style="font-size: 24px; color: var(--primary); margin-bottom: 10px; display: block;"></i>
                            <span style="font-size: 14px; font-weight: 600; color: #64748b;">BROWSE ARRIVAL NOTICE</span>
                            <input type="file" name="an_file" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Operational Notes</label>
                        <textarea name="remarks_arrival" rows="3" class="form-input" placeholder="Notes for port operations team..." style="height: 108px; font-weight: 700;"></textarea>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 14px; font-weight: 850; background: var(--primary); color: #fff; border: none; border-radius: 10px;">PROCEED TO HAULAGE <i class="fa-solid fa-truck-moving" style="margin-left: 10px;"></i></button>
            </div>
        </form>
    </div>
</main>

<?php include $path_prefix . 'includes/footer.php'; ?>
