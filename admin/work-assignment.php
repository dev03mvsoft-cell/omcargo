<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header">
        <div>
            <h1 class="page-title">Active Work Assignments</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600;">Monitor employee task distribution across global ports</p>
        </div>
        <div style="display: flex; gap: 12px;">
            <button class="btn btn-primary" style="padding: 10px 24px; font-size: 11px; background: var(--primary);">
                <i class="fa-solid fa-file-export" style="margin-right: 8px;"></i> EXPORT MODULE
            </button>
            <button class="btn" style="padding: 10px 24px; font-size: 11px; background: #f1f5f9; color: var(--text-main); border: 1px solid var(--border);">
                <i class="fa-solid fa-file-import" style="margin-right: 8px;"></i> IMPORT MODULE
            </button>
        </div>
    </header>

    <div class="content-padding">
        <!-- Filter Hub -->
        <div class="card" style="padding: 24px; margin-bottom: 30px; border: 1px solid var(--border);">
            <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; align-items: flex-end;">
                <div class="form-group" style="margin-bottom:0 !important;">
                    <label class="form-label">Search Assignee</label>
                    <input type="text" class="form-input" placeholder="Employee Name..." style="padding: 10px;">
                </div>
                <div class="form-group" style="margin-bottom:0 !important;">
                    <label class="form-label">Loading Port</label>
                    <select class="form-input" style="padding: 10px;">
                        <option>ALL PORTS</option>
                        <option selected>MUNDRA PORT</option>
                        <option>NHAVA SHEVA</option>
                        <option>HAZIRA PORT</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:0 !important;">
                    <label class="form-label">Invoice / Ref No</label>
                    <input type="text" class="form-input" placeholder="AAAL/24..." style="padding: 10px;">
                </div>
                <div class="form-group" style="margin-bottom:0 !important;">
                    <label class="form-label">Client Name</label>
                    <input type="text" class="form-input" placeholder="Global Logix..." style="padding: 10px;">
                </div>
                <div class="form-group" style="margin-bottom:0 !important;">
                    <label class="form-label">Cargo Type</label>
                    <select class="form-input" style="padding: 10px;">
                        <option>ALL TYPES</option>
                        <option>MOSAIC TILE</option>
                        <option>BULK CARGO</option>
                        <option>CHEMICALS</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                <button class="btn btn-primary" style="padding: 8px 30px; font-size: 10px;">APPLY FILTERS</button>
            </div>
        </div>

        <!-- Assignments by Port: MUNDRA PORT -->
        <div style="margin-bottom: 40px;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px; padding-left: 10px;">
                <span class="material-symbols-rounded" style="color: var(--primary); font-size: 24px;">anchor</span>
                <h3 style="font-size: 13px; font-weight: 800; text-transform: uppercase; color: var(--text-main); margin: 0;">MUNDRA PORT OPERATIONS</h3>
                <span class="badge badge-success" style="font-size: 10px;">03 Active Tasks</span>
            </div>

            <div class="card" style="border: 1px solid var(--border); overflow: hidden;">
                <table class="table" style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; background: #f8fafc;">
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">S.No</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">Job ID</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">Creation Date</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">Client Name</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">Invoice No</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">Type</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border);">Assignee</th>
                            <th style="padding: 16px; font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border); text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 18px 16px; font-weight: 700; font-size: 12px; color: var(--text-muted);">01</td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 800; font-size: 12px; color: var(--primary);">OCM-EXP-24-001</div>
                            </td>
                            <td style="padding: 18px 16px; font-size: 11px; font-weight: 600;">02-04-2026</td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 700; font-size: 12px; color: #1e293b;">GLOBAL LOGIX OMAN</div>
                                <div style="font-size: 9px; color: var(--text-muted); font-weight: 500;">DIRECT EXPORT</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 700; font-size: 11px; font-family: monospace;">AAAL/24-25/004</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <span class="badge" style="background: #eff6ff; color: #2563eb; font-size: 9px;">EXPORT</span>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #eff6ff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 9px; color: var(--primary);">RS</div>
                                    <div style="font-weight: 700; font-size: 11px;">Rahul Sharma</div>
                                </div>
                            </td>
                            <td align="right" style="padding: 18px 16px;">
                                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                    <a href="job-assign-slip.php" class="btn" style="padding: 6px 10px; font-size: 9px; border: 1px solid var(--border); background: #fff; color: var(--text-main); text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa-solid fa-eye"></i> SLIP
                                    </a>
                                    <a href="job-status.php" class="btn" style="padding: 6px 10px; font-size: 9px; border: 1px solid var(--border); background: var(--primary-light); color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa-solid fa-pen-to-square"></i> STATUS
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 18px 16px; font-weight: 700; font-size: 12px; color: var(--text-muted);">02</td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 800; font-size: 12px; color: var(--primary);">OCM-EXP-24-012</div>
                            </td>
                            <td style="padding: 18px 16px; font-size: 11px; font-weight: 600;">01-04-2026</td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 700; font-size: 12px; color: #1e293b;">NEXUS TRANSPORT</div>
                                <div style="font-size: 9px; color: var(--text-muted); font-weight: 500;">REGULAR AGENCY</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="font-weight: 700; font-size: 11px; font-family: monospace;">AAAL/24-25/012</div>
                            </td>
                            <td style="padding: 18px 16px;">
                                <span class="badge" style="background: #fdf2f8; color: #db2777; font-size: 9px;">IMPORT</span>
                            </td>
                            <td style="padding: 18px 16px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #fdf2f8; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 9px; color: #db2777;">AV</div>
                                    <div style="font-weight: 700; font-size: 11px;">Amit Verma</div>
                                </div>
                            </td>
                            <td align="right" style="padding: 18px 16px;">
                                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                    <a href="job-assign-slip.php" class="btn" style="padding: 6px 10px; font-size: 9px; border: 1px solid var(--border); background: #fff; color: var(--text-main); text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa-solid fa-eye"></i> SLIP
                                    </a>
                                    <a href="job-status.php" class="btn" style="padding: 6px 10px; font-size: 9px; border: 1px solid var(--border); background: var(--primary-light); color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa-solid fa-pen-to-square"></i> STATUS
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Other Port Categorization: NHAVA SHEVA (Example) -->
        <div style="margin-bottom: 40px; opacity: 0.7;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px; padding-left: 10px;">
                <span class="material-symbols-rounded" style="color: var(--text-muted); font-size: 24px;">anchor</span>
                <h3 style="font-size: 13px; font-weight: 800; text-transform: uppercase; color: var(--text-muted); margin: 0;">NHAVA SHEVA PORT OPERATIONS</h3>
                <span class="badge" style="background:#f1f5f9; color:#64748b; font-size: 10px;">00 Active Tasks</span>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>