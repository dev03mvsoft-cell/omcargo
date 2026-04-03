<?php
$path_prefix = "admin/";
$is_root = true;
include 'admin/includes/header.php';
include 'admin/includes/sidebar.php';
?>

<!-- MAIN WORKSPACE START (ROOT) -->
<main class="main-area">
    <header class="header">
        <div>
            <h1 class="page-title" style="margin-bottom: 2px;">Global Operational Hub</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; display: flex; align-items: center; gap: 6px;">
                <span class="status-dot" style="background-color: #10b981;"></span>
                Live PHP Engine Integration
            </p>
        </div>
        <div style="display: flex; align-items: center; gap: 20px;">
            <div style="text-align: right;">
                <p style="font-size: 11px; font-weight: 800; color: var(--primary); text-transform: uppercase; margin: 0;">Hub Status: 200 OK</p>
                <p style="font-size: 10px; color: var(--text-muted); font-weight: 600; margin: 0;">Real-time tracking active</p>
            </div>
            <div style="width: 42px; height: 42px; border-radius: 12px; background: var(--primary-light); display: flex; align-items: center; justify-content: center; border: 1px solid rgba(37, 99, 235, 0.1);">
                <i class="fa-solid fa-headset" style="color: var(--primary); font-size: 18px;"></i>
            </div>
        </div>
    </header>

    <div class="content-padding">
        <!-- Hero Section -->
        <!-- <div class="hero-banner">
            <div style="max-width: 600px; position: relative; z-index: 10;">
                <div style="display: inline-flex; align-items: center; background: rgba(255,255,255,0.1); padding: 6px 14px; border-radius: 8px; margin-bottom: 18px; border: 1px solid rgba(255,255,255,0.1);">
                    <span class="material-symbols-rounded" style="font-size: 14px; margin-right: 8px; color: #fff;">security</span>
                    <span style="font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #fff;">Cloud Logistics Secure</span>
                </div>
                <h2 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 16px; letter-spacing: -0.025em; color: #fff;">Cargo Operations Lifecycle</h2>
                <p style="font-size: 1rem; font-weight: 500; opacity: 0.9; margin-bottom: 32px; color: rgba(255,255,255,0.8);">Initiate new shipment sequences, monitor global export metrics, and manage end-to-end logistics with our modern digital architecture.</p>
                <div style="display: flex; gap: 16px;">
                    <a href="admin/job-create.php" class="btn" style="background: #fff; color: var(--primary); display: flex; align-items: center; gap: 10px; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);">
                        <span class="material-symbols-rounded" style="font-size: 18px;">add_box</span>
                        CREATE NEW JOB
                    </a>
                    <a href="admin/export-workflow.php" class="btn" style="background: rgba(255,255,255,0.1); color: #fff; display: flex; align-items: center; gap: 10px; text-decoration: none; border: 1px solid rgba(255,255,255,0.2);">
                        <span class="material-symbols-rounded" style="font-size: 18px;">monitoring</span>
                        TRACK SEQUENCE
                    </a>
                </div>
            </div>
        </div> -->

        <!-- Operational KPIs -->
        <div class="grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 40px;">
            <div class="card" style="padding: 24px; border: 1px solid var(--border); position: relative;">
                <div style="width: 32px; height: 32px; background: #eff6ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; position: absolute; top: 24px; right: 24px;">
                    <i class="fa-solid fa-upload" style="color: #3b82f6; font-size: 12px;"></i>
                </div>
                <p style="font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.05em;">Active Exports</p>
                <h4 style="font-size: 1.875rem; font-weight: 600; color: var(--text-main); margin: 0;">124</h4>
                <p style="margin-top: 12px; font-size: 11px; font-weight: 700; color: #10b981; display: flex; align-items: center; gap: 4px;">
                    <i class="fa-solid fa-arrow-up"></i> 12.4% <span style="font-weight: 500; color: var(--text-muted);">vs last month</span>
                </p>
            </div>
            <div class="card" style="padding: 24px; border: 1px solid var(--border); position: relative;">
                <div style="width: 32px; height: 32px; background: #ecfdf5; border-radius: 8px; display: flex; align-items: center; justify-content: center; position: absolute; top: 24px; right: 24px;">
                    <i class="fa-solid fa-download" style="color: #10b981; font-size: 12px;"></i>
                </div>
                <p style="font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.05em;">Active Imports</p>
                <h4 style="font-size: 1.875rem; font-weight: 800; color: var(--text-main); margin: 0;">58</h4>
                <p style="margin-top: 12px; font-size: 11px; font-weight: 700; color: #10b981; display: flex; align-items: center; gap: 4px;">
                    <i class="fa-solid fa-arrow-up"></i> 2.1% <span style="font-weight: 500; color: var(--text-muted);">vs last month</span>
                </p>
            </div>
            <div class="card" style="padding: 24px; border: 1px solid var(--border); position: relative;">
                <div style="width: 32px; height: 32px; background: #fdf2f8; border-radius: 8px; display: flex; align-items: center; justify-content: center; position: absolute; top: 24px; right: 24px;">
                    <i class="fa-solid fa-users" style="color: #db2777; font-size: 12px;"></i>
                </div>
                <p style="font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.05em;">Global Clients</p>
                <h4 style="font-size: 1.875rem; font-weight: 800; color: var(--text-main); margin: 0;">342</h4>
                <p style="margin-top: 12px; font-size: 11px; font-weight: 700; color: var(--text-muted);">In 18 regions</p>
            </div>
            <div class="card" style="padding: 24px; border: 1px solid var(--border); border-left: 4px solid var(--danger); position: relative;">
                <p style="font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.05em;">Operational Alerts</p>
                <h4 style="font-size: 1.875rem; font-weight: 800; color: var(--danger); margin: 0;">04</h4>
                <p style="margin-top: 12px; font-size: 11px; font-weight: 700; color: var(--danger); display: flex; align-items: center; gap: 4px;">
                    Requires Immediate Action
                </p>
            </div>
        </div>

        <!-- Recent Tracking Data -->
        <div class="card" style="border: 1px solid var(--border); overflow: hidden;">
            <div style="padding: 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h5 style="margin: 0; font-size: 14px; font-weight: 800;">Recent Operational Sequences</h5>
                    <p style="margin: 4px 0 0; font-size: 11px; color: var(--text-muted); font-weight: 700;">Live manifest updates across all pipelines</p>
                </div>
                <button class="btn" style="padding: 8px 16px; font-size: 10px; background: #f8fafc; border: 1px solid var(--border); color: var(--text-main);">
                    VIEW ALL
                </button>
            </div>
            <div style="overflow-x: auto;">
                <table class="table" style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; background: #f8fafc;">
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase;">Job Reference</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase;">Consignor / Agency</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase;">Service Type</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase;">Progress</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; text-align: right;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 800; color: var(--primary); font-size: 12px; margin-bottom: 4px;">OCM-EXP-2024-0001</div>
                                <div style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Updated 2h ago</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 700; font-size: 12px;">GLOBAL LOGIX OMAN (GLO)</div>
                                <div style="font-size: 10px; color: var(--text-muted); font-weight: 500;">Direct Export Account</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <span style="font-weight: 700; font-size: 11px; padding: 4px 10px; background: #f1f5f9; border-radius: 6px;">SEA EXPORT</span>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="margin-bottom: 6px; display: flex; justify-content: space-between; align-items: center;">
                                    <span class="badge badge-warning">Loading Phase</span>
                                    <span style="font-size: 10px; font-weight: 800;">12%</span>
                                </div>
                                <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 12%; height: 100%; background: var(--primary);"></div>
                                </div>
                            </td>
                            <td align="right" style="padding: 18px 16px;">
                                <a href="admin/job-assign-slip.php" class="btn btn-primary" style="padding: 8px 16px; font-size: 10px; text-decoration: none;">MANAGE JOB</a>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 800; color: var(--primary); font-size: 12px; margin-bottom: 4px;">OCM-IMP-2024-0042</div>
                                <div style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Updated 5h ago</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 700; font-size: 12px;">OMAN NATIONAL CEMENT</div>
                                <div style="font-size: 10px; color: var(--text-muted); font-weight: 500;">Bulk Cargo Import</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <span style="font-weight: 700; font-size: 11px; padding: 4px 10px; background: #f1f5f9; border-radius: 6px;">AIR IMPORT</span>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="margin-bottom: 6px; display: flex; justify-content: space-between; align-items: center;">
                                    <span class="badge badge-success">Manifested</span>
                                    <span style="font-size: 10px; font-weight: 800;">85%</span>
                                </div>
                                <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 10px; overflow: hidden;">
                                    <div style="width: 85%; height: 100%; background: var(--secondary);"></div>
                                </div>
                            </td>
                            <td align="right" style="padding: 18px 16px;">
                                <a href="admin/job-assign-slip.php" class="btn btn-primary" style="padding: 8px 16px; font-size: 10px; text-decoration: none;">MANAGE JOB</a>
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