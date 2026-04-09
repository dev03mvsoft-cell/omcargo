<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 10px; font-weight: 850; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">OPERATIONAL STAGE 01: INBOUND ARRIVAL</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 850; margin: 0; color: #01172a;">Vessel Arrival & Port Operations</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-IMP-24-001 | VESSEL: URANUS V.2443S</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button type="submit" form="arrival-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 850; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step active">01. ARRIVAL</div>
            <div class="m-step">02. GATE OUT</div>
            <div class="m-step">03. GATE IN</div>
            <div class="m-step">04. DE-STUFFING</div>
            <div class="m-step">05. DELIVERY</div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">
        
        <!-- Shipment Quick Meta -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
            <div style="background: #fff; padding: 15px; border: 1px solid var(--border); border-radius: 10px;">
                <span style="font-size: 12px; font-weight: 900; color: #01172a;">05 (40FT HC)</span>
            </div>
            <div style="background: #fff; padding: 15px; border: 1px solid var(--border); border-radius: 10px;">
                <span style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 5px;">DESTINATION</span>
                <span style="font-size: 12px; font-weight: 900; color: #01172a;">MUNDRA, INDIA</span>
            </div>
        </div>

        <form id="arrival-form" action="gate-out.php" method="POST" enctype="multipart/form-data">
            <div class="form-section" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid var(--border); box-shadow: var(--card-shadow);">
                <h3 class="section-title"><i class="fa-solid fa-ship"></i> Vessel Arrival & Port Discharging</h3>
                <div class="sub-field-grid" style="grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">Vessel Arrival Date</label>
                        <input type="date" name="arrival_date" class="form-input" style="font-weight: 700;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Discharge Time (Port Terminal)</label>
                        <input type="time" name="discharge_time" class="form-input" style="font-weight: 700;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Grounding Location / Yard NO</label>
                        <input type="text" name="yard_loc" placeholder="Mundra Port Yard..." class="form-input" style="font-weight: 700;">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-file-arrow-up"></i> Operational Documentation (Arrival)</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                    <div class="form-group">
                        <label class="form-label">Arrival Notice / Line Docs</label>
                        <div style="border: 2px dashed var(--border); border-radius: 12px; padding: 25px; text-align: center; background: #f8fafc; cursor: pointer;">
                            <i class="fa-solid fa-cloud-arrow-up" style="font-size: 24px; color: var(--primary); margin-bottom: 10px; display: block;"></i>
                            <span style="font-size: 11px; font-weight: 800; color: #64748b;">UPLOAD ARRIVAL NOTICE</span>
                            <input type="file" name="arrival_files[]" multiple hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Arrival Observations / Remarks</label>
                        <textarea name="remarks_arrival" rows="3" class="form-input" placeholder="Enter port observations..." style="height: 110px; font-weight: 700;"></textarea>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 12px; font-weight: 850; background: var(--primary); color: #fff; border: none; border-radius: 10px;">GATE OUT PROCESS <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></button>
            </div>
        </form>
    </div>
</main>

<?php include $path_prefix . 'includes/footer.php'; ?>
