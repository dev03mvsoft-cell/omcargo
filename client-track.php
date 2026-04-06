<?php
$path_prefix = "admin/";
$is_root = true;
$is_client_portal = true;
include 'admin/includes/header.php';
?>
<?php include 'admin/includes/sidebar.php'; ?>

<?php
// Mock Logic for Completed Status (ID 8841 as requested by user)
$order_id = isset($_GET['id']) ? $_GET['id'] : '9003';
$is_done = ($order_id == '8841' || $order_id == '8720'); // IDs from history
$progress = $is_done ? 100 : 75;
$doc_count = $is_done ? '4 / 4' : '3 / 4';
?>

<main class="main-area">
    <!-- REFINED HEADER: NO OVERLAP -->
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 15px 32px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center; min-height: 80px;">
        <div style="display: flex; align-items: center; gap: 16px; flex: 1; min-width: 0;">
            <a href="client-index.php" style="width: 36px; height: 36px; border-radius: 10px; background: #f8fafc; border: 1.5px solid #e2e8f0; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; flex-shrink: 0;">
                <i class="fa-solid fa-arrow-left" style="font-size: 14px;"></i>
            </a>
            <div style="min-width: 0;">
                <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                    <h1 class="page-title" style="font-size: 16px; font-weight: 850; color: #01172a; margin: 0; letter-spacing: -0.3px;">Tracking: <span style="color: #64748b;">OCM-<?php echo $order_id; ?></span></h1>
                    <?php if ($is_done): ?>
                        <span style="font-size: 9px; font-weight: 950; background: #ecfdf5; color: #059669; padding: 4px 10px; border-radius: 100px; border: 1px solid #d1fae5;">COMPLETED</span>
                    <?php else: ?>
                        <span style="font-size: 9px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 100px; border: 1px solid #dbeafe;">IN-TRANSIT</span>
                    <?php endif; ?>
                </div>
                <p style="font-size: 10px; color: #64748b; font-weight: 600; margin-top: 4px; text-transform: uppercase; display: flex; align-items: center; gap: 6px;">
                    Origin: Mundra (IN) <i class="fa-solid fa-arrow-right" style="font-size: 8px; color: #cbd5e1;"></i> Destination: <?php echo $is_done ? 'Sharjah (AE)' : 'Jebel Ali (AE)'; ?>
                </p>
            </div>
        </div>
        <div style="display: flex; gap: 10px; flex-shrink: 0;">
            <button class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 10px; font-weight: 800; padding: 8px 16px; border-radius: 8px; cursor: pointer;">RECEIPT</button>
            <button class="btn" style="background: #2563eb; color: #fff; border: none; font-size: 10px; font-weight: 800; padding: 8px 16px; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2); cursor: pointer;">HELP</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px 40px;">
        <div style="display: grid; grid-template-columns: 1fr 360px; gap: 30px;">

            <!-- LEFT COLUMN: PROGRESS & HISTORY -->
            <div>
                <!-- GLOBAL PROGRESS CARD -->
                <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 25px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span style="font-size: 11px; font-weight: 850; color: #01172a; text-transform: uppercase;">Global Journey Progress</span>
                        <span style="font-size: 13px; font-weight: 950; color: <?php echo $is_done ? '#10b981' : '#2563eb'; ?>;"><?php echo $progress; ?>% <?php echo $is_done ? 'DELIVERED' : 'COMPLETED'; ?></span>
                    </div>
                    <div style="height: 10px; background: #f1f5f9; border-radius: 100px; position: relative; overflow: hidden; border: 1px solid #e2e8f0;">
                        <div style="position: absolute; height: 100%; width: <?php echo $progress; ?>%; background: <?php echo $is_done ? '#10b981' : 'linear-gradient(90deg, #3b82f6, #2563eb)'; ?>; border-radius: 100px;"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 12px;">
                        <span style="font-size: 9px; font-weight: 800; color: #94a3b8;">PICKUP</span>
                        <span style="font-size: 9px; font-weight: 800; color: #94a3b8;">IN-TRANSIT</span>
                        <span style="font-size: 9px; font-weight: 800; color: #94a3b8;">DELIVERY</span>
                    </div>
                </div>

                <!-- OPERATIONAL STATUS BANNER -->
                <div style="background: <?php echo $is_done ? '#f0fdf4' : '#eff6ff'; ?>; border: 1.5px solid <?php echo $is_done ? '#dcfce7' : '#dbeafe'; ?>; border-radius: 12px; padding: 24px; margin-bottom: 30px; display: flex; align-items: center; gap: 20px;">
                    <div style="width: 48px; height: 48px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: <?php echo $is_done ? '#10b981' : '#2563eb'; ?>; font-size: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); flex-shrink: 0;">
                        <i class="fa-solid <?php echo $is_done ? 'fa-circle-check' : 'fa-ship'; ?>"></i>
                    </div>
                    <div>
                        <p style="font-size: 10px; font-weight: 850; color: <?php echo $is_done ? '#16a34a' : '#2563eb'; ?>; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;"><?php echo $is_done ? 'Final Outcome' : 'Current Status'; ?></p>
                        <h3 style="font-size: 16px; font-weight: 900; color: <?php echo $is_done ? '#14532d' : '#1e3a8a'; ?>; margin: 4px 0 0 0;"><?php echo $is_done ? 'SHIPMENT DELIVERED SUCCESS' : 'VESSEL DEPARTED FROM MUNDRA'; ?></h3>
                        <p style="font-size: 11px; color: <?php echo $is_done ? '#16a34a' : '#1d4ed8'; ?>; font-weight: 600; margin-top: 4px; opacity: 0.8;"><?php echo $is_done ? 'Journey End: 30 Mar 2024 • Verified by Customs' : 'Estimated Arrival: 28 Apr 2026 • MAERSK LINE'; ?></p>
                    </div>
                </div>

                <!-- JOURNEY TIMELINE -->
                <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 35px;">
                    <h3 style="font-size: 12px; font-weight: 850; color: #01172a; margin: 0 0 30px 0; text-transform: uppercase; letter-spacing: 0.5px;">Logistics Journey Lifecycle</h3>

                    <div style="position: relative; padding-left: 45px;">
                        <!-- Timeline Vertical Line -->
                        <div style="position: absolute; left: 21px; top: 0; bottom: 0; width: 2px; background: #e2e8f0;"></div>

                        <!-- Step 5 (Final) -->
                        <div style="position: relative; margin-bottom: 35px;">
                            <div style="position: absolute; left: -33px; top: 0; width: 18px; height: 18px; background: <?php echo $is_done ? '#10b981' : '#fff'; ?>; border: 2px solid <?php echo $is_done ? '#10b981' : '#e2e8f0'; ?>; border-radius: 50%; z-index: 1; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px;">
                                <?php if ($is_done) echo '<i class="fa-solid fa-check"></i>'; ?>
                            </div>
                            <div style="<?php if (!$is_done) echo 'opacity: 0.5;'; ?>">
                                <p style="font-size: 9px; font-weight: 850; color: <?php echo $is_done ? '#10b981' : '#94a3b8'; ?>; text-transform: uppercase; margin: 0;">Step 05</p>
                                <h4 style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 4px 0;">FINAL GATE OUT</h4>
                                <p style="font-size: 11px; color: #64748b; font-weight: 500;"><?php echo $is_done ? '30 Mar 2024' : 'Awaiting Arrival'; ?></p>
                            </div>
                        </div>

                        <!-- Step 4 (Current) -->
                        <div style="position: relative; margin-bottom: 35px;">
                            <div style="position: absolute; left: -33px; top: 0; width: 18px; height: 18px; background: <?php echo $is_done ? '#10b981' : '#fff'; ?>; border: 2px solid <?php echo $is_done ? '#10b981' : '#3b82f6'; ?>; border-radius: 50%; z-index: 1; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px; <?php if (!$is_done) echo 'animation: pulse 2s infinite;'; ?>">
                                <?php if ($is_done) echo '<i class="fa-solid fa-check"></i>'; ?>
                            </div>
                            <?php if ($is_done): ?><div style="position: absolute; left: -25px; top: 18px; bottom: -35px; width: 2px; background: #10b981; z-index: 0;"></div><?php endif; ?>
                            <div>
                                <p style="font-size: 9px; font-weight: 850; color: <?php echo $is_done ? '#10b981' : '#3b82f6'; ?>; text-transform: uppercase; margin: 0;">Step 04 <?php echo $is_done ? '(DONE)' : '(ACTIVE)'; ?></p>
                                <h4 style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 4px 0;">PORT UNLOADING</h4>
                                <p style="font-size: 11px; color: #64748b; font-weight: 500; font-style: italic;"><?php echo $is_done ? '28 Mar 2024' : 'Current Phase: Terminal 1'; ?></p>
                            </div>
                        </div>

                        <!-- Step 3 (Completed) -->
                        <div style="position: relative; margin-bottom: 35px;">
                            <div style="position: absolute; left: -33px; top: 0; width: 18px; height: 18px; background: #10b981; border: 2px solid #10b981; border-radius: 50%; z-index: 1; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px;"><i class="fa-solid fa-check"></i></div>
                            <div style="position: absolute; left: -25px; top: 18px; bottom: -35px; width: 2px; background: #10b981; z-index: 0;"></div>
                            <div>
                                <p style="font-size: 9px; font-weight: 850; color: #10b981; text-transform: uppercase; margin: 0;">Step 03 (COMPLETED)</p>
                                <h4 style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 4px 0;">ORIGIN DEPARTURE</h4>
                                <p style="font-size: 11px; color: #64748b; font-weight: 500;">15 Apr 2026 • Mundra Port</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div style="position: relative; margin-bottom: 35px;">
                            <div style="position: absolute; left: -33px; top: 0; width: 18px; height: 18px; background: #10b981; border: 2px solid #10b981; border-radius: 50%; z-index: 1; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px;"><i class="fa-solid fa-check"></i></div>
                            <div style="position: absolute; left: -25px; top: 18px; bottom: -35px; width: 2px; background: #10b981; z-index: 0;"></div>
                            <div>
                                <p style="font-size: 9px; font-weight: 850; color: #10b981; text-transform: uppercase; margin: 0;">Step 02 (COMPLETED)</p>
                                <h4 style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 4px 0;">CUSTOMS CLEARANCE</h4>
                                <p style="font-size: 11px; color: #64748b; font-weight: 500;">12 Apr 2026 • Verified</p>
                            </div>
                        </div>

                        <!-- Step 1 -->
                        <div style="position: relative;">
                            <div style="position: absolute; left: -33px; top: 0; width: 18px; height: 18px; background: #10b981; border: 2px solid #10b981; border-radius: 50%; z-index: 1; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px;"><i class="fa-solid fa-check"></i></div>
                            <div>
                                <p style="font-size: 9px; font-weight: 850; color: #10b981; text-transform: uppercase; margin: 0;">Step 01 (COMPLETED)</p>
                                <h4 style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 4px 0;">WAREHOUSE STUFFING</h4>
                                <p style="font-size: 11px; color: #64748b; font-weight: 500;">10 Apr 2026 • Initiated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: DOCUMENTS & SYNC -->
            <div>
                <!-- PORTAL SYNC HUB -->
                <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 25px;">
                    <h3 style="font-size: 11px; font-weight: 850; color: #01172a; margin: 0 0 20px 0; text-transform: uppercase; letter-spacing: 0.5px;">Portal Synchronization Hub</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div style="background: #f8fafc; border: 1.5px solid #f1f5f9; padding: 15px; border-radius: 10px; text-align: center;">
                            <p style="font-size: 8px; font-weight: 850; color: #94a3b8; text-transform: uppercase; margin-bottom: 6px;">Documents</p>
                            <h4 style="font-size: 16px; font-weight: 950; color: #2563eb; margin: 0;"><?php echo $doc_count; ?></h4>
                            <p style="font-size: 8px; font-weight: 750; color: #10b981; margin-top: 5px;">SYNCED</p>
                        </div>
                        <div style="background: #f8fafc; border: 1.5px solid #f1f5f9; padding: 15px; border-radius: 10px; text-align: center;">
                            <p style="font-size: 8px; font-weight: 850; color: #94a3b8; text-transform: uppercase; margin-bottom: 6px;">Checklist</p>
                            <h4 style="font-size: 16px; font-weight: 950; color: #10b981; margin: 0;">100%</h4>
                            <p style="font-size: 8px; font-weight: 750; color: #10b981; margin-top: 5px;">VERIFIED</p>
                        </div>
                    </div>
                </div>

                <!-- DOCUMENTATION HUB -->
                <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 25px;">
                    <h3 style="font-size: 11px; font-weight: 850; color: #01172a; margin: 0 0 20px 0; text-transform: uppercase; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-file-invoice" style="color: #2563eb;"></i> DOCUMENTATION CENTER
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <!-- Doc Items -->
                        <?php
                        $docs = ["Bill of Lading", "Packing List", "Insurance Cert", "Commercial Inv."];
                        foreach ($docs as $doc):
                            $is_missing = (!$is_done && $doc == "Insurance Cert");
                        ?>
                            <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px; background: <?php echo $is_missing ? '#fffbeb' : '#f8fafc'; ?>; border-radius: 8px; border: 1.5px <?php echo $is_missing ? 'dashed #f59e0b' : 'solid #f1f5f9'; ?>;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fa-solid <?php echo $is_missing ? 'fa-circle-exclamation' : 'fa-circle-check'; ?>" style="color: <?php echo $is_missing ? '#f59e0b' : '#10b981'; ?>; font-size: 14px;"></i>
                                    <span style="font-size: 11px; font-weight: 700; color: #1e293b;"><?php echo $doc; ?></span>
                                </div>
                                <?php if ($is_missing): ?>
                                    <span style="font-size: 8px; font-weight: 900; color: #ea580c; border-bottom: 1px solid #ea580c; cursor: pointer;">UPLOAD</span>
                                <?php else: ?>
                                    <i class="fa-solid fa-cloud-arrow-down" style="color: #3b82f6; cursor: pointer; font-size: 14px;"></i>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- CARGO METADATA -->
                <div style="background: #01172a; border-radius: 12px; padding: 25px; color: #fff; box-shadow: 0 10px 15px -3px rgba(1, 23, 42, 0.3);">
                    <h3 style="font-size: 10px; font-weight: 850; color: #64748b; margin: 0 0 20px 0; text-transform: uppercase; letter-spacing: 1px;">Shipment Metadata</h3>

                    <div style="display: flex; flex-direction: column; gap: 18px;">
                        <div>
                            <p style="font-size: 8px; font-weight: 700; color: #475569; margin: 0; text-transform: uppercase;">Port of Loading</p>
                            <p style="font-size: 11px; font-weight: 600; color: #f1f5f9; margin: 4px 0 0 0;">MUNDRA PORT (INMUN1)</p>
                        </div>
                        <div>
                            <p style="font-size: 8px; font-weight: 700; color: #475569; margin: 0; text-transform: uppercase;">Discharge Port</p>
                            <p style="font-size: 11px; font-weight: 600; color: #f1f5f9; margin: 4px 0 0 0;">JEBEL ALI (AEJEA)</p>
                        </div>
                        <div>
                            <p style="font-size: 8px; font-weight: 700; color: #475569; margin: 0; text-transform: uppercase;">Container No</p>
                            <p style="font-size: 11px; font-weight: 600; color: #f1f5f9; margin: 4px 0 0 0;">MSKU 9903-882-1</p>
                        </div>
                        <div style="padding-top: 15px; border-top: 1px solid #1e293b;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 9px; font-weight: 800; color: #10b981;">ESTIMATED TRANSIT</span>
                                <span style="font-size: 11px; font-weight: 900; color: #10b981;">13 DAYS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
        }

        70% {
            transform: scale(1.1);
            box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
        }

        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
        }
    }
</style>

<?php include 'admin/includes/footer.php'; ?>