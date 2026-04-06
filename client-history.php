<?php
$path_prefix = "admin/";
$is_root = true;
$is_client_portal = true;
include 'admin/includes/header.php';
?>
<?php include 'admin/includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Order History</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 700; margin-top: 2px; text-transform: uppercase;">ALL COMPLETED & ARCHIVED SHIPMENTS</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800; padding: 8px 15px; border-radius: 6px;"><i class="fa-solid fa-file-export" style="margin-right: 8px;"></i>EXPORT ALL</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px 40px;">
        <!-- Order History Grid -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0; text-transform: uppercase;">Closed Files Registry</h3>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
            
            <!-- HISTORY CARD 1 -->
            <div class="ship-card" style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; transition: all 0.2s; opacity: 0.85;">
                <div style="padding: 20px; border-bottom: 1.5px solid #f1f5f9; display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="font-size: 9px; font-weight: 850; color: #64748b; text-transform: uppercase; margin: 0;">OCM-EXP-24-8841</p>
                        <h4 style="font-size: 13px; font-weight: 900; color: #1e293b; margin: 4px 0 0 0;">RAW MARBLE BLOCKS</h4>
                    </div>
                    <span style="font-size: 8px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 4px 8px; border-radius: 4px; border: 1px solid #dcfce7;">DELIVERED</span>
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div>
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Origin</p>
                            <p style="font-size: 11px; font-weight: 700; color: #64748b;">MUNDRA (IN)</p>
                        </div>
                        <i class="fa-solid fa-check-double" style="font-size: 12px; color: #16a34a;"></i>
                        <div style="text-align: right;">
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Destination</p>
                            <p style="font-size: 11px; font-weight: 700; color: #64748b;">SHARJAH (AE)</p>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <p style="font-size: 9px; font-weight: 850; color: #64748b;">COMPLETED ON: 30 MAR</p>
                            <p style="font-size: 10px; font-weight: 950; color: #16a34a;">100%</p>
                        </div>
                        <div style="height: 6px; background: #f0fdf4; border-radius: 10px; position: relative; overflow: hidden;">
                            <div style="position: absolute; height: 100%; width: 100%; background: #16a34a; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="client-track.php?id=8841" style="display: block; text-align: center; background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 10px; font-weight: 900; padding: 10px; border-radius: 6px; text-decoration: none;">TRACK DETAILS</a>
                </div>
            </div>

            <!-- HISTORY CARD 2 -->
            <div class="ship-card" style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; transition: all 0.2s; opacity: 0.85;">
                <div style="padding: 20px; border-bottom: 1.5px solid #f1f5f9; display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="font-size: 9px; font-weight: 850; color: #64748b; text-transform: uppercase; margin: 0;">OCM-EXP-24-8720</p>
                        <h4 style="font-size: 13px; font-weight: 900; color: #1e293b; margin: 4px 0 0 0;">CERAMIC FITTINGS</h4>
                    </div>
                    <span style="font-size: 8px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 4px 8px; border-radius: 4px; border: 1px solid #dcfce7;">DELIVERED</span>
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div>
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Origin</p>
                            <p style="font-size: 11px; font-weight: 700; color: #64748b;">RAJKOT (IN)</p>
                        </div>
                        <i class="fa-solid fa-check-double" style="font-size: 12px; color: #16a34a;"></i>
                        <div style="text-align: right;">
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Destination</p>
                            <p style="font-size: 11px; font-weight: 700; color: #64748b;">DUBAI (AE)</p>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <p style="font-size: 9px; font-weight: 850; color: #64748b;">COMPLETED ON: 15 MAR</p>
                            <p style="font-size: 10px; font-weight: 950; color: #16a34a;">100%</p>
                        </div>
                        <div style="height: 6px; background: #f0fdf4; border-radius: 10px; position: relative; overflow: hidden;">
                            <div style="position: absolute; height: 100%; width: 100%; background: #16a34a; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="client-track.php?id=8720" style="display: block; text-align: center; background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 10px; font-weight: 900; padding: 10px; border-radius: 6px; text-decoration: none;">TRACK DETAILS</a>
                </div>
            </div>

        </div>
    </div>
</main>

<?php include 'admin/includes/footer.php'; ?>
