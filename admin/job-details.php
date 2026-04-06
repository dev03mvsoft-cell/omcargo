<?php
$type = $_GET['type'] ?? 'factory'; // Default to factory if not specified
$is_factory = ($type === 'factory');
?>
<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="job-assign-slip.php" style="width: 32px; height: 32px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; color: #64748b; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                <i class="fa-solid fa-arrow-left" style="font-size: 14px;"></i>
            </a>
            <div>
                <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">AL-FALAK TRADING <span style="font-size: 10px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 4px 10px; border-radius: 4px; border: 1px solid #ffedd5; margin-left: 15px; vertical-align: middle;">PROTOCOL: <?php echo strtoupper($type); ?> STUFFING</span></h1>
                <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Detailed Shipment Lifecycle & Operational Control Center • <span style="color: #64748b;">FAC-24-005</span></p>
            </div>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div style="text-align: right; border-right: 1px solid #f1f5f9; padding-right: 20px;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">STAGE STATUS</p>
                <p style="font-size: 10px; color: #ef4444; font-weight: 800; margin: 0;">ACTION REQUIRED</p>
            </div>
            <button class="btn btn-primary" style="font-size: 11px; font-weight: 800; padding: 8px 24px; background: #000;">NOTIFY AGENT</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 40px;">
        <!-- TOP: PROGRESS STEPS (DYNAMICALLY RENDERED) -->
        <div class="card" style="padding: 40px; background: #fff; border-radius: 12px; border: 1px solid #f1f5f9; margin-bottom: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
                <!-- Node 1: Draft -->
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #10b981; border-radius: 50%; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;"><i class="fa-solid fa-check"></i></div>
                    <span style="font-size: 9px; font-weight: 850; color: #1e293b; text-transform: uppercase;">Draft</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: #10b981; z-index: 1;"></div>
                </div>
                <!-- Node 2: Checklist -->
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #10b981; border-radius: 50%; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;"><i class="fa-solid fa-check"></i></div>
                    <span style="font-size: 9px; font-weight: 850; color: #1e293b; text-transform: uppercase;">Checklist</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: #10b981; z-index: 1;"></div>
                </div>
                <!-- Node 3: Booking -->
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #10b981; border-radius: 50%; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;"><i class="fa-solid fa-check"></i></div>
                    <span style="font-size: 9px; font-weight: 850; color: #1e293b; text-transform: uppercase;">Booking</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: <?php echo $is_factory ? '#10b981' : '#e2e8f0'; ?>; z-index: 1;"></div>
                </div>

                <?php if($is_factory): ?>
                <!-- FACTORY SPECIFIC NODES -->
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #ef4444; border-radius: 50%; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;"><i class="fa-solid fa-industry"></i></div>
                    <span style="font-size: 9px; font-weight: 850; color: #ef4444; text-transform: uppercase;">Factory Stuffing</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: #e2e8f0; z-index: 1;"></div>
                </div>
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #f1f5f9; border: 2px solid #e2e8f0; border-radius: 50%; color: #94a3b8; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;">5</div>
                    <span style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase;">Gate-In (Port)</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: #e2e8f0; z-index: 1;"></div>
                </div>
                <?php else: ?>
                <!-- DOCK SPECIFIC NODES (AS REQUESTED) -->
                <!-- Node 2 (Overwriting Checklist for Dock) -->
                <script>
                    // Small hack to fix labels for Dock Flow without massive PHP changes
                    document.addEventListener("DOMContentLoaded", function() {
                        const nodes = document.querySelectorAll('.card span');
                        if(nodes.length >= 2) {
                            nodes[1].innerText = 'Carting';
                            nodes[3].innerText = 'Lining';
                            nodes[4].innerText = 'Gate-In';
                        }
                    });
                </script>
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #ef4444; border-radius: 50%; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;"><i class="fa-solid fa-bars-staggered"></i></div>
                    <span style="font-size: 9px; font-weight: 850; color: #ef4444; text-transform: uppercase;">Lining</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: #e2e8f0; z-index: 1;"></div>
                </div>
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #f1f5f9; border: 2px solid #e2e8f0; border-radius: 50%; color: #94a3b8; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;">5</div>
                    <span style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase;">Gate-In</span>
                    <div style="position: absolute; top: 12px; left: 50%; width: 100%; height: 2px; background: #e2e8f0; z-index: 1;"></div>
                </div>
                <?php endif; ?>

                <!-- Final Node: On-Board -->
                <div style="text-align: center; flex: 1; position: relative;">
                    <div style="width: 24px; height: 24px; background: #f1f5f9; border: 2px solid #e2e8f0; border-radius: 50%; color: #94a3b8; display: flex; align-items: center; justify-content: center; font-size: 10px; margin: 0 auto 8px; z-index: 2; position: relative;">6</div>
                    <span style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase;">On-Board</span>
                </div>
            </div>
        </div>

        <!-- MIDDLE: SPLIT LAYOUT -->
        <div style="display: grid; grid-template-columns: 350px 1fr; gap: 30px; align-items: start;">
            <!-- Ship Info -->
            <div style="background: #fff; border: 1px solid #f1f5f9; border-radius: 12px; padding: 30px;">
                <h4 style="font-size: 12px; font-weight: 950; text-transform: uppercase; margin-bottom: 25px; color: #1e293b; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">Shipment Summary</h4>
                <div style="margin-bottom: 20px;"><label style="font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; display: block;">Consignee</label><p style="font-size: 13px; font-weight: 700; margin: 6px 0; color: #01172a;">ANATOLIA TILE & STONE, CAN</p></div>
                <div style="margin-bottom: 20px;"><label style="font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; display: block;">Container No</label><p style="font-size: 13px; font-weight: 700; margin: 6px 0; color: #0f172a;">MSKU 928374-1</p></div>
                <div style="margin-bottom: 20px;"><label style="font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; display: block;">Vessel / Voyage</label><p style="font-size: 13px; font-weight: 700; margin: 6px 0; color: #0f172a;">MSC GULSUN / 241A</p></div>
                <div style="margin-bottom: 20px;"><label style="font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; display: block;">Transporter</label><p style="font-size: 13px; font-weight: 700; margin: 6px 0; color: #0f172a;">GLOBAL LOGIX ROADWAYS</p></div>
                
                <div style="margin-top: 30px; padding-top: 25px; border-top: 1px dashed #e2e8f0;">
                    <button class="btn" style="width: 100%; border: 1.5px solid #000; color: #000; font-size: 11px; font-weight: 800; padding: 12px; border-radius: 8px;">DOWNLOAD MANIFEST</button>
                </div>
            </div>
            
            <!-- STUCK FORM PREVIEW (DYNAMIC) -->
            <?php if($is_factory): ?>
            <div style="background: #fff; border: 2px solid #ef4444; border-radius: 12px; padding: 35px; position: relative;">
                <div style="position: absolute; top: 0px; right: 40px; background: #ef4444; color: #fff; font-size: 9px; font-weight: 950; padding: 6px 15px; border-radius: 0 0 8px 8px; text-transform: uppercase;">STUCK POINT: FACTORY LOADING</div>
                <h4 style="font-size: 15px; font-weight: 950; margin-bottom: 30px; color: #0f172a;"><i class="fa-solid fa-industry" style="margin-right: 10px; color: #ef4444;"></i> Factory Loading Status (STUCK)</h4>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                    <div class="form-group"><label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; display: block;">Loading Supervisor</label><input type="text" class="form-input" value="Suresh Kumar" readonly style="background: #f8fafc; font-size: 13px; font-weight: 700;"></div>
                    <div class="form-group"><label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; display: block;">CLP Number (Action Required)</label><input type="text" class="form-input" placeholder="ENTER CLP NO..." style="border-color: #ef4444; font-size: 13px; font-weight: 850;"></div>
                    <div class="form-group"><label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; display: block;">Container Seal Status</label><input type="text" class="form-input" value="PENDING VERIFICATION" readonly style="background: #fef2f2; color: #ef4444; font-size: 13px; font-weight: 700;"></div>
                    <div class="form-group"><label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; display: block;">Stuffing Report (Scan)</label><input type="file" class="form-input" style="font-size: 12px; padding: 8px;"></div>
                </div>

                <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #f1f5f9; display: flex; justify-content: flex-end; gap: 15px;">
                    <button class="btn" style="background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 800; padding: 12px 25px; border-radius: 8px;">NOTIFY FACTORY</button>
                    <a href="factory-stuffing/loading.php" class="btn btn-primary" style="font-size: 12px; font-weight: 800; padding: 12px 50px; background: #000; color: #fff; border-radius: 8px; text-decoration: none;">OPEN FACTORY MODULE</a>
                </div>
            </div>
            <?php else: ?>
            <div style="background: #fff; border: 2px solid #ef4444; border-radius: 12px; padding: 35px; position: relative;">
                <div style="position: absolute; top: 0px; right: 40px; background: #ef4444; color: #fff; font-size: 9px; font-weight: 950; padding: 6px 15px; border-radius: 0 0 8px 8px; text-transform: uppercase;">STUCK POINT: LINING</div>
                <h4 style="font-size: 15px; font-weight: 950; margin-bottom: 30px; color: #01172a;"><i class="fa-solid fa-bars-staggered" style="margin-right: 10px; color: #ef4444;"></i> Cargo Lining & Staging (STUCK)</h4>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                    <div class="form-group"><label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; display: block;">Lining Supervisor</label><input type="text" class="form-input" value="Ahmed Al-Balushi" readonly style="background: #f8fafc; font-size: 13px; font-weight: 700;"></div>
                    <div class="form-group"><label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 8px; display: block;">Lining Order Number (Required)</label><input type="text" class="form-input" placeholder="ENTER LINING NO..." style="border-color: #ef4444; font-size: 13px; font-weight: 850;"></div>
                    <div style="background: #fff7ed; border: 1px solid #ffedd5; border-radius: 8px; padding: 15px; grid-column: span 2;">
                        <p style="font-size: 11px; font-weight: 700; color: #ea580c; margin-bottom: 5px;"><i class="fa-solid fa-triangle-exclamation" style="margin-right: 8px;"></i> Lining Verification Alert</p>
                        <p style="font-size: 10px; color: #92400e; font-weight: 600; margin: 0;">Cargo is pending 'Lining' clearance for Dock Stuffing. Please verify slot assignment at Port Area 4.</p>
                    </div>
                </div>

                <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #f1f5f9; display: flex; justify-content: flex-end; gap: 15px;">
                    <button class="btn" style="background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 800; padding: 12px 25px; border-radius: 8px;">NOTIFY YARD</button>
                    <a href="dock-stuffing/staging.php" class="btn btn-primary" style="font-size: 12px; font-weight: 800; padding: 12px 50px; background: #000; color: #fff; border-radius: 8px; text-decoration: none;">OPEN LINING MODULE</a>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- BOTTOM: DOCUMENT REGISTRY -->
        <div style="margin-top: 50px; padding: 35px; background: #fff; border: 1px solid #f1f5f9; border-radius: 12px;">
            <h4 style="font-size: 12px; font-weight: 950; text-transform: uppercase; margin-bottom: 30px; color: #1e293b; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-folder-open" style="color: #64748b;"></i> Verified Shipment Assets
            </h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
                <a href="assets/docs/commercial_invoice.pdf" target="_blank" style="text-decoration: none; display: flex; align-items: center; gap: 15px; padding: 18px; border: 1px solid #e2e8f0; border-radius: 10px; transition: all 0.2s; background: #fff;" onmouseover="this.style.borderColor='#000'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='none'">
                    <div style="width: 40px; height: 40px; background: #fee2e2; border-radius: 8px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-file-pdf" style="color: #ef4444; font-size: 18px;"></i></div>
                    <div><span style="font-size: 11px; font-weight: 850; color: #01172a; display: block;">COMMERCIAL INVOICE</span><span style="font-size: 9px; color: #94a3b8; font-weight: 700;">PDF • VERIFIED 100%</span></div>
                </a>
                <a href="assets/docs/packing_list.pdf" target="_blank" style="text-decoration: none; display: flex; align-items: center; gap: 15px; padding: 18px; border: 1px solid #e2e8f0; border-radius: 10px; transition: all 0.2s; background: #fff;" onmouseover="this.style.borderColor='#000'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='none'">
                    <div style="width: 40px; height: 40px; background: #e0f2fe; border-radius: 8px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-file-lines" style="color: #2563eb; font-size: 18px;"></i></div>
                    <div><span style="font-size: 11px; font-weight: 850; color: #01172a; display: block;">PACKING LIST</span><span style="font-size: 9px; color: #94a3b8; font-weight: 700;">PDF • VERIFIED</span></div>
                </a>
                <a href="assets/docs/shipping_bill.pdf" target="_blank" style="text-decoration: none; display: flex; align-items: center; gap: 15px; padding: 18px; border: 1px solid #e2e8f0; border-radius: 10px; transition: all 0.2s; background: #fff;" onmouseover="this.style.borderColor='#000'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='none'">
                    <div style="width: 40px; height: 40px; background: #dcfce7; border-radius: 8px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-file-shield" style="color: #10b981; font-size: 18px;"></i></div>
                    <div><span style="font-size: 11px; font-weight: 850; color: #01172a; display: block;">SHIPPING BILL</span><span style="font-size: 9px; color: #94a3b8; font-weight: 700;">PDF • SYNCED</span></div>
                </a>
                <div style="display: flex; align-items: center; gap: 15px; padding: 18px; border: 2px dashed #f1f5f9; border-radius: 10px; background: #f8fafc;">
                    <div style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-plus-circle" style="color: #94a3b8; font-size: 18px;"></i></div>
                    <div><span style="font-size: 11px; font-weight: 850; color: #94a3b8; display: block;">BILL OF LADING</span><span style="font-size: 9px; color: #94a3b8; font-weight: 700;">DRAFT PENDING</span></div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
