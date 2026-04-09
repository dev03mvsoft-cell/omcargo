<?php
$path_prefix = "admin/";
$is_root = true;
include 'admin/includes/header.php';
include 'admin/includes/sidebar.php';
?>

<!-- MAIN WORKSPACE START (ROOT) -->

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

            <div class="card" style="padding: 24px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; position: relative; overflow: hidden;">
                <p style="font-size: 9px; font-weight: 800; color: #000000ff; text-transform: uppercase;">System Health</p>
                <h2 style="font-size: 20px; font-weight: 950; margin: 12px 0; color: #000000ff;">100% ONLINE</h2>
                <div style="height: 4px; border-radius: 2px; width: 100%; background: #1e293b; margin-top: 15px; position: relative; overflow: hidden;">
                    <div style="position: absolute; height: 100%; background: #10b981; width: 100%;"></div>
                </div>
            </div>
        </div>

        <!-- RECENT OPERATIONAL SEQUENCES (GLOBAL ACTIVITY) -->
        <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; margin-top: 30px;">
            <div style="padding: 20px 30px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                <h3 style="font-size: 14px; font-weight: 950; color: #01172a; margin: 0; letter-spacing: -0.3px;">Recent Operational Sequences</h3>
                <a href="admin/work-assignment.php" style="font-size: 9px; font-weight: 900; color: #01172a; text-decoration: none; text-transform: uppercase; border: 1.5px solid #e2e8f0; padding: 6px 18px; border-radius: 100px; transition: all 0.2s;">VIEW ALL</a>
            </div>

            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left;">
                        <th style="padding: 20px 30px; font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #ffffff;">JOB REFERENCE</th>
                        <th style="padding: 20px 30px; font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #ffffff;">CONSIGNOR / AGENCY</th>
                        <th style="padding: 20px 30px; font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #ffffff;">SERVICE TYPE</th>
                        <th style="padding: 20px 30px; font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #ffffff;">PROGRESS</th>
                        <th style="padding: 20px 30px; font-size: 10px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #ffffff; text-align: right;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- STEP 1: FACTORY STUFFING -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 900; font-size: 14px; color: #2563eb; letter-spacing: -0.2px;">OCM-FAC-24-005</div>
                            <div style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-top: 4px;">Updated 15m ago</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 950; font-size: 13px; color: #01172a; text-transform: uppercase;">AL-FALAK TRADING</div>
                            <div style="font-size: 10px; font-weight: 900; color: #ea580c; text-transform: uppercase; margin-top: 4px; letter-spacing: 0.2px;">FACTORY STUFFING</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <span style="font-size: 9px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 6px 12px; border-radius: 6px; text-transform: uppercase; border: 1px solid #ffedd5;">EXPORT</span>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; width: 220px;">
                                <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 24%; height: 100%; background: #ea580c; border-radius: 10px;"></div>
                                </div>
                                <span style="font-size: 11px; font-weight: 950; color: #0f172a;">24%</span>
                            </div>
                        </td>
                        <td style="padding: 20px 30px; text-align: right;">
                            <a href="admin/work-assignment.php" style="display: inline-block; padding: 10px 24px; border: 1.5px solid #01172a; border-radius: 100px; font-size: 10px; font-weight: 950; color: #01172a; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">MANAGE</a>
                        </td>
                    </tr>

                    <!-- STEP 2: SEA EXPORT -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 900; font-size: 14px; color: #2563eb; letter-spacing: -0.2px;">OCM-EXP-24-001</div>
                            <div style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-top: 4px;">Updated 2h ago</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 950; font-size: 13px; color: #01172a; text-transform: uppercase;">GLOBAL LOGIX OMAN</div>
                            <div style="font-size: 10px; font-weight: 800; color: #64748b; margin-top: 4px; letter-spacing: 0.2px;">Main Agency</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <span style="font-size: 9px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 6px 12px; border-radius: 6px; text-transform: uppercase; border: 1px solid #dbeafe;">SEA EXPORT</span>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; width: 220px;">
                                <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 68%; height: 100%; background: #2563eb; border-radius: 10px;"></div>
                                </div>
                                <span style="font-size: 11px; font-weight: 950; color: #0f172a;">68%</span>
                            </div>
                        </td>
                        <td style="padding: 20px 30px; text-align: right;">
                            <a href="admin/work-assignment.php" style="display: inline-block; padding: 10px 24px; border: 1.5px solid #01172a; border-radius: 100px; font-size: 10px; font-weight: 950; color: #01172a; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">MANAGE</a>
                        </td>
                    </tr>

                    <!-- STEP 3: SEA IMPORT -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 900; font-size: 14px; color: #2563eb; letter-spacing: -0.2px;">OCM-IMP-24-088</div>
                            <div style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-top: 4px;">Updated 4h ago</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 950; font-size: 13px; color: #01172a; text-transform: uppercase;">OMAN LOGISTICS HUB</div>
                            <div style="font-size: 10px; font-weight: 800; color: #64748b; margin-top: 4px; letter-spacing: 0.2px;">Priority Client</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <span style="font-size: 9px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 6px 12px; border-radius: 6px; text-transform: uppercase; border: 1px solid #dcfce7;">SEA IMPORT</span>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; width: 220px;">
                                <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 42%; height: 100%; background: #16a34a; border-radius: 10px;"></div>
                                </div>
                                <span style="font-size: 11px; font-weight: 950; color: #0f172a;">42%</span>
                            </div>
                        </td>
                        <td style="padding: 20px 30px; text-align: right;">
                            <a href="admin/work-assignment.php" style="display: inline-block; padding: 10px 24px; border: 1.5px solid #01172a; border-radius: 100px; font-size: 10px; font-weight: 950; color: #01172a; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">MANAGE</a>
                        </td>
                    </tr>

                    <!-- STEP 4: DOCK STUFFING (EXPORT) -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 900; font-size: 14px; color: #2563eb; letter-spacing: -0.2px;">OCM-DSK-24-012</div>
                            <div style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-top: 4px;">Updated 1h ago</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 950; font-size: 13px; color: #01172a; text-transform: uppercase;">PORT SERVICES LLC</div>
                            <div style="font-size: 10px; font-weight: 900; color: #2563eb; text-transform: uppercase; margin-top: 4px; letter-spacing: 0.2px;">DOCK STUFFING (EXP)</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <span style="font-size: 9px; font-weight: 950; background: #f5f3ff; color: #7c3aed; padding: 6px 12px; border-radius: 6px; text-transform: uppercase; border: 1px solid #ddd6fe;">EXPORT</span>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; width: 220px;">
                                <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 95%; height: 100%; background: #7c3aed; border-radius: 10px;"></div>
                                </div>
                                <span style="font-size: 11px; font-weight: 950; color: #0f172a;">95%</span>
                            </div>
                        </td>
                        <td style="padding: 20px 30px; text-align: right;">
                            <a href="admin/work-assignment.php" style="display: inline-block; padding: 10px 24px; border: 1.5px solid #01172a; border-radius: 100px; font-size: 10px; font-weight: 950; color: #01172a; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">MANAGE</a>
                        </td>
                    </tr>

                    <!-- STEP 5: IMPORT FACTORY DE-STUFFING -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 900; font-size: 14px; color: #2563eb; letter-spacing: -0.2px;">OCM-IFD-24-092</div>
                            <div style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-top: 4px;">Updated 30m ago</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 950; font-size: 13px; color: #01172a; text-transform: uppercase;">OASIS INDUSTRIES</div>
                            <div style="font-size: 10px; font-weight: 900; color: #ea580c; text-transform: uppercase; margin-top: 4px; letter-spacing: 0.2px;">FACTORY DE-STUFFING</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <span style="font-size: 9px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 6px 12px; border-radius: 6px; text-transform: uppercase; border: 1px solid #ffedd5;">IMPORT</span>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; width: 220px;">
                                <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 80%; height: 100%; background: #ea580c; border-radius: 10px;"></div>
                                </div>
                                <span style="font-size: 11px; font-weight: 950; color: #0f172a;">80%</span>
                            </div>
                        </td>
                        <td style="padding: 20px 30px; text-align: right;">
                            <a href="admin/work-assignment.php" style="display: inline-block; padding: 10px 24px; border: 1.5px solid #01172a; border-radius: 100px; font-size: 10px; font-weight: 950; color: #01172a; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">MANAGE</a>
                        </td>
                    </tr>

                    <!-- STEP 6: IMPORT DOCK DE-STUFFING (CFS) -->
                    <tr style="transition: background 0.2s;">
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 900; font-size: 14px; color: #2563eb; letter-spacing: -0.2px;">OCM-IDC-24-004</div>
                            <div style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-top: 4px;">Updated 50m ago</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="font-weight: 950; font-size: 13px; color: #01172a; text-transform: uppercase;">MUNDRA CUSTOMS CFS</div>
                            <div style="font-size: 10px; font-weight: 900; color: #2563eb; text-transform: uppercase; margin-top: 4px; letter-spacing: 0.2px;">DOCK DE-STUFFING (CFS)</div>
                        </td>
                        <td style="padding: 20px 30px;">
                            <span style="font-size: 9px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 6px 12px; border-radius: 6px; text-transform: uppercase; border: 1px solid #dbeafe;">IMPORT</span>
                        </td>
                        <td style="padding: 20px 30px;">
                            <div style="display: flex; align-items: center; gap: 12px; width: 220px;">
                                <div style="flex-grow: 1; height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 60%; height: 100%; background: #2563eb; border-radius: 10px;"></div>
                                </div>
                                <span style="font-size: 11px; font-weight: 950; color: #0f172a;">60%</span>
                            </div>
                        </td>
                        <td style="padding: 20px 30px; text-align: right;">
                            <a href="admin/work-assignment.php" style="display: inline-block; padding: 10px 24px; border: 1.5px solid #01172a; border-radius: 100px; font-size: 10px; font-weight: 950; color: #01172a; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">MANAGE</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MAIN WORKSPACE END -->

<?php include 'admin/includes/footer.php'; ?>