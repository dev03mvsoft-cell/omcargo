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
            <h1 class="page-title" style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Welcome Back, Anatolia Tile & Stone</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 700; margin-top: 2px; text-transform: uppercase;">TRANS-CAN-LTD • CLIENT PORTAL • DASHBOARD</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div style="text-align: right; padding-right: 15px; border-right: 1px solid #e2e8f0;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Verified Balance</p>
                <p style="font-size: 10px; color: #10b981; font-weight: 800; margin: 0;">2,450.00 OMR</p>
            </div>
            <a href="client-profile.php" class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800; padding: 8px 15px; border-radius: 6px; text-decoration: none;">MY PROFILE</a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px 40px;">
        <!-- Shipment Summary Radar -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px;">
            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">In-Transit</p>
                <h2 style="font-size: 24px; font-weight: 950; margin: 5px 0;">04</h2>
                <p style="font-size: 10px; color: #3b82f6; font-weight: 700;">Global Network Active</p>
            </div>
            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Awaiting Docs</p>
                <h2 style="font-size: 24px; font-weight: 950; color: #f59e0b; margin: 5px 0;">02</h2>
                <p style="font-size: 10px; color: #f59e0b; font-weight: 700;">Verification Required</p>
            </div>
            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Arriving Soon</p>
                <h2 style="font-size: 24px; font-weight: 950; color: #10b981; margin: 5px 0;">01</h2>
                <p style="font-size: 10px; color: #10b981; font-weight: 700;">Within 48 Hours</p>
            </div>
            <div class="card" style="padding: 24px; background: #f8fafc; border: 1.5px dashed #e2e8f0; border-radius: 12px; display: flex; align-items: center; justify-content: center; text-align: center;">
                <div>
                     <i class="fa-solid fa-headset" style="font-size: 18px; color: #64748b; margin-bottom: 8px;"></i>
                     <p style="font-size: 10px; font-weight: 800; color: #64748b; margin: 0;">24/7 SUPPORT</p>
                     <p style="font-size: 9px; font-weight: 600; color: #94a3b8;">Help Center</p>
                </div>
            </div>
        </div>

        <!-- Active Shipments Grid -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0; text-transform: uppercase;">Active Logistics Radar</h3>
            <div style="display: flex; gap: 10px;">
                <div style="position: relative;">
                    <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 11px; color: #94a3b8;"></i>
                    <input type="text" placeholder="Search Order ID..." style="padding: 8px 12px 8px 32px; font-size: 10px; font-weight: 700; border: 1.5px solid #e2e8f0; border-radius: 6px; outline: none;">
                </div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
            
            <!-- SHIPMENT CARD 1 -->
            <div class="ship-card" style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; transition: all 0.2s;">
                <div style="padding: 20px; border-bottom: 1.5px solid #f1f5f9; display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="font-size: 9px; font-weight: 850; color: #2563eb; text-transform: uppercase; margin: 0;">OCM-EXP-24-9003</p>
                        <h4 style="font-size: 13px; font-weight: 900; color: #1e293b; margin: 4px 0 0 0;">POLISHED MOSAIC TILES</h4>
                    </div>
                    <span style="font-size: 8px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 4px 8px; border-radius: 4px; border: 1px solid #dbeafe;">ON SHIP</span>
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div>
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Origin</p>
                            <p style="font-size: 11px; font-weight: 700; color: #1e293b;">MUNDRA (IN)</p>
                        </div>
                        <i class="fa-solid fa-arrow-right" style="font-size: 12px; color: #cbd5e1;"></i>
                        <div style="text-align: right;">
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Destination</p>
                            <p style="font-size: 11px; font-weight: 700; color: #1e293b;">JEBEL ALI (AE)</p>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <p style="font-size: 9px; font-weight: 850; color: #64748b;">JOURNEY PROGRESS</p>
                            <p style="font-size: 10px; font-weight: 950; color: #2563eb;">75%</p>
                        </div>
                        <div style="height: 6px; background: #f1f5f9; border-radius: 10px; position: relative; overflow: hidden;">
                            <div style="position: absolute; height: 100%; width: 75%; background: #2563eb; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="client-track.php?id=9003" style="display: block; text-align: center; background: #f8fafc; border: 1.5px solid #e2e8f0; color: #2563eb; font-size: 10px; font-weight: 900; padding: 10px; border-radius: 6px; text-decoration: none;">TRACK DETAILS</a>
                </div>
            </div>

            <!-- SHIPMENT CARD 2 -->
            <div class="ship-card" style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; transition: all 0.2s;">
                <div style="padding: 20px; border-bottom: 1.5px solid #f1f5f9; display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p style="font-size: 9px; font-weight: 850; color: #2563eb; text-transform: uppercase; margin: 0;">OCM-EXP-24-9012</p>
                        <h4 style="font-size: 13px; font-weight: 900; color: #1e293b; margin: 4px 0 0 0;">CERAMIC SLABS (GR 5)</h4>
                    </div>
                    <span style="font-size: 8px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 4px 8px; border-radius: 4px; border: 1px solid #ffedd5;">FACTORY</span>
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div>
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Origin</p>
                            <p style="font-size: 11px; font-weight: 700; color: #1e293b;">RAJKOT (IN)</p>
                        </div>
                        <i class="fa-solid fa-arrow-right" style="font-size: 12px; color: #cbd5e1;"></i>
                        <div style="text-align: right;">
                            <p style="font-size: 8px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Destination</p>
                            <p style="font-size: 11px; font-weight: 700; color: #1e293b;">MUSCAT (OM)</p>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <p style="font-size: 9px; font-weight: 850; color: #64748b;">JOURNEY PROGRESS</p>
                            <p style="font-size: 10px; font-weight: 950; color: #ea580c;">20%</p>
                        </div>
                        <div style="height: 6px; background: #f1f5f9; border-radius: 10px; position: relative; overflow: hidden;">
                            <div style="position: absolute; height: 100%; width: 20%; background: #ea580c; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="client-track.php?id=9012" style="display: block; text-align: center; background: #f8fafc; border: 1.5px solid #e2e8f0; color: #2563eb; font-size: 10px; font-weight: 900; padding: 10px; border-radius: 6px; text-decoration: none;">TRACK DETAILS</a>
                </div>
            </div>

        </div>
    </div>
</main>

<?php include 'admin/includes/footer.php'; ?>
