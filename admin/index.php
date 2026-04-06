<?php
$path_prefix = "";
$is_root = true;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Global Operational Radar</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 700; margin-top: 2px; text-transform: uppercase;">ADMINISTRATOR • SYSTEM OVERVIEW • OMAN CARGO MOVERS</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div style="text-align: right; padding-right: 15px; border-right: 1px solid #e2e8f0;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">System Performance</p>
                <p style="font-size: 10px; color: #10b981; font-weight: 800; margin: 0;">200 OK • LIVE HUB</p>
            </div>
            <a href="job-create.php" class="btn" style="background: #2563eb; color: #fff; font-size: 11px; font-weight: 800; padding: 10px 20px; border-radius: 6px; text-decoration: none; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">QUICK CREATE JOB</a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px 40px;">
        <!-- OPERATIONAL STATS RADAR -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px;">
            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; position: relative; overflow: hidden;">
                <div style="position: absolute; right: -10px; top: -10px; opacity: 0.05; font-size: 80px; color: #64748b;"><i class="fa-solid fa-truck"></i></div>
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px;">Active Shipments</p>
                <h2 style="font-size: 28px; font-weight: 950; margin: 8px 0; color: #0f172a;">482</h2>
                <div style="display: flex; align-items: center; gap: 6px;">
                    <span style="font-size: 10px; color: #10b981; font-weight: 800;">+12%</span>
                    <span style="font-size: 9px; color: #94a3b8; font-weight: 600;">VS LAST WEEK</span>
                </div>
            </div>
            
            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; position: relative; overflow: hidden;">
                <div style="position: absolute; right: -10px; top: -10px; opacity: 0.05; font-size: 80px; color: #10b981;"><i class="fa-solid fa-sack-dollar"></i></div>
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Est. Revenue</p>
                <h2 style="font-size: 28px; font-weight: 950; margin: 8px 0; color: #0f172a;">8.42K <span style="font-size: 12px; color: #94a3b8;">OMR</span></h2>
                <div style="display: flex; align-items: center; gap: 6px;">
                    <span style="font-size: 10px; color: #10b981; font-weight: 800;">LIVE Billed</span>
                    <span style="font-size: 9px; color: #94a3b8; font-weight: 600;">Q2-2024</span>
                </div>
            </div>

            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; position: relative; overflow: hidden;">
                <div style="position: absolute; right: -10px; top: -10px; opacity: 0.05; font-size: 80px; color: #3b82f6;"><i class="fa-solid fa-route"></i></div>
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Fleet Load</p>
                <h2 style="font-size: 28px; font-weight: 950; margin: 8px 0; color: #0f172a;">92%</h2>
                <div style="display: flex; align-items: center; gap: 6px;">
                    <span style="font-size: 10px; color: #3b82f6; font-weight: 800;">Near Capacity</span>
                    <span style="font-size: 9px; color: #94a3b8; font-weight: 600;">MAX UTILIZATION</span>
                </div>
            </div>

            <div class="card" style="padding: 24px; background: #0f172a; border: none; border-radius: 12px; position: relative;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">System Health</p>
                <h2 style="font-size: 20px; font-weight: 950; margin: 12px 0; color: #fff;">100% ONLINE</h2>
                <div style="height: 4px; border-radius: 2px; width: 100%; background: #1e293b; margin-top: 15px; position: relative; overflow: hidden;">
                    <div style="position: absolute; height: 100%; background: #10b981; width: 100%;"></div>
                </div>
            </div>
        </div>

        <!-- RECENT OPERATIONAL ACTIVITY -->
        <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; margin-top: 30px;">
            <div style="padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h3 style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0; text-transform: uppercase;">Recent Global Activity</h3>
                <a href="job-assign-slip.php" style="font-size: 11px; font-weight: 800; color: #2563eb; text-decoration: none;">VIEW ALL REGISTRY</a>
            </div>
            
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8fafc; text-align: left;">
                        <th style="padding: 15px 24px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #f1f5f9;">Event Time</th>
                        <th style="padding: 15px 24px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #f1f5f9;">Job Mapping</th>
                        <th style="padding: 15px 24px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #f1f5f9;">Operational Status</th>
                        <th style="padding: 15px 24px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #f1f5f9;">Entity Impact</th>
                        <th style="padding: 15px 24px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #f1f5f9; text-align: right;">Context</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 20px 24px;">
                            <div style="font-weight: 950; font-size: 12px;">10:42 AM</div>
                            <div style="font-size: 9px; font-weight: 700; color: #94a3b8;">TODAY, 6 APR</div>
                        </td>
                        <td style="padding: 20px 24px;">
                            <div style="font-weight: 800; font-size: 12px; color: #2563eb;">OCM-EXP-24-9003</div>
                        </td>
                        <td style="padding: 20px 24px;">
                            <span style="font-size: 9px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 100px; border: 1px solid #dbeafe;">DEPARTED MUNDRA</span>
                        </td>
                        <td style="padding: 20px 24px;">
                             <div style="font-weight: 800; font-size: 12px;">ANATOLIA TILE & STONE</div>
                        </td>
                        <td style="padding: 20px 24px; text-align: right;">
                             <i class="fa-solid fa-ellipsis-vertical" style="color: #94a3b8;"></i>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 20px 24px;">
                            <div style="font-weight: 950; font-size: 12px;">09:15 AM</div>
                            <div style="font-size: 9px; font-weight: 700; color: #94a3b8;">TODAY, 6 APR</div>
                        </td>
                        <td style="padding: 20px 24px;">
                            <div style="font-weight: 800; font-size: 12px; color: #2563eb;">OCM-EXP-24-9012</div>
                        </td>
                        <td style="padding: 20px 24px;">
                            <span style="font-size: 9px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 4px 10px; border-radius: 100px; border: 1px solid #ffedd5;">FACTORY GATE-IN</span>
                        </td>
                        <td style="padding: 20px 24px;">
                             <div style="font-weight: 800; font-size: 12px;">TRANS-CAN-LOGISTICS</div>
                        </td>
                        <td style="padding: 20px 24px; text-align: right;">
                             <i class="fa-solid fa-ellipsis-vertical" style="color: #94a3b8;"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
