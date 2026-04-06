<?php
$path_prefix = "admin/";
$is_root = true;
include 'admin/includes/header.php';
include 'admin/includes/sidebar.php';
?>

<!-- MAIN WORKSPACE START (ROOT) -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="margin-bottom: 2px; font-size: 18px; font-weight: 800;">Global Operational Hub</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; display: flex; align-items: center; gap: 6px;">
                <span style="width: 8px; height: 8px; background: #22c55e; border-radius: 50%;"></span>
                Live PHP Engine Integration
            </p>
        </div>
        <div style="display: flex; align-items: center; gap: 20px;">
            <div style="text-align: right;">
                <p style="font-size: 10px; font-weight: 800; color: var(--primary); text-transform: uppercase; margin: 0;">Hub Status: 200 OK</p>
                <p style="font-size: 10px; color: var(--text-muted); font-weight: 600; margin: 0;">Tracking Active</p>
            </div>
            <div style="width: 40px; height: 40px; border-radius: 8px; background: #f8fafc; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center;">
                <i class="fa-solid fa-headset" style="color: var(--primary); font-size: 16px;"></i>
            </div>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px;">
        
        <!-- Simple KPI Grid -->
        <div class="grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
            <div class="card" style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
                <p style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px;">Active Exports</p>
                <h4 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0;">124</h4>
                <p style="margin-top: 10px; font-size: 11px; color: #10b981; font-weight: 700;">+ 12.4% <span style="color: #94a3b8; font-weight: 500;">vs last month</span></p>
            </div>
            <div class="card" style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
                <p style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px;">Active Imports</p>
                <h4 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0;">58</h4>
                <p style="margin-top: 10px; font-size: 11px; color: #10b981; font-weight: 700;">+ 2.1% <span style="color: #94a3b8; font-weight: 500;">vs last month</span></p>
            </div>
            <div class="card" style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
                <p style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px;">Global Clients</p>
                <h4 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0;">342</h4>
                <p style="margin-top: 10px; font-size: 11px; color: #94a3b8; font-weight: 600;">In 18 regions</p>
            </div>
            <div class="card" style="padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; border-left: 4px solid #ef4444;">
                <p style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px;">Operational Alerts</p>
                <h4 style="font-size: 24px; font-weight: 700; color: #ef4444; margin: 0;">04</h4>
                <p style="margin-top: 10px; font-size: 11px; color: #ef4444; font-weight: 700;">Action Required</p>
            </div>
        </div>

        <!-- Recent Tracking Table -->
        <div class="card" style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; background: #fff;">
            <div style="padding: 20px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                <h5 style="margin: 0; font-size: 14px; font-weight: 800;">Recent Operational Sequences</h5>
                <button class="btn" style="padding: 6px 12px; font-size: 10px; background: #fff; border: 1px solid #e2e8f0;">VIEW ALL</button>
            </div>
            <div style="overflow-x: auto;">
                <table class="table" style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; background: #f8fafc;">
                            <th style="padding: 12px 20px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">Job Reference</th>
                            <th style="padding: 12px 20px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">Consignor / Agency</th>
                            <th style="padding: 12px 20px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">Service Type</th>
                            <th style="padding: 12px 20px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase;">Progress</th>
                            <th style="padding: 12px 20px; font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Factory Stuffing Entry -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 15px 20px;">
                                <div style="font-weight: 800; color: var(--primary); font-size: 12px;">OCM-FAC-24-005</div>
                                <span style="font-size: 9px; color: #94a3b8; font-weight: 600;">Updated 15m ago</span>
                            </td>
                            <td style="padding: 15px 20px;">
                                <div style="font-weight: 700; font-size: 12px;">AL-FALAK TRADING</div>
                                <span style="font-size: 9px; color: #ea580c; font-weight: 800; text-transform: uppercase;">Factory Stuffing</span>
                            </td>
                            <td style="padding: 15px 20px;">
                                <span style="font-weight: 700; font-size: 10px; padding: 4px 8px; background: #fff7ed; color: #ea580c; border-radius: 4px;">EXPORT</span>
                            </td>
                            <td style="padding: 15px 20px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                        <div style="width: 24%; height: 100%; background: #ea580c;"></div>
                                    </div>
                                    <span style="font-size: 10px; font-weight: 800;">24%</span>
                                </div>
                            </td>
                            <td align="right" style="padding: 15px 20px;">
                                <a href="admin/factory-stuffing/checklist.php" class="btn" style="padding: 6px 12px; font-size: 10px; font-weight: 800; text-decoration: none; border: 1px solid #000; color: #000;">MANAGE</a>
                            </td>
                        </tr>
                        <!-- Standard Export -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 15px 20px;">
                                <div style="font-weight: 800; color: var(--primary); font-size: 12px;">OCM-EXP-24-001</div>
                                <span style="font-size: 9px; color: #94a3b8; font-weight: 600;">Updated 2h ago</span>
                            </td>
                            <td style="padding: 15px 20px;">
                                <div style="font-weight: 700; font-size: 12px;">GLOBAL LOGIX OMAN</div>
                                <span style="font-size: 9px; color: #64748b; font-weight: 600;">Main Agency</span>
                            </td>
                            <td style="padding: 15px 20px;">
                                <span style="font-weight: 700; font-size: 10px; padding: 4px 8px; background: #f1f5f9; border-radius: 4px;">SEA EXPORT</span>
                            </td>
                            <td style="padding: 15px 20px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                        <div style="width: 68%; height: 100%; background: #2563eb;"></div>
                                    </div>
                                    <span style="font-size: 10px; font-weight: 800;">68%</span>
                                </div>
                            </td>
                            <td align="right" style="padding: 15px 20px;">
                                <a href="admin/job-create.php" class="btn" style="padding: 6px 12px; font-size: 10px; font-weight: 800; text-decoration: none; border: 1px solid #000; color: #000;">MANAGE</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- MAIN WORKSPACE END -->

<?php include 'admin/includes/footer.php'; ?>